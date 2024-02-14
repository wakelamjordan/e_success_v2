<?php

namespace App\Controller;

use App\Entity\People;
use App\Form\PeopleType;
use Doctrine\ORM\EntityManager;
use App\Repository\PeopleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

#[Route('/people')]
class PeopleController extends AbstractController
{
    #[Route('/', name: 'app_people')]
    public function index(PeopleRepository $pr): Response
    {
        $peoples = $pr->findAll();
        return $this->render('people/index.html.twig', [
            'peoples' => $peoples,
            'nbre' => count($peoples)
        ]);
    }
    #[Route('/edit/{id}', name: 'app_people_edit', methods: ['POST', 'GET'])]
    public function edit(EntityManagerInterface $emi, Request $request, int $id)
    {
        if ($id) {
            $people = $emi->getRepository(People::class)->find($id);
        } else {
            $people = new People;
        }

        $form = $this->createForm(PeopleType::class, $people);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $emi->persist($people);
            $emi->flush();
            return $this->redirect('app_people');
        }
        return $this->render("people/form_edit.html.twig", ['form' => $form->createView()]);
    }

    #[ROUTE('/show/{id}', name: 'app_people_show')]
    public function show(PeopleRepository $pr, int $id)
    {
        $people=$pr->find($id);
        return $this->render("people/show.html.twig",[
            'people'=>$people
        ]);

    }
}
