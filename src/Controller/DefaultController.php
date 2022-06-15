<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
	/**
	 * @Route("/api/version", methods={"GET"})
	 */
	public function api()
    {
        return new JsonResponse([
            "application" => $_ENV['APP_NAME'],
            "version" => $_ENV['APP_VERSION'],
        ], 200);
    }
}
