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

/* themes/contrib/aristotle/templates/block/status-messages.html.twig */
class __TwigTemplate_484426cec2ec1a742c28acaad25261f8 extends \Twig\Template
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
        // line 24
        echo "<div data-drupal-messages>
";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["message_list"] ?? null));
        foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
            // line 26
            echo "  <div class=\"status-message ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["type"], 26, $this->source), "html", null, true);
            echo "\" role=\"contentinfo\" aria-label=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_0 = ($context["status_headings"] ?? null)) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0[$context["type"]] ?? null) : null), 26, $this->source), "html", null, true);
            echo "\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 26, $this->source), "role", "aria-label"), "html", null, true);
            echo ">
    ";
            // line 27
            if (($context["type"] == "status")) {
                // line 28
                echo "      <i class=\"fi check-circle\"></i>
    ";
            }
            // line 30
            echo "
    ";
            // line 31
            if (($context["type"] == "warning")) {
                // line 32
                echo "      <i class=\"fi fi-rr-exclamation\"></i>
    ";
            }
            // line 34
            echo "
    ";
            // line 35
            if (($context["type"] == "error")) {
                // line 36
                echo "      <i class=\"fi fi-rr-cross-circle\"></i>
    ";
            }
            // line 38
            echo "
    ";
            // line 39
            if (($context["type"] == "error")) {
                // line 40
                echo "      <div role=\"alert\">
    ";
            }
            // line 42
            echo "    ";
            if ((($__internal_compile_1 = ($context["status_headings"] ?? null)) && is_array($__internal_compile_1) || $__internal_compile_1 instanceof ArrayAccess ? ($__internal_compile_1[$context["type"]] ?? null) : null)) {
                // line 43
                echo "      <h2 class=\"visually-hidden\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_compile_2 = ($context["status_headings"] ?? null)) && is_array($__internal_compile_2) || $__internal_compile_2 instanceof ArrayAccess ? ($__internal_compile_2[$context["type"]] ?? null) : null), 43, $this->source), "html", null, true);
                echo "</h2>
    ";
            }
            // line 45
            echo "    ";
            if ((twig_length_filter($this->env, $context["messages"]) > 1)) {
                // line 46
                echo "      <ul>
        ";
                // line 47
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($context["messages"]);
                foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                    // line 48
                    echo "          <li>";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["message"], 48, $this->source), "html", null, true);
                    echo "</li>
        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 50
                echo "      </ul>
    ";
            } else {
                // line 52
                echo "      ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, twig_first($this->env, $this->sandbox->ensureToStringAllowed($context["messages"], 52, $this->source)), "html", null, true);
                echo "
    ";
            }
            // line 54
            echo "    ";
            if (($context["type"] == "error")) {
                // line 55
                echo "      </div>
    ";
            }
            // line 57
            echo "  </div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/contrib/aristotle/templates/block/status-messages.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  140 => 59,  133 => 57,  129 => 55,  126 => 54,  120 => 52,  116 => 50,  107 => 48,  103 => 47,  100 => 46,  97 => 45,  91 => 43,  88 => 42,  84 => 40,  82 => 39,  79 => 38,  75 => 36,  73 => 35,  70 => 34,  66 => 32,  64 => 31,  61 => 30,  57 => 28,  55 => 27,  46 => 26,  42 => 25,  39 => 24,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/contrib/aristotle/templates/block/status-messages.html.twig", "/var/www/web/themes/contrib/aristotle/templates/block/status-messages.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("for" => 25, "if" => 27);
        static $filters = array("escape" => 26, "without" => 26, "length" => 45, "first" => 52);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['for', 'if'],
                ['escape', 'without', 'length', 'first'],
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
