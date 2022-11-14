@section('title', 'Login')
@include('main')
<style>
    .logo-kpru{
    width: 200px;
}
</style>


<body class="cat__pages__login">
    <!-- START: pages/login -->
    <div class="cat__pages__login cat__pages__login--fullscreen"
        style="background-image: url('https://e-student.kpru.ac.th/web2016/img/blur-background05.jpg?fbclid=IwAR2TxsipUFjrqSfiCbB7hW2Nka3elCrc3VEsGrWhLoS5WpWb2WYbe5Zhtao')">
        <div class="cat__pages__login__block">
            <div class="row">
                <div class="col-xl-12">
                    {{-- <img src="{{ asset('img/logo-kpru.png') }}" class="logo-kpru" alt="logo"> --}}
                    <div class="cat__pages__login__block__promo text-white text-center">
                        <img src="{{ asset('img/logo-kpru.png') }}" class="logo-kpru" alt="logo">
                    </div>
                    <div class="cat__pages__login__block__inner">
                        <div class="cat__pages__login__block__form">
                            <h4 class="text-uppercase">
                                <strong>Please log in</strong>
                            </h4>
                            <br />
                            @if (isset(Auth::user()->email))
                                <script>
                                    window.location = "/main/dashboard"
                                </script>
                            @endif
                            @if ($message = Session::get('error'))
                                <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">x</button>
                                    <strong>{{ $message }}</strong>
                                </div>
                            @endif
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form id="form-validation" name="form-validation" method="POST"
                                action="{{ route('login') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input id="validation-email" class="form-control" placeholder="Email or Username"
                                        name="email" type="text" data-validation="[NOTEMPTY]">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Password</label>
                                    <input id="validation-password" class="form-control password" name="password"
                                        type="password" data-validation="[L>=6]"
                                        data-validation-message="$ must be at least 6 characters"
                                        placeholder="Password">
                                </div>

                                <div class="form-actions">
                                    <button type="submit" class="btn btn-primary mr-3" name="login"
                                        value="login">Sign In</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cat__pages__login__footer text-center">
            <ul class="list-unstyled list-inline">
                <li class="list-inline-item"><a href="javascript: void(0);">Terms of Use</a></li>
                <li class="active list-inline-item"><a href="javascript: void(0);">Compliance</a></li>
                <li class="list-inline-item"><a href="javascript: void(0);">Confidential Information</a></li>
                <li class="list-inline-item"><a href="javascript: void(0);">Support</a></li>
                <li class="list-inline-item"><a href="javascript: void(0);">Contacts</a></li>
            </ul>
        </div>
    </div>
    <!-- END: pages/login-alpha -->

    <!-- START: page scripts -->
    <script>
        $(function() {

            // Form Validation
            $('#form-validation').validate({
                submit: {
                    settings: {
                        inputContainer: '.form-group',
                        errorListClass: 'form-control-error',
                        errorClass: 'has-danger'
                    }
                }
            });

            // Show/Hide Password
            $('.password').password({
                eyeClass: '',
                eyeOpenClass: 'icmn-eye',
                eyeCloseClass: 'icmn-eye-blocked'
            });

        });
    </script>
    <!-- END: page scripts -->
</body>
