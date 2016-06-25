<?php
 namespace tuto\blogBundle\Controller;
 use Symfony\Bundle\FrameworkBundle\Controller\Controller;

 class adminController extends Controller
 {
     public function indexAction()
     {
         return $this->render('blogBundle:admin:index.html.twig');

     }
 }
?>