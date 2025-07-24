<!DOCTYPE html>
<html>
<head>
    <title>Discord</title>
</head>
<body>
    <h1>Send message to channel</h1>

    <form method="POST" action="{{ route('discord.handle.submit') }}">
        @csrf

        <label for="message">Message:</label><br>
        <textarea name="message" id="message">{{ old('message') }}</textarea>
        @error('message')
            <p style="color:red;">{{ $message }}</p>
        @enderror

        <button type="submit">Send</button>
    </form>
</body>
</html>
