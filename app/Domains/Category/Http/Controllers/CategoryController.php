<?php

namespace App\Domains\Category\Http\Controllers;

use App\Domains\Category\Http\Requests\CategoryRequest;
use App\Domains\Category\Http\Requests\UpCategoryRequest;
use App\Domains\Category\Models\Category;
use App\Domains\Category\Services\CategoryService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $categoryService;
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }


    public function index()
    {
        $categories = $this->categoryService->getAllCategories();
        return view('categories.list', compact('categories'));
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(CategoryRequest $request)
    {
        $data = $request->all();
        $category = $this->categoryService->create($data);
        return redirect()->route('listCate')->with('flash_success',__('Category vừa được tạo'));

    }

    public function editCate($id){
        $category = $this->categoryService->getCategoriesById($id);
        return view('categories.update', compact('category'));
    }
    public function updateCate(UpCategoryRequest $request){
      $data = $request->validated();
      $id =$request->route('id');
      $this->categoryService->update($id, $data);
      return redirect()->route('listCate')-> with('flash_success',__('Category sửa thành công'));
    }
    public function delete($id){
        // dd($id);
        $result = $this->categoryService->delete($id);
        
        if ($result) {
            return redirect()->route('listCate')->with('flash_success', __('Category đã được xóa thành công'));
        }
    
        return redirect()->route('listCate')->with('flash_error', __('Category không tồn tại'));
    }
}
