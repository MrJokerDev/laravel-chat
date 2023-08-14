<h1>Register</h1>

<form action="{{ route('user.register.set') }}" method="POST">
    @csrf
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name"><br>
    <input type="submit" value="Submit">
</form> 