<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Category;
use Illuminate\Http\Request;
use DB;
use Image;

class BlogController extends Controller
{
    public function index() {
        return view('admin.blog.add-blog');
    }

    public function newBlog(Request $request) {

        $image = $request->file('blog_image');
        $imageName = $image->getClientOriginalName();
        $directory = './blog-images/';
//        $image->move($directory, $imageName);
        Image::make($image)->resize(500, 500)->save($directory.$imageName);

        $blog = new Blog();
        $blog->category_id          = $request->category_id;
        $blog->blog_name            = $request->blog_name;
        $blog->short_description    = $request->short_description;
        $blog->long_description     = $request->long_description;
        $blog->blog_image           = $directory.$imageName;
        $blog->publication_status   = $request->publication_status;
        $blog->save();

        return redirect('/blog/add-blog')->with('message', 'Blog info create successfully');
    }

    public function manageBlog() {
        $blogs = Blog::orderBy('id', 'desc')->get();

//        $blogs = DB::table('blogs')
//                    ->join('categories', 'blogs.category_id', '=', 'categories.id')
//                    ->select('blogs.*', 'categories.category_name')
//                    ->orderBy('id', 'desc')
//                    ->get();
//        return $blogs;

        return view('admin.blog.manage-blog', [
            'blogs' =>  $blogs
        ]);
    }

    public function viewBlog($id) {
        $blog = Blog::find($id);
        return view('admin.blog.view-blog', [
            'blog'  =>  $blog
        ]);
    }

    public function editBlog($id) {
        $blog = Blog::find($id);
        return view('admin.blog.edit-blog', [
            'blog'          =>  $blog
        ]);
    }

    public function updateBlog(Request $request) {
        $blog = Blog::find($request->id);
        $image = $request->file('blog_image');
        if ($image) {
            if(file_exists($blog->blog_image)) {
                unlink($blog->blog_image);
            }
            $imageName = $image->getClientOriginalName();
            $directory = './blog-images/';
            $image->move($directory, $imageName);
            $imageUrl = $directory.$imageName;
        } else {
            $imageUrl = $blog->blog_image;
        }
        $blog->category_id          = $request->category_id;
        $blog->blog_name            = $request->blog_name;
        $blog->short_description    = $request->short_description;
        $blog->long_description     = $request->long_description;
        $blog->blog_image           = $imageUrl;
        $blog->publication_status   = $request->publication_status;
        $blog->save();

        return redirect('/blog/manage-blog')->with('message', 'Blog info update successfully');
    }

    public function deleteBlog($id) {
        $blog = Blog::find($id);
        $blog->delete();
        unlink($blog->blog_image);
        return redirect('/blog/manage-blog')->with('message', 'Blog info update successfully');
    }

}







