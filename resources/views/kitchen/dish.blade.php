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
                    Kitchen Panel
                </div>
            </div>

        </div>
    </div>
     <div class="mb-4">
         <a href="{{route('dishes.create')}}" class="btn btn-info"> <i class="pe-7s-plus"></i> create new dish</a>
        </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Dish Name</th>
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($dish as $dishes)
                            <tbody>
                                <tr>
                                    <td>{{$dishes->name}}</td>
                                    <td>{{$dishes->category->name}}</td>
                                    <td><img src="{{asset('images/' . $dishes->image)}}" class="img-fluid" width="100px" height="100px" alt=""></td>
                                    <td>{{$dishes->created_at}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('dishes.edit',$dishes->id)}}" class="btn btn-outline-warning"><i class="pe-7s-edit"></i>Edit</a>
                                        <form action="{{route('dishes.destroy',$dishes->id)}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger text-dark ml-2"> <i class="pe-7s-trash"></i> Delete </button>
                                        </form>
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
