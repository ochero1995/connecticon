@extends('layouts.master')

@section('title')

    Welcome

@endsection

@section('content')


    <div class="jumbotron text-xs-center">
        <h1>Welcome to Connecticon</h1> 
        <p>Connecticon is an up and comming forum where you can share your thoughts with other users.</p> 
    </div>

    @include('includes.messageblock')
    
    <div class="container">

    <div class="row">
        
        <div class="col-md-6 m-t-1">
            <h3>Sign Up</h3>
            <form action="{{ route('signup') }}" method="post">
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input class="form-control"  type="text" name="email" id="email" value="{{ Request::old('email') }}" placeholder="e.g jane.doe@example.com">                    
                </div>

                <div class="form-group {{ $errors->has('first_namef') ? 'has-danger' : '' }}">
                    <label for="first_name">Your First Name</label>
                    <input class="form-control"  type="text" name="first_name" id="first_name" value="{{ Request::old('first_name') }}" placeholder="e.g Jane">                    
                </div>

                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control"  type="password" name="password" id="password" value="{{ Request::old('password') }}" placeholder="Min-6 characters">                    
                </div>

                <button type="submit" class="btn btn-primary m-b-3">Sign Up</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">

            </form>            
        
        </div>

        <div class="col-md-6 m-t-1">
            <h3>Sign In</h3>

            <form action="{{ route('signin') }}" method="post">
                <div class="form-group">
                    <label for="email">Your E-mail</label>
                    <input class="form-control"  type="text" name="email" id="email" placeholder="Email you signed up with">                    
                </div>

                
                <div class="form-group">
                    <label for="password">Your Password</label>
                    <input class="form-control"  type="password" name="password" id="password" value="{{ Request::old('password') }}" placeholder="Password you signed up with">                    
                </div>

                <button type="submit" class="btn btn-primary m-b-3">Sign In</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">

            </form>            
        
        </div>
    
    </div>

    </div>

@endsection