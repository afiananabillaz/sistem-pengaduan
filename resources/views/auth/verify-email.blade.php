<x-login-layout>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-6" style="margin-top: 100px;">
                <div id="auth-left">

                    <p>Terima kasih telah mendaftar! Sebelum memulai, silahkan verifikasi email Anda dengan mengklik tautan yang baru saja kami kirimkan melalui email kepada Anda. Jika Anda tidak menerima email tersebut, kami akan dengan senang hati mengirimkan email lain kepada Anda.</p>

                    @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                    @endif

                    <form action="{{ route('verification.send') }}" method="post">
                        @csrf
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Kirim Ulang Email Verifikasi</button>
                    </form>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-2">Logout</button>
                    </form>
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