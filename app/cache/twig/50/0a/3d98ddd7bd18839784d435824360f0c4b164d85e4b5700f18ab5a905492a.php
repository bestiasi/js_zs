<?php

/* simple_user_login.twig */
class __TwigTemplate_500a3d98ddd7bd18839784d435824360f0c4b164d85e4b5700f18ab5a905492a extends Twig_Template
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
        echo "Sign in";
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    ";
        // line 7
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user")) {
            // line 8
            echo "        <p>Hello, ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : null), "user"), "displayName"), "html", null, true);
            echo ".</p>
        <p><a href=\"";
            // line 9
            echo $this->env->getExtension('routing')->getPath("user.logout");
            echo "\">Sign out</a></p>

    ";
        } else {
            // line 12
            echo "        <h1>
            Sign in
        </h1>

        <div class=\"row\">
            <div class=\"col-md-8\">
                <p class=\"text-muted lead\">
                    Access is allowed only to registered companies!
                </p>

                ";
            // line 22
            if ((isset($context["error"]) ? $context["error"] : null)) {
                // line 23
                echo "                    <div class=\"alert alert-danger\">";
                echo nl2br(twig_escape_filter($this->env, (isset($context["error"]) ? $context["error"] : null), "html", null, true));
                echo "</div>
                ";
            }
            // line 25
            echo "
                <form class=\"form-horizontal\" method=\"POST\" action=\"";
            // line 26
            echo $this->env->getExtension('routing')->getPath("user.login_check");
            echo "\">

                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"inputEmail\">Email</label>
                        <div class=\"col-sm-6\">
                            <input class=\"form-control\" name=\"_username\" type=\"text\" id=\"inputEmail\" placeholder=\"Email\" required value=\"";
            // line 31
            echo twig_escape_filter($this->env, (isset($context["last_username"]) ? $context["last_username"] : null), "html", null, true);
            echo "\">
                        </div>
                    </div>

                    <div class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"inputPassword\">Password</label>
                        <div class=\"col-sm-6\">
                            <input class=\"form-control\" name=\"_password\" type=\"password\" id=\"inputPassword\" required placeholder=\"Password\">
                        </div>
                    </div>

                    ";
            // line 42
            if ((isset($context["allowRememberMe"]) ? $context["allowRememberMe"] : null)) {
                // line 43
                echo "                        <div class=\"form-group\">
                            <div class=\"col-sm-6 col-sm-offset-2 checkbox\">
                                <label>
                                    <input type=\"checkbox\" name=\"_remember_me\" value=\"true\" checked> Remember me on this computer
                                </label>
                            </div>
                        </div>
                    ";
            }
            // line 51
            echo "
                    <div class=\"form-group\">
                        <div class=\"col-sm-8 col-sm-offset-2\">
                            <button type=\"submit\" class=\"btn btn-primary\">Sign in</button>
                            ";
            // line 55
            if ((isset($context["allowPasswordReset"]) ? $context["allowPasswordReset"] : null)) {
                // line 56
                echo "                                <a style=\"margin-left: 10px;\" href=\"";
                echo $this->env->getExtension('routing')->getPath("user.forgot-password");
                echo "\">Forgot your password?</a>
                            ";
            }
            // line 58
            echo "                        </div>
                    </div>

                </form>
            </div>
            <div class=\"col-md-4\">
                <a id=\"logo\" href=\"http://jobshop.ro\"></a>
                <a id=\"logo1\" href=\"http://bestis.ro\"></a>
            </div>
        </div>

    ";
        }
    }

    public function getTemplateName()
    {
        return "simple_user_login.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  123 => 58,  117 => 56,  115 => 55,  109 => 51,  99 => 43,  97 => 42,  83 => 31,  75 => 26,  72 => 25,  66 => 23,  64 => 22,  52 => 12,  46 => 9,  41 => 8,  39 => 7,  36 => 6,  33 => 5,  27 => 3,);
    }
}
