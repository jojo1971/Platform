<?php

/* OCPlatformBundle::layout.html.twig */
class __TwigTemplate_79ce238db1213462e298fb89aa732648968ce7c1abb34b43d7054b9a84889940 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("CoreBundle::layout.html.twig", "OCPlatformBundle::layout.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'ocplatform_body' => array($this, 'block_ocplatform_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CoreBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        // line 5
        echo "    Annonces - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 8
    public function block_body($context, array $blocks = array())
    {
        // line 9
        echo "
    <h1>Annonces</h1>

    <hr>

    ";
        // line 14
        $this->displayBlock('ocplatform_body', $context, $blocks);
    }

    public function block_ocplatform_body($context, array $blocks = array())
    {
        // line 15
        echo "    ";
    }

    public function getTemplateName()
    {
        return "OCPlatformBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 15,  50 => 14,  43 => 9,  40 => 8,  33 => 5,  30 => 4,  11 => 1,);
    }
}
/* {% extends "CoreBundle::layout.html.twig" %}*/
/* */
/* */
/* {% block title %}*/
/*     Annonces - {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/* */
/*     <h1>Annonces</h1>*/
/* */
/*     <hr>*/
/* */
/*     {% block ocplatform_body %}*/
/*     {% endblock %}*/
/* {% endblock %}*/
