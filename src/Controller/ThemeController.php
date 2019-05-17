<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ThemeController extends AbstractController
{

    public function afficherTheme()
    {
        return $this->render('theme/theme.html.twig');
    }

    public function choisirTheme($theme)
    {
        return $this->render('theme/theme.html.twig');
    }
}
