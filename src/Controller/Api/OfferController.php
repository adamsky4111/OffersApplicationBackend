<?php

namespace App\Controller\Api;

use App\Services\OfferService\OfferServiceInterface;
use App\Services\ValidationService\ValidationServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/offer")
 */
class OfferController extends AbstractController
{
    private OfferServiceInterface $offerService;
    private ValidationServiceInterface $validator;

    public function __construct(OfferServiceInterface $offerService, ValidationServiceInterface $validator)
    {
        $this->offerService = $offerService;
        $this->validator = $validator;
    }

    /**
     * @Route("/", name="offer")
     */
    public function index()
    {
        $data = $this->offerService->collect()->getAllActive();

        $data = $this->offerService->serialize()->entitiesToJson($data);

        return JsonResponse::fromJsonString($data, Response::HTTP_FOUND);
    }
}
