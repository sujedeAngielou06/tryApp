@php
    
@endphp

@extends('layouts.app')

@section('title', 'Settings')
@section('header', 'Settings')

@section('content')
    <h2>Settings</h2>
    <p class="text-muted">Update your settings</p>

    @if (session('success'))
     <div class="alert alert-success">{{ session('success') }}</div>  
    @endif

      <form method="POST" action="{{ url('/profile') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label">Firstname</label>
            <input type="text" name="firstname" class="form-control" value="{{ auth()->user()->firstname }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Lastname</label>
            <input type="text" name="lastname" class="form-control" value="{{ auth()->user()->lastname }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="{{ auth()->user()->email }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary rounded-pill">Update Profile</button>
    </form>
@endsection