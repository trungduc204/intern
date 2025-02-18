<?php

namespace App\Domains\Product\http\Controllers;

use App\Domains\Product\Http\Requests\ProductRequest;
use App\Domains\Product\Http\Requests\UpProductRequest;
use App\Domains\Product\Services\ProductService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    protected $productService;
    public function __construct(ProductService $productService)
    {
        $this ->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProducts();
        return view('products.index', compact('products'));
    }
    public function create()
    {
     
        return view('products.create');
    }
    public function store(ProductRequest $request)
    {
        $products = $this ->productService->createProduct($request->validated());
     
        return redirect()->route('listPro')->with('flash_success', __('Product vừa được tạo mới'));

    }

    public function edit($id){
        $product= $this->productService->getProductById($id);
        return view('products.update', compact('product'));
    }
    // public function update(UpProductRequest $request){
    //     $product= $this->productService->updateProduct($request->validate(),$request->id);
    //     return redirect()->route('listPro')->with('flash_success', __('Product vừa cập nhật thành công'));
        
    // }
    public function update(UpProductRequest $request)
{
    $data = $request->validated(); 
    $id = $request->route('id'); 
    $this->productService->updateProduct($id, $data); 

    return redirect()->route('listPro')->with('flash_success', __('Product vừa cập nhật thành công'));
}

    public function delete($id)
    {
    // dd($id);
    $result = $this->productService->deleteProduct($id);

    if ($result) {
        return redirect()->route('listPro')->with('flash_success', __('Product đã được xóa thành công'));
    }

    return redirect()->route('listPro')->with('flash_error', __('Product không tồn tại'));
    }
}
