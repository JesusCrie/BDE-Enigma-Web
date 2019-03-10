@extends('layouts.app')

@section('content')
    <div class="container-screen-center">

        <div class="container-alone">

            <!-- Title -->
            <div class="big-title mb-10 lg:mb20">
                <h1>Register</h1>
            </div>

            <!-- Form -->
            <form action="{{ route('register') }}" method="post">
                @csrf

                <!-- Name -->
                <input id="name" type="text" name="name" placeholder="Name" value="{{ old('name') }}"
                       class="input-text {{ $errors->has('name') ? 'red' : 'blue' }}" required autofocus>

                @if ($errors->has('name'))
                    <label for="name" class="text-red float-right mt-2">
                        {{ $errors->first('name') }}
                    </label>
                @endif

                <br><br>

                <!-- Email -->
                <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                       class="input-text {{ $errors->has('email') ? 'red' : 'blue' }}" required>

                @if ($errors->has('email'))
                    <label for="email" class="text-red float-right mt-2">
                        {{ $errors->first('email') }}
                    </label>
                @endif

                <br><br>

                <!-- Password -->
                <input id="password" type="password" name="password" placeholder="Password"
                       class="input-text {{ $errors->has('password') ? 'red' : 'blue' }}" required>

                @if ($errors->has('password'))
                    <label for="password" class="text-red float-right mt-2">
                        {{ $errors->first('password') }}
                    </label>
                @endif

                <br><br>

                <!-- Password Confirmation -->
                <input id="password-confirm" type="password" name="password_confirmation" placeholder="Confirm password"
                       class="input-text blue" required>

                <br><br>

                <!-- Notice -->
                <p class="alert orange">
                    Ce site ne dispose pas de certificat SSL. Cela signifie que rien n'est encrypté entre votre navigateur
                    et le serveur. N'utilisez pas votre mot de passe de tous les jours.
                </p>

                <br>

                <!-- Submit -->
                <input type="submit" value="Register" class="btn blue-dark w-full">
            </form>
        </div>
    </div>
@endsection
