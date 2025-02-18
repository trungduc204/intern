<?php

namespace App\Domains\Category\Services;

use App\Domains\Category\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CategoryService
{
    protected $model;
    public function __construct(Category $category)
    {
        $this->model = $category;
    }
    
    public function getAllCategories()
    {
        return $this->model->latest()->get();
    }

    public function getCategoriesById($id){
         return $this->model->findOrFail($id);
    }

    public function create(array $data=[])
    {
        DB::beginTransaction();
        try{
            if(!empty($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile) {
            
                $imagePath = $data['image']->store('categories', 'public');
                $data['image']= $imagePath;
        }
        $category= $this->model->create($data);
        DB::commit();
    } catch (\Illuminate\Database\QueryException $e) {
        DB::rollBack();
        
        return redirect()->back()->with('flash_error', __('Có lỗi ở DB') . $e->getMessage());
    } catch (\Exception $e) {
        DB::rollBack();
     
        return redirect()->back()->with('flash_error', __('Có lỗi xảy ra khi thêm danh mục') . $e->getMessage());
    } 
    return $category;
    }

    public function update($id, array $data){
        DB::beginTransaction();
        try{
            $category = $this->model->findOrFail($id);
            if(!$category){
                throw new \RuntimeException(__('Danh mục không tồn tại'));

            }
            if(isset($data['image']) && $data['image'] instanceof \Illuminate\Http\UploadedFile){

            if(!empty($category->image)){
                Storage::delete('public/'. $category->image);

            }
            $imagePath = $data['image']-> store('categories', 'public');
            $data['image'] = $imagePath;
        }
        $category->update($data);
        DB::commit();
        return $category;
    }catch(\Illuminate\Database\QueryException $e){
        DB::rollBack();
        throw new \RuntimeException(__('Có lỗi xảy ra cơ sở dữ liệu') . $e->getMessage());
    }catch(\Exception $e){
        DB::rollBack();
        throw new \RuntimeException(__('Có lỗi xảy ra khi sửa') . $e->getMessage());
    }
    }
    public function delete($id)
    {
        $category = $this->model->find($id);
        if($category){
            return $category->delete();

        }
        return false;
     
    }
}
