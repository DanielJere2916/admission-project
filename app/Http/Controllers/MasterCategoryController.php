<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MasterCategoryController extends Controller
{
    //
    public function storecategory(Request $request)
    {
        $validate_data = $request->validate([
            "category_name" => 'required|unique:categories|max:20',
        ]);

        Category::create($validate_data);
        return redirect()->back()->with('success', 'Category created successfully!');

    }
    public function updatecategory(Request $request,$id)
    {

        $category=Category::findOrFail($id);
        $validate_data = $request->validate([
            "category_name" => 'required|unique:categories|max:20',
        ]);
        $category->update($validate_data);

        
        return redirect()->back()->with('success', 'Category Updated successfully!');

    }
    public function showcategory($id)
    {
        
        $categoryinfo = Category::find($id);
        
        return view('admin.category.edit', compact('categoryinfo'));
    }
    public function deletecategory($id)
    {
        
        $category=Category::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Category Deleted successfully!');
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required|string|max:255|unique:categories,name'
        ]);

        Category::create([
            'name' => $request->category_name
        ]);

        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully');
    }
}

   
