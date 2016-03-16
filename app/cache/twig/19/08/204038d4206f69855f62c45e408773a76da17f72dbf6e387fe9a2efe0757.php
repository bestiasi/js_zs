<?php

/* Stands\index.html.twig */
class __TwigTemplate_1908204038d4206f69855f62c45e408773a76da17f72dbf6e387fe9a2efe0757 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_title($context, array $blocks = array())
    {
        echo "Stand rezervation";
    }

    // line 4
    public function block_content($context, array $blocks = array())
    {
        // line 5
        echo "    <p>This is the JobShop &copy; 2016 stands map. Click on the map to choose your stand.</p>
     
    <div class=\"row\">
        <div class=\"col-md-10\">
            <div class=\"row\">
                ";
        // line 10
        $this->env->loadTemplate("Stands\\map.html.twig")->display($context);
        // line 11
        echo "            </div>
            <div class='row'>
                <div class=\"col-md-6\">
                    ";
        // line 14
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user") && $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
            // line 15
            echo "                        <table class='table table-bordered table-hover'>
                            <thead>
                                <tr>
                                    <th>Stand</th>
                                    <th>Size</th>
                                    <th>Is reserved</th>
                                    <th>Company</th>
                                </tr>
                            </thead>
                            ";
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["stands"]) ? $context["stands"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["stand"]) {
                // line 25
                echo "                                <tr>
                                    <td>";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["stand"]) ? $context["stand"] : null), "name"), "html", null, true);
                echo "</td>
                                    <td>";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["stand"]) ? $context["stand"] : null), "size"), "html", null, true);
                echo "</td>
                                    <td>";
                // line 28
                echo (($this->getAttribute((isset($context["stand"]) ? $context["stand"] : null), "isReserved")) ? ("YES") : ("NO"));
                echo "</td>
                                    <td>";
                // line 29
                echo twig_escape_filter($this->env, (($this->getAttribute((isset($context["stand"]) ? $context["stand"] : null), "user")) ? ($this->getAttribute($this->getAttribute((isset($context["stand"]) ? $context["stand"] : null), "user"), "name")) : ("")), "html", null, true);
                echo "</td>
                                </tr>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['stand'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            echo "                        </table>
                    ";
        }
        // line 34
        echo "                </div>
            </div>
        </div>
        <div class=\"col-md-6\">
            ";
        // line 38
        if (((isset($context["currentUserStand"]) ? $context["currentUserStand"] : null) == false)) {
            // line 39
            echo "                <span id=\"chosen_stand\"></span>
                <button class=\"btn btn-success\" id=\"submit_reserve\">Submit</button>
            ";
        } else {
            // line 42
            echo "                <h3>Your stand is: ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["currentUserStand"]) ? $context["currentUserStand"] : null), "name"), "html", null, true);
            echo "</h3>
            ";
        }
        // line 44
        echo "        </div>
    </div>

";
    }

    // line 49
    public function block_javascripts($context, array $blocks = array())
    {
        // line 50
        echo "
    <script>
        \$('document').ready(function () {
            clickOnStand();
            submitReserve('";
        // line 54
        echo $this->env->getExtension('routing')->getPath("stands.reserve");
        echo "');
            disableReservedStands(
                    \$.parseJSON('";
        // line 56
        echo twig_jsonencode_filter((isset($context["reservedStands"]) ? $context["reservedStands"] : null));
        echo "'),
                    \$.parseJSON('";
        // line 57
        echo twig_jsonencode_filter((isset($context["currentUserStand"]) ? $context["currentUserStand"] : null));
        echo "')
                    );
        });
    </script>
";
    }

    public function getTemplateName()
    {
        return "Stands\\index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 57,  138 => 56,  133 => 54,  127 => 50,  124 => 49,  117 => 44,  111 => 42,  106 => 39,  104 => 38,  98 => 34,  94 => 32,  85 => 29,  81 => 28,  77 => 27,  73 => 26,  70 => 25,  66 => 24,  55 => 15,  53 => 14,  48 => 11,  46 => 10,  39 => 5,  36 => 4,  30 => 2,);
    }
}
