@extends('layouts.app')

@section('content')
    <div class="container-large my-20">

        <!-- Title -->
        <h1 class="text-4xl">
            {{ $enigma->name }}
        </h1>

        <p class="separator"></p>

        <!-- Statistics -->
        <div class="flex flex-wrap text-sm">
            <span class="m-1 pill green">
                Responsable: {{ $enigma->owner }}
            </span>

            <span class="m-1 pill {{ $diffColor }}">
                Difficult&eacute;: {{ $enigma->difficulty }}
            </span>

            <span class="m-1 pill black-outer">
                Etapes: 5
            </span>

            <span class="m-1 pill blue-outer">
                Compl&eacute;t&eacute; 0 fois
            </span>
        </div>

        <br>

        <!-- Description -->
        <p class="text-base text-grey-dark">
            {{ $enigma->description }}
        </p>

        <!-- Steps -->
        <h2 class="mt-16 lg:mt-32 text-3xl">
            Etapes
            <span class="ml-1 pill green text-xl">
                2/5
            </span>
        </h2>

        <p class="separator"></p>

        <div class="flex flex-wrap">

            @foreach ($steps as $step)
                <div class="w-full lg:w-1/3 p-2">
                    @component('components.steps.card', ['enigma' => $enigma, 'step' => $step, 'finished' => !$loop->last])
                        @slot('name')
                            {{ $step->name }}
                        @endslot
                    @endcomponent
                </div>
            @endforeach

        </div>

    </div>
@endsection
