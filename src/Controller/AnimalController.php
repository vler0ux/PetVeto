<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\AnimalType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnimalRepository;

class AnimalController extends AbstractController
{
    #[Route('/animal', name: 'animal_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $animal = new Animal();
        $form = $this->createForm(AnimalType::class, $animal);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $animal->setUser($this->getUser());
            $entityManager->persist($animal);
            $entityManager->flush();
            return $this->redirectToRoute('app_animaux');
        }

        return $this->render('animal/new.html.twig', [
            'form' => $form->createView(),
            'user' => $this->getUser(),
        ]);
    }

        #[Route('/animaux', name: 'app_animaux')]
    public function index(AnimalRepository $animalRepository): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        $user = $this->getUser();
        $animals = $animalRepository->findBy(['user' => $user]);

        return $this->render('animal/index.html.twig', [
            'animals' => $animals,
            'user' => $user,
        ]);
    }

}
