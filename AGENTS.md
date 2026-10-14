# Pelindo - Agent Instructions

## Project Overview

Laravel 13.x corporate website for Pelindo (Indonesian port authority). Public site + Filament 5.x admin at `/admin`.

- **PHP 8.3+**, **Node 25** (`.nvmrc`), **SQLite** (default)
- Tailwind CSS 4.x with custom claymorphism design system (`resources/css/app.css`), Alpine.js
- Pest for testing; Filament Shield (roles/permissions) + Breezy (profile)

Full docs: `README.md`. AI tooling: `laravel/boost` (skills listed in `boost.json`).

## Commands

```bash
composer setup    # composer install, .env + key, migrate, npm install --ignore-scripts, npm run build
composer dev      # artisan serve + queue:listen + npm run dev (concurrently)
composer test     # clears config cache, then `php artisan test`
npm run build     # vite production build
./vendor/bin/pint # PHP linter/formatter
```

- Run a single test: `php artisan test --filter=TestName` (or `./vendor/bin/pest path/to/Test.php`)
- `composer install`/`update` auto-runs `php artisan filament:upgrade` (post-autoload-dump hook)

## Architecture

### Admin (Filament 5.x)
- Panel provider: `app/Providers/Filament/AdminPanelProvider.php`; theme: `resources/css/filament/admin/theme.css`
- 8 resources in `app/Filament/Resources/` (Articles, Branches, Directors, Documents, MeetingSchedules, Reports, Terminals, Users)
- Resource layout pattern to follow when adding/modifying:
  - `{Xxx}Resource.php`, `Pages/List|Create|EditXxx.php`, `Schemas/XxxForm.php`, `Tables/XxxTable.php`
- Widgets in `app/Filament/Widgets/` are auto-discovered (e.g. `ResourceStatsOverview` dashboard stats)

### Models (`app/Models/`)
8 models matching the resources. **No Eloquent relationships defined** — routes query models directly.

Mass-assignment is inconsistent — check each model before assuming:
- Only `Terminal` has `$guarded = []`; only `Branch` has `$fillable`
- `User` uses PHP 8.3 attributes `#[Fillable([...])]`, `#[Hidden([...])]` + Spatie `HasRoles`

### Routes & Views
- All public GET routes in `routes/web.php`, organized by section: `/profile/*`, `/investor/*`, `/tata-kelola/*`, `/layanan/*`, `/tjsl`, `/pjsl` (redirects to `/tjsl`), `/media/*` (incl. search)
- `/lang/{locale}` switches locale (en/id), stored in session
- Views: `resources/views/pages/` (by section) + `resources/views/components/` (layout, navbar top+side, footer, section components)

### Database
- Migrations in `database/migrations/`; `DatabaseSeeder` calls `BranchSeeder` + inline seeds for the other 6 tables
- Session, queue, cache all use **database driver** (not Redis)

## Conventions

### Frontend
- Custom Tailwind tokens under `@theme` in `resources/css/app.css`
- Claymorphism utilities: `clay-card`, `clay-card-interactive`, `clay-btn-*`, `clay-input`, `clay-badge`
- Brand: `--color-pmt-primary: #0066AE`, `--color-pmt-accent: #00A3E0`; font Plus Jakarta Sans

### i18n
- Locales: `en`, `id` in `lang/`. `id` only has `messages.php` (incomplete vs `en`)

### Testing
- Tests use in-memory SQLite (`phpunit.xml` sets `DB_DATABASE=:memory:`); no external services
- `RefreshDatabase` is **commented out** in `tests/Pest.php` — enable per-test if needed
- Only example tests exist so far (`tests/Feature/`, `tests/Unit/`)

## Gotchas

- `composer test` clears config cache first — important for CI-like behavior
- Filament panel primary color: `#0066AE`, Slate gray
- Vite ignores `**/storage/framework/views/**` in file watching (avoid recompile loops)
- `.npmrc` sets `ignore-scripts=true` — npm lifecycle scripts do not run
- No CI workflows — testing/linting is manual
