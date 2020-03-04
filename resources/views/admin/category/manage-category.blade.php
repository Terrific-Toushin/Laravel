@extends('admin.master')

@section('title')
    Manage Category
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
                            <th>Category Description</th>
                            <th>Publication Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($i=1)
                        @foreach($categories as $category)
                        <tr class="odd gradeX">
                            <td>{{ $i++ }}</td>
                            <td>{{ $category->category_name }}</td>
                            <td>{{ $category->category_description }}</td>
                            <td>{{ $category->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                            <td class="center">
                                <a href="{{ route('edit-category', ['id'=>$category->id]) }}" class="btn btn-success btn-xs">
                                    <span class="glyphicon glyphicon-edit"></span>
                                </a>
                                <a href="{{ route('delete-category', ['id'=>$category->id]) }}" onclick="return confirm('Are you sure to delete this !!')" class="btn btn-danger btn-xs">
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