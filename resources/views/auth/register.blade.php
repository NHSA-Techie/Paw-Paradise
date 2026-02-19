<x-guest-layout>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #FF8C42 0%, #4A90E2 50%, #9013FE 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .register-wrapper {
      display: flex;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      overflow: hidden;
      width: 1000px;
      max-width: 95%;
    }

    .register-left {
      flex: 1;
      background: linear-gradient(135deg, rgba(255,140,66,0.9), rgba(74,144,226,0.9), rgba(144,19,254,0.9));
      color: #fff;
      padding: 60px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .register-left img {
      width: 100px;
      height: 100px;
      margin-bottom: 20px;
    }

    .register-left h1 {
      font-size: 34px;
      font-weight: 800;
      margin-bottom: 10px;
    }

    .register-left p {
      font-size: 16px;
      color: #f1f1f1;
    }

    .register-right {
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

    input {
      width: 100%;
      padding: 10px 14px;
      border-radius: 999px;
      border: 1px solid #ccc;
      outline: none;
      transition: 0.2s;
    }

    input:focus {
      border-color: #4A90E2;
      box-shadow: 0 0 0 3px rgba(74, 144, 226, 0.2);
    }

    .terms {
      font-size: 13px;
      margin-top: 10px;
      color: #555;
    }

    .btn-register {
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

    .btn-register:hover {
      filter: brightness(1.1);
      box-shadow: 0 4px 15px rgba(144, 19, 254, 0.3);
      transform: translateY(-2px);
    }

    .login-text {
      text-align: center;
      margin-top: 24px;
      font-size: 14px;
    }

    .login-text a {
      color: #FF8C42;
      font-weight: 600;
      text-decoration: none;
    }

    .login-text a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .register-wrapper {
        flex-direction: column;
      }
      .register-left {
        padding: 40px 20px;
      }
      .register-right {
        padding: 40px 20px;
      }
    }
  </style>

  <div class="register-wrapper">
    <!-- LEFT SIDE -->
    <div class="register-left">
      <img src="{{ asset('images/logo.png') }}" alt="Paws Paradise Logo">
      <h1>Join Paws Paradise</h1>
      <p>Where every paw finds comfort, care, and love 🐾</p>
    </div>

    <!-- RIGHT SIDE -->
    <div class="register-right">
      <x-validation-errors class="mb-4" />

      <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-3">
          <x-label for="name" value="{{ __('Name') }}" />
          <x-input id="name" class="block mt-1 w-full" type="text"
                   name="name" :value="old('name')" required autofocus autocomplete="name" />
        </div>

        <div class="mb-3 mt-3">
          <x-label for="email" value="{{ __('Email') }}" />
          <x-input id="email" class="block mt-1 w-full" type="email"
                   name="email" :value="old('email')" required autocomplete="username" />
        </div>

        <div class="mb-3 mt-3">
          <x-label for="phone" value="{{ __('Phone') }}" />
          <x-input id="phone" class="block mt-1 w-full" type="text"
                   name="phone" :value="old('phone')" required autocomplete="phone" />
        </div>

        <div class="mb-3 mt-3">
          <x-label for="password" value="{{ __('Password') }}" />
          <x-input id="password" class="block mt-1 w-full" type="password"
                   name="password" required autocomplete="new-password" />
        </div>

        <div class="mb-3 mt-3">
          <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
          <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                   name="password_confirmation" required autocomplete="new-password" />
        </div>

        @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
          <div class="terms mt-4">
            {!! __('I agree to the :terms_of_service and :privacy_policy', [
                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" style="color:#4A90E2;">'.__('Terms of Service').'</a>',
                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" style="color:#4A90E2;">'.__('Privacy Policy').'</a>',
            ]) !!}
          </div>
        @endif

        <button type="submit" class="btn-register">{{ __('Register') }}</button>

        <div class="login-text">
          Already have an account?
          <a href="{{ route('login') }}">Log in here</a>
        </div>
      </form>
    </div>
  </div>
</x-guest-layout>
