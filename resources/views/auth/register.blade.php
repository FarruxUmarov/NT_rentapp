<x-guest-layout>
    <div class="container_style">
        <div class="wrapper" style="height: 550px">
            <a href="/"><span class="icon-close"><ion-icon name="close"></ion-icon></span></a>

            <div class="form-box register">
                <h2>Register</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="input-box">
                        <span class="icon"><ion-icon name="person"></ion-icon></span>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required oninput="this.value = this.value.replace(/^\s+|\s+$/g, '');">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        <label>Username</label>
                    </div>
                    <div class="gender">
                        <label><input type="radio" id="gender" name="gender" value="male" required>Male</label>

                        <label><input type="radio" id="gender" name="gender" value="female" required>Female</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="call"></ion-icon></span>
                        <input type="tel" id="phone" name="phone" pattern="\d{1, 9}" maxlength="9" inputmode="numeric" style="padding-left: 50px" value="{{ old('phone') }}" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 9);">
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        <label>Phone number</label>
                        <span class="code">+998</span>
                    </div>
                    <div class="input-box">
                        <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                        <input type="password" id="password" name="password" minlength="4" required oninput="this.value = this.value.replace(/^\s+|\s+$/g, '');">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <label>Password</label>
                    </div>

                    <button type="submit" class="btn_style">Register</button>
                    <div class="login-register">
                        <p>Already have an account?
                            <a href="/login" class="login-link">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
