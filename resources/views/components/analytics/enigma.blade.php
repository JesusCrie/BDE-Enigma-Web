<div class="card p-2 lg:p-10 mb-4">
    <h2 id="{{ $enigma['id'] }}" class="text-3xl p-2 lg:p-0">
        {{ $enigma['id'] }} - {{ $enigma['name'] }}
    </h2>

    <p class="separator"></p>

    <div class="container-grid">
        <span class="container-center-v pill {{ $enigma['diffColor'] }} m-1">
            Difficulté: {{ $enigma['difficulty'] }}
        </span>

        <span class="container-center-v pill blue m-1">
            Etapes: {{ sizeof($enigma['steps']) }}
        </span>

        <span class="container-center-v pill blue-outer m-1">
            Commencé par: {{ $enigma['participants'] }} personnes
        </span>

        <span class="container-center-v pill blue-outer m-1">
            Complété par: {{ $enigma['winners'] }} personnes
        </span>

        <span class="container-center-v pill orange-outer m-1">
            Attrait: {{ $enigma['success_rate'] }}%
        </span>

        <span class="container-center-v pill orange-outer m-1">
            Taux de Completion: {{ $enigma['completion_rate'] }}%
        </span>

        <span class="container-center-v pill black-outer m-1">
            Débloqué par: {{ $enigma['unlocked_by'] }}
        </span>

    </div>

    <h2 class="text-2xl mt-10">
        Leaderboard
    </h2>

    <p class="separator"></p>

    <div class="container-grid">
        @foreach($enigma['steps'] as $step)
            <div class="container-row-2">
                @component('components.analytics.step', ['step' => $step])
                @endcomponent
            </div>
        @endforeach
    </div>
</div>
