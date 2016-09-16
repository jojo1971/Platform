<?php

/* OCPlatformBundle:Advert:view.html.twig */
class __TwigTemplate_b4f14eeb8bf930bb9cf6708074a2cf0da26ba42a45351c854ceeb4ce2305d5d6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("OCPlatformBundle::layout.html.twig", "OCPlatformBundle:Advert:view.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'ocplatform_body' => array($this, 'block_ocplatform_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "OCPlatformBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        // line 4
        echo "    Lecture d'une annonce - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
    }

    // line 7
    public function block_ocplatform_body($context, array $blocks = array())
    {
        // line 8
        echo "
    <h2>";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "title", array()), "html", null, true);
        echo "</h2>
    <i>Par ";
        // line 10
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "author", array()), "html", null, true);
        echo ", le ";
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "date", array()), "d/m/Y"), "html", null, true);
        echo "</i>

    <div class=\"well\">
        ";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "content", array()), "html", null, true);
        echo "
    </div>

    <p>
        <a href=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("oc_platform_home");
        echo "\" class=\"btn btn-default\">
            <i class=\"glyphicon glyphicon-chevron-left\"></i>
            Retour à la liste
        </a>
        <a href=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oc_platform_edit", array("id" => $this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "id", array()))), "html", null, true);
        echo "\" class=\"btn btn-default\">
            <i class=\"glyphicon glyphicon-edit\"></i>
            Modifier l'annoce
        </a>
        <a href=\"";
        // line 25
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("oc_platform_delete", array("id" => $this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "id", array()))), "html", null, true);
        echo "\" class=\"btn btn-danger\">
            <i class=\"glyphicon glyphicon-trash\"></i>
            Supprimer l'annonce
        </a>
    </p>

      <div class=\"span3\" style=\"color: red\">
      ";
        // line 32
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "session", array()), "flashbag", array()), "get", array(0 => "info"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["flashMessage"]) {
            // line 33
            echo "        ";
            echo twig_escape_filter($this->env, $context["flashMessage"], "html", null, true);
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['flashMessage'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 35
        echo "      </div>
    <div class=\"span2\">
        <p>Les candidats : </p>
       ";
        // line 38
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["listApplication"]) ? $context["listApplication"] : $this->getContext($context, "listApplication")));
        foreach ($context['_seq'] as $context["_key"] => $context["application"]) {
            // line 39
            echo "       - ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["application"], "author", array()), "html", null, true);
            echo " a laissé le commentaire : ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["application"], "content", array()), "html", null, true);
            echo "<br />
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['application'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "
    </div>
    <div class=\"span9\">
        ";
        // line 44
        if ( !(null === $this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "image", array()))) {
            // line 45
            echo "        <img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "image", array()), "url", array()), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "image", array()), "alt", array()), "html", null, true);
            echo "\">
        ";
        }
        // line 47
        echo "
        <p>
            ";
        // line 49
        if ( !$this->getAttribute($this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "categories", array()), "empty", array())) {
            // line 50
            echo "
                Les categories de l'annonce sont :<br />
                ";
            // line 52
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute((isset($context["advert"]) ? $context["advert"] : $this->getContext($context, "advert")), "categories", array()));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 53
                echo "                   - ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["category"], "name", array()), "html", null, true);
                if ( !$this->getAttribute($context["loop"], "last", array())) {
                    echo ",<br />";
                }
                // line 54
                echo "                ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 55
            echo "            ";
        }
        // line 56
        echo "        </p>
        <p>
            ";
        // line 58
        if ((twig_length_filter($this->env, (isset($context["listAdvertSkill"]) ? $context["listAdvertSkill"] : $this->getContext($context, "listAdvertSkill"))) > 0)) {
            // line 59
            echo "                <p>Compétences : </p>
                ";
            // line 60
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["listAdvertSkill"]) ? $context["listAdvertSkill"] : $this->getContext($context, "listAdvertSkill")));
            foreach ($context['_seq'] as $context["_key"] => $context["advertSkill"]) {
                // line 61
                echo "                    ";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["advertSkill"], "skill", array()), "name", array()), "html", null, true);
                echo " : ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["advertSkill"], "level", array()), "html", null, true);
                echo "<br />
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['advertSkill'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "            ";
        }
        // line 64
        echo "        </p>
    </div>

