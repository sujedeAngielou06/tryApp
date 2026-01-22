@php
    // optional: session visit or other logic
@endphp

@extends('layouts.app')

@section('title', 'Management')
@section('header', 'Management')

@section('content')

    <h2>Management</h2>
    <p class="text-muted">Manage your users</p>

            <form method="GET" action="{{ route('users.index') }}" class="d-flex gap-5  my-4">
                <input type="text" name="q" value="{{ request('q') }}" class="form-control w-25"
                    placeholder="Search name/email">
                <button class="btn btn-outline-primary">Search</button>
            </form>

            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('users.store') }}" method="POST" class="mt-4">
                @csrf

                <div class="row g-3"> {{-- g-3 = gap between fields --}}

                    <div class="col-md-12">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">First Name</label>
                        <input type="text" name="firstname" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="lastname" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Password</label>
                        <div class="input-group">
                            <input type="password" name="password" id="password" class="form-control" required>
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="togglePassword('password', this)">👁</button>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Confirm Password</label>
                        <div class="input-group">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control" required>
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="togglePassword('password_confirmation', this)">👁</button>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <button class="btn btn-primary rounded-pill px-4">
                            Create User
                        </button>
                    </div>

                </div>
            </form>


            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif



            <table class="table table-bordered table-hover align-middle text-center mt-4">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Email</th>
                        <th>Joined</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users ?? [] as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at?->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" style="text-align:center;">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            @if (isset($users))
                <div style="margin-top:1rem;">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            @endif

            <script>
                function togglePassword(fieldId, btn) {
                    const input = document.getElementById(fieldId);

                    if (input.type === "password") {
                        input.type = "text";
                        btn.innerText = "👁";
                    } else {
                        input.type = "password";
                        btn.innerText = "👁";
                    }
                }
            </script>

@endsection
