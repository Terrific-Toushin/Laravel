@extends('admin.master')

@section('title')
    Category | Edit Category
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
                    <form class="form-horizontal" action="{{ route('update-category') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-md-3">Category Name</label>
                            <div class="col-md-9">
                                <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control"/>
                                <input type="hidden" name="id" value="{{ $category->id }}" class="form-control"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Category Description</label>
                            <div class="col-md-9">
                                <textarea name="category_description" class="form-control">{{ $category->category_description  }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3">Publication Status</label>
                            <div class="col-md-9 radio">
                                <label><input type="radio" name="publication_status" {{ $category->publication_status == 1 ? 'checked' : '' }} value="1"/> Published</label>
                                <label><input type="radio" name="publication_status" {{ $category->publication_status == 0 ? 'checked' : '' }} value="0"/> Unpublished</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-9 col-md-offset-3">
                                <input type="submit" name="btn" class="btn btn-success btn-block" value="Update Category Info"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection