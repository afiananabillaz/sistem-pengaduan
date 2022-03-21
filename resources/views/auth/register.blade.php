<x-login-layout>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6">
                <div id="auth-left">

                    <h2>Daftar Akun</h2>
                    <p>Silahkan Masukkan Data Anda</p>

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" class="form-control form-control-xl" placeholder="Email" required autofocus>
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="NPWP" required>
                            <div class="form-control-icon">
                                <i class="bi bi-pencil"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Nama Instansi" required>
                            <div class="form-control-icon">
                                <i class="bi bi-building"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Nomor Handphone" required>
                            <div class="form-control-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Password" required autocomplete="current-password">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Daftar</button>
                    </form>
                    <div class="text-center mt-5 text-lg">
                        <p class="text-gray-600">Sudah memiliki akun? <a href="{{ route('login') }}" class="font-bold">Login</a></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div>
                    <img src="{{ asset('img/illustration/5.png') }}" alt="Thumb" style="width: 80%; margin-top: 130px;">
                </div>
            </div>
        </div>

    </div>
</x-login-layout>