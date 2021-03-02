@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Post</div>

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
                    <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" placeholder="Enter title" autocomplete="off">
                        </div>

                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach 
                            </select>
                        </div>

                        
                            <div class="form-check">
                                @foreach ($tags as $tag)
                                    <input class="form-check-input" type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                    <label class="form-check-label" for="tags[]">
                                        {{ $tag->tag }}
                                    </label><br>
                                @endforeach    
                            </div>
                        

                        <div class="form-group">
                            <label for="content">content</label>
                            <textarea class="form-control" id="texteditor" rows="8" cols="8" name="content"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="featured">Photo</label>
                            <input type="file" name="featured" class="form-control-file" id="featured">
                        </div>                        
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    tinymce.init({
        selector: '#texteditor',
        height:350,
    });
</script>

@endsection


    
