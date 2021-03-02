@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Tag</div>

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

                    {{-- Show Message When Tag Updated --}}
                    @if (session('tag_updated'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('tag_updated') }}
                        </div>
                    @endif
                
                    <form action="{{ route('tag.update', $tag->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="tag">Tag Name</label>
                            <input type="text" class="form-control" name="tag" value="{{ $tag->tag }}">
                        </div>                      
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
