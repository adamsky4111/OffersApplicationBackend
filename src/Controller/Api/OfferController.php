<?php

namespace App\Controller\Api;

use App\Entity\Offer;
use App\Services\OfferService\OfferServiceInterface;
use App\Services\ValidationService\ValidationServiceInterface;
use App\Utils\EntityCollectors\CategoryCollector\CategoryCollectorInterface;
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

    /**
     * @Route ("/{id}", methods={"GET"})
     */
    public function show($id)
    {
        $data = $this->offerService->collect()->getOne($id);

        if (null === $data) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }

        $data = $this->offerService->serialize()->entityToJson($data);

        return JsonResponse::fromJsonString($data, Response::HTTP_FOUND);
    }

    /**
     * @Route ("/{id}/publish", methods={"PUT"})
     *
     * @return JsonResponse
     */
    public function publish($id)
    {
        $data = $this->offerService->collect()->getOne($id);

        if (null === $data) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }

        $this->offerService->manage()->setEntity($data)->publish();

        $data = $this->offerService->serialize()->entityToJson($data);

        return JsonResponse::fromJsonString($data, Response::HTTP_FOUND);
    }

    /**
     * @Route ("/{id}/end", methods={"PUT"})
     *
     * @return JsonResponse
     */
    public function end($id)
    {
        $data = $this->offerService->collect()->getOne($id);

        if (null === $data) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }

        $this->offerService->manage()->setEntity($data)->end();

        $data = $this->offerService->serialize()->entityToJson($data);

        return JsonResponse::fromJsonString($data, Response::HTTP_FOUND);
    }

    /**
     * @Route ("/{id}", methods={"DELETE"})
     *
     * @return JsonResponse
     */
    public function reActive($id)
    {
        $data = $this->offerService->collect()->getOne($id);

        if (null === $data) {
            return new JsonResponse(null, Response::HTTP_NOT_FOUND);
        }

        $this->offerService->manage()->setEntity($data)->delete();

        $data = $this->offerService->serialize()->entityToJson($data);

        return JsonResponse::fromJsonString($data, Response::HTTP_FOUND);
    }

    private function updateOrCreate($json, CategoryCollectorInterface $categoryCollector, Offer $existingOffer = null)
    {
        /**
         * @var Offer $offer
         */
        $offer = $this->offerService->serialize()->jsonToEntity($json, $existingOffer);
        $errors = $this->validator->validate($offer);

        if (null !== $errors) {
            return new JsonResponse($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $categoryName = $offer->getCategory()->getName();
        $category = $categoryCollector->getOneByName($categoryName);

        if (null === $category) {
            return new JsonResponse(['errors' => ['Could not find category with '.$categoryName.' name']], Response::HTTP_NOT_FOUND);
        }

        $offer->setCategory($category);

        return $offer;
    }
}
