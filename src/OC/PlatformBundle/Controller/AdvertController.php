<?php
namespace OC\PlatformBundle\Controller;


use OC\PlatformBundle\Entity\AdvertSkill;
use OC\PlatformBundle\Entity\Application;
use OC\PlatformBundle\Entity\Category;
use OC\PlatformBundle\Entity\Image;
use OC\PlatformBundle\Form\AdvertType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use OC\PlatformBundle\Entity\Advert;
use Doctrine\ORM\Repository;
use Doctrine\ORM\EntityRepository;




class AdvertController extends Controller
{

    public function indexAction($page)
    {
        if($page <1)
            throw new NotFoundHttpException('La page'.$page.' n existe pas');


    // Notre liste d'annonce en dur
   /*             $listAdverts = array(
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
                ));*/
       $nbPerPage = 3;

        $listAdverts = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('OCPlatformBundle:Advert')
                            ->getAdverts($page,$nbPerPage);
        $nbPages = ceil(count($listAdverts)/$nbPerPage);
        if($page > $nbPages){
            throw $this->createNotFoundException('la page n°'.$page.' n\'existe pas');
        }


        return $this->render('OCPlatformBundle:Advert:index.html.twig', array('listAdverts' =>$listAdverts,
                                                                               'nbPages' => $nbPages,
                                                                                 'page' => $page));

    }

    public function viewAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $advert = $em->getRepository('OCPlatformBundle:Advert')->find($id);
        
        if(!$advert){
            $request->getSession()->getFlashBag()->add('info','Cette annonce n\'existe pas !');
            return $this->render('OCPlatformBundle:Advert:form.html.twig');
        }

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

        $advert = new Advert();


       // $advert->setDate(new \DateTime('2012/12/05'));

        $form = $this->get('form.factory')->create(new AdvertType(), $advert);
        // ou en plus simple : $form = $this->createForm(new AdvertType, $advert);

        $form->handleRequest($request);

        if($form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($advert);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info', 'Annonce bien enregidtrée');
            return $this->redirect($this->generateUrl('oc_platform_view', array('id' => $advert->getId())));
        }

        return $this->render('OCPlatformBundle:Advert:add.html.twig', array('form' => $form->createView()));


        /*$em = $this->getDoctrine()->getManager();
        
        $advert = new Advert();
        $advert->setTitle('recherche-mecanicien');
        $advert->setAuthor('fMol');
        $advert->setContent('Pour Rennes');*/

        /*$image = new Image();
        $image->setUrl('https://upload.wikimedia.org/wikipedia/commons/thumb/f/f7/Mangalarga_Marchador_Conforma%C3%A7%C3%A3o.jpg/290px-Mangalarga_Marchador_Conforma%C3%A7%C3%A3o.jpg');
        $image->setAlt('c\'est un cheval');

        $advert->setImage($image);*/

      /* $application = new Application();
        $application->setAuthor('DIuf');
        $application->setContent('Je suis beau');*/

        /*$application1 = new Application();
        $application1->setAuthor('Roger');
        $application1->setContent('Je suis encore plus beau');*/

       // $application->setAdvert($advert);
        //$application1->setAdvert($advert);

      /*  $skills = $em->getRepository('OCPlatformBundle:Skill')->findAll();
        foreach ($skills as $skill) {
            $advertSkill = new AdvertSkill();
            $advertSkill->setAdvert($advert);
            $advertSkill->setSkill($skill);
            $advertSkill->setLevel('Expert');

            $em->persist($advertSkill);
        }*/
        
        
      //  $em->persist($advert);
      // $em->persist($application);
        /*$em->persist($application1);*/

       // $em->flush();
        
       /* if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('info', 'Votre annonce a bien été enregistrée');
            // return $this->redirect($this->generateUrl('oc_platform_view', array('id' => $advert->getId())));
            return $this->redirect($this->generateUrl('oc_platform_view', array('id' => 1)));
        }
        return $this->render('OCPlatformBundle:Advert:add.html.twig');*/

        
    }
    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $advert = $em->getRepository('OCPlatformBundle:Advert')->find(3);


        $advert->setDate(new \DateTime());
        $advert->setTitle('Recherche cuistot');

        /*$advert = $em->getRepository('OCPlatformBundle:Advert')->find($id);

        $listCategory = $em->getRepository('OCPlatformBundle:Category')->findAll();
        foreach ($listCategory as $category){
            $advert->addCategory($category);
        }*/

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

    public function deleteAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();

        $adv = $em->getRepository('OCPlatformBundle:Advert')->find($id);
       // $app = $adv->getApplications();
       // var_dump($adv->getNbApplications()); die();
        if($adv == null){
            throw $this->createNotFoundException('L\'annance n°'.$id.' n\'existe pas ');
        }

        if ($request->isMethod('POST')) {
            $em->remove($adv);
            $em->flush();

            $request->getSession()->getFlashBag()->add('info', 'Votre annonce a bien été supprimée');
            return $this->redirect($this->generateUrl('oc_platform_home'));
        }

        return $this->render('OCPlatformBundle:Advert:delete.html.twig', array('advert' =>$adv));

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
    
    public  function menuAction($limit = 3){
        $listAdverts = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('OCPlatformBundle:Advert')
                            ->findBy(
                                array(),
                                array('date' => 'desc'),
                                $limit,
                                0);
       /* $listAdverts = array(
            array('id' => 2, 'title' => 'Recherche développeur Symfony2'),
            array('id' => 5, 'title' => 'Mission de webmaster'),
            array('id' => 9, 'title' => 'Offre de stage webdesigner')
        );*/
        
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

    public function listAction()
    {
      $listAdverts = $this
        ->getDoctrine()
        ->getManager()
        ->getRepository('OCPlatformBundle:Advert')
        ->getAdvertWithCategories(array('Réseau'))
      ;

      foreach ($listAdverts as $advert) {
          if($advert->getId('3')) {
              $cat = $advert->_em->getRepository('OCPlatformBundle.Advert')->getCategories('11');
              $advert->addCategory($cat);

          }
          
        // Ne déclenche pas de requête : les candidatures sont déjà chargées !
        // Vous pourriez faire une boucle dessus pour les afficher toutes
        $advert->getCategories();

      }
               return $this->render('OCPlatformBundle:Advert:test.html.twig', array('listAdvert' => $listAdverts));



}
    public function testAction(){
        $advert = new Advert();
        $advert->setTitle('Recherche chomeur');
        $advert->setAuthor('test');
        $advert->setContent('Pour test');
        
        $em = $this->getDoctrine()->getManager();
        $em->persist($advert);
        $em->flush();
        
        return new Response('Slug généré : '.$advert->getSlug());
    }
    public function purgerAction(){

        $em = $this->getDoctrine()
            ->getManager()
            ->getRepository('OCPlatformBundle:Advert')
            ->myFind();
        var_dump($em);die();


       /* $adverts = $this->getDoctrine()
            ->getManager()
            ->getRepository('OCPlatformBundle:Advert');
           //->purge($days);

       var_dump($adverts.getTitle());die();*/
        return $this->render('OCPlatformBundle:Advert:test.html.twig');
    }
}
