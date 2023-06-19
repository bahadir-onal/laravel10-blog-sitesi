<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Blog;
use App\Models\Categories;
use App\Models\SubCategory;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function UserDashboard()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('frontend.index',compact('userData'));
    }

    public function UserLogout(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function BlogDetail($id)
    {
        $categories = Categories::latest()->get();
        $subcategories = SubCategory::latest()->get();
        $blogs = Blog::findOrFail($id);

        return view('frontend.blog.blog_detail',compact('categories','subcategories','blogs'));
    }
}
