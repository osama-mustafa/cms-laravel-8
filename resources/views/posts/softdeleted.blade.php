@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">All Deleted Posts</div>
                <div class="card-body">

                    {{-- Show Message When Post Restored --}}
                    @if (session('post_restored'))
                        <div class="alert alert-success" role="alert">
                            {{ session('post_restored') }}
                        </div>
                    @endif

                    {{-- Show Message When Post Deleted Forever --}}
                    @if (session('post_deleted_forever'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('post_deleted_forever') }}
                        </div>
                    @endif

                    @if ($posts->count() > 0)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Restore</th>
                                <th scope="col">Delete Forever!</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td><img src="{{ $post->featured }}" alt="{{ $post->featured }}" width="120"></td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ route('post.restore', $post->id) }}"><i class="fas fa-trash-restore"></i> Restore</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('post.hard.delete',$post->id) }}" method="post"> 
                                                @csrf 
                                                @method('DELETE')                                            
                                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else 
                        <div class="text-center">
                            There is no trashed posts!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
