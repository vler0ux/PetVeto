<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class VetoDashboardController extends AbstractController
{
    #[Route('/veto/dashboard', name: 'veto_dashboard')]
    public function index(): Response
    {
        return $this->render('veto/dashboard.html.twig');
    }
}
