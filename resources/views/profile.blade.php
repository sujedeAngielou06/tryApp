@php
    // optional: session visit or other logic
@endphp

@extends('layouts.app')

@section('title', 'Profile')
@section('header', 'Profile')

@section('content')
    <h2>Profile</h2>
    <p class="text-muted">Your profile information</p>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ url('/profile') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" readonly>Firstname</label>
            <label class="form-control border-primary border-bottom rounded-10 border-2">{{ auth()->user()->firstname }}</label>
        </div>

        <div class="mb-3">
            <label class="form-label" readonly>Lastname</label>
            <label class="form-control border-primary border-bottom rounded-10 border-2">{{ auth()->user()->lastname }}</label>
        </div>

        <div class="mb-3">
            <label class="form-label" readonly>Email</label>
            <label class="form-control border-primary border-bottom rounded-10 border-2">{{ auth()->user()->email }}</label>
        </div>
        
    </form>

@endsection
