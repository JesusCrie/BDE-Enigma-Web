<div class="card">
    <h3 class="text-xl mb-5">
        {{ $step['step'] }}. {{ $step['name'] }}
    </h3>

    <table class="w-full table hoverable">
        <tr class="my-3">
            <th>Place</th>
            <th>Nom</th>
            <th>Date</th>
        </tr>

        @foreach($step['leaderboard'] as $score)
            <tr>
                <td>#{{ $loop->iteration }}</td>
                <td>{{ $score['name'] }}</td>
                <td>{{ $score['time'] }}</td>
            </tr>
        @endforeach

    </table>
</div>
