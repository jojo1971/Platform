<?php
namespace tuto\blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PublicController extends Controller{
    function indexAction()
    {
        return $this->render("blogBundle:Public:index.html.twig", array(
            'articles' => array(
               2 => array(
                   'titre' => "Le blog fonctionne",
                   'auteurs' => array(
                      array(
                       'username' => "Jojo-D",
                        'id' => 1,
                        'nbArticles' =>52,
                        'createur' => true,
                   ),
                     array(
                         'username' => "Koko-D",
                         'id' => 2,
                         'nbArticles' =>120,
                         'createur' => false,
                     ),
                   ),
                    'contenu' => "<span>Ici le contenu de l'article</span>",
                    'date' => new \DateTime(),
                    ),
            ),
        ));

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
        $cookies = $this->getRequest()->cookies;
        $cookies->set('pseudo','Jojo');

        $session = $this->get('session');
        $session->set('dateDerniereVisiste',new \DateTime());
        $article = array(
        'titre' => "Titre de l'article",
        'date' => $session->get('dateDerniereSession'),
        'contenu' => "c'est cool ce Tuto",
        'auteur' => $cookies->get('pseudo'),
        'token' => $this->getRequest()->query->get('token'),
      );
        return $this->render('blogBundle:Public:art.html.twig',array(
            'article' => $article,
        ));
    }
}
?>