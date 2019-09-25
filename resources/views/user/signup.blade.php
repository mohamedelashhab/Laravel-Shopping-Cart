@extends('layouts.master')

@section('content')
    <div class="raw">
        <div class="col-mid-12">
        <form action="{{route('user.register')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" id="name" class="form-control" name="name" value="" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" class="form-control" name="email" value="" required>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" name="password" value="" required>
            </div>

            <button type="submit">Sign Up</button>
            
        </form>
    </div>
    </div>
@endsection
