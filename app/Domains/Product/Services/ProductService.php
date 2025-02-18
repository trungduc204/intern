<?php

namespace App\Domains\Product\Services;

use App\Domains\Product\Repositories\ProductRepository;


// namespace App\Domains\Product\Repositories\ProductRepository;

class ProductService
{
  protected $productRepository;
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }
    //list all
    public function getAllProducts(){
        $products = $this->productRepository->getAll();
        return $products;
    }
    // list by id
    public function getProductById($id)
    {
        $products = $this->productRepository->find($id);
        return $products;
    }
      
    // create
    public function createProduct(array $data)
    {
        return $this->productRepository->create($data);
    }
    // update product
    public function updateProduct($id, array $data)
    {
        return $this->productRepository->update($id, $data);
    }
    // delete product
    public function deleteProduct($id)
    {
        
     return  $this->productRepository->delete($id);
    
    }
}