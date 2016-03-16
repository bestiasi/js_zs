<?php

/* layout.twig */
class __TwigTemplate_748ad2228ee5d1001cdc1c833f387d8b07ec13c05cf3e73792e459678a234663 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
    <head>
        <meta charset=\"utf-8\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        <link rel=\"stylesheet\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css\">
        <link rel=\"stylesheet\" href=\"/css/styles.css\">
    </head>
    <body>
        <nav class=\"navbar navbar-default\" role=\"navigation\">
            <div class=\"container-fluid\">
                ";
        // line 15
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user")) {
            // line 16
            echo "                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class=\"navbar-header\">
                        <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\">
                            <span class=\"sr-only\">Toggle navigation</span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                            <span class=\"icon-bar\"></span>
                        </button>
                        <a class=\"navbar-brand\" href=\"/\">Home</a>

                    </div>

                ";
        }
        // line 29
        echo "                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
                    <ul class=\"nav navbar-nav navbar-right\">
                        ";
        // line 32
        if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user") && $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
            // line 33
            echo "                            <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("user.list");
            echo "\">List users</a></li>
                            ";
        }
        // line 35
        echo "                            ";
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user")) {
            // line 36
            echo "                            <li>
                                <a class=\"app_btn\" href=\"";
            // line 37
            echo $this->env->getExtension('routing')->getPath("stands.map");
            echo "\">Reserve stand</a>
                            </li>

                            <li class=\"dropdown\">
                                <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                    Hello, ";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "displayName"), "html", null, true);
            echo "!
                                    <span class=\"caret\"></span>
                                </a>
                                <ul class=\"dropdown-menu\" role=\"menu\">
                                    <li><a href=\"";
            // line 46
            echo $this->env->getExtension('routing')->getPath("user");
            echo "\"><span class=\"glyphicon glyphicon-user\"></span> View your profile</a></li>
                                    <li><a href=\"";
            // line 47
            echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("user.edit", array("id" => $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "id"))), "html", null, true);
            echo "\"><span class=\"glyphicon glyphicon-edit\"></span> Edit your profile</a></li>
                                        ";
            // line 48
            if (($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user") && $this->env->getExtension('security')->isGranted("ROLE_ADMIN"))) {
                // line 49
                echo "                                        <li><a href=\"";
                echo $this->env->getExtension('routing')->getPath("user.add");
                echo "\"><span class=\"glyphicon glyphicon-plus\"></span> Create account</a></li>
                                        ";
            }
            // line 51
            echo "                                    <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("user.logout");
            echo "\"><span class=\"glyphicon glyphicon-off\"></span> Sign out</a></li>
                                </ul>
                            </li>
                        ";
        } else {
            // line 55
            echo "                            <li><a href=\"";
            echo $this->env->getExtension('routing')->getPath("user.login");
            echo "\">Sign in</a></li>
                            ";
        }
        // line 57
        echo "                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>

        <div class=\"container\">
            ";
        // line 63
        if ($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "has", array(0 => "alert"), "method")) {
            // line 64
            echo "                ";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "session"), "flashbag"), "get", array(0 => "alert"), "method"));
            foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
                // line 65
                echo "                    <div class=\"alert alert-info\">";
                echo twig_escape_filter($this->env, (isset($context["flashMessage"]) ? $context["flashMessage"] : null), "html", null, true);
                echo "</div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "            ";
        }
        // line 68
        echo "
        ";
        // line 69
        $this->displayBlock('content', $context, $blocks);
        // line 70
        echo "    </div>

    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js\"></script>
    <script src=\"/js/main.js\"></script>
    ";
        // line 75
        $this->displayBlock('javascripts', $context, $blocks);
        // line 77
        echo "
</body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "";
    }

    // line 69
    public function block_content($context, array $blocks = array())
    {
    }

    // line 75
    public function block_javascripts($context, array $blocks = array())
    {
        // line 76
        echo "    ";
    }

    public function getTemplateName()
    {
        return "layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  184 => 76,  181 => 75,  176 => 69,  170 => 7,  163 => 77,  161 => 75,  154 => 70,  152 => 69,  149 => 68,  146 => 67,  137 => 65,  132 => 64,  130 => 63,  122 => 57,  116 => 55,  108 => 51,  102 => 49,  100 => 48,  96 => 47,  92 => 46,  74 => 36,  71 => 35,  65 => 33,  63 => 32,  58 => 29,  43 => 16,  41 => 15,  22 => 1,  142 => 57,  138 => 56,  133 => 54,  127 => 50,  124 => 49,  117 => 44,  111 => 42,  106 => 39,  104 => 38,  98 => 34,  94 => 32,  85 => 42,  81 => 28,  77 => 37,  73 => 26,  70 => 25,  66 => 24,  55 => 15,  53 => 14,  48 => 11,  46 => 10,  39 => 5,  36 => 4,  30 => 7,);
    }
}
