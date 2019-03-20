@extends('layouts.app')

@section('content')
    <div class="container-large my-20">

        <!-- Title -->
        <h1 class="text-4xl">
            {{ $enigma->name }}
        </h1>

        <p class="separator"></p>

        <!-- Statistics -->
        <div class="container-grid text-sm">
            <span class="container-center-v pill green m-1">
                <i class="material-icons">person</i>&nbsp;
                <span class="capitalize">Responsable: {{ $owner }}</span>
            </span>

            <span class="container-center-v m-1 pill {{ $diffColor }}">
                <i class="material-icons">star</i>&nbsp;
                Difficult&eacute;: {{ $enigma->difficulty }}
            </span>

            <span class="m-1 pill black-outer">
                Etapes: {{ $stepsCount }}
            </span>

            <span class="m-1 pill blue-outer">
                Compl&eacute;t&eacute; par {{ count($enigma->completedBy()) }} personnes
            </span>
        </div>

        <br>

        <p class="alert blue">
            N'hesitez pas &agrave; contacter le responsable de l'&eacute;nigme si vous &ecirc;tes bloqu&eacute; !
        </p>

        <br>

        <!-- Description -->
        @if (substr($enigma->description, 0, 2) === '!!')
            @component(substr($enigma->description, 2), ['enigma', $enigma])
            @endcomponent
        @else
            <p class="description">
                {{ $enigma->description }}
            </p>
        @endif

        <!-- Steps -->
        <h2 class="mt-16 lg:mt-32 text-3xl">
            Etapes
            <span class="ml-1 pill {{ $completed ? 'green' : 'blue-outer' }} text-xl">
                {{ $completed ? $stepsCount : count($steps) - 1 }}/{{ $stepsCount }}
            </span>
        </h2>

        <p class="separator"></p>

        <div class="container-grid">

            @foreach ($steps as $step)
                <div class="container-row-3">
                    @component('components.steps.card', ['enigma' => $enigma, 'step' => $step, 'finished' => !$loop->last || $completed])
                        @slot('name')
                            {{ $step->name }}
                        @endslot
                    @endcomponent
                </div>
            @endforeach

        </div>

    </div>
@endsection
