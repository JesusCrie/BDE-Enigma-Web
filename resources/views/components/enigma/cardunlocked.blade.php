<div class="h-full card hoverable"
     onclick="window.location = '{{ route('enigma.show', ['id' => $enigma['id']]) }}'">
    <h3 class="flex justify-between items-start">
        {{ $enigma['name'] }}
        <span class="container-center-v pill {{ $enigma['color'] }}">
            <i class="material-icons">star</i>&nbsp;{{ $enigma['difficulty'] }}
        </span>
    </h3>
</div>
