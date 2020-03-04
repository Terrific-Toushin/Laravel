@extends('front.master')
@section('title')
    {{ $blog->blog_name }}
@endsection

@section('body')

    <!-- Page Header -->
    <header class="masthead" style="background-image: url('{{ asset( $blog->blog_image) }}')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="post-heading">
                        {{--<h1>{{ $category->category_name }}</h1>--}}
                        <h2 class="subheading">{{ $blog->blog_name }}</h2>
                        <span class="meta">Posted by
                <a href="#">Start Bootstrap</a>
                on August 24, 2018</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <p>{{ $blog->short_description }}</p>
                    <p>{!!  $blog->long_description  !!}</p>
                </div>
            </div>
        </div>
    </article>

    <section class="bg-secondary py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-body">
                        @if(Session::get('id'))
                        <form action="{{ route('new-comment') }}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label class="col-md-3">Enter You Comment</label>
                                <div class="col-md-9">
                                    <input type="hidden" name="blog_id" value="{{ $blog->id }}"/>
                                    <textarea name="comment" class="form-control" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" class="btn btn-success" value="Save Comment"/>
                                </div>
                            </div>
                        </form>
                         @else
                            <p>You have to <a href="{{ route('visitor-login') }}">login</a> to comment this blog. If you are not register then <a href="{{ route('add-visitor') }}">register</a> first.</p>
                         @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Related Blog</h3>
            </div>
        </div>
        <div class="row">
            @foreach($categoryBlogs as $categoryBlog)
            <div class="col-md-4">
                 <div class="card">
                     <img src="{{ asset($categoryBlog->blog_image) }}" alt="" height="250">
                     <div class="card-body">
                        <h3 class="card-title">{{ $categoryBlog->blog_name }}</h3>
                         <p class="card-text">{{ $categoryBlog->short_description }}</p>
                         <a href="{{ route('blog-details',['id'=>$blog->id, 'name'=>preg_replace('/\s+/u', '-', trim($blog->blog_name))]) }}" class="btn btn-primary">Read more</a>
                     </div>
                 </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection








