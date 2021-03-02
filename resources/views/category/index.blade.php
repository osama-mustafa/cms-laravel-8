@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View All Categories</div>
                <div class="card-body">

                    {{-- Show Message When Category Created --}}
                    @if (session('category_created'))
                        <div class="alert alert-success" role="alert">
                            {{ session('category_created') }}
                        </div>
                    @endif

                    {{-- Show Message When Category Updated --}}
                    @if (session('category_updated'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('category_updated') }}
                        </div>
                    @endif

                    {{-- Show Message When Category Deleted --}}
                    @if (session('category_deleted'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('category_deleted') }}
                        </div>
                    @endif
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ route('category.edit', $category->id) }}"><i class="far fa-edit"></i> Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('category.delete',$category->id) }}" method="post">
                                            @csrf 
                                            @method('DELETE')                                            
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>
                                         </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>         
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
