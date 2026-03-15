<x-guest-layout>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #FF8C42 0%, #4A90E2 50%, #9013FE 100%);
      min-height: 100vh;
      margin: 0;
      padding: 40px 0;
    }

    .login-wrapper {
      display: flex;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      overflow: hidden;
      width: 950px;
      max-width: 95%;
      margin: auto;
    }

    .login-left {
      flex: 1;
      background: linear-gradient(135deg, rgba(255,140,66,0.9), rgba(74,144,226,0.9), rgba(144,19,254,0.9));
      color: #fff;
      padding: 50px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .login-left img {
      width: 100px;
      height: 100px;
      margin-bottom: 20px;
    }

    .login-left h1 {
      font-size: 36px;
      font-weight: 800;
      line-height: 1.2;
      margin-bottom: 10px;
    }

    .login-left p {
      font-size: 16px;
      color: #f1f1f1;
    }

    .login-right {
      flex: 1;
      padding: 50px;
      background: #fdfdfd;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    form {
      width: 100%;
    }

    label {
      font-weight: 600;
      margin-bottom: 6px;
      display: inline-block;
      color: #333;
    }

    .input-field {
      width: 100%;
      padding: 10px 14px;
      border-radius: 999px;
      border: 1px solid #ccc;
      outline: none;
      transition: 0.2s;
    }

    .input-field:focus {
      border-color: #4A90E2;
      box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
    }

    .remember {
      display: flex;
      align-items: center;
      gap: 6px;
      margin-top: 10px;
    }

    .btn-login {
      background: linear-gradient(135deg, #4A90E2, #9013FE);
      color: #fff;
      border: none;
      border-radius: 999px;
      width: 100%;
      padding: 12px;
      font-weight: 600;
      margin-top: 20px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .btn-login:hover {
      filter: brightness(1.1);
      box-shadow: 0 4px 15px rgba(74, 144, 226, 0.4);
      transform: translateY(-2px);
    }

    .forgot {
      text-align: right;
      margin-top: 10px;
    }

    .forgot a {
      color: #4A90E2;
      font-size: 14px;
      text-decoration: none;
    }

    .register-text {
      text-align: center;
      margin-top: 24px;
      font-size: 14px;
    }

    .register-text a {
      color: #FF8C42;
      font-weight: 600;
      text-decoration: none;
    }

    @media (max-width: 768px) {
      .login-wrapper {
        flex-direction: column;
        width: 90%;
        margin: auto;
      }

      .login-left {
        padding: 30px 20px;
      }

      .login-right {
        padding: 30px 20px;
      }

      .login-left h1 {
        font-size: 28px;
      }
    }
  </style>

  <div class="login-wrapper">
    <div class="login-left">
      <img src="{{ asset('images/logo.png') }}" alt="Paws Paradise Logo">
      <h1>Paws Paradise</h1>
      <p>Comfort, Safety & Love for Every Paw 🐾</p>
    </div>

    <div class="login-right">
      <x-validation-errors class="mb-4" />

      @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
          {{ session('status') }}
        </div>
      @endif

      <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
          <x-label for="email" value="{{ __('Email Address') }}" />
          <x-input id="email" class="input-field block mt-1 w-full" type="email" name="email"
                   :value="old('email')" required autofocus />
        </div>

        <div class="mb-3 mt-4">
          <x-label for="password" value="{{ __('Password') }}" />
          <x-input id="password" class="input-field block mt-1 w-full" type="password"
                   name="password" required autocomplete="current-password" />
        </div>

        <div class="remember mt-3">
          <x-checkbox id="remember_me" name="remember" />
          <span class="text-sm text-gray-600">{{ __('Remember me') }}</span>
        </div>

        <div class="forgot">
          @if (Route::has('password.request'))
            <a href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
          @endif
        </div>

        <button type="submit" class="btn-login">{{ __('Log in') }}</button>

        <div class="register-text">
          Don’t have an account? <a href="{{ route('register') }}">Register now</a>
        </div>
      </form>
    </div>
  </div>
</x-guest-layout>