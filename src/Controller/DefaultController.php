<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    // adding page routes for public viewing

    /**
     * @Route("/", name="default")
     */
    public function index(): Response
    {
        $template = 'default/index.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/about", name="app_about")
     */
    public function about(): Response
    {
        $template = 'default/about.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

    /**
     * @Route("/sitemap", name="app_sitemap")
     */
    public function sitemap(): Response
    {
        $template = 'default/sitemap.html.twig';
        $args = [];
        return $this->render($template, $args);
    }
}
