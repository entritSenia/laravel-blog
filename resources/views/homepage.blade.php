<x-layout>
    <div class="login-page bg-image pt-8 pb-8 pt-md-12 pb-md-12 pt-lg-17 pb-lg-17"
        style="background-image: url('images/backgrounds/login-bg.jpg')">
        <div class="container">
            <div class="form-box">
                <div class="form-tab">
                    <ul class="nav nav-pills nav-fill" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link" id="signin-tab-2" data-toggle="tab"  role="tab"
                                aria-controls="signin-2" aria-selected="false">Log In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" id="register-tab-2" data-toggle="tab"
                                role="tab" aria-controls="register-2" aria-selected="true">Register</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade" id="signin-2" role="tabpanel" aria-labelledby="signin-tab-2">
                            <form action="/login" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="singin-email-2">Username *</label>
                                    <input type="text" name="loginusername" class="form-control" id="singin-email-2"
                                        autocomplete="off" />
                                    @error('loginusername')
                                        <p class="m-0 alert alert-danger shadow-sm">{{ $message }}</p>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="singin-password-2">Password *</label>
                                    <input type="password" name="loginpassword" class="form-control"
                                        id="singin-password-2" />
                                    @error('loginpassword')
                                        <p class="m-0 alert alert-danger shadow-sm">{{ $message }}</p>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-footer border-0 pb-0 mb-0">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>LOG IN</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    {{-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="signin-remember-2">
                                        <label class="custom-control-label" for="signin-remember-2">Remember Me</label>
                                    </div><!-- End .custom-checkbox -->

                                    <a href="#" class="forgot-link">Forgot Your Password?</a> --}}
                                </div><!-- End .form-footer -->
                            </form>
                            {{-- <div class="form-choice">
                                <p class="text-center">or sign in with</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google
                                        </a>
                                    </div><!-- End .col-6 -->
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice --> --}}
                        </div><!-- .End .tab-pane -->
                        <div class="tab-pane fade show active" id="register-2" role="tabpanel"
                            aria-labelledby="register-tab-2">
                            <form action="/register" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="username-register">Your username *</label>
                                    <input class="form-control" name="username" id="username-register" type="text"
                                        autocomplete="off" />
                                    @error('username')
                                        <p class="m-0 alert alert-danger shadow-sm">{{ $message }}</p>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="email-register">Your email address *</label>
                                    <input type="text" name="email" class="form-control" id="email-register"
                                        autocomplete="off" />
                                    @error('email')
                                        <p class="m-0 alert alert-danger shadow-sm">{{ $message }}</p>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="password-register">Password *</label>
                                    <input name="password" id="password-register" type="password"
                                        class="form-control" />
                                    @error('password')
                                        <p class="m-0 alert alert-danger shadow-sm">{{ $message }}</p>
                                    @enderror
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label for="password-register-confirm">Confirm Password *</label>
                                    <input name="password_confirmation" id="password-register-confirm" type="password"
                                        class="form-control">
                                    @error('password_confirmation')
                                        <p class="m-0 alert alert-danger shadow-sm">{{ $message }}</p>
                                    @enderror
                                </div><!-- End .form-group -->
                                <div class="form-footer border-0 pb-0 mb-0">
                                    <button type="submit" class="btn btn-outline-primary-2">
                                        <span>SIGN UP</span>
                                        <i class="icon-long-arrow-right"></i>
                                    </button>

                                    {{-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="register-policy-2"
                                            required>
                                        <label class="custom-control-label" for="register-policy-2">I agree to the <a
                                                href="#">privacy policy</a> *</label>
                                    </div><!-- End .custom-checkbox --> --}}
                                </div><!-- End .form-footer -->
                            </form>
                        </div>
                        {{-- <div class="form-choice">
                                <p class="text-center">or sign in with</p>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login btn-g">
                                            <i class="icon-google"></i>
                                            Login With Google
                                        </a>
                                    </div><!-- End .col-6 -->
                                    <div class="col-sm-6">
                                        <a href="#" class="btn btn-login  btn-f">
                                            <i class="icon-facebook-f"></i>
                                            Login With Facebook
                                        </a>
                                        {{ $postCount }} posts
                                    </div><!-- End .col-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .form-choice -->
                        </div><!-- .End .tab-pane --> --}}
                    </div><!-- End .tab-content -->
                </div><!-- End .form-tab -->
            </div><!-- End .form-box -->
        </div><!-- End .container -->
    </div><!-- End .login-page section-bg -->

</x-layout>
