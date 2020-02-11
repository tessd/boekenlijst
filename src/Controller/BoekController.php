<?php

namespace App\Controller;

use App\Entity\Boek;
use App\Form\BoekType;
use App\Repository\BoekRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/boek")
 */
class BoekController extends AbstractController
{
    /**
     * @Route("/", name="boek_index", methods={"GET"})
     */
    public function index(BoekRepository $boekRepository): Response
    {
        return $this->render('boek/index.html.twig', [
            'boeks' => $boekRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="boek_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $boek = new Boek();
        $form = $this->createForm(BoekType::class, $boek);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($boek);
            $entityManager->flush();

            return $this->redirectToRoute('boek_index');
        }

        return $this->render('boek/new.html.twig', [
            'boek' => $boek,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="boek_show", methods={"GET"})
     */
    public function show(Boek $boek): Response
    {
        return $this->render('boek/show.html.twig', [
            'boek' => $boek,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="boek_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Boek $boek): Response
    {
        $form = $this->createForm(BoekType::class, $boek);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('boek_index');
        }

        return $this->render('boek/edit.html.twig', [
            'boek' => $boek,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="boek_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Boek $boek): Response
    {
        if ($this->isCsrfTokenValid('delete'.$boek->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($boek);
            $entityManager->flush();
        }

        return $this->redirectToRoute('boek_index');
    }
}
