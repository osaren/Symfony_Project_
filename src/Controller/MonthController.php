<?php

namespace App\Controller;

use App\Entity\Month;
use App\Form\MonthType;
use App\Repository\MonthRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;


/**
 * @Route("/month")
 * @IsGranted("ROLE_ADMIN", message="Access only available for admins")
 */
class MonthController extends AbstractController
{
    /**
     * @Route("/", name="month_index", methods={"GET"})
     */
    public function index(MonthRepository $monthRepository): Response
    {
        return $this->render('month/index.html.twig', [
            'months' => $monthRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="month_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $month = new Month();
        $form = $this->createForm(MonthType::class, $month);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($month);
            $entityManager->flush();

            return $this->redirectToRoute('month_index');
        }

        return $this->render('month/new.html.twig', [
            'month' => $month,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="month_show", methods={"GET"})
     */
    public function show(Month $month): Response
    {
        return $this->render('month/show.html.twig', [
            'month' => $month,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="month_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Month $month): Response
    {
        $form = $this->createForm(MonthType::class, $month);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('month_index');
        }

        return $this->render('month/edit.html.twig', [
            'month' => $month,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="month_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Month $month): Response
    {
        if ($this->isCsrfTokenValid('delete'.$month->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($month);
            $entityManager->flush();
        }

        return $this->redirectToRoute('month_index');
    }
}
