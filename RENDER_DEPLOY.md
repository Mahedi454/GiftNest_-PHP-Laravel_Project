## Render Deploy

This project is prepared for a free Render deployment using:

- one free web service
- one free Render Postgres database
- the default `onrender.com` domain
- Docker runtime for Laravel on Render

### Before deploy

1. Push this repo to GitHub.
2. In Render, create a new Blueprint and select this repo, or create a Docker web service manually.
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
- build the Docker image
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

### Manual web service settings

If you create the web service manually:

- Runtime: `Docker`
- Root Directory: leave empty
- Dockerfile Path: `./Dockerfile`
- Region: use the same region as the database

Environment variables:

- `APP_ENV=production`
- `APP_DEBUG=false`
- `APP_URL=https://your-service-name.onrender.com`
- `APP_KEY=your-generated-laravel-key`
- `DB_CONNECTION=pgsql`
- `DATABASE_URL=<Render Internal Database URL>`
- `CACHE_STORE=file`
- `QUEUE_CONNECTION=sync`
- `SESSION_DRIVER=file`
- `SESSION_LIFETIME=120`
- `RUN_MIGRATIONS=true`
