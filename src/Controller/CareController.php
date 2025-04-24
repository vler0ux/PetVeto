<?php

namespace App\Controller;

use App\Entity\Care;
use App\Entity\Animal;
use App\Form\CareType;
use App\Repository\CareRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CareController extends AbstractController
{
    // listes des soins
    #[Route('/cares', name: 'app_cares')]
        public function index(CareRepository $careRepository): Response
        {
            $care = $careRepository->findAll();

            return $this->render('care/index.html.twig', [
                'cares' => $care,
            ]);
        }

    // ajout d'un soin
    #[Route('/care/new', name: 'care_new')]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $care = new Care();
        $animalId = $request->query->get('animalId');
        $lastVaccinationDate = null;

        if ($animalId) {
            $animal = $entityManager->getRepository(Animal::class)->find($animalId);
            if ($animal) {
                $care->setAnimal($animal);
                $lastVaccination = $entityManager->getRepository(Care::class)->findOneBy(
                    ['animal' => $animal],
                    ['vaccinationDate' => 'DESC']
                );
                if ($lastVaccination && $lastVaccination->getVaccinationDate()) {
                    $lastVaccinationDate = $lastVaccination->getVaccinationDate();
                    $care->setVaccinationDate($lastVaccinationDate);
                }
        }
        }
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
            return $this->redirectToRoute('animal_care_list', [
                'id' => $animal->getId()
            ]);
        }

        return $this->render('care/new.html.twig', [
            'form' => $form->createView(),
            'lastVaccinationDate' => $lastVaccinationDate ?? null,
        ]);
    }

    // recupere le soin d'un animal
    #[Route('/animal/{id}/cares', name: 'animal_care_list')]
        public function listCare(Animal $animal): Response
        {
            return $this->render('care/list.html.twig', [
                'animal' => $animal,
                'cares' => $animal->getCares(),
            ]);
        }

    #[Route('/care/select-animal', name: 'care_select_animal')]
        public function selectAnimal(): Response
        {
            $user = $this->getUser();
            if (!$user instanceof \App\Entity\User) {
                throw $this->createAccessDeniedException('Vous devez être connecté pour voir vos animaux.');
            }
            $animals = $user->getAnimals();
            return $this->render('care/select_animal.html.twig', [
                'animals' => $animals,
            ]);
        }
}
