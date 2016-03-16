<?php

/* simple_user_list.twig */
class __TwigTemplate_619aaa9c3772ff9f6fc7c6fd079ea869e807a61ef7cef9871671b52cd5a748e2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return $this->env->resolveTemplate((isset($context["layout_template"]) ? $context["layout_template"] : null));
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "List users";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    <h1>List users</h1>

    ";
        // line 9
        if (($this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "totalItems") == 1)) {
            // line 10
            echo "        <strong>1</strong> user found.
    ";
        } else {
            // line 12
            echo "        <strong>";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "totalItems"), "html", null, true);
            echo "</strong> users found.
    ";
        }
        // line 14
        echo "
    Showing <strong>";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "currentPageFirstItem"), "html", null, true);
        echo " - ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["paginator"]) ? $context["paginator"] : null), "currentPageLastItem"), "html", null, true);
        echo "</strong>.

    ";
        // line 17
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["users"]) ? $context["users"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 18
            echo "
        <div class=\"media\">
            <a class=\"media-object pull-left\" href=\"";
            // line 20
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user.view", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id"))), "html", null, true);
            echo "\">
                <img src=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "imageUrl"), "html", null, true);
            echo "\" width=\"40\" height=\"40\" border=0>
            </a>

            <div class=\"media-body\">
                <h4 class=\"media-heading\">
                    <a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user.view", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id"))), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "displayName"), "html", null, true);
            echo "</a>
                </h4>

                ";
            // line 29
            if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : null), "isEnabled"))) {
                // line 30
                echo "                    <div>
                        <span class=\"label label-danger\">Pending email confirmation</span>
                    </div>
                ";
            }
            // line 34
            echo "
                ";
            // line 35
            if ($this->env->getExtension('security')->isGranted("ROLE_ADMIN")) {
                // line 36
                echo "                    <div class=\"text-muted\">
                        ";
                // line 37
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email"), "html", null, true);
                echo "
                    </div>
                ";
            }
            // line 40
            echo "            </div>
        </div>

    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "
    ";
        // line 45
        echo (isset($context["paginator"]) ? $context["paginator"] : null);
        echo "

";
    }

    public function getTemplateName()
    {
        return "simple_user_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  125 => 45,  122 => 44,  113 => 40,  107 => 37,  104 => 36,  102 => 35,  99 => 34,  93 => 30,  91 => 29,  83 => 26,  75 => 21,  71 => 20,  67 => 18,  63 => 17,  56 => 15,  53 => 14,  47 => 12,  43 => 10,  41 => 9,  36 => 6,  33 => 5,  27 => 3,);
    }
}
