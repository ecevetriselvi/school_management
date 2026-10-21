@extends('layout')
@section('content')
<div class="container">
    <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <h1 class="text-center text-primary" style="font-size: 30px;">KV School</h1>
                <h1 class="text-center text-primary" style="font-size: 25px;">Student Management System</h1>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">Name</span>
                        <input type="text" name="name" placeholder="Username">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Password</span>
                        <input type="text" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
                    @if(session('error'))
                    <p>{{ session('error') }}</p>
                    @endif
                

            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>





</div>
@endsection