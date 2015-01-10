<?php
/**
 * Created by PhpStorm.
 * User: goku
 * Date: 1/10/15
 * Time: 1:15 PM
 */

class ProductRepositoryTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        Artisan::call('migrate');
        $this->seed();
    }

    /*
     *
     */
    public function testAll2()
    {
        $repository = new ProductRepository();
        $product = $repository->find(1);
        $this->assertGreaterThan(1, count($product->pictures));
    }
}