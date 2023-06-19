<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use Image;

class CategoryController extends Controller
{
    public function AllCategory()
    {
        $categories = Categories::latest()->get();
        return view('backend.category.category_all',compact('categories'));
    }

    public function AddCategory()
    {
        return view('backend.category.category_add');
    }

    public function StoreCategory(Request $request)
    {
        $image = $request->file('category_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(86,85)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;

        Categories::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            'category_image' => $save_url, 
        ]);

        return redirect()->route('all.category');
    }

    public function EditCategory($id)
    {
        $categories = Categories::findOrFail($id);
        return view('backend.category.category_edit',compact('categories'));
    }

    public function UpdateCategory(Request $request)
    {
        $category_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('brand_image')) {
            
            $image = $request->file('category_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(86,85)->save('upload/category/'.$name_gen);
            $save_url = 'upload/category/'.$name_gen;

            if (file_exists($old_img)) {
                unlink($old_img);
            }

            Categories::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
                'category_image' => $save_url, 
            ]);

            return redirect()->route('all.category');
        } else {
            
            Categories::findOrFail($category_id)->update([
                'category_name' => $request->category_name,
                'category_slug' => strtolower(str_replace(' ', '-',$request->category_name)),
            ]);

            return redirect()->route('all.category');
        }
    }

    public function DeleteCategory($id)
    {
        $categories = Categories::findOrFail($id);
        $img = $categories->category_image;
        unlink($img);

        $categories->delete();

        return redirect()->back();
    }
}
