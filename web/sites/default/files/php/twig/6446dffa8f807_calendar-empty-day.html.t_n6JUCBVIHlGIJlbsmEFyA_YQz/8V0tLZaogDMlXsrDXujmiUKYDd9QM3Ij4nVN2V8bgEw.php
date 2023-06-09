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

/* modules/contrib/calendar/templates/calendar-empty-day.html.twig */
class __TwigTemplate_f9225ae8ca35cb4b6dfa838bba4d0811 extends \Twig\Template
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
        // line 13
        if ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["view"] ?? null), "dateInfo", [], "any", false, false, true, 13), "calendarType", [], "any", false, false, true, 13) != "day")) {
            // line 14
            echo "  <div class=\"calendar-empty\">&nbsp;</div>
";
        } else {
            // line 16
            echo "  <div class=\"calendar-dayview-empty\">";
            echo t("Empty day", array());
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "modules/contrib/calendar/templates/calendar-empty-day.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 16,  41 => 14,  39 => 13,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/calendar/templates/calendar-empty-day.html.twig", "/var/www/web/modules/contrib/calendar/templates/calendar-empty-day.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 13, "trans" => 16);
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'trans'],
                [],
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
