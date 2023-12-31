<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataView = [];
        $categories = Category::orderBy('id', 'ASC')->paginate(5);
        $dataView['categories'] = $categories;
        return view('admin.category.index', $dataView);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataView = [];
        $isCategories = count(Category::get());
        if($isCategories != 0) {
            $categories = Category::get();
        }
        else {
            $categories = null;
        }
        $dataView['categories'] = $categories;
        return view('admin.category.create', $dataView);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newCategoryData = [
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
        ];
        Category::create($newCategoryData);
        return redirect()->route('category.index')->with(['msg' => 'Thêm mới dữ liệu thành công !']);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('category.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dataView = [];
        $categories = Category::get();
        $category = Category::find($id);
        $dataView['category'] = $category;
        $dataView['categories'] = $categories;
        return view('admin.category.edit', $dataView);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateCategoryData = [
            "name" => $request->name,
            "slug" => $request->slug,
            "description" => $request->description,
            "parent_id" => $request->parent_id
        ];
        Category::where('id', $id)->update($updateCategoryData);
        return redirect()->route('category.index')->with(['msg' => 'Cập nhật dữ liệu thành công !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index')->with(['msg' => 'Xóa dữ liệu thành công !']);
    }
}