";
    }

    public function getTemplateName()
    {
        return "OCPlatformBundle:Advert:view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  213 => 64,  210 => 63,  199 => 61,  195 => 60,  192 => 59,  190 => 58,  186 => 56,  183 => 55,  169 => 54,  163 => 53,  146 => 52,  142 => 50,  140 => 49,  136 => 47,  128 => 45,  126 => 44,  121 => 41,  110 => 39,  106 => 38,  101 => 35,  92 => 33,  88 => 32,  78 => 25,  71 => 21,  64 => 17,  57 => 13,  49 => 10,  45 => 9,  42 => 8,  39 => 7,  32 => 4,  29 => 3,  11 => 1,);
    }
}
/* {% extends "OCPlatformBundle::layout.html.twig" %}*/
/* */
/* {% block title %}*/
/*     Lecture d'une annonce - {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block ocplatform_body %}*/
/* */
/*     <h2>{{ advert.title }}</h2>*/
/*     <i>Par {{ advert.author }}, le {{ advert.date|date('d/m/Y') }}</i>*/
/* */
/*     <div class="well">*/
/*         {{ advert.content }}*/
/*     </div>*/
/* */
/*     <p>*/
/*         <a href="{{ path('oc_platform_home') }}" class="btn btn-default">*/
/*             <i class="glyphicon glyphicon-chevron-left"></i>*/
/*             Retour à la liste*/
/*         </a>*/
/*         <a href="{{ path('oc_platform_edit', {'id' : advert.id }) }}" class="btn btn-default">*/
/*             <i class="glyphicon glyphicon-edit"></i>*/
/*             Modifier l'annoce*/
/*         </a>*/
/*         <a href="{{ path('oc_platform_delete', {'id' : advert.id}) }}" class="btn btn-danger">*/
/*             <i class="glyphicon glyphicon-trash"></i>*/
/*             Supprimer l'annonce*/
/*         </a>*/
/*     </p>*/
/* */
/*       <div class="span3" style="color: red">*/
/*       {% for flashMessage in app.session.flashbag.get('info') %}*/
/*         {{ flashMessage }}*/
/*     {% endfor %}*/
/*       </div>*/
/*     <div class="span2">*/
/*         <p>Les candidats : </p>*/
/*        {% for application in listApplication %}*/
/*        - {{ application.author }} a laissé le commentaire : {{ application.content }}<br />*/
/*     {% endfor %}*/
/* */
/*     </div>*/
/*     <div class="span9">*/
/*         {% if advert.image is not null %}*/
/*         <img src="{{ advert.image.url }}" alt="{{ advert.image.alt }}">*/
/*         {% endif %}*/
/* */
/*         <p>*/
/*             {% if not advert.categories.empty %}*/
/* */
/*                 Les categories de l'annonce sont :<br />*/
/*                 {% for category in advert.categories %}*/
/*                    - {{ category.name }}{% if not loop.last %},<br />{% endif %}*/
/*                 {% endfor %}*/
/*             {% endif %}*/
/*         </p>*/
/*         <p>*/
/*             {% if listAdvertSkill|length > 0 %}*/
/*                 <p>Compétences : </p>*/
/*                 {% for advertSkill in listAdvertSkill %}*/
/*                     {{ advertSkill.skill.name  }} : {{ advertSkill.level  }}<br />*/
/*                 {% endfor %}*/
/*             {% endif %}*/
/*         </p>*/
/*     </div>*/
/* */
/* {% endblock %}*/
