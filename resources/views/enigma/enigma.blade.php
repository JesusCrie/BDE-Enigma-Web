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
            <span class="container-center-hv pill green m-1">
                <i class="material-icons lg:mr-1">person</i>
                <span class="capitalize">Responsable: {{ $owner }}</span>
            </span>

            <span class="m-1 pill {{ $diffColor }}">
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

        <!-- Description -->
        <p class="text-base text-grey-dark">
            {{ $enigma->description }}
        </p>

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
