<?php

namespace App\Controller;

use App\Repository\ClubRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * @Route("/user", name="member_")
 * @Security("is_granted('ROLE_ADMIN') or is_granted('ROLE_MEMBER')")
 */

class MemberController extends AbstractController
{

    /**
     * @Route("/", name="homepage")
     */

    public function index(): Response
    {
        return $this->render('member/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/club", name="club_list", methods={"GET"})
     */
    public function club(ClubRepository $clubRepository): Response
    {
        return $this->render('member/club.html.twig', [
            'clubs' => $clubRepository->findAll(),
        ]);
    }

}
