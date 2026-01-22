@extends('layouts.app')

@section('title', 'Dashboard')
@section('header', 'Dashboard')
@section('content')
    <h2>Welcome Back User!</h2>
    <p class="text-muted">This is your dashboard overview.</p>

    <div class="row mt-4">

        <div class="col-md-4">
            <div class="card shadow-sm rounded-4">
                <div class="card-body">
                    <h6>Total Users</h6>
                    <p class="fw-semibold">{{ $userCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm rounded-4">
                <div class="card-body">
                    <h6>Email</h6>
                    <p class="fw-semibold">{{ auth()->user()->email }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm rounded-4">
                <div class="card-body">
                    <h6>Status</h6>
                    <span class="badge bg-success rounded-pill">Active</span>
                </div>
            </div>
        </div>


    </div>
@endsection
