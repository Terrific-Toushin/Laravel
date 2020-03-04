@extends('front.master')

@section('title')
    Category Blog
@endsection

@section('body')
    <header class="masthead" style="background-image: url('{{ asset('/') }}front/img/about-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>About Me</h1>
                        <span class="subheading">This is what I do.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <section class="p-5 bg-light">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img class="card-img-top" src="{{ asset($blog->blog_image) }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $blog->blog_name }}</h5>
                                <p class="card-text">{{ $blog->short_description }}</p>
                                <a href="{{ route('blog-details', ['id'=>$blog->id, 'name'=>preg_replace('/\s+/u', '-', trim($blog->blog_name))]) }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection


