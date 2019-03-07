<div class="p-4 rounded-lg border-2 cursor-pointer border-grey hover:bg-grey-lighter tr-c-bc-eio"
     onclick="window.location = '{{ route('enigma.step', [$enigma->id, $step->step]) }}'">
    <h3>{{ $name }}</h3>

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
