<?php

namespace Tuto\helloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\component\HttpFoundation\Response;

class TestController extends Controller
{
    public function indexAction()
    {
        return $this->render("HelloBundle:Test:index.html.twig");
    }
}
