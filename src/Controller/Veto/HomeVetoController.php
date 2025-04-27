<?php
namespace App\Controller\Veto;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeVetoController extends AbstractController
{
    #[Route('/veto/home', name: 'app_veto_home')]
    public function index(): Response
    {
        return $this->render('veto/home.html.twig');
    }
}