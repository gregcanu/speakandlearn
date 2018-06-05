<?php

namespace SL\PlatformBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SLPlatformBundle:Default:index.html.twig');
    }
}
