<?php

namespace Drupal\mimemail\Form;

use Drupal\Component\Utility\Crypt;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Extension\ThemeHandlerInterface;
use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Mail\MailManagerInterface;
use Drupal\Core\Url;
use Drupal\field\Entity\FieldConfig;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Mime Mail administrative settings form.
 */
class AdminForm extends ConfigFormBase {

  /**
   * The mail plugin manager service.
   *
   * @var \Drupal\Core\Mail\MailManagerInterface
   */
  protected $mailManager;

  /**
   * The module handler service.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * The theme handler service.
   *
   * @var \Drupal\Core\Extension\ThemeHandlerInterface
   */
  protected $themeHandler;

  /**
   * The entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs an AdminForm object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The factory for configuration objects.
   * @param \Drupal\Core\Mail\MailManagerInterface $mail_manager
   *   The mail plugin manager service.
   * @param \Drupal\Core\Extension\ModuleHandlerInterface $module_handler
   *   The module handler service.
   * @param \Drupal\Core\Extension\ThemeHandlerInterface $theme_handler
   *   The theme handler service.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(ConfigFactoryInterface $config_factory, MailManagerInterface $mail_manager, ModuleHandlerInterface $module_handler, ThemeHandlerInterface $theme_handler, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($config_factory);
    $this->mailManager = $mail_manager;
    $this->moduleHandler = $module_handler;
    $this->themeHandler = $theme_handler;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('config.factory'),
      $container->get('plugin.manager.mail'),
      $container->get('module_handler'),
      $container->get('theme_handler'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'mimemail_admin_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['mimemail.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('mimemail.settings');

    $form = [];
    $form['mimemail']['name'] = [
      '#type'          => 'textfield',
      '#title'         => $this->t('Sender name'),
      '#default_value' => $config->get('name') ?: $this->config('system.site')->get('name'),
      '#size'          => 60,
      '#maxlength'     => 128,
      '#description'   => $this->t('The name that all site emails will be from when using Mime Mail.'),
    ];
    $form['mimemail']['mail'] = [
      '#type'          => 'email',
      '#title'         => $this->t('Sender email address'),
      '#default_value' => $config->get('mail') ?: $this->config('system.site')->get('mail'),
      '#size'          => 60,
      '#maxlength'     => 128,
      '#description'   => $this->t('The email address that all site emails will be from when using Mime Mail.'),
    ];

    // Check for the existence of a mail.css file in the default theme folder.
    $theme = $this->themeHandler->getDefault();
    // @todo Searching the path is not what we want - this is how it was done
    // in D7, but that's not how assets should be handled in D8.
    $mailstyle = \Drupal::service('extension.list.theme')->getPath($theme) . '/mail.css';
    // Disable site style sheets including option if found.
    if (is_file($mailstyle)) {
      $config->set('sitestyle', FALSE);
      $disable_sitestyle = TRUE;
    }
    else {
      $disable_sitestyle = FALSE;
    }

    $form['mimemail']['simple_address'] = [
      '#type'          => 'checkbox',
      '#title'         => $this->t('Use simple address format'),
      '#default_value' => $config->get('simple_address'),
      '#description' => $this->t('Use the simple format of user@example.com for all recipient email addresses.'),
    ];
    $form['mimemail']['sitestyle'] = [
      '#type'          => 'checkbox',
      '#title'         => $this->t('Include site style sheets'),
      '#default_value' => $config->get('sitestyle'),
      '#description'   => $this->t('Gather all style sheets when no mail.css found in the default theme directory.'),
      '#disabled'      => $disable_sitestyle,
    ];
    $form['mimemail']['textonly'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Send plain text email only'),
      '#default_value' => $config->get('textonly'),
      '#description' => $this->t('This option disables the use of email messages with graphics and styles. All messages will be converted to plain text. This option overrides the per-user choice configured below.'),
    ];
    $form['mimemail']['linkonly'] = [
      '#type'          => 'checkbox',
      '#title'         => $this->t('Link images only'),
      '#default_value' => $config->get('linkonly'),
      '#description'   => $this->t('This option disables the embedding of images. All image will be available as external content. This can make email messages much smaller.'),
    ];
    if ($this->moduleHandler->moduleExists('mimemail_compress')) {
      $form['mimemail']['preserve_class'] = [
        '#type' => 'checkbox',
        '#title' => $this->t('Preserve class attributes'),
        '#default_value' => $config->get('preserve_class'),
        '#description' => $this->t('This option disables the removing of class attributes from the message source. Useful for debugging the style of the message.'),
      ];
    }

    // Find boolean fields attached to user objects. One of these may be
    // selected and used as as a per-user opt-out of HTML mails in favor
    // of plaintext, if desired.
    $fields = ['' => $this->t('- None -')];
    $field_config_storage = $this->entityTypeManager->getStorage('field_config');
    $field_ids = $field_config_storage->getQuery()
      ->condition('field_type', 'boolean')
      ->condition('bundle', 'user')
      ->execute();

    foreach (FieldConfig::loadMultiple($field_ids) as $field) {
      // Add to select option list.
      $fields[$field->getName()] = $field->label();
    }
    $form['mimemail']['user_plaintext_field'] = [
      '#type' => 'select',
      '#title' => $this->t('Plain text email only field'),
      '#description' => $this->t('Allows users to specify they only want plain text email. This is done via a boolean field on the user profile. The site administrator must first add a boolean field to the user profile, then choose that field here and save this setting. If the value of that field is TRUE for a given user, Mime Mail will only send plain text email to that user.'),
      '#options' => $fields,
      '#default_value' => $config->get('user_plaintext_field'),
    ];
    if ($this->moduleHandler->moduleExists('field_ui')) {
      $form['mimemail']['user_plaintext_field']['#description'] = $this->t('Allows users to specify they only want plain text email. This is done via a boolean field on the user profile. The site administrator must first <a href=":fields">add a boolean field to the user profile</a>, then choose that field here and save this setting. If the value of that field is TRUE for a given user, Mime Mail will only send plain text email to that user.', [
        ':fields' => Url::fromRoute('entity.user.field_ui_fields')->toString(),
      ]);
    }

    // Get a list of all formats.
    $formats = filter_formats();
    $format_options = [];
    foreach ($formats as $format) {
      $format_options[$format->get('format')] = $format->get('name');
    }
    $form['mimemail']['format'] = [
      '#type' => 'select',
      '#title' => $this->t('Email format'),
      '#default_value' => $config->get('format') ?: filter_fallback_format(),
      '#options' => $format_options,
      '#access' => count($formats) > 1,
      '#attributes' => ['class' => ['filter-list']],
      '#description' => $this->t('The filter set that will be applied to the message body. If you are using Mime Mail as default mail system, make sure to enable "Convert line breaks into HTML" and "Convert URLs into links" with a long enough maximum length for e.g. password reset URLs!'),
    ];

    $form['mimemail']['advanced'] = [
      '#type' => 'details',
      '#title' => $this->t('Advanced settings'),
      '#open' => FALSE,
    ];
    $form['mimemail']['advanced']['incoming'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Process incoming messages posted to this site'),
      '#default_value' => $config->get('advanced.incoming'),
      '#description' => $this->t('This is an advanced setting that should not be enabled unless you know what you are doing.'),
    ];
    $form['mimemail']['advanced']['key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Message validation string'),
      '#default_value' => $config->get('advanced.key') ?: Crypt::randomBytesBase64(),
      '#required' => TRUE,
      '#description' => $this->t('This string will be used to validate incoming messages. It can be anything, but must be used on both sides of the transfer.'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('mimemail.settings');
    $config
      ->set('format', $form_state->getValue('format'))
      ->set('name', $form_state->getValue('name'))
      ->set('mail', $form_state->getValue('mail'))
      ->set('simple_address', $form_state->getValue('simple_address'))
      ->set('sitestyle', $form_state->getValue('sitestyle'))
      ->set('textonly', $form_state->getValue('textonly'))
      ->set('linkonly', $form_state->getValue('linkonly'))
      ->set('user_plaintext_field', $form_state->getValue('user_plaintext_field'))
      ->set('advanced.incoming', $form_state->getValue('incoming'))
      ->set('advanced.key', $form_state->getValue('key'));
    if ($form_state->hasValue('preserve_class')) {
      // This form element is only present when mimemail_compress is enabled.
      $config->set('preserve_class', $form_state->getValue('preserve_class'));
    }
    $config->save();

    parent::submitForm($form, $form_state);
  }

}
