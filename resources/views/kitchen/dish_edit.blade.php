@extends('kitchen.layouts.app')
@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Edit Dish</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('dishes.update', $dish->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" value="{{ $dish->name }}" class="form-control">
                                    @error('name')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Image</label>
                                    <input type="file" name="image" value="" class="form-control">
                                    @error('dish_image')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <select name="category" class="form-control" id="">
                                        <option value="">Choose Category</option>
                                        @foreach ($category as $list)
                                            <option value="{{ $list->id }}"
                                                {{ $list->id == $dish->category_id ? 'selected' : '' }}>
                                                {{ $list->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <div class="alert alert-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="">
                                    <img src="{{ asset('images/' . $dish->image) }}" class="img-fluid mb-2 rounded" alt="">
                                </div>
                                <button type="submit" class="btn btn-success">Update Dish</button>
                                <a class="btn btn-danger" href="{{ route('dishes.index') }}">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
