# Basic Discord message bot

## Description

This is a really basic example on how to send a message with discord using discords REST api. It will be updated once more if I feel like it. 
Please note that there are wrappers an/or other solutions around which provide much more flexibility.

please note I make use of:

```php
->withOptions(['verify' => false])
```
this is only used for testing. Never use this for production!

## Instruction

Add the following information inside the .env file:

```env
DISCORD_BOT_TOKEN=
DISCORD_CHANNEL_ID=
```

### Receive token

The token can be retrieved by going to https://discord.com/developers/applications
from here you can create a new bot and receive the token Id. or generate a new one
by going to the bot section page and click on `reset token` You now receive the token. 
Set this token in the env for example: `DISCORD_BOT_TOKEN=re89ryu9e8wry9ew`

### Add bot to channel and receive channel id

1. Go to the OAuth2 > URL Generator tab.
2. Select under scopes section: ✅ bot
3. Select under bot permissions section: ✅ Send Messages
4. copy generated url and paste in browser
5. The last id in the url for example `32324245543` is your channel id 
6. Set this id on the env for example: `DISCORD_CHANNEL_ID=32324245543`
5. Open the generated link and give permission to add bot to your channel

### finishing touch

When you have everything set, use the `php artisan serve` command to launch the application and send a message to discord through the simple form