## GiftNest (E-commerce Gift Shop)

This workspace currently contains the **GiftNest project structure + UI skeleton** (routes/controllers/views/assets) based on your PRD.

### Requirements to run (Laravel)
- PHP 8.2+
- Composer
- MySQL

### Next steps (once PHP + Composer are installed)
1. Create a Laravel app in this same folder (or move these folders into the Laravel project):

```bash
composer create-project laravel/laravel .
```

2. Ensure these folders/files exist and are kept:
- `app/Http/Controllers/*`
- `resources/views/*`
- `public/css/*`, `public/js/*`
- `routes/web.php`

3. Start the dev server:

```bash
php artisan serve
```

### Design notes
- Apple-inspired minimal layout
- Glassmorphism cards + navbar blur
- Mobile-first responsive CSS

