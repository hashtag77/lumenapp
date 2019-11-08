<?php

use App\Product;
use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    use DatabaseTransactions;

    public function createProduct()
    {
      return Product::create([
          'name'  => 'Test',
          'detail'=> 'demo'
      ]);
    }
    
    public function testShouldFetchAllProducts()
    {
      $response = $this->get('/testing/products');

      $response->seeJsonEquals([
          "message" => "All fetched!"
      ]);
    }

    public function testShouldCreateProduct()
    {
      $response = $this->post('/testing/products/store', [
          'name'  => 'Dummy Product',
          'detail'=> 'test product'
      ]);

      $response->seeJsonEquals([
          "message" => "Created!"
      ]);
    }

    public function testShouldShowProduct()
    {
      $response = $this->createProduct();

      $this->get('/testing/products/show/' . $response->id)
            ->seeJsonEquals([
                "message" => "Fetched!"
            ]);
    }

    public function testShouldUpdateProduct()
    {
      $response = $this->createProduct();

      $result = $this->patch('/testing/products/update/' . $response->id, [
          'name'  => 'Dummy Product',
          'detail'=> 'test'
      ]);

      $result->seeJsonEquals([
          "message" => "Updated!"
      ]);
    }

    public function testShouldDeleteProduct()
    {
      $response = $this->createProduct();

      $result = $this->delete('/testing/products/destroy/' . $response->id);

      $result->seeJsonEquals([
          "message" => "Item deleted!"
      ]);
    }
}