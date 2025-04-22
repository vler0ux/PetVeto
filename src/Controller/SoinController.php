<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\SoinRepository;

final class SoinController extends AbstractController
{

        #[Route('/soins', name: 'app_soins')]
    public function index(SoinRepository $soinRepository): Response
    {
        $soins = $soinRepository->findAll();

        return $this->render('soin/index.html.twig', [
            'soins' => $soins,
        ]);
    }

}
