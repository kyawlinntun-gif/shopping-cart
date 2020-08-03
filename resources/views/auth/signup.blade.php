@extends('layouts.master')

@section('title', 'Laravel Shopping Cart')

@section('content')

    <div class="signup">
        <div class="container">
            <div class="row">
                <div class="col-6 offset-3">
                    <h1>User SignUp</h1>
                    <form action="{{ url('register') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" name="name" value="{{ old('name') ? old('name') : '' }}" class="form-control">
                        </div>
                        @include('messages.errors.name')
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" value="{{ old('username') ? old('username') : '' }}" class="form-control">
                        </div>
                        @include('messages.errors.username')
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" id="email" name="email" value="{{ old('email') ? old('email') : '' }}" class="form-control">
                        </div>
                        @include('messages.errors.email')
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control">
                        </div>
                        @include('messages.errors.password')
                        <div class="form-group">
                            <label for="password_confirmation">Confirmed Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                        </div>
                        @include('messages.errors.password_confirmation')
                        <input type="submit" class="btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection