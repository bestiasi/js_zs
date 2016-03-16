<?php

/* @user/view.twig */
class __TwigTemplate_bc0f1f0210706ee60260621fcb19cd5b4f60ac99a429bbb512142a636eff45d6 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "displayName"), "html", null, true);
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "<div class=\"media\">
    <img class=\"media-object pull-left\" src=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["imageUrl"]) ? $context["imageUrl"] : null), "html", null, true);
        echo "\" width=\"80\" height=\"80\">

    <div class=\"media-body\">

        <h1 class=\"media-heading\">
            ";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "displayName"), "html", null, true);
        echo "
        </h1>

        ";
        // line 15
        if ((!$this->getAttribute((isset($context["user"]) ? $context["user"] : null), "isEnabled"))) {
            // line 16
            echo "            <div style=\"margin-bottom: 5px;\">
                <span class=\"label label-danger\">Pending email confirmation</span>
                <span class=\"text-muted\">(visible to admins only)</span>
            </div>
        ";
        }
        // line 21
        echo "

        ";
        // line 23
        if ($this->env->getExtension('security')->isGranted("EDIT_USER", (isset($context["user"]) ? $context["user"] : null))) {
            // line 24
            echo "            <div class=\"text-muted\">
                ";
            // line 25
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "email"), "html", null, true);
            echo "
            </div>
        ";
        }
        // line 28
        echo "
        <div class=\"text-muted\">
            Registered ";
        // line 30
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "timeCreated"), "F j, Y"), "html", null, true);
        echo "
        </div>

        ";
        // line 33
        if ($this->env->getExtension('security')->isGranted("EDIT_USER", (isset($context["user"]) ? $context["user"] : null))) {
            // line 34
            echo "            <div>
                <a href=\"";
            // line 35
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user.edit", array("id" => $this->getAttribute((isset($context["user"]) ? $context["user"] : null), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-edit\" style=\"margin-right: 5px;\"></span>Edit</a>
            </div>
        ";
        }
        // line 38
        echo "    </div>
</div>


";
    }

    public function getTemplateName()
    {
        return "@user/view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  98 => 38,  92 => 35,  89 => 34,  87 => 33,  81 => 30,  77 => 28,  71 => 25,  68 => 24,  66 => 23,  62 => 21,  55 => 16,  53 => 15,  47 => 12,  39 => 7,  36 => 6,  33 => 5,  27 => 3,);
    }
}
