@extends('layouts.master')

@section('title', 'Laravel Shopping Cart')

@section('content')

    <div class="signup">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    @include('messages.errors.fail')
                    <h1>User SignIn</h1>
                    <form action="{{ url('login') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="username">Username or E-mail</label>
                            <input type="text" id="username" name="username" value="{{ old('username') ? old('username') : '' }}" class="form-control">
                        </div>
                        @include('messages.errors.username')
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        @include('messages.errors.password_confirmation')
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection