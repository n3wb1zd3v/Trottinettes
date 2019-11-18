<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/user/signup", name="signup")
     * @Method("POST")
     */
    public function signup(ObjectManager $manager, Request $request,  UserPasswordEncoderInterface $encoder)
    {
        $data = $request->getContent();
        $user = $this->get('serializer')
            ->deserialize($data, 'App\Entity\Users', 'json');

        $password = $user->getPassword();
        $newDate = new \DateTime();
        $date = $newDate->format('Y-m-d');
        
        $user->setPassword($encoder->encodePassword($user, $password))
            ->setRole(1)
            ->setCreatedAt($newDate)
            ->setValide(false)
            ->setToken(hash('md5', $user->getNom(). $date));
            
        $manager->persist($user);
        $manager->flush();
        return new Response(Response::HTTP_CREATED);
    
    }

    /**
     * @Route("/user/login", name="login")
     * @Method("POST")
     */
    public function login()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }

    /**
     * @Route("/user/delete", name="delete")
     * @Method("DELETE")
     */
    public function deleteUser()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserController.php',
        ]);
    }
}
