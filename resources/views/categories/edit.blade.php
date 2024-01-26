@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Category</div>

                    <div class="card-body">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('categories.update', $category->id) }}" method="POST">
                            @csrf
                            @method('PUT') <!-- Use PUT method for updates -->

                            <div class="form-group">
                                <label for="name">Category Name:</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
