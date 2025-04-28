<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class VetoDashboardController extends AbstractController
{
    #[Route('/veto/home', name: 'veto_home')]
    public function index(): Response
    {
        return $this->render('veto/home.html.twig');
    }
}
