# BDE-Enigma-Web

Setup every dependencies and generate app key with
```sh
npm run setup
```

Then modify `.env` with the correct credentials for the database.

Start the server when ready
```sh
php artisan serve
```

Rebuild the assets with
```sh
npm run dev
# or
npm run prod
```

Alternatively, you can automatically rebuild them when edited with
```sh
npm run watch
```
