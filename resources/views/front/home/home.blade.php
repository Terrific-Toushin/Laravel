@extends('front.master')

@section('title')
    Home
@endsection

@section('body')

    <header class="masthead" style="background-image: url('{{ asset('/') }}front/img/home-bg.jpg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1>Clean Blog</h1>
                        <span class="subheading">A Blog Theme by Start Bootstrap</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @foreach($categories as $category)
        <h3>{{ $category->category_name }}</h3>
       @foreach($category->blogs as $blog)
           <h5>{{ $blog->blog_name }}</h5>
       @endforeach
        <hr/>
    @endforeach





{{--<!-- Main Content -->--}}
{{--<section class="p-5 bg-light">--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<h3>{{ Session::get('message') }}</h3>--}}
            {{--</div>--}}
            {{--@foreach($blogs as $blog)--}}
            {{--<div class="col-md-4 mb-3">--}}
                {{--<div class="card">--}}
                    {{--<img class="card-img-top" src="{{ asset($blog->blog_image) }}" alt="Card image cap">--}}
                    {{--<div class="card-body">--}}
                        {{--<h5 class="card-title">{{ $blog->blog_name }}</h5>--}}
                        {{--<p class="card-text">{{ $blog->short_description }}</p>--}}
                        {{--<a href="{{ route('blog-details',['id'=>$blog->id, 'name'=>preg_replace('/\s+/u', '-', trim($blog->blog_name))]) }}" class="btn btn-primary">Read more</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</section>--}}

@endsection


