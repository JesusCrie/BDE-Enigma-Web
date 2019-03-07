@extends('layouts.app')

@section('content')
    <div class="container-screen-center">

        <div class="container-home">
            <!-- Title -->
            <div class="big-title mb-10 lg:mb-20">
                <h1>BDE DDOS</h1>
            </div>

            <!-- Challenge Submission -->
            <form action="{{ route('enigma.unlock') }}" method="get" class="flex flex-no-wrap">
                @csrf
                <input id="code" type="text" name="code" placeholder="Entrez un code" value="{{ old('code') }}"
                       class="input-text big {{ $errors->has('code') ? 'red' : 'blue' }}" required autofocus>

                <button type="submit" class="container-flex-center btn blue-dark ml-4">
                    <i class="material-icons">arrow_forward</i>
                </button>

            </form>

            @if ($errors->has('code'))
                <br>
                <label for="code" class="text-red">
                    {{ $errors->first('code') }}
                </label>
            @endif
        </div>
    </div>
@endsection
