<?php

namespace Coolblue\Interview\Test\Controller;

use Coolblue\Interview\Controller\TypeController;
use Coolblue\Interview\Repository\TypeRepository;
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