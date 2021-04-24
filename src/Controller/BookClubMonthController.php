<?php

namespace App\Controller;

use App\Entity\BookClubMonth;
use App\Form\BookClubMonthType;
use App\Repository\BookClubMonthRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @Route("/book_club_month")
 */
class BookClubMonthController extends AbstractController
{
    /**
     * @Route("/", name="book_club_month_index", methods={"GET"})
     */
    public function index(BookClubMonthRepository $bookClubMonthRepository): Response
    {
        return $this->render('book_club_month/index.html.twig', [
            'book_club_months' => $bookClubMonthRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="book_club_month_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN", message="Access only available for admins")
     */
    public function new(Request $request): Response
    {
        $bookClubMonth = new BookClubMonth();
        $form = $this->createForm(BookClubMonthType::class, $bookClubMonth);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bookClubMonth);
            $entityManager->flush();

            return $this->redirectToRoute('book_club_month_index');
        }

        return $this->render('book_club_month/new.html.twig', [
            'book_club_month' => $bookClubMonth,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="book_club_month_show", methods={"GET"})
     */
    public function show(BookClubMonth $bookClubMonth): Response
    {
        return $this->render('book_club_month/show.html.twig', [
            'book_club_month' => $bookClubMonth,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="book_club_month_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN", message="Access only available for admins")
     */
    public function edit(Request $request, BookClubMonth $bookClubMonth): Response
    {
        $form = $this->createForm(BookClubMonthType::class, $bookClubMonth);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('book_club_month_index');
        }

        return $this->render('book_club_month/edit.html.twig', [
            'book_club_month' => $bookClubMonth,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="book_club_month_delete", methods={"DELETE"})
     * @IsGranted("ROLE_ADMIN", message="Access only available for admins")
     */
    public function delete(Request $request, BookClubMonth $bookClubMonth): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bookClubMonth->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bookClubMonth);
            $entityManager->flush();
        }

        return $this->redirectToRoute('book_club_month_index');
    }
}
