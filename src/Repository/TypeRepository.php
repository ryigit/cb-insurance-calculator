<?php

namespace Coolblue\Interview\Repository;

use Coolblue\Interview\Database\Interface\DatabaseInterface;
use Coolblue\Interview\Entity\ProductTypeEntity;
use Exception;
use Coolblue\Interview\Repository\Interface\TypeRepositoryInterface;

class TypeRepository
{
    private ProductTypeEntity $productType;

    public function __construct(ProductTypeEntity $entity)
    {
        $this->productType = $entity;
    }

    /**
     * @throws Exception
     */
    public function getTypeById($id): ?array
    {
        return $this->productType->findById($id);
    }
}