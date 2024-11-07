<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container_style">
        <div class="wrapper">
            <a href="/"><span class="icon-close"><ion-icon name="close"></ion-icon></span></a>

            <div class="form-box login">
                <h2>Login</h2>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="input-box">
                        <span class="icon"><ion-icon name="call"></ion-icon></span>
                        <input type="tel" id="phone" name="phone" pattern="\d{1, 9}" maxlength="9" inputmode="numeric" style="padding-left: 50px" value="{{ old('phone') }}" required oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        <label>Phone number</label>
                        <span class="code">+998</span>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" id="password" name="password" required oninput="this.value = this.value.replace(/^\s+|\s+$/g, '');">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <label>Password</label>
                    </div>

                    <div class="error_style">
                        @if(session()->has('error'))
                            {{ session()->get('error') }}
                        @endif
                    </div>
                    <button type="submit" class="btn_style">Login</button>
                    <div class="login-register">
                        <p>Don't have an account?
                            <a href="/register" class="register-link">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
