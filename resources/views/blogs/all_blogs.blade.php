@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">All Blogs</h1>

        @foreach($blogs as $blog)
            <div class="card mb-4">
                <div class="card-header bg-primary text-white">
                    {{ $blog->title }}
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $blog->content }}</p>
                </div>
                <div class="card-footer">
                    <h5 class="mb-3">Comments:</h5>
                    @foreach($blog->comments as $comment)
                        <div class="media mb-3">
                            <div class="media-body">
                                <p class="mb-1">{{ $comment->content }}</p>
                                <small class="text-muted">Posted {{ $comment->created_at->diffForHumans() }}</small>
                                <form action="{{ route('comments.destroy', ['blog' => $blog->id, 'comment' => $comment->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger ml-2" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="content">Add Comment:</label>
                            <textarea name="content" id="content" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                        <input type="hidden" name='blogId' value='{{ $blog->id }}'>
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
