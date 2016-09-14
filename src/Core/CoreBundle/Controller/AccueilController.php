<?php

namespace Core\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AccueilController extends Controller
{
    public function accueilAction()
    {

    // Notre liste d'annonce en dur
                $listAdverts = array(
                  array(
                    'title'   => 'Recherche développpeur Symfony2',
                    'id'      => 1,
                    'auteur'  => 'Alexandre',
                    'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
                    'date'    => new \Datetime()),
                  array(
                    'title'   => 'Mission de webmaster',
                    'id'      => 2,
                    'auteur'  => 'Hugo',
                    'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla…',
                    'date'    => new \Datetime()),
                  array(
                    'title'   => 'Offre de stage webdesigner',
                    'id'      => 3,
                    'auteur'  => 'Mathieu',
                    'content' => 'Nous proposons un poste pour webdesigner. Blabla…',
                    'date'    => new \Datetime())
                );

                // Et modifiez le 2nd argument pour injecter notre liste
               return $this->render('CoreBundle:Default:Accueil.html.twig', array(
                  'listAdverts' => $listAdverts
                ));
    }
    public function flashAction(Request $request){
        
        $this->get('session')->getFlashBag()->add('info','La page de contact n\'est pas encore disponible, merci de revenir plus tard ');
        return $this->redirect($this->generateUrl('core_homepage'));
    }
}
