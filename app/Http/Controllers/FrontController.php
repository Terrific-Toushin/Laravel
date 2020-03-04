<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use App\Blog;

class FrontController extends Controller
{
    public function index() {
        $blogs = Blog::where('publication_status', 1)->orderBy('id', 'desc')->select('id', 'blog_name', 'short_description', 'blog_image')->get();
        return view('front.home.home', [
            'blogs'         =>  $blogs,
            'categories'    => Category::all()
        ]);
    }

    public function about() {
        return view('front.about.about');
    }

    public function sample() {
        return view('front.sample.sample');
    }

    public function contact() {
        return view('front.contact.contact');
    }

    public function categoryBlog($id) {
        $blogs = Blog::where(['category_id'=> $id, 'publication_status'=>1])->orderBy('id', 'desc')->get();
        return view('front.blog.category-blog', [
            'blogs' =>  $blogs
        ]);
    }

    public function detailsBlog($id) {
        $blog = Blog::find($id);
        $categoryBlogs = Blog::where('category_id', $blog->category_id)->get();
        return view('front.blog.blog-details', [
            'blog' =>  $blog,
            'categoryBlogs'    =>  $categoryBlogs
        ]);
    }

}







