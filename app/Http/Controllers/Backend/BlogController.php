<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\SubCategory;
use Image;
use Carbon\Carbon;

class BlogController extends Controller
{
    public function AllBlog()
    {
        $blogs = Blog::latest()->get();
        return view('backend.blog.blog_all',compact('blogs'));
    }

    public function AddBlog()
    {
        $categories = Categories::latest()->get();
        return view('backend.blog.blog_add',compact('categories'));
    }

    public function StoreBlog(Request $request)
    {
        $image = $request->file('post_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(910,600)->save('upload/blog/'.$name_gen);
        $save_url = 'upload/blog/'.$name_gen;

        Blog::insert([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'post_title' => $request->post_title,
            'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
            'post_short_description' => $request->post_short_description,
            'post_long_description' => $request->post_long_description,
            'post_image' => $save_url,
            'created_at' => Carbon::now()
        ]);

        return redirect()->route('all.blog'); 
    }

    public function EditBlog($id)
    {
        $categories = Categories::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $blogs = Blog::findOrFail($id);

        return view('backend.blog.blog_edit',compact('categories','subcategories','blogs'));
    }

    public function UpdateBlog(Request $request)
    {
        $blog_id = $request->id;

        if ($request->file('post_image')) {
            $image = $request->file('post_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(910,600)->save('upload/blog/'.$name_gen);
            $save_url = 'upload/blog/'.$name_gen;

            Blog::findOrFail($blog_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
                'post_short_description' => $request->post_short_description,
                'post_long_description' => $request->post_long_description,
                'post_image' => $save_url,
                'updated_at' => Carbon::now()
            ]);

            return redirect()->route('all.blog');  

        } else {

            Blog::findOrFail($blog_id)->update([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'post_title' => $request->post_title,
                'post_slug' => strtolower(str_replace(' ', '-',$request->post_title)),
                'post_short_description' => $request->post_short_description,
                'post_long_description' => $request->post_long_description,
                'updated_at' => Carbon::now()
            ]);

            return redirect()->route('all.blog'); 
        }
    }

    public function DeleteBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $blog_image = $blogs->post_image;
        unlink($blog_image);

        $blogs->delete();

        return redirect()->back(); 
    }
}
