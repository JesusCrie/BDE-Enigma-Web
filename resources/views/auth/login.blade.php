@extends('layouts.app')

@section('content')
    <div class="container-screen-center">

        <div class="container-alone">

            <!-- Title -->
            <div class="big-title mb-10 lg:mb20">
                <h1>Connexion</h1>
            </div>

            <!-- Form -->
            <form action="{{ route('login') }}" method="post">
                @csrf

                <!-- Email -->
                <input id="email" type="email" name="email" placeholder="Email" value="{{ old('email') }}"
                       class="input-text {{ $errors->has('email') ? 'red' : 'blue' }}" required autofocus>

                @if ($errors->has('email'))
                    <label for="email" class="text-red float-right mt-2">
                        {{ $errors->first('email') }}
                    </label>
                @endif

                <br><br>

                <!-- Password -->
                <input id="password" type="password" name="password" placeholder="Mot de Passe"
                       class="input-text {{ $errors->has('password') ? 'red' : 'blue' }}" required>

                @if ($errors->has('password'))
                    <label for="password" class="text-red float-right mt-2">
                        {{ $errors->first('password') }}
                    </label>
                    <br>
                @endif

                <br><br>

                <!-- Remember me -->
                <input id="remember" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <label for="remember">
                    Se souvenir de moi
                </label>

                <br><br>

                <!-- Submit -->
                <input type="submit" value="Login" class="btn blue-dark w-full">
            </form>

        </div>
    </div>
@endsection
