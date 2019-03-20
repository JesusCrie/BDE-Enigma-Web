@extends('layouts.app')

@section('content')
    <div class="container-large my-20">
        <h1 class="text-4xl">
            Analytics
        </h1>

        <p class="separator my-10"></p>

        <div class="container-grid">
            @foreach($enigmas as $enigma)
                <a href="#{{ $enigma['id'] }}" class="container-center-v btn blue-dark m-1">
                    {{ $enigma['id'] }}. {{ $enigma['name'] }}
                </a>
            @endforeach
        </div>

        <p class="separator my-10"></p>

        @foreach($enigmas as $enigma)
            @component('components.analytics.enigma', ['enigma' => $enigma])
            @endcomponent
        @endforeach


    </div>
@endsection
