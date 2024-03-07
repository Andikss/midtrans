@extends('index')
@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
@endpush
@section('content')
    <div class="container">

        <div class="circle-1"></div>
        <div class="circle-2"></div>

        <div class="card shadow" style="width: 480px">
            <div class="card-body">
                <form id="login-form" action="login">
                    <div class="row">
                        <div class="col-12">
                            <img src="https://th.bing.com/th/id/OIP.qxPEfP8Zlo62OfnmTzEoGwAAAA?rs=1&pid=ImgDetMain"
                                alt="App Logo" width="40%">
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="email" class="form-label"><small>email</small></label>
                        <input type="email" id="email" name="email" class="form-control"
                            placeholder="Enter your email">
                    </div>
                    <div class="mb-5">
                        <label for="password" class="form-label"><small>password</small></label>
                        <div class="input-group form-control">
                            <input type="password" class="form-control" id="password" placeholder="Enter your password"
                                name="password" required>
                            <a id="togglePassword">
                                <i class="bi bi-eye"></i>
                            </a>
                        </div>
                    </div>

                    <button type="submit" class="btn-login shadow-sm w-100">Sign-in</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $("#login-form").on("submit", function(e) {
                e.preventDefault();

                var form = $(this);
                var submitButton = form.find('button[type="submit"]');
                var actionUrl = form.attr("action");

                submitButton.html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading...'
                );

                $.post({
                    url: actionUrl,
                    data: form.serialize(),
                    success: function(response) {
                        let accessToken = response.token;
                        localStorage.setItem("access_token", accessToken);

                        Swal.fire("Great!", response.message, "success").then(() => {
                            window.location.href = "/";
                        });
                    },

                    error: function(xhr, status, error) {
                        console.log(xhr, status, error);
                        let message = xhr.responseJSON.message;
                        Swal.fire("Oops!", message, "error");
                    },
                    complete: function() {
                        submitButton.html('Login <i class="bi bi-box-arrow-in-right"></i>');
                    },
                });
            });

            $("#togglePassword").click(function() {
                var passwordInput = $("#password");
                var icon = $("#togglePassword i");

                passwordInput.attr(
                    "type",
                    passwordInput.attr("type") === "password" ? "text" : "password"
                );

                icon.toggleClass("bi-eye bi-eye-slash");
            });
        });
    </script>
@endpush
