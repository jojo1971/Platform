<?php
namespace OC\PlatformBundle\Controller;


use OC\PlatformBundle\Entity\AdvertSkill;
use OC\PlatformBundle\Entity\Application;
use OC\PlatformBundle\Entity\Category;
use OC\PlatformBundle\Entity\Image;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use OC\PlatformBundle\Entity\Advert;
use Doctrine\ORM\Repository;

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
        $em = $this->getDoctrine()->getManager();
        $advert = $em->getRepository('OCPlatformBundle:Advert')->find($id);

        if($advert === null){
            throw new NotFoundHttpException('Cette annonce n°'.$id.' n\'existe pas !');
        }
        
        $listApplication = $em->getRepository('OCPlatformBundle:Application')->findBy(array('advert' => $advert));
        $listAdvertSkill= $em->getRepository('OCPlatformBundle:AdvertSkill')->findBy(array('advert' => $advert));


        return $this->render('OCPlatformBundle:Advert:view.html.twig', array('advert' => $advert,
                                                                             'listApplication' => $listApplication,
                                                                             'listAdvertSkill' => $listAdvertSkill ));
    }

    public function tagAction($id, Request $request)
    {

        $tag = $request->query->get('tag');// le tag doit être mis dans l'url : http://localhost/Platform/web/app_dev.php/platform/tag/4?tag=salut
        return new Response('coucou id : ' . $id . ' avec le tag : ' . $tag);
    }

    public function addAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        
        $advert = new Advert();
        $advert->setTitle('Recherche chauffeur');
        $advert->setAuthor('Paul');
        $advert->setContent('Pour Nancy');

        /*$image = new Image();
        $image->setUrl('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Mangalarga_Marchador_Conforma%C3%A7%C3%A3o.jpg/290px-Mangalarga_Marchador_Conforma%C3%A7%C3%A3o.jpg');
        $image->setAlt('c\'est un cheval');

        $advert->setImage($image);*/

        /*$application = new Application();
        $application->setAuthor('Robert');
        $application->setContent('Je suis beau');

        $application1 = new Application();
        $application1->setAuthor('Roger');
        $application1->setContent('Je suis encore plus beau');

        $application->setAdvert($advert);
        $application1->setAdvert($advert);*/

        $skills = $em->getRepository('OCPlatformBundle:Skill')->findAll();
        foreach ($skills as $skill) {
            $advertSkill = new AdvertSkill();
            $advertSkill->setAdvert($advert);
            $advertSkill->setSkill($skill);
            $advertSkill->setLevel('Expert');

            $em->persist($advertSkill);
        }
        $em->persist($advert);
       /* $em->persist($application);
        $em->persist($application1);*/

        $em->flush();
        

            $request->getSession()->getFlashBag()->add('info', 'Votre annonce a bien été enregistrée');
            return $this->redirect($this->generateUrl('oc_platform_view', array('id' => $advert->getId())));
            
        
    }
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        /*$advert1 = new Advert;
        $advert1->setTitle('Recherche programmeur');
        $advert1->setAuthor('Alex');
        $advert1->setContent('Nous recherchons un développeur pour Paris');

        $em->persist($advert1);

        $advert2 = $em->getRepository('OCPlatformBundle:Advert')->find(9);


        $advert2->setDate(new \DateTime());
        $advert2->setTitle('Recherche cuistot');*/

        $advert = $em->getRepository('OCPlatformBundle:Advert')->find($id);

        $listCategory = $em->getRepository('OCPlatformBundle:Category')->findAll();
        foreach ($listCategory as $category){
            $advert->addCategory($category);
        }





        $em->flush();


            $request->getSession()->getFlashBag()->add('info', 'Votre annonce a bien été modifiée');
            return $this->redirect($this->generateUrl('oc_platform_view', array('id' => $advert->getId())));


    }
    
    public function edit2Action($id)
    {
       $advert = array(
                    'title'   => 'Recherche développpeur Symfony2',
                    'id'      => $id,
                    'auteur'  => 'Alexandre',
                    'content' => 'Nous recherchons un développeur Symfony2 débutant sur Lyon. Blabla…',
                    'date'    => new \Datetime());

        return $this->render('OCPlatformBundle:Advert:edit.html.twig', array('advert' => $advert));

    }

    public function deleteAction(Request $request){
        $em = $this->getDoctrine()->getManager();

        $advert = $em->getRepository('OCPlatformBundle:Advert')->find(9);
        $em->remove($advert);
        $em->flush();

        $request->getSession()->getFlashBag()->add('info', 'Votre annonce a bien été supprimée');
        return $this->redirect($this->generateUrl('oc_platform_view'));
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
