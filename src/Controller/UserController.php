<?php

namespace App\Controller;

use App\Repository\ClubRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


/**
 * @Route("/user", name="user_")
 * @IsGranted("ROLE_USER")
 */

class UserController extends AbstractController
{

    /**
     * @Route("/", name="homepage")
     */

    public function index(): Response
    {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/club", name="club_list", methods={"GET"})
     */
    public function club(ClubRepository $clubRepository): Response
    {
        return $this->render('user/club.html.twig', [
            'clubs' => $clubRepository->findAll(),
        ]);
    }

}
