@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">View All Posts</div>
                <div class="card-body">

                    {{-- Show Message When Post Created --}}
                    @if (session('post_created'))
                        <div class="alert alert-success" role="alert">
                            {{ session('post_created') }}
                        </div>
                    @endif

                    {{-- Show Message When Post Updated --}}
                    @if (session('post_updated'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('post_updated') }}
                        </div>
                    @endif

                    {{-- Show Message When Post Deleted --}}
                    @if (session('post_deleted'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('post_deleted') }}
                        </div>
                    @endif

                    {{-- Show Message When Post Restored --}}
                    @if (session('post_restored'))
                    <div class="alert alert-success" role="alert">
                        {{ session('post_restored') }}
                    </div>
                    @endif

                    @if ($posts->count() > 0)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Image</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Updated at</th>

                                {{-- Edit & Delete Posts For Admin Only --}}
                                @if (Auth::user()->admin)
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>
                                            <a href="{{ route('post.show', $post->slug) }}">
                                                {{ $post->title }}
                                            </a>
                                        </td>
                                        <td><img src="{{ $post->featured }}" alt="{{ $post->featured }}" width="120"></td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>{{ $post->updated_at }}</td>

                                        {{-- Edit & Delete Posts For Admin Only --}}
                                        @if (Auth::user()->admin)
                                            <td>
                                                <a class="btn btn-primary btn-sm" href="{{ route('post.edit', $post->id) }}"><i class="far fa-edit"></i> Edit</a>
                                            </td>
                                            <td>
                                                <form action="{{ route('post.delete', $post->id) }}" method="post"> 
                                                    @csrf 
                                                    @method('DELETE')                                            
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else 
                        <div>
                            There is no posts!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
