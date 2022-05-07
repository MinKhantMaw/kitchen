@extends('kitchen.layouts.app')
@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-12">
               <div class="card">
                   <div class="card-header">
                       <h4 class="">Create New Category</h4>
                   </div>
                   <div class="card-body">
                     <form action="{{route('category.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <div class="">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Category Name">
                                @error('name')
                                    <div class="alert alert-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                         <a href="{{route('category.index')}}" type="submit" class="btn btn-danger">Cancle</a>
                    </form>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>
@endsection
