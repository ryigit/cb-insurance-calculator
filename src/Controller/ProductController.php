<?php

namespace Insurance\Calculator\Controller;

use Exception;
use Insurance\Calculator\Repository\ProductRepository;

class ProductController
{
    private ProductRepository $repository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->repository = $productRepository;
    }

    /**
     * @throws Exception
     */
    public function getProductById($id): ?array
     {
         $result = $this->repository->getProductById($id);

         if ($result) {
             return $result;
         }

         http_response_code(404);
         exit();
     }

    /**
     * @throws Exception
     */
    public function getInsuranceFeeForProduct($productId): int
    {
        $result = $this->repository->calculateInsuranceForProduct($productId);

        if ($result > -1) {
            return $result;
        }

        http_response_code(404);
        exit();
    }
}