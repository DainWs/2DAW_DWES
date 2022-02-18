<?php

namespace App\Controller;

use App\domain\ViewDataPackager;
use App\Entity\Prestamos;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Usuarios;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Psr\Log\LoggerInterface;

class MainController extends AbstractController
{
    
    #[Route(['', '/home'], name: 'home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $packager = ViewDataPackager::pakageDataFor('/home');
        $packager->setRegistry($doctrine);
        return $this->render('main/index.html.twig', $packager->getData());//$packager->getData());
    }

    #[Route('/book/{id}', name: 'book')]
    public function book(String $id, ManagerRegistry $doctrine): Response
    {
        $packager = ViewDataPackager::pakageDataFor('/book');
        $packager->setRegistry($doctrine);
        return $this->render('models/book.html.twig', $packager->getData($id));//$packager->getData());
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

    #[Route('/newPrestamo', name: 'newPrestamo')]
    public function newPrestamo(): Response
    {
        return $this->render('forms/prestamo.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }

    #[Route('/newPrestamo/add', name: 'newPrestamo')]
    public function addPrestamo(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $prestamo = new Prestamos();
        $prestamo->setLibroId($_REQUEST['libro_id']);
        $prestamo->setUsuarioId($_REQUEST['user_id']);
        $prestamo->setMaxDelayDate($_REQUEST['maxDelayDate']);
        $prestamo->setCompletionDate(new DateTime());
        $prestamo->setReturnDate($_REQUEST['returnDate']);

        $entityManager->persist($prestamo);
        $entityManager->flush();

        return $this->render('forms/prestamo.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
}
