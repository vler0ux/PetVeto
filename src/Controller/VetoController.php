<?php

namespace App\Controller;

use App\Entity\Veto;
use App\Form\VetoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

class VetoController extends AbstractController
{
    #[IsGranted('ROLE_SUPER_VETO')]
    #[Route('/veto/nouveau', name: 'veto_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $veto = new Veto();
        $form = $this->createForm(VetoType::class, $veto);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $veto->setRoles(['ROLE_VETO']);
            $entityManager->persist($veto);
            $entityManager->flush();

            $this->addFlash('success', 'Vétérinaire enregistré !');
            return $this->redirectToRoute('care_new');
        }

        return $this->render('veto/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
