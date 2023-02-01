<?php

/*
 * This file is part of the Reiterus package.
 *
 * (c) Pavel Vasin <reiterus@yandex.ru>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Repository\AaronRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Application Home Controller.
 *
 * @author Pavel Vasin <reiterus@yandex.ru>
 */
class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(): JsonResponse
    {
        return $this->json([
            'Welcome to your home controller!',
        ]);
    }

    #[Route('/aaron', name: 'app_aaron')]
    public function aaron(AaronRepository $repo): JsonResponse
    {
        return $this->json($repo->findNicknames());
    }
}
