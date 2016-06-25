<?php
 namespace tuto\blogBundle\Controller;
 use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 use Symfony\Component\HttpFoundation\Response;

 class adminArticleController extends Controller {
     public function ajouterAction(){

         $request = $this->getRequest();
         if($request->getMethod() == 'POST'){
              $session = $this->get('session');
              //$session->setFlash('info',"L'article a été ajouter");

             return $this->redirect($this->generateUrl('Blog_admin_home'));
         }
       /*  if($request->isXmlHttpRequest()){
             //traitement BDD

             return new Response(json_decode(array('erreur', 'ok')));
         }*/
         return $this->render('blogBundle:adminArticle:ajouter.html.twig');
     }

 }
?>