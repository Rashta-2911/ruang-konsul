<!-- Copilot instructions for contributors and AI coding agents -->
# Copilot / AI Agent Instructions — RuangKonsul

Purpose: give an AI coding agent immediately actionable context about this Laravel codebase so contributions are safe, consistent, and productive.

- **Project type:** Laravel (Blade + controllers + Eloquent models). Main UI under `resources/views/landing` and public assets in `public/`.
- **Entry points / routes:** See [routes/web.php](routes/web.php) for route names and conventions. Many landing routes are public; some `landing/*` routes require the `customer` auth guard.

Big picture
- MVC Laravel: controllers in `app/Http/Controllers` render Blade views in `resources/views/landing` or perform JSON responses for AJAX.
- Domain areas: Landing pages, Produk (e-commerce-like), Dokter (doctor categories, list, chat), Customer auth, Chatbot integration.
- Data flow: Controllers query Eloquent models (see `app/Models`) and return views with `compact(...)` variables; forms submit to named routes in `routes/web.php`.

Project-specific conventions to follow
- Custom primary keys and column names: many models use nonstandard PKs and column names (e.g. `Customer` uses `customerId`, `customerEmail`, `customerPassword`). Review the model before changing auth logic.
  - Files: [app/Models/Customer.php](app/Models/Customer.php), [app/Models/Dokter.php](app/Models/Dokter.php), [app/Models/Kategori.php](app/Models/Kategori.php)
- Timestamps are often disabled (`public $timestamps = false`). Do not assume `created_at`/`updated_at` exist.
- ID generation: controllers create prefixed IDs in application code (e.g. `CS001`, `CD001`) by reading last record. If you change this behaviour, update all call sites.

Key integration points & external dependencies
- Chatbot: uses OpenRouter via `Http::post` in [app/Http/Controllers/ChatbotController.php](app/Http/Controllers/ChatbotController.php). Required env vars: `OPENROUTER_API_KEY`, `OPENROUTER_API_ENDPOINT`, optional `OPENROUTER_API_TIMEOUT`.
- Frontend: plain Blade + Bootstrap + icofont. Assets live in `public/css` and `public/js` (no Webpack/Laravel Mix heavy customization beyond `vite.config.js`).

Developer workflows (commands you can run)
- Install PHP deps: `composer install`
- Install assets: `npm install`
- Build assets (dev): `npm run dev` — and for production `npm run build` if configured.
- Run app locally: `php artisan serve` (or configure your own server). Ensure `.env` DB credentials exist.
- Run tests: `php artisan test` or `vendor/bin/phpunit` (project contains `phpunit.xml`).

Patterns & examples (copy-paste safe guidance)
- To add a new doctor category: add entries to the `dokter` table (`namaBidang`) and the UI will group by `namaBidang` (see [app/Http/Controllers/DokterController.php](app/Http/Controllers/DokterController.php)). The category view maps category names to icons inside `resources/views/landing/dokter/kategori.blade.php`.
- To add a new route follow the existing naming: `name('landing.dokter.kategori')` — controllers expect route names for redirects and forms.
- When working with authentication, use the `customer` guard where appropriate: `Auth::guard('customer')` (see [config/auth.php](config/auth.php) and [app/Http/Controllers/CustomerAuthController.php](app/Http/Controllers/CustomerAuthController.php)).

Gotchas and safety checks
- Do not rename model attributes without updating the model (`getAuthPassword`, `getAuthIdentifierName`) and any controller-level uses (login/register flows use custom column names).
- Many controllers assume tables exist with specific columns (e.g. `dokter.gambar`, `produk.qty`). Inspect migrations in `database/migrations` before changing queries.
- Error handling: controllers often return simple flash messages or JSON — maintain the same response shape when changing endpoints.

If you change or add integrations
- Update `.env.example` with any new env keys and document usage in this file.

When in doubt
- Read the controller and model pair before editing a feature. Search for the route name in `routes/web.php` to find all usages.

Next step for reviewers: please tell me which areas you want expanded (tests, deployment, or data migrations) and I will update this file.
