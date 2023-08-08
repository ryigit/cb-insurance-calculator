<?php

namespace Coolblue\Interview\Repository;

use Coolblue\Interview\Entity\ProductEntity;
use Exception;

class ProductRepository
{
    private ProductEntity $product;
    public function __construct(ProductEntity $entity)
    {
        $this->product = $entity;
    }
    /**
     * @throws Exception
     */
    public function getProductById(int $id): ?array
    {
        return $this->product->findById($id);
    }

    /**
     * @throws Exception
     */
    public function calculateInsuranceForProduct(int $id): int
    {
        $product = $this->getProductById($id);

        if (empty($product)) return -1;

        $insuranceCost = 2000;

        //To-Do: What to do when product type is invalid.
        $productType = $this->product->getType($product['productTypeId']);

        if ($product['salesPrice'] < 2000) {
            $insuranceCost = 1000;
        }

        if ($product['salesPrice'] < 500) {
            $insuranceCost = 0;
        }

        $insuranceCost += $productType['extraFee'];

        return $insuranceCost;
    }
}