<?php
namespace OC\PlatformBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{

    public function indexAction($page)
    {
        if($page <1)
            throw new NotFoundHttpException('La page'.$page.' n existe pas');
        return $this->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Momo'));
    }

    public function viewAction($id)
    {

        return $this->render('OCPlatformBundle:Advert:view.html.twig', array('id' => $id));
    }

    public function tagAction($id, Request $request)
    {

        $tag = $request->query->get('tag');
        return new Response('coucou id : ' . $id . ' avec le tag : ' . $tag);
    }

    public function addAction()
    {

        $this->get('session')->getFlashBag()->add('info', 'Annonce bien enregistrée');
        $this->get('session')->getFlashBag()->add('info', 'OUI oui');
        return $this->redirect($this->generateUrl('oc_platform_home_view', array('id'=> 5)));

    }
}
