@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h4>
                      Welcome {{ Auth::user()->name }}<br>
                      {{ __('You are logged in!') }}  
                    </h4><br>


                    <div class="container">
                        <div class="row">
                          <div class="col-sm">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Posts</div>
                                <div class="card-body">
                                    <a style="color: #fff" href="{{ route('posts.index') }}">
                                        <h5 class="card-title">{{ $posts_count }}</h5>
                                    </a> 
                                </div>
                            </div>
                          </div>
                          <div class="col-sm">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Users</div>
                                <div class="card-body">
                                  <a style="color: #fff" href="{{ route('users') }}">
                                      <h5 class="card-title">{{ $users_count }}</h5>
                                  </a> 
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>

                   
                    <div class="container">
                        <div class="row">
                          <div class="col-sm">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Tags</div>
                                <div class="card-body">
                                    <a style="color: #fff" href="{{ route('tags') }}">
                                        <h5 class="card-title">{{ $tags_count }}</h5>
                                    </a> 
                                </div>
                              </div>
                          </div>
                          <div class="col-sm">
                            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                                <div class="card-header">Categories</div>
                                <div class="card-body">
                                    <a style="color: #fff" href="{{ route('category.index') }}">
                                        <h5 class="card-title">{{ $categories_count }}</h5>
                                    </a> 
                                </div>
                            </div>
                          </div>

                        </div>
                      </div>      
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
