@extends('admin.partials.main')

@section('container')
    <div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
        <div class="bg-overlay"></div>
        <div class="auth-page-content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">
                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back!</h5>
                                    <p class="text-muted">Log in to continue to Velzon.</p>
                                </div>
                                @if (session()->has('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{ session('error') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endif
                                <div class="p-2 mt-4">
                                    <form action="/auth" method="POST" id="login-form">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="email" name="email" placeholder="Enter email" value="{{ old('email') }}">
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password">Password</label>
                                            <div class="position-relative auth-pass-inputgroup mb-3">
                                                <input type="password"
                                                    class="form-control pe-5 password-input @error('password') is-invalid @enderror"
                                                    placeholder="Enter password" id="password" name="password" value="{{ old('password') }}">
                                                <button
                                                    class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted shadow-none password-addon"
                                                    type="button" id="password-addon"><i
                                                        class="ri-eye-fill align-middle"></i></button>
                                                @error('password')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="float-end">
                                                <a href="#" class="text-muted">Forgot password?</a>
                                            </div>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="auth-remember-check">
                                            <label class="form-check-label" for="auth-remember-check">
                                                Remember me
                                            </label>
                                        </div>
                                        <div class="mt-4">
                                            <button id="login-btn" class="btn btn-success w-100" type="submit"
                                                onclick="onClickLogin(event)">
                                                Log In
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <div class="mt-3 text-center">
                                    <p class="mb-0">
                                        Don't have an account ?
                                        <a href="#" class="fw-semibold text-primary text-decoration-underline">
                                            Register now
                                        </a>
                                    </p>
                                </div>
                                <div class="mt-2 text-center">
                                    <p class="mb-0">
                                        Back to
                                        <a href="{{ route('home') }}"
                                            class="fw-semibold text-primary text-decoration-underline">
                                            home page
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Coffe Shop
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <script>
        function onClickLogin() {
            event.preventDefault(); // Mencegah form submit default

            var email = $('#email').val();
            var password = $('#password').val(); // Pastikan nama input adalah password

            if (email !== '' && password !== '') {
                $('#login-btn').val('Loading...');
                $('#login-form').submit();
            } else {
                if (email === '') {
                    $('#email').addClass('is-invalid');
                } else {
                    $('#email').removeClass('is-invalid');
                }

                if (password === '') {
                    $('#password').addClass('is-invalid');
                } else {
                    $('#password').removeClass('is-invalid');
                }
            }
        }
    </script>
@endsection
