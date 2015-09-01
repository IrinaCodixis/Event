<?php

namespace Test\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TestEventBundle:Default:index.html.twig', array('name' => $name));
    }
}
