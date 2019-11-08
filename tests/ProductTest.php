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
    
    public function testAllProduct()
    {
      $response = $this->get('/testing/products');

      $response->seeJsonEquals([
          "message" => "All fetched!"
      ]);
    }

    public function testCreateProduct()
    {
      $response = $this->post('/testing/products/store', [
          'name'  => 'Dummy Product',
          'detail'=> 'test product'
      ]);

      $response->seeJsonEquals([
          "message" => "Created!"
      ]);
    }

    public function testShowProduct()
    {
      $response = $this->createProduct();

      $this->get('/testing/products/show/' . $response->id)
            ->seeJsonEquals([
                "message" => "Fetched!"
            ]);
    }

    public function testUpdateProduct()
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

    public function testDeleteProduct()
    {
      $response = $this->createProduct();

      $result = $this->delete('/testing/products/destroy/' . $response->id);

      $result->seeJsonEquals([
          "message" => "Item deleted!"
      ]);
    }
}