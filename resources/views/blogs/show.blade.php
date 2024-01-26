@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $blog->title }}</div>

                    <div class="card-body">
                        <p>{{ $blog->content }}</p>

                        <h3>Comments</h3>
                        @foreach($blog->comments as $comment)
                            <div class="comment">
                                <p>{{ $comment->content }}
                                <small class="text-muted">Posted {{ $comment->created_at->diffForHumans() }}</small></p>
                                <form action="{{ route('comments.destroy', ['blog' => $blog->id, 'comment' => $comment->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Comment</button>
                                </form>
                            </div>
                        @endforeach

                        <div class="card mt-3">
                            <div class="card-body">
                                <form action="{{ route('comments.store') }}" method="POST">
                                    @csrf
                                    <label for="content">Add Comment:</label>
                                    <textarea name="content" id="content" class="form-control" cols="30" rows="5"></textarea>
                                    <button type="submit" class="btn btn-primary mt-3">Add Comment</button>
                                    <input type="hidden" name='blogId' value='{{$blog->id}}'>
                                    <div class="text-center mt-3">
                                        <a href="{{ route('all_blogs') }}" class="btn btn-secondary">Back to All Blogs</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
