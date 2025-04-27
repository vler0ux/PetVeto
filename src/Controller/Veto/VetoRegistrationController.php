<?php

namespace App\Controller;
namespace App\Controller\Veto;
use App\Form\VetoType;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Security\LoginFormAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;

class VetoRegistrationController extends AbstractController
{
    #[Route('/register/veto', name: 'app_register_veto')]
    public function registerVeto(
        Request $request,
        UserPasswordHasherInterface $userPasswordHasher,
        EntityManagerInterface $entityManager,
        UserAuthenticatorInterface $userAuthenticator,
        LoginFormAuthenticator $authenticator
    ): Response
    {
        $user = new User();
        $form = $this->createForm(VetoType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $plainPassword = $form->get('plainPassword')->getData();

            if (empty($plainPassword)) {
                throw new \Exception('Le mot de passe est obligatoire');
            }    
    
            $user->setPassword(
                $userPasswordHasher->hashPassword($user, $plainPassword)
            );
            $user->setRoles(['ROLE_VETO']);
    
            $entityManager->persist($user);
            $entityManager->flush();
    
            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }
    
        return $this->render('veto/new.html.twig', [
            'registrationForm' => $form,
        ]);
    }
    
}    

