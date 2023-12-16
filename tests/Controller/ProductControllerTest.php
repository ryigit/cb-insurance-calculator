<?php

namespace Insurance\Calculator\Test\Controller;

use Insurance\Calculator\Controller\ProductController;
use Insurance\Calculator\Entity\ProductEntity;
use Insurance\Calculator\Repository\ProductRepository;
use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;

class ProductControllerTest extends TestCase
{
    /**
     * @throws Exception
     * @throws \Exception
     */
    public function testGetProductById(): void
    {
        $productEntityMock = $this->createPartialMock(ProductEntity::class, ['findById']);
        $productEntityMock->expects($this->once())
            ->method('findById')
            ->with(3)
            ->willReturn(['id' => 3, 'salesPrice' => 400, 'productTypeId' => 35]);

        $productRepository = new ProductRepository($productEntityMock);
        $productController = new ProductController($productRepository);

        $result = $productController->getProductById(3);

        $this->assertEquals(3, $result['id']);
    }

    /**
     * @throws Exception
     * @throws \Exception
     */
    public function testCalculateInsuranceFor400(): void
    {
        $productEntityMock = $this->createPartialMock(ProductEntity::class, ['getType', 'findById']);
        $productEntityMock->expects($this->once())
            ->method('findById')
            ->with(3)
            ->willReturn(['id' => 3, 'salesPrice' => 400, 'productTypeId' => 35]);

        $productEntityMock->expects($this->once())
            ->method('getType')
            ->with(35)
            ->willReturn(['id' => 35, 'extraFee' => 0]);

        $productRepository = new ProductRepository($productEntityMock);

        $productController = new ProductController($productRepository);

        $result = $productController->getInsuranceFeeForProduct(3);

        $this->assertEquals(0, $result);
    }

    /**
     * @throws Exception
     * @throws \Exception
     */
    public function testCalculateInsuranceFor400AndSmartPhone(): void
    {
        $productEntityMock = $this->createPartialMock(ProductEntity::class, ['getType', 'findById']);
        $productEntityMock->expects($this->once())
            ->method('findById')
            ->with(3)
            ->willReturn(['id' => 3, 'salesPrice' => 400, 'productTypeId' => 32]);

        $productEntityMock->expects($this->once())
            ->method('getType')
            ->with(32)
            ->willReturn(['id' => 32, 'extraFee' => 500]);

        $productRepository = new ProductRepository($productEntityMock);

        $productController = new ProductController($productRepository);

        $result = $productController->getInsuranceFeeForProduct(3);

        $this->assertEquals(500, $result);
    }

    /**
     * @throws Exception
     * @throws \Exception
     */
    public function testCalculateInsuranceFor600(): void
    {
        $productEntityMock = $this->createPartialMock(ProductEntity::class, ['getType', 'findById']);
        $productEntityMock->expects($this->once())
            ->method('findById')
            ->with(3)
            ->willReturn(['id' => 3, 'salesPrice' => 600, 'productTypeId' => 35]);

        $productEntityMock->expects($this->once())
            ->method('getType')
            ->with(35)
            ->willReturn(['id' => 35, 'extraFee' => 0]);

        $productRepository = new ProductRepository($productEntityMock);

        $productController = new ProductController($productRepository);

        $result = $productController->getInsuranceFeeForProduct(3);

        $this->assertEquals(1000, $result);
    }

    /**
     * @throws Exception
     * @throws \Exception
     */
    public function testCalculateInsuranceFor2500(): void
    {
        $productEntityMock = $this->createPartialMock(ProductEntity::class, ['getType', 'findById']);
        $productEntityMock->expects($this->once())
            ->method('findById')
            ->with(3)
            ->willReturn(['id' => 3, 'salesPrice' => 2500, 'productTypeId' => 35]);

        $productEntityMock->expects($this->once())
            ->method('getType')
            ->with(35)
            ->willReturn(['id' => 35, 'extraFee' => 0]);

        $productRepository = new ProductRepository($productEntityMock);

        $productController = new ProductController($productRepository);

        $result = $productController->getInsuranceFeeForProduct(3);

        $this->assertEquals(2000, $result);
    }

    /**
     * @throws Exception
     * @throws \Exception
     */
    public function testCalculateInsuranceFor3500AndLaptop(): void
    {
        $productEntityMock = $this->createPartialMock(ProductEntity::class, ['getType', 'findById']);
        $productEntityMock->expects($this->once())
            ->method('findById')
            ->with(3)
            ->willReturn(['id' => 3, 'salesPrice' => 3500, 'productTypeId' => 32]);

        $productEntityMock->expects($this->once())
            ->method('getType')
            ->with(32)
            ->willReturn(['id' => 32, 'extraFee' => 500]);

        $productRepository = new ProductRepository($productEntityMock);

        $productController = new ProductController($productRepository);

        $result = $productController->getInsuranceFeeForProduct(3);

        $this->assertEquals(2500, $result);
    }
}