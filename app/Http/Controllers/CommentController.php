<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use Session;

class CommentController extends Controller
{
    public function newComment(Request $request) {

        $comment = new Comment();
        $comment->visitor_id = Session::get('id');
        $comment->blog_id    = $request->blog_id;
        $comment->comment    = $request->comment;
        $comment->save();

        $blog = Blog::find($request->blog_id);
        return redirect('/blog-details/'.$blog->id.'/'.preg_replace('/\s+/u', '-', trim($blog->blog_name)));
    }
}
