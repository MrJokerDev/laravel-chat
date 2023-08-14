<h1>Dashboard</h1>

<div class="w3-bar w3-black">
    @foreach($users as $user)
        <button class="w3-bar-item w3-button" onclick="openCity('{{$user->name}}')">{{$user->name}}</button>
    @endforeach
</div>
@foreach($users as $user)

<div id="{{$user->name}}" class="w3-container w3-display-container city w-50" style="display:none">
    <h2>{{$user->name}}</h2>

    @foreach($sortedData as $response)
        @if($response->admin_id == 1)
            <p style="text-align:end;"><b>admin ({{ $response->created_at->format('H:i:s') }}) :</b> {{ $response->message }}</p>
        @else
            <p style="text-align:start;"><b>{{ $user->name }} ({{ $response->created_at->format('H:i:s') }}) :</b> {{ $response->message }}</p>
        @endif
    @endforeach

    <form action="{{ route('setDashboard', $user->id) }}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}"/>
        <input type="text" name="message" placeholder="Сообщение" required>
        <button type="submit">Отправить</button>
    </form>
</div>

@endforeach
<script>
    function openCity(cityName) {
        var x = document.getElementsByClassName("city");

        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
        }
        document.getElementById(cityName).style.display = "block"; 
        document.getElementById(cityName).style.width = "25%";
    }
</script>
