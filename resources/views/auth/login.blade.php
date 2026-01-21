@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="d-flex justify-content-center" style="padding-left: 500px; min-height: 80vh; align-items: center;">
    <div class="col-md-4">
        <div class="card shadow-sm">
            <div class="card-header text-center">
                <h4>Login</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        {{ $errors->first() }}
                    </div>
                @endif

                <form method="POST" action="{{ url('/login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" id="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
