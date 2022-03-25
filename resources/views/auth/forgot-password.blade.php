<x-login-layout>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6" style="margin-top: 100px;">
                <div id="auth-left">

                    <p>Silahkan Masukkan Email Anda. Kami akan mengirimkan email untuk reset password.</p>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email" required autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Reset Password</button>
                    </form>
                    <div class="text-center mt-5 text-lg">
                        <p class="text-gray-600"><a href="{{ route('login') }}" class="font-bold">Masuk Kembali</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <img src="{{ asset('img/illustration/5.png') }}" alt="Thumb" style="width: 80%; margin-top: 65px;">
                </div>
            </div>
        </div>

    </div>
</x-login-layout>