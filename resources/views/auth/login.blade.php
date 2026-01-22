@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
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

                    <form method="POST" id="userForm">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>

                        {{-- <div class="col-md-6">
                            <label class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" name="password" id="password" class="form-control" required>
                                <button class="btn btn-outline-secondary" type="button"
                                    onclick="togglePassword('password', this)">👁</button>
                            </div>
                        </div> --}}

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                            <input type="password" class="form-control" name="password" id="password" required>
                            <button class="btn btn-outline-secondary" type="button"
                                onclick="togglePassword('password', this)">👁</button>
                        </div>
                        </div>
                        <button class="btn btn-primary w-100">Login</button>



                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- <script src="js/scripts.js"></script> --}}
    <script>
        $('#userForm').submit(function(e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('login.submit') }}",
                type: "POST",
                data: $(this).serialize(),
                success: function(response) {
                    // Handle success (e.g., redirect to dashboard)
                    //window.location.href = "/dashboard";
                    if (response === 'success') {
                        window.location.href = "/dashboard";
                    } else {
                        //alert('Login failed: ' + response);
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                            footer: '<a href="#">Why do I have this issue?</a>'
                        });
                    }
                },
                error: function(xhr) {
                    // Handle error (e.g., display error message)
                    //alert('Login failed: ' + xhr.responseJSON.message);
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                        footer: '<a href="#">Why do I have this issue?</a>'
                    });
                }
            });
        });
    </script>

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
