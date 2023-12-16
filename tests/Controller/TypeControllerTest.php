<?php

namespace Insurance\Calculator\Test\Controller;

use Insurance\Calculator\Controller\TypeController;
use Insurance\Calculator\Repository\TypeRepository;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class TypeControllerTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testGetProductType(): void
    {
        $typeRepositoryMock = $this->createMock(TypeRepository::class);

        $typeRepositoryMock->expects($this->once())
            ->method('getTypeById')
            ->with(1)
            ->willReturn(['id' => 1]);

        $typeController = new TypeController($typeRepositoryMock);
        $result = $typeController->getTypeById(1);

        $this->assertEquals(1, $result['id']);
    }
}