
@extends('layout.app')

@section('content')

    <h2> {{ $title }} </h2>

    <div class="card">
        <form method="POST" action="{{ route($routeName) }}">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="password" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>

@endsection
