<?php
namespace OC\PlatformBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use OC\PlatformBundle\Entity\Advert;

class AdvertController extends Controller
{

    public function indexAction($page)
    {
        if($page <1)
            throw new NotFoundHttpException('La page'.$page.' n existe pas');


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
                return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
                  'listAdverts' => $listAdverts
                ));

    }

    public function viewAction($id)
    {
          $advert = array(
                    'title'   => 'Recherche développpeur Symfony2',
                    'id'      => $id,
                    'auteur'  => 'Alexandre',
                    'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
                    'date'    => new \Datetime());

        return $this->render('OCPlatformBundle:Advert:view.html.twig', array('advert' => $advert));
    }

    public function tagAction($id, Request $request)
    {

        $tag = $request->query->get('tag');// le tag doit être mis dans l'url : http://localhost/Platform/web/app_dev.php/platform/tag/4?tag=salut
        return new Response('coucou id : ' . $id . ' avec le tag : ' . $tag);
    }

    public function addAction(Request $request)
    {       
        
        $advert = new Advert();
        $advert->setTitle('Recherche Développeur');
        $advert->setAuthor('Alex');
        $advert->setContent('Nous recherchons un développeur pour Metz');
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($advert);
        $em->flush();
        

            $request->getSession()->getFlashBag()->add('info', 'Votre annonce a bien été enregistrée');
            return $this->redirect($this->generateUrl('oc_platform_view', array('id' => $advert->getId())));
            
        
    }
    
    public function editAction($id)
    {
       $advert = array(
                    'title'   => 'Recherche développpeur Symfony2',
                    'id'      => $id,
                    'auteur'  => 'Alexandre',
                    'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
                    'date'    => new \Datetime());

        return $this->render('OCPlatformBundle:Advert:edit.html.twig', array('advert' => $advert));

    }
    
    public function sessionAction($id, Request $request){

        $session = $request->getSession();
        $user_id = $session->get('user_id');
        $session->set('user_id', 95);

        return $this->redirect($this->generateUrl('oc_platform_view', array('id' => 17)));
    }

    public  function flashAction($id, Request $request){
        $session  = $request->getSession();
        $user = $session->get('user_id');
        $session->getFlashBag()->add('info','coucou flash !');

        return $this->redirect($this->generateUrl('oc_platform_view', array('id' => $id )));
    }
    public  function flash2Action($id, Request $request){
        
        $this->get('session')->getFlashBag()->add('info', 'Annonce bien enregistrée');
        $this->get('session')->getFlashBag()->add('info', 'OUI oui');
        return $this->redirect($this->generateUrl('oc_platform_view', array('id'=> 5)));
    }
    
    public  function menuAction($limit){
        $listAdverts = array(
            array('id' => 2, 'title' => 'Recherche développeur Symfony2'),
            array('id' => 5, 'title' => 'Mission de webmaster'),
            array('id' => 9, 'title' => 'Offre de stage webdesigner')
        );
        
        return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
            'listAdverts' => $listAdverts
        ));
    }
    
    public function spamAction(Request $request){
        
        $antispam = $this->container->get('oc_platform.antispam');
        
        $text = '...';
        
        if($antispam->isSpam($text)){
            throw new \Exception('Votre message est détecté comme spam');
        }
        
    }
}
