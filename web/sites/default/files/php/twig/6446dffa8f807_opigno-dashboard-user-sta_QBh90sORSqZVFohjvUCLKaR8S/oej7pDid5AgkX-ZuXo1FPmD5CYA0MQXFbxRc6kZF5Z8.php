<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/contrib/opigno_dashboard/templates/opigno-dashboard-user-statistics-block.html.twig */
class __TwigTemplate_936de5158abfb42e97532632695e8a19 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 14
        echo "
<div class=\"content-box profile-info\">
  <div class=\"edit-link\">
    <a href=\"";
        // line 17
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.user.edit_form", ["user" => ($context["uid"] ?? null)]), "html", null, true);
        echo "\">
      <i class=\"fi fi-rr-edit\"></i>
    </a>
  </div>

  <div class=\"profile-info__body\">
    <div class=\"profile-info__pic\">";
        // line 23
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["user_picture"] ?? null), 23, $this->source), "html", null, true);
        echo "</div>
    <a href=\"";
        // line 24
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.user.canonical", ["user" => ($context["uid"] ?? null)]), "html", null, true);
        echo "\">
      <h2 class=\"profile-info__name\">";
        // line 25
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["user_name"] ?? null), 25, $this->source), "html", null, true);
        echo "</h2>
    </a>
    <div class=\"profile-info__type\">";
        // line 27
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["role"] ?? null), 27, $this->source), "html", null, true);
        echo "</div>
  </div>

  <div class=\"profile-info__statistics\">
    <div class=\"filter\">
      <div class=\"filter__label\">";
        // line 32
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Trends"));
        echo "</div>
      <select name=\"filterRange\" id=\"filterRange\" class=\"form-select selectpicker\">
        <option value=\"7\">";
        // line 34
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last 7 days"));
        echo "</option>
        <option value=\"30\">";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last 30 days"));
        echo "</option>
      </select>
    </div>
    ";
        // line 38
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["stats"] ?? null), 38, $this->source), "html", null, true);
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/opigno_dashboard/templates/opigno-dashboard-user-statistics-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  89 => 38,  83 => 35,  79 => 34,  74 => 32,  66 => 27,  61 => 25,  57 => 24,  53 => 23,  44 => 17,  39 => 14,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/opigno_dashboard/templates/opigno-dashboard-user-statistics-block.html.twig", "/var/www/web/modules/contrib/opigno_dashboard/templates/opigno-dashboard-user-statistics-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 17, "t" => 32);
        static $functions = array("path" => 17);

        try {
            $this->sandbox->checkSecurity(
                [],
                ['escape', 't'],
                ['path']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
