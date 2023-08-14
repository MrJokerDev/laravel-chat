
<!DOCTYPE html>
<html>
<head>
    <title>Чат с техподдержкой</title>
</head>
<body>
    <h1>Чат с техподдержкой</h1>

    <div id="chatbox" style="width:25%;height: auto; overflow-y: scroll; border: 1px solid #ccc; padding: 10px;">
        @foreach($sortedData as $response)
            @if($response->admin_id == 1)
                <p style="text-align:end;"><b>admin ({{ $response->created_at->format('H:i:s') }}) :</b> {{ $response->message }}</p>
            @else
                <p style="text-align:start;"><b>{{ $user->name }} ({{ $response->created_at->format('H:i:s') }}) :</b> {{ $response->message }}</p>
            @endif
        @endforeach
    </div>

    <form action="{{ route('chat.store', $user->id) }}" method="post">
        @csrf
        <input type="hidden" name="user_id" value="{{ $user->id }}"/>
        <input type="text" name="message" placeholder="Сообщение" required>
        <button type="submit">Отправить</button>
    </form>
</body>
</html>
