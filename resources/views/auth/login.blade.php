<x-login-layout>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6">
                <div id="auth-left" style="margin-top: 40px;">

                    <h2>Selamat Datang</h2>
                    <p>Silahkan Masuk</p>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email" required autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Password" required autocomplete="current-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Masuk</button>
                    </form>
                    <div class="text-center mt-5 text-lg">
                        <p class="text-gray-600">Belum memiliki akun? <a href="{{ route('register') }}" class="font-bold">Daftar</a></p>
                        <p>
                            @if (Route::has('password.request'))
                            <a class="font-bold" href="{{ route('password.request') }}">Lupa Password?</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <img src="{{ asset('img/illustration/5.png') }}" alt="Thumb" style="width: 80%; margin-top: 80px;">
                </div>
            </div>
        </div>

    </div>
</x-login-layout>