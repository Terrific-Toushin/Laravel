@extends('admin.master')

@section('title')
    View Blog
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    DataTables Advanced Tables
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    {{ Session::get('message') }}
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <tr>
                            <th>Blog Id</th>
                            <td>{{ $blog->id }}</td>
                        </tr>
                        <tr>
                            <th>Blog Name</th>
                            <td>{{ $blog->blog_name }}</td>
                        </tr>
                        <tr>
                            <th>Category ID</th>
                            <td>{{ $blog->category_id }}</td>
                        </tr>
                        <tr>
                            <th>Blog Short Description</th>
                            <td>{{ $blog->short_description }}</td>
                        </tr>
                        <tr>
                            <th>Blog Long Description</th>
                            <td>{{ $blog->long_description }}</td>
                        </tr>
                        <tr>
                            <th>Blog Image</th>
                            <td><img src="{{ asset($blog->blog_image) }}" alt="" height="180" width="300"></td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td>{{ $blog->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                        </tr>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
@endsection