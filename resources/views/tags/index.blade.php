@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">View All Tags</div>
                <div class="card-body">

                    {{-- Show Message When Tag Deleted --}}
                    @if (session('tag_deleted'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('tag_deleted') }}
                        </div>
                    @endif

                    @if ($tags->count() > 0)
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
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->tag }}</td>
                                        <td>
                                            <a class="btn btn-primary btn-sm" href="{{ route('tag.edit', $tag->id) }}"><i class="far fa-edit"></i> Edit</a>
                                        </td>
                                        <td>
                                            <form action="{{ route('tag.delete',$tag->id) }}" method="post">
                                                @csrf 
                                                @method('DELETE')                                            
                                                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i> Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table> 
                    @else 
                        <p>No Tags!</p>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
