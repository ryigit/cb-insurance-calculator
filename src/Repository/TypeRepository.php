<?php

namespace Insurance\Calculator\Repository;

use Insurance\Calculator\Database\Interface\DatabaseInterface;
use Insurance\Calculator\Entity\ProductTypeEntity;
use Exception;
use Insurance\Calculator\Repository\Interface\TypeRepositoryInterface;

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