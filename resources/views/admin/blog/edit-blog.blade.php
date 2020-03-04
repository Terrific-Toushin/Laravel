@extends('admin.master')

@section('title')
    Blog | Add Blog
@endsection

@section('body')
    <br/>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Basic Form Elements
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" name="editBlogForm" action="{{ route('update-blog') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <input type="hidden" name="id" value="{{ $blog->id }}" class="form-control"/>
                                <select class="form-control" name="category_id">
                                    <option> -- Select Category Name -- </option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Blog Name</label>
                            <div class="col-md-9">
                                <input type="text" name="blog_name" class="form-control" value="{{ $blog->blog_name }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Blog Short Description</label>
                            <div class="col-md-9">
                                <textarea name="short_description" class="form-control">{{ $blog->short_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Blog Long Description</label>
                            <div class="col-md-9">
                                <textarea id="editor" name="long_description" class="form-control">{{ $blog->long_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Blog Image</label>
                            <div class="col-md-9">
                                <input type="file" name="blog_image" accept="image/*"/>
                                <img src="{{ asset($blog->blog_image) }}" alt="" height="100" width="120">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Publication Status</label>
                            <div class="col-md-9 radio">
                                <label><input type="radio" name="publication_status" {{ $blog->publication_status == 1 ? 'checked' : '' }} value="1"/> Published</label>
                                <label><input type="radio" name="publication_status" {{ $blog->publication_status == 0 ? 'checked' : '' }} value="0"/> Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Blog Info"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editBlogForm'].elements['category_id'].value = '{{ $blog->category_id }}';
    </script>
@endsection






