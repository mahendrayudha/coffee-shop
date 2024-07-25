@extends('admin.partialsAuth.main')

@section('container')
    <div class="auth-page-wrapper pt-5">
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>
            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 pt-4 mb-4">
                            <div class="mb-sm-5 pb-sm-4 pb-5">
                                <img src="assets/admin/images/comingsoon.png" alt="" height="120"
                                    class="move-animation">
                            </div>
                            <div class="mb-5">
                                <h1 class="display-2 coming-soon-text">Coming Soon</h1>
                            </div>
                            <div>
                                <div class="row justify-content-center mt-5">
                                    <div class="col-lg-8">
                                        <div id="countdown" class="countdownlist"></div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <h4>We're preparing something amazing for you.</h4>
                                    <p class="text-muted">Stay tuned and be ready for the launch!</p>
                                </div>
                                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4 mx-auto my-4 mt-4">
                                    <a class="btn btn-success w-100" href="javascript:window.history.back()">
                                        Back to previous page
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.components.footer.index')
    </div>
@endsection
