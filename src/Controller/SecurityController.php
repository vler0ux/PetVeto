<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{
    #[Route(path: '/user/login', name: 'app_login_user')]
    public function loginUser(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_user_home');
        }

        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/user_login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error
        ]);
    }

    #[Route('/veto/login', name: 'app_login_veto',methods: ['GET'])]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        if ($this->getUser()) {
            return $this->redirectToRoute('app_veto_home');
        }
        // Get login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
    
        return $this->render('security/veto_login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
    #[Route('/veto/login_check', name: 'app_login_veto_check', methods: ['POST'])]
    public function loginCheck(): void
    {
        // Ce contrôleur peut rester vide car Symfony va l'intercepter automatiquement
    }

    #[Route(path: '/veto/logout', name: 'app_logout_veto')]
    public function logoutVeto(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route(path: '/user/logout', name: 'app_logout_user')]
    public function logoutUser(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }

    #[Route('/logout-success', name: 'app_logout_success')]
    public function logoutSuccess(): Response
    {
        $this->addFlash('success', 'Vous avez été déconnecté avec succès.');
        return $this->redirectToRoute('app_home');
    }
}
