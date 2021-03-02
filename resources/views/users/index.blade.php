@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Users</div>
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

                    {{-- Show Message When User Created --}}
                    @if (session('user_created'))
                        <div class="alert alert-success" role="alert">
                            {{ session('user_created') }}
                        </div>
                    @endif

                    @if ($users->count() > 0)
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Avatar</th>
                                <th scope="col">Created at</th>
                                <th scope="col">Updated at</th>
                                <th scope="col">Admin Status</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            @foreach ($profiles as $profile)
                                                @if ($profile->user_id == $user->id)
                                                    <img src="{{asset($profile->avatar)}}" class="image-thumbnail" width="50">
                                                @endif
                                            @endforeach
                                        </td>

                                        {{-- @foreach ($profiles as $profile)
                                        @if ($profile->user_id == $user->id)
                                            <td><img src="{{asset($profile->avatar)}}" class="image-thumbnail" width="50"></td>
                                        @endif
                                        @endforeach --}}
                                        <td>{{ $user->created_at }}</td>
                                        <td>{{ $user->updated_at }}</td>
                                        <td>
                                            @if ($user->admin)
                                            <a class="btn btn-danger" href="{{ route('users.not.admin', $user->id) }}">
                                                <i class="fas fa-lock"></i> Remove Admin
                                            </a>
                                            @endif
                                            @if (! $user->admin)
                                               <a class="btn btn-success" href="{{ route('users.admin', $user->id) }}">
                                                <i class="fas fa-lock-open"></i> Make Admin
                                                </a>  
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else 
                        <div>
                            There is no users!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
