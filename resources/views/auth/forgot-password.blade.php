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

    .forgot-wrapper {
      display: flex;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
      overflow: hidden;
      width: 900px;
      max-width: 95%;
    }

    .forgot-left {
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

    .forgot-left img {
      width: 100px;
      height: 100px;
      margin-bottom: 20px;
    }

    .forgot-left h1 {
      font-size: 32px;
      font-weight: 800;
      margin-bottom: 10px;
    }

    .forgot-left p {
      font-size: 16px;
      color: #f1f1f1;
    }

    .forgot-right {
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

    .btn-reset {
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

    .btn-reset:hover {
      filter: brightness(1.1);
      box-shadow: 0 4px 15px rgba(144, 19, 254, 0.3);
      transform: translateY(-2px);
    }

    .back-login {
      text-align: center;
      margin-top: 20px;
      font-size: 14px;
    }

    .back-login a {
      color: #FF8C42;
      font-weight: 600;
      text-decoration: none;
    }

    .back-login a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      .forgot-wrapper {
        flex-direction: column;
      }
      .forgot-left {
        padding: 40px 20px;
      }
      .forgot-right {
        padding: 40px 20px;
      }
    }
  </style>

  <div class="forgot-wrapper">
    <!-- LEFT SIDE -->
    <div class="forgot-left">
      <img src="{{ asset('images/logo.png') }}" alt="Paws Paradise Logo">
      <h1>Forgot Password?</h1>
      <p>Don’t worry — we’ll help you reset it quickly and securely 🐾</p>
    </div>

    <!-- RIGHT SIDE -->
    <div class="forgot-right">
      <x-validation-errors class="mb-4" />

      @session('status')
      <div class="mb-4 font-medium text-sm text-green-600">
        {{ $value }}
      </div>
      @endsession

      <div class="mb-4 text-sm text-gray-600">
        {{ __('Enter your email address below, and we’ll send you a link to reset your password.') }}
      </div>

      <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3">
          <x-label for="email" value="{{ __('Email Address') }}" />
          <x-input id="email" class="block mt-1 w-full" type="email"
                   name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <button type="submit" class="btn-reset">
          {{ __('Email Password Reset Link') }}
        </button>
      </form>

      <div class="back-login">
        <a href="{{ route('login') }}">← Back to Login</a>
      </div>
    </div>
  </div>
</x-guest-layout>
