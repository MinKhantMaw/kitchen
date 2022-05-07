@extends('kitchen.layouts.app')
@section('content')
    <div class="app-page-title">
        <div class="page-title-wrapper">
            <div class="page-title-heading">
                <div class="page-title-icon">
                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                    </i>
                </div>
                <div>
                    Category
                </div>
            </div>

        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="mb-3">
                <a href="{{ route('category.create') }}" class="btn btn-primary">create new category</a>
            </div>
            <div class="row">
                <div class="col-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Created Data</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($category as $list)
                            <tbody>
                                <tr>
                                    <td>{{$list->name}}</td>
                                    <td>{{$list->created_at}}</td>
                                    <td>
                                        <a href="" class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
@endsection
