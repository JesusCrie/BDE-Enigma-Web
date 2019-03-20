<div class="card">
    <h3 class="text-xl">
        {{ $step['step'] }}. {{ $step['name'] }}
    </h3>

    <div class="container-grid my-3">
        <span class="container-center-v pill blue-outer m-1">
            Complété par: {{ sizeof($step['leaderboard']) }} personnes
        </span>
    </div>

    <table class="w-full table hoverable">
        <tr class="my-3">
            <th>Place</th>
            <th>Nom</th>
            <th>Date</th>
        </tr>

        @foreach($step['leaderboard'] as $score)
            <tr class="{{ $loop->first ? 'bg-red-lightest' : '' }}">
                <td>#{{ $loop->iteration }}</td>
                <td>{{ $score['name'] }}</td>
                <td>{{ $score['time'] }}</td>
            </tr>
        @endforeach

    </table>
</div>
