<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;

class MasterSubcategoryController extends Controller
{
    //
    public function storesubcategory(Request $request)
    {
        $validate_data = $request->validate([
            "subcategory_name" => 'required|unique:subcategories|max:20',
            "category_id" => 'required|exists:categories,id'
        ]);

        Subcategory::create($validate_data);
        return redirect()->back()->with('success', 'SubCategory created successfully!');

    }
 
    public function updatesubcategory(Request $request,$id)
    {

        $subcategory=Subcategory::findOrFail($id);
        $validate_data = $request->validate([
            "category_name" => 'required|unique:categories|max:20',
        ]);
        $subcategory->update($validate_data);

        
        return redirect()->back()->with('success', 'SubCategory Updated successfully!');

    }
    public function showsubcategory($id)
    {
        
        $subcategoryinfo = Subcategory::find($id);

       
        
        return view('admin.sub_category.edit', compact('subcategoryinfo'));
    }
    public function deletesubcategory($id)
    {
        
        $subcategory= Subcategory::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Category Deleted successfully!');
    }
 
    

}
