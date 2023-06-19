<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\SubCategory;

class SubCategoryController extends Controller
{
    public function AllSubCategory()
    {
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_all',compact('subcategories'));
    }

    public function AddSubCategory()
    {
        $categories = Categories::orderBy('category_name','ASC')->get();
        return view('backend.subcategory.subcategory_add',compact('categories'));
    }

    public function StoreSubCategory(Request $request)
    {
        SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
        ]);

        return redirect()->route('all.subcategory');
    }

    public function EditSubCategory($id)
    {
        $categories = Categories::orderBy('category_name','ASC')->get();
        $subcategory = SubCategory::findOrFail($id);

        return view('backend.subcategory.subcategory_edit',compact('categories','subcategory'));
    }

    public function UpdateSubCategory(Request $request)
    {   
        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => strtolower(str_replace(' ', '-',$request->subcategory_name)),
        ]);
        
        return redirect()->route('all.subcategory');
    }

    public function DeleteSubCategory($id)
    {
        SubCategory::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function GetSubCategory($category_id)
    {
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name','ASC')->get();
        return json_encode($subcat);

    }
}

