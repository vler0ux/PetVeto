<?php

namespace App\Controller;

use App\Entity\Veto;
use App\Form\VetoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class VetoController extends AbstractController
{
    #[Route('/veto/nouveau', name: 'veto_new')]
    public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher): Response
    {
        $veto = new Veto();
        $form = $this->createForm(VetoType::class, $veto);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();
            $hashedPassword = $passwordHasher->hashPassword($veto, $plainPassword);
            $veto->setPassword($hashedPassword);
            $entityManager->persist($veto);
            $entityManager->flush();

            $this->addFlash('veto_success', 'Vétérinaire enregistré !');
            return $this->redirectToRoute('app_veto_home');
        }

        return $this->render('veto/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
