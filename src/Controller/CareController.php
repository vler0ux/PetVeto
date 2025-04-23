<?php

namespace App\Controller;

use App\Entity\Care;
use App\Form\CareType;
use App\Repository\CareRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CareController extends AbstractController
{
    #[Route('/care/new', name: 'care_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $care = new Care();
        $form = $this->createForm(CareType::class, $care);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $care = $form->getData();
            $animal = $care->getAnimal();
            $veto = $care->getVeto();

        if ($animal && !$animal->getVeto() && $veto) {
            $animal->setVeto($veto);
        }
            $entityManager->persist($care);
            $entityManager->flush();

            $this->addFlash('success', 'Soin enregistré avec succès !');
            return $this->redirectToRoute('care_list');
        }

        return $this->render('care/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/cares', name: 'app_cares')]
        public function index(CareRepository $careRepository): Response
        {
            $cares = $careRepository->findAll();

            return $this->render('care/index.html.twig', [
                'cares' => $cares,
            ]);
        }

}
