@extends('layouts.app')

@section('content')
    <div class="container-home">

        <div class="lg:w-3/4 lg:mx-auto">
            <!-- Title -->
            <div class="big-title mb-10 lg:mb-20">
                <h1>BDE DDOS</h1>
            </div>

            <!-- Challenge Submission -->
            <form action="{{ route('enigma.unlock') }}" method="get" class="flex flex-no-wrap">

                <input id="code" type="text" name="code" placeholder="Entrez un code" value="{{ old('code') }}"
                       class="input-text big {{ $errors->has('code') ? 'red' : 'blue' }}" required autofocus>

                <button type="submit" class="container-center-hv btn blue-dark ml-4">
                    <i class="material-icons">arrow_forward</i>
                </button>

            </form>

            @if ($errors->has('code'))
                <br>
                <label for="code" class="text-red">
                    {!! $errors->first('code') !!}
                </label>
            @endif
        </div>

        <!-- Spacer -->
        <p class="m-20"></p>

        <div class="container-grid my-20">
            @foreach ($enigmas as $enigma)
                <div class="container-row-3">
                    @if ($enigma['unlocked'])
                        @component('components.enigma.cardunlocked', ['enigma' => $enigma])
                        @endcomponent
                    @else
                        @component('components.enigma.cardlocked')
                        @endcomponent
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection
