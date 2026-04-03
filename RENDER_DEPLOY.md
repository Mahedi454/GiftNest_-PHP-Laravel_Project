## Render Deploy

This project is prepared for a free Render deployment using:

- one free web service
- one free Render Postgres database
- the default `onrender.com` domain

### Before deploy

1. Push this repo to GitHub.
2. In Render, create a new Blueprint and select this repo.
3. Render will read `render.yaml`.
4. When prompted, set:
   - `APP_URL` to your Render URL
   - `APP_KEY` to a Laravel app key

### Generate APP_KEY

Run locally:

```bash
php artisan key:generate --show
```

Copy the generated value into the `APP_KEY` environment variable in Render.

### First deploy

The blueprint will:

- create the web service
- create the free Postgres database
- run `php artisan migrate --force`
- start Laravel from `public/`

### After deploy

If you want starter data and the admin account, run this once in the Render shell:

```bash
php artisan db:seed --force
```

Admin login after seeding:

- `admin@giftnest.com`
- `password`
