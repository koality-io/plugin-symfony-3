<?php

namespace Koalityio\Symfony3Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KoalityioSymfony3Bundle:Default:index.html.twig');
    }
}
