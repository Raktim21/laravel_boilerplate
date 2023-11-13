{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('admin.login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}



















<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="{{ asset('admin_dashboard/assets/images/favicon/favicon.png') }}" type="image/x-icon">
            <link rel="shortcut icon" href="{{ asset('admin_dashboard/assets/images/favicon/favicon.png') }}" type="image/x-icon">
            <title>Admin Login</title>
            <!-- Google font-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
            <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/vendors/font-awesome.css') }}">
            <!-- ico-font-->
            <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/vendors/icofont.css') }}">
            <!-- Themify icon-->
            <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/vendors/themify.css') }}">
            <!-- Flag icon-->
            <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/vendors/flag-icon.css') }}">
            <!-- Feather icon-->
            <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/vendors/feather-icon.css') }}">
            <!-- Plugins css start-->
            <!-- Plugins css Ends-->
            <!-- Bootstrap css-->
            <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/vendors/bootstrap.css') }}">
            <!-- App css-->
            <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/style.css') }}">
            <link id="color" rel="stylesheet" media="screen" href="{{ asset('admin_dashboard/assets/css/color-1.css') }}">
            <!-- Responsive css-->
            <link rel="stylesheet" type="text/css" href="{{ asset('admin_dashboard/assets/css/responsive.css') }}">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        </head>
        <body class="dark-only">
            <!-- Loader starts-->
            <div class="loader-wrapper">
                <div class="loader"></div>
            </div>
            <!-- Loader ends-->
            <!-- login page start-->
            <div class="container-fluid p-0">
                <div class="row m-0">
                    <div class="col-12 p-0">    
                        <div class="login-card">
                            <div>
                                <div>
                                    <a class="logo" href="index.html">
                                        <img class="img-fluid for-light" src="{{ asset('admin_dashboard/assets/images/logo/login.png') }}" alt="loginpage">
                                    </a>
                                </div>
                                <div class="login-main"> 
                                    <form action="{{ route('admin.login') }}" method="POST" class="theme-form">
                                        @csrf
                                        <h4 class="text-center">Sign in to account</h4>
                                        <p class="text-center">Enter your email & password to login</p>
                                        <div class="form-group">
                                            <label class="col-form-label">Email Address</label>
                                            <input class="form-control" type="email" name="email" required="" placeholder="Test@gmail.com">
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Password</label>
                                            <div class="form-input position-relative">
                                                <input class="form-control" type="password" name="password" required="" placeholder="*********">
                                                <div class="show-hide">
                                                    <span class="show"> </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-0">
                                            {{-- <div class="checkbox p-0">
                                                <input id="checkbox1" type="checkbox">
                                                <label class="text-muted" for="checkbox1">Remember password</label>
                                            </div> --}}
                                            {{-- <a class="link" href="forget-password.html">Forgot password?</a> --}}
                                            <div class="text-end mt-3">
                                                <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                            </div>
                                        </div>
                                        {{-- <div class="login-social-title">
                                            <h6>Or Sign in with</h6>
                                        </div> --}}
                                        {{-- <div class="form-group">
                                            <ul class="login-social">
                                            <li><a href="https://www.linkedin.com" target="_blank"><i data-feather="linkedin"></i></a></li>
                                            <li><a href="https://www.twitter.com" target="_blank"><i data-feather="twitter"></i></a></li>
                                            <li><a href="https://www.facebook.com" target="_blank"><i data-feather="facebook"></i></a></li>
                                            <li><a href="https://www.instagram.com" target="_blank"><i data-feather="instagram"></i></a></li>
                                            </ul>
                                        </div> --}}
                                        {{-- <p class="mt-4 mb-0 text-center">Don't have account?<a class="ms-2" href="sign-up.html">Create Account</a></p> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>

            <!-- latest jquery-->
            <script src="{{ asset('admin_dashboard/assets/js/jquery-3.6.0.min.js') }}"></script>
            <!-- Bootstrap js-->
            <script src="{{ asset('admin_dashboard/assets/js/bootstrap/bootstrap.bundle.min.js') }}"></script>
            <!-- feather icon js-->
            <script src="{{ asset('admin_dashboard/assets/js/icons/feather-icon/feather.min.js') }}"></script>
            <script src="{{ asset('admin_dashboard/assets/js/icons/feather-icon/feather-icon.js') }}"></script>
            <!-- scrollbar js-->
            <!-- Sidebar jquery-->
            <script src="{{ asset('admin_dashboard/assets/js/config.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


            <script>
                toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-right",
                    "preventDuplicates": true,
                    "onclick": null,
                    "showDuration": "500",
                    "hideDuration": "1000",
                    "timeOut": "4000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                }
            </script>
            
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <script>
                        toastr.error('{{ $error }}');
                    </script>
                @endforeach
            @endif
            
            @if(session()->get('error'))
                <script>
                    toastr.error('{{ session()->get('error') }}');
                </script>
            @endif


            <!-- Plugins JS start-->
            <!-- Plugins JS Ends-->
            <!-- Theme js-->
            <script src="{{ asset('admin_dashboard/assets/js/script.js') }}"></script>
            <!-- login js-->
            <!-- Plugin used-->
        </body>
</html>