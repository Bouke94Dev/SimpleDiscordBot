<!DOCTYPE html>
<html>
<head>
    <title>Discord</title>
</head>
<body>
    <h1> Discord </h1>
    <h2>Send message to channel</h2>
    <form method="POST" action="{{ route('discord.handle.submit') }}">
        @csrf

        <label for="message">Message:</label><br>
        <textarea name="message" id="message"></textarea>

        <button type="submit">Send</button>
    </form>
    @if (session('success'))
        <p>{{ session('success') }} </p>
    @endif
</body>
</html>
