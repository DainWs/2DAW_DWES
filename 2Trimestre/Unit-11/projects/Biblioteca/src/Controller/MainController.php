<?php

namespace App\Controller;

use App\domain\ViewDataPackager;
use App\Entity\Libros;
use App\Entity\Prestamos;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Usuarios;
use DateTime;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

use function PHPUnit\Framework\isNull;

class MainController extends AbstractController
{
    
    #[Route(['', '/home'], name: 'home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $packager = ViewDataPackager::pakageDataFor('/home');
        $packager->setRegistry($doctrine);
        return $this->render('main/index.html.twig', $packager->getData());
    }

    #[Route('/book/{id}', name: 'book')]
    public function book(String $id, ManagerRegistry $doctrine): Response
    {
        $packager = ViewDataPackager::pakageDataFor('/book');
        $packager->setRegistry($doctrine);
        return $this->render('models/book.html.twig', $packager->getData($id));
    }

    #[Route('/books', name: 'books')]
    public function books(ManagerRegistry $doctrine): Response
    {
        $packager = ViewDataPackager::pakageDataFor('/books');
        $packager->setRegistry($doctrine);
        return $this->render('main/index.html.twig', $packager->getData());
    }

    #[Route('/user', name: 'usuarios')]
    public function usuarios(Request $request, ManagerRegistry $doctrine): Response
    {
        $formParams = $request->request;
        $id = $formParams->get('user_id');
        $view = null;
        if (is_null($id)) {
            $packager = ViewDataPackager::pakageDataFor('/userlist');
            $packager->setRegistry($doctrine);
            $view = $this->render('main/users.html.twig', $packager->getData());
        } else {
            $packager = ViewDataPackager::pakageDataFor('/user');
            $packager->setRegistry($doctrine);
            $view = $this->render('models/user.html.twig', $packager->getData($id));
        }
        
        return $view;
    }

    #[Route('/user/new', name: 'newUsuario')]
    public function newUsuario(ManagerRegistry $doctrine): Response
    {
        $packager = ViewDataPackager::pakageDataFor('/usernew');
        $packager->setRegistry($doctrine);
        return $this->render('forms/usuario.html.twig', $packager->getData());
    }

    #[Route('/user/add', name: 'addUsuario')]
    public function addUsuario(Request $request, ManagerRegistry $doctrine): Response
    {
        $formParams = $request->request;
        $entityManager = $doctrine->getManager();

        $usuario = new Usuarios();
        $usuario->setDni($formParams->get('dni'));
        $usuario->setNombre($formParams->get('first_name'));
        $usuario->setApellidos($formParams->get('last_name'));
        $usuario->setDomicilio($formParams->get('domicile'));
        $usuario->setPoblacion($formParams->get('population'));
        $usuario->setProvincia($formParams->get('province'));
        $usuario->setBirthday(new DateTime($formParams->get('birthday')));

        $entityManager->persist($usuario);
        $entityManager->flush();

        return $this->redirectToRoute('home');
    }

    #[Route('/prestamo/new', name: 'newPrestamo')]
    public function newPrestamo(ManagerRegistry $doctrine): Response
    {
        $packager = ViewDataPackager::pakageDataFor('/prestamo');
        $packager->setRegistry($doctrine);
        return $this->render('forms/prestamo.html.twig', $packager->getData());
    }

    #[Route('/prestamo/add', name: 'addPrestamo')]
    public function addPrestamo(Request $request, ManagerRegistry $doctrine): Response
    {
        $formParams = $request->request;
        $bookRepository = $doctrine->getRepository(Libros::class);
        $book = $bookRepository->find($formParams->get('book_id'));

        $userRepository = $doctrine->getRepository(Usuarios::class);
        $user = $userRepository->find($formParams->get('user_id'));

        $entityManager = $doctrine->getManager();

        $prestamo = new Prestamos();
        $prestamo->setLibroId($book);
        $prestamo->setUsuarioId($user);
        $prestamo->setMaxDelayDate(new DateTime($formParams->get('maxDelayDate')));
        $prestamo->setCompletionDate(new DateTime());
        $prestamo->setReturnDate(new DateTime($formParams->get('returnDate')));

        $entityManager->persist($prestamo);
        $entityManager->flush();

        return $this->redirectToRoute('home');
    }
}
