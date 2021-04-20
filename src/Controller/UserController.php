<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/user", name="user")
 * @IsGranted("ROLE_USER")
 */

class UserController extends AbstractController
{

    /**
     * @Route("/", name="user_homepage")
     */

    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/clubs", name="user_club_list")
     */
    public function about(): Response
    {
        $template = 'user/club.html.twig';
        $args = [];
        return $this->render($template, $args);
    }

}
