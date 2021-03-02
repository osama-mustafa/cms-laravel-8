@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Tag</div>

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

                    {{-- Show Message When Category Created --}}
                    @if (session('category_created'))
                        <div class="alert alert-success" role="alert">
                            {{ session('category_created') }}
                        </div>
                    @endif

                    {{-- Show Message To Create Tag Before Creating Any Post --}}
                    @if (session('create_tag_first'))
                        <div class="alert alert-info">
                            {{ session('create_tag_first') }}
                        </div>
                    @endif
                
                    <form action="{{ route('tag.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="tag">Tag Name</label>
                            <input type="text" class="form-control" name="tag" placeholder="Enter Tag Name">
                        </div>                      
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
