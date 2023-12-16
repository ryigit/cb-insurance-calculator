<?php

namespace Insurance\Calculator\Controller;

use Insurance\Calculator\Repository\TypeRepository;

class TypeController
{
    private TypeRepository $repository;
    public function __construct(TypeRepository $typeRepository)
    {
        $this->repository = $typeRepository;
    }

    /**
     * @throws \Exception
     */
    public function getTypeById($id): array
    {
        $result = $this->repository->getTypeById($id);

        if ($result) {
            return $result;
        }

        http_response_code(404);
        exit();
    }
}