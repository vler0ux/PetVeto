<?php
namespace App\Controller\User;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeUserController extends AbstractController
{
    #[Route('/user/home', name: 'app_user_home')]
    public function index(): Response
    {
        return $this->render('user/home.html.twig');
    }

 

}