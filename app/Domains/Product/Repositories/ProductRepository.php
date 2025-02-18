<?php

namespace App\Domains\Product\Repositories;


use App\Domains\Product\Models\Product;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductRepository 
{
    // protected $table = 'product';

    protected $model;

    public function __construct(Product $product)
    {
        $this->model= $product;
    }
    
    //List danh sách tất cả
    public function getAll()
    {
        return $this->model->latest()->get();
    }
    // Lấy sản phẩm theo id
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }
    // create
    public function create(array $data=[]):Product
    {
        DB::beginTransaction();
        try {
            if (!empty($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
             
                $imagePath = $data['image']->store('products', 'public'); 
                $data['image'] = $imagePath; 
            }
            $products = $this->model->create($data);
            DB::commit();
           
        }catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            throw new \RuntimeException(__('Có lỗi ở DB') . $e->getMessage());
        }catch(\Exception $e){
            DB::rollBack();
            throw new \RuntimeException(__('Có lỗi xảy ra khi thêm sản phẩm') . $e->getMessage());
        }
        return $products;
        }
       
    
    //Update
    public function update($id, array $data)
    {
      DB::beginTransaction();
    
        try {
           $product = $this->model->findOrFail($id);
           if(!$product)
           {
                throw new \RuntimeException(__('Sản phẩm không tồn tại'));
           }
           if (isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            // Xóa ảnh cũ nếu có
            if ($product->image) {
                Storage::delete('public/' . $product->image);
            }

            // Lưu ảnh mới vào thư mục storage/app/public/products
            $imagePath = $data['image']->store('products', 'public');
            $data['image'] = $imagePath; // Lưu đường dẫn mới vào database
        }
           $product->update($data);
            DB::commit();
           return $product;
        }catch(\Illuminate\Database\QueryException $e){
            DB::rollBack();
            throw new \RuntimeException(__('Có lỗi ở DB') . $e->getMessage());
        }catch(\Exception $e){
            DB::rollBack();
            throw new \RuntimeException(__('Có lỗi xảy ra khi update sản phẩm') . $e->getMessage());
        }
      }
    
    //delete
    public function delete($id)
    {
        $product = $this->model->find($id);
        if($product){
            return $product->delete();

        }
        return false;
     
    }
    


}
