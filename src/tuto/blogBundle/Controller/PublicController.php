<?php
namespace tuto\blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PublicController extends Controller{
    function indexAction()
    {
        return $this->render("blogBundle:Public:index.html.twig");

    }
    function pageAction($page){
        return $this->render("blogBundle:Public:page.html.twig", array(
            'page' => $page
        ));
    }
    function articleAction($slug, $annee, $_locale, $_format){
         return $this->render("blogBundle:Public:article.html.twig", array(
            'slug' => $slug,
             'annee' => $annee,
             'lang' =>$_locale,
             'format' =>$_format,
        ));
    }
    function  artAction($slug){
      $article = array(
        'titre' => "Titre de l'article",
        'date' => new \DateTime(),
        'contenu' => "c'est cool ce tuto",
        'auteur' => "Jojo lafleur",
        'token' => $this->getRequest()->query->get('token'),
      );
        return $this->render('blogBundle:Public:art.html.twig',array(
            'article' => $article,
        ));
    }
}
?>