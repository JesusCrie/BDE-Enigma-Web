<div class="card hoverable"
     onclick="window.location = '{{ route('enigma.step', [$enigma->id, $step->step]) }}'">
    <h3>{{ $name }}</h3>

    <br>

    <div class="flex justify-end">
        @if ($finished)
            <button class="btn blue-dark">
                Revoir
            </button>
        @else
            <button class="btn green-dark">
                D&eacute;marrer
            </button>
        @endif
    </div>
</div>
