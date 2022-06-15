<?php

namespace App\Controller;

use App\Repository\SourceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Source;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;

class SourceController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine)
    {
    }

    #[Route('/api/source', name: 'create_source', methods: ['POST'])]
    public function createSource(Request $request): JsonResponse
    {
        //if ($request->query->get('nom')) {
            return new JsonResponse([$_POST["nom"]], 418);
        //}

        $nom = $request->query->get('nom');

        $source = new Source($nom);

        $this->doctrine->getManager()->persist($source);
        $this->doctrine->getManager()->flush();

        return new JsonResponse([],200);
    }


}
