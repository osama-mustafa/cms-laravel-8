@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Category</div>

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

                    @if (session('create_category_first'))
                        <div class="alert alert-info">
                            {{ session('create_category_first') }}
                        </div>
                    @endif

                    <form action="{{ route('category.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Category Name</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter Category Name" autocomplete="off">
                        </div>                      
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
