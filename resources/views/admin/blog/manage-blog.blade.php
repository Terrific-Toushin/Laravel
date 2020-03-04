@extends('admin.master')

@section('title')
    Manage Blog
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
                        <thead>
                        <tr>
                            <th>SL NO</th>
                            <th>Category Name</th>
                            <th>Blog Name</th>
                            <th>Blog Image</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($blogs as $blog)
                            <tr class="odd gradeX">
                                <td>{{ $i++ }}</td>
                                <td>{{ $blog->category->category_name }}</td>
                                <td>{{ $blog->blog_name }}</td>
                                <td><img src="{{ asset($blog->blog_image) }}" alt="" height="100" width="130"/></td>
                                <td>{{ $blog->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                <td class="center">
                                    <a href="{{ route('view-blog', ['id'=>$blog->id]) }}" class="btn btn-info btn-xs" title="View Blog Detail">
                                        <span class="glyphicon glyphicon-zoom-in"></span>
                                    </a>
                                    <a href="{{ route('edit-blog', ['id'=>$blog->id]) }}" class="btn btn-success btn-xs" title="Edit Blog">
                                        <span class="glyphicon glyphicon-edit"></span>
                                    </a>
                                    <a href="{{ route('delete-blog', ['id'=>$blog->id]) }}" onclick="return confirm('Are you sure to delete this !!')" class="btn btn-danger btn-xs" title="Delete Blog">
                                        <span class="glyphicon glyphicon-trash"></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
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