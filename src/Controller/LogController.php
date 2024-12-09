<?php

namespace App\Controller;

use App\Entity\Log;
use App\Form\LogType;
use App\Repository\LogRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/log')]
final class LogController extends AbstractController
{ 
    #[Route(name: 'app_log_index', methods: ['GET'])]
    public function index(LogRepository $logRepository): Response
    {
        // phpinfo(); exit; --> voir le fichier de config de PHP
        return $this->render('log/index.html.twig', [
            'logs' => $logRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_log_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $log = new Log();
        $form = $this->createForm(LogType::class, $log);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($log);
            $entityManager->flush();

            return $this->redirectToRoute('app_log_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('log/new.html.twig', [
            'log' => $log,
            'form' => $form,
        ]);
    }
}
