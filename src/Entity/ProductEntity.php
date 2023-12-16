<?php

namespace Insurance\Calculator\Entity;

class ProductEntity extends BaseEntity
{
    protected string $table = 'products';

    public function getType($type_id): ?array
    {
        return $this->db->select('product_types', '*', ['id' => $type_id]);
    }
}