<?php

/* blogBundle:Public:article.html.twig */
class __TwigTemplate_1aa74fecee82e2da3aa8bf30625f644ee7a327f9c5961e991b8c03414d9c6848 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head lang=\"en\">
    <meta charset=\"UTF-8\">
    <title></title>
</head>
<body>
    <h1>";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["slug"]) ? $context["slug"] : $this->getContext($context, "slug")), "html", null, true);
        echo "</h1>
Langue : ";
        // line 9
        echo twig_escape_filter($this->env, (isset($context["lang"]) ? $context["lang"] : $this->getContext($context, "lang")), "html", null, true);
        echo "<br />
Format : ";
        // line 10
        echo twig_escape_filter($this->env, (isset($context["format"]) ? $context["format"] : $this->getContext($context, "format")), "html", null, true);
        echo "   <br />
Année : ";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["annee"]) ? $context["annee"] : $this->getContext($context, "annee")), "html", null, true);
        echo "<br />

<a href=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("Blog_page", array("page" => (isset($context["annee"]) ? $context["annee"] : $this->getContext($context, "annee")))), "html", null, true);
        echo "\">Retour à la page ";
        echo twig_escape_filter($this->env, (isset($context["annee"]) ? $context["annee"] : $this->getContext($context, "annee")), "html", null, true);
        echo "</a><br/>


</body>
</html>";
    }

    public function getTemplateName()
    {
        return "blogBundle:Public:article.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  45 => 13,  40 => 11,  36 => 10,  32 => 9,  28 => 8,  19 => 1,);
    }
}
