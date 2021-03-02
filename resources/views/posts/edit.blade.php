@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Post</div>

                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <ul>
                                    <li>{{ $error }}</li>
                                </ul>
                            @endforeach
                        </div>
                    @endif 

                    @if (session('post_updated'))
                        <div class="alert alert-success">
                            {{ session('post_updated') }}
                        </div>
                    @endif

                    <form action="{{ route('post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $post->title }}">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id">
                                @foreach ($categories as $category)
                                    @if ($category->id == $post->category_id)
                                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                    @else
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endif
                                @endforeach 
                            </select>
                        </div>

                        <div class="form-check">
                            @foreach ($tags as $tag)
                                <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                
                                @foreach ($post->tags as $ta)
                                    @if ($ta->id == $tag->id)
                                        checked
                                    @endif
                                @endforeach >
                                   {{ $tag->tag }} </label><br>
                            @endforeach    
                        </div>

                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea class="form-control" id="texteditor" rows="8" cols="8" name="content">{{ $post->content }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="featured">Photo</label>
                            <input type="file" name="featured" class="form-control-file" id="featured">
                        </div> 
                        @if (isset($post->featured))
                            <div class="mb-3">
                                <img src="{{$post->featured}}" width="100" alt="">
                            </div>
                        @endif                       
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
