<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ThemeController extends AbstractController
{

    public function tableauThemes()
    {
        return ['united', 'solar', 'minty', 'sandstone', 'slate', 'materia', 'lumen', 'sketchy', 'pulse'];
    }

    public function afficherTheme()
    {

        return $this->render('theme/theme.html.twig',
            [
                'themes' => $this->tableauThemes()
            ]);

    }

    public function choisirTheme($theme)
    {
        $session = new Session();
        $session->set('theme', $theme);
        setCookie('theme', $theme);
        return $this->render('theme/theme.html.twig', ['themes' => $this->tableauThemes()]);
    }
}
