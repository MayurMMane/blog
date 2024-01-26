@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Blog</div>

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

                        <form action="{{ route('blogs.update', $blog->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                            </div>

                            <div class="form-group">
                                <label for="content">Content:</label>
                                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $blog->content) }}</textarea>
                            </div>

                            <div class="form-group">
                                <label for="category_id">Category:</label>
                                <select name="category_id" id="category_id" class="form-control" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success">Update Blog</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
