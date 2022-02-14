<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Usuario;
use App\Entity\Usuarios;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;

class MainController extends AbstractController
{
    
    #[Route('/main', name: 'main')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/newUsuario', name: 'newUsuario')]
    public function newUsuario(): Response
    {
        return $this->render('main/forms/usuario.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/newUsuario/add', name: 'newUsuario')]
    public function addUsuario(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $usuario = new Usuarios();
        $usuario->setDni($_REQUEST['dni']);
        $usuario->setNombre($_REQUEST['nombre']);
        $usuario->setApellidos($_REQUEST['apellidos']);
        $usuario->setDomicilio($_REQUEST['domicilio']);
        $usuario->setPoblacion($_REQUEST['poblacion']);
        $usuario->setProvincia($_REQUEST['provincia']);
        $usuario->setBirthday($_REQUEST['birthday']);

        $entityManager->persist($usuario);
        $entityManager->flush();

        return $this->render('main/forms/usuario.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
