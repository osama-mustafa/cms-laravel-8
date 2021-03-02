@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create User <br> <span style="color: red">*</span> Default Password for New Users is: password</div>
                    <div class="h5">
                            
                    </div>
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

                    {{-- Show Message To Create Tag Before Creating Any Post --}}
                    @if (session('create_tag_first'))
                        <div class="alert alert-info">
                            {{ session('create_tag_first') }}
                        </div>
                    @endif
                
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">User</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter User Name" autocomplete="off">
                        </div> 
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Enter User Email" autocomplete="off">
                        </div>                      

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
