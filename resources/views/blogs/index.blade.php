@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Blogs</div>

                    <div class="card-body">
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Content</th>
                                    <th>Category</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($blogs as $blog)
                                    <tr>
                                        <td>{{ $blog->title }}</td>
                                        <td>{{ $blog->content }}</td>
                                        <td>{{ $blog->category->name }}</td>
                                        <td>
                                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-info">View</a>
                                            <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('blogs.destroy', $blog->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <a href="{{ route('blogs.create') }}" class="btn btn-success">Create Blog</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
