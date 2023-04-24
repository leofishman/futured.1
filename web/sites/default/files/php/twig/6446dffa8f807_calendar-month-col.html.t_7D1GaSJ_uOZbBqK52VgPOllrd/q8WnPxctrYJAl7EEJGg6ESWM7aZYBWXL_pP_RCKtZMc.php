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

/* modules/contrib/opigno_calendar/templates/calendar-month-col.html.twig */
class __TwigTemplate_5aa77332d3ba19d06ee3ed6278784d88 extends \Twig\Template
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
        // line 12
        if ((is_string($__internal_compile_0 = twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "class", [], "any", false, false, true, 12)) && is_string($__internal_compile_1 = "single-day no-entry") && ('' === $__internal_compile_1 || 0 === strpos($__internal_compile_0, $__internal_compile_1)))) {
            // line 13
            echo "  <td
    id=\"";
            // line 14
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "id", [], "any", false, false, true, 14), 14, $this->source) . "_empty"), "html", null, true);
            echo "\"
    date-date=\"";
            // line 15
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "date", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "\"
    data-day-of-month=\"";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "day_of_month", [], "any", false, false, true, 16), 16, $this->source), "html", null, true);
            echo "\"
    headers=\"";
            // line 17
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "header_id", [], "any", false, false, true, 17), 17, $this->source), "html", null, true);
            echo "\"
    class=\"";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "class", [], "any", false, false, true, 18), 18, $this->source), "html", null, true);
            echo "\"
    colspan=\"";
            // line 19
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "colspan", [], "any", false, false, true, 19), 19, $this->source), "html", null, true);
            echo "\"
    rowspan=\"";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "rowspan", [], "any", false, false, true, 20), 20, $this->source), "html", null, true);
            echo "\">
    <div class=\"inner\">
      <div class=\"date-box\"><span class=\"date-day\">";
            // line 22
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "date", [], "any", false, false, true, 22), 22, $this->source), "d"), "html", null, true);
            echo "</span>
        <span class=\"date-month\">";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t(twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "date", [], "any", false, false, true, 23), 23, $this->source), "F"), [], ["context" => "Long month name"]));
            echo "</span>
        <span class=\"date-year\">";
            // line 24
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_date_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "date", [], "any", false, false, true, 24), 24, $this->source), "Y"), "html", null, true);
            echo "</span>
      </div>
      <h4 class=\"title\">";
            // line 26
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("No Event"));
            echo "</h4>
    </div>
  </td>
";
        } else {
            // line 30
            echo "  <td
    id=\"";
            // line 31
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "id", [], "any", false, false, true, 31), 31, $this->source), "html", null, true);
            echo "\"
    date-date=\"";
            // line 32
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "date", [], "any", false, false, true, 32), 32, $this->source), "html", null, true);
            echo "\"
    data-day-of-month=\"";
            // line 33
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "day_of_month", [], "any", false, false, true, 33), 33, $this->source), "html", null, true);
            echo "\"
    headers=\"";
            // line 34
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "header_id", [], "any", false, false, true, 34), 34, $this->source), "html", null, true);
            echo "\"
    class=\"";
            // line 35
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "class", [], "any", false, false, true, 35), 35, $this->source), "html", null, true);
            echo "\"
    colspan=\"";
            // line 36
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "colspan", [], "any", false, false, true, 36), 36, $this->source), "html", null, true);
            echo "\"
    rowspan=\"";
            // line 37
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "rowspan", [], "any", false, false, true, 37), 37, $this->source), "html", null, true);
            echo "\">
    <div class=\"inner\">
      ";
            // line 39
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["item"] ?? null), "entry", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
            echo "
    </div>
  </td>
";
        }
        // line 43
        echo "
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/opigno_calendar/templates/calendar-month-col.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 43,  125 => 39,  120 => 37,  116 => 36,  112 => 35,  108 => 34,  104 => 33,  100 => 32,  96 => 31,  93 => 30,  86 => 26,  81 => 24,  77 => 23,  73 => 22,  68 => 20,  64 => 19,  60 => 18,  56 => 17,  52 => 16,  48 => 15,  44 => 14,  41 => 13,  39 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/opigno_calendar/templates/calendar-month-col.html.twig", "/var/www/web/modules/contrib/opigno_calendar/templates/calendar-month-col.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 12);
        static $filters = array("escape" => 14, "date" => 22, "t" => 23);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'date', 't'],
                []
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
