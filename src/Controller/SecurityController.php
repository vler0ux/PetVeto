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

    #[Route('/login/veto', name: 'app_login_veto')]
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // Get login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        $lastUsername = $authenticationUtils->getLastUsername();
    
        return $this->render('veto/login.html.twig', [
            'last_username' => $lastUsername,
            'error' => $error,
        ]);
    }
    

    #[Route(path: '/logout', name: 'app_logout_user')]
    public function logout(): void
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
