@extends('layouts.master')
@section('content')
   <div class="container">
        <form action="{{route('user.login')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email" value="" >
            </div>
    
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" value="" >
            </div>
    
            <button type="submit">Sign In</button>
            
        </form>
    </div>
@endsection

