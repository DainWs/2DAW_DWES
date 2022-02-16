<?php

namespace App\Controller;

use App\domain\ViewDataPackager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Usuarios;
use Doctrine\Persistence\ManagerRegistry;

class MainController extends AbstractController
{
    
    #[Route(['', '/home'], name: 'home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $packager = ViewDataPackager::pakageDataFor('/home');
        $packager->setRegistry($doctrine);        
        var_dump($packager->getData());
        return $this->render('main/index.html.twig', []);
    }

    #[Route('/newUsuario', name: 'newUsuario')]
    public function newUsuario(): Response
    {
        return $this->render('forms/usuario.html.twig', [
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

        return $this->render('forms/usuario.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
