# Pelindo - Agent Instructions

## Project Overview

Laravel 13.x corporate website for Pelindo (Indonesian port authority). Public-facing site with Filament 5.x admin panel.

- **PHP 8.3+**, **Node 25** (per `.nvmrc`)
- **SQLite** database (default config)
- **Tailwind CSS 4.x** with custom claymorphism design system (`resources/css/app.css`)
- **Alpine.js** for frontend interactivity
- **Pest** for testing (PHPUnit wrapper)
- **Filament Shield** for role/permission management, **Filament Breezy** for profile pages

## Commands

### Setup
```bash
composer setup    # installs deps, copies .env, generates key, migrates, npm install, builds
```

### Development
```bash
composer dev      # runs artisan serve + queue:listen + npm run dev concurrently
```

### Testing
```bash
composer test     # clears config cache, then runs `php artisan test`
```

### Frontend Build
```bash
npm run build     # vite production build
npm run dev       # vite dev server
```

### Linting
```bash
./vendor/bin/pint  # Laravel Pint (PHP CS Fixer wrapper)
```

## Architecture

### Admin Panel (Filament 5.x)
- Path: `/admin`
- Provider: `app/Providers/Filament/AdminPanelProvider.php`
- Resources: `app/Filament/Resources/` (8 resources: Articles, Branches, Directors, Documents, MeetingSchedules, Reports, Terminals, Users)
- Widgets: `app/Filament/Widgets/` (auto-discovered, includes `ResourceStatsOverview` for dashboard stats)
- Each resource follows Filament 5 pattern: `Resource.php`, `Pages/`, `Schemas/`, `Tables/`
- Filament admin theme: `resources/css/filament/admin/theme.css`

### Models (`app/Models/`)
8 models: Article, Branch, Director, Document, MeetingSchedule, Report, Terminal, User
- Most are bare Eloquent models (no relationships defined, no fillable/guarded)
- Only Terminal has `$guarded = []`; only Branch has explicit `$fillable`
- User model uses PHP 8.3 attributes: `#[Fillable([...])]`, `#[Hidden([...])]`
- No Eloquent relationships exist yet — routes query models directly

### Routes (`routes/web.php`)
Public routes only (no API routes). Organized by section:
- `/` - Landing page
- `/profile/*` - Company profile pages
- `/investor/*` - Investor relations
- `/tata-kelola/*` - Corporate governance
- `/layanan/*` - Services/branches
- `/tjsl`, `/pjsl` - Corporate social responsibility
- `/media/*` - News/press releases with search
- `/lang/{locale}` - Locale switcher (en/id) stored in session

### Views (`resources/views/`)
- `pages/` - Page templates organized by route section
- `components/` - Blade components (navbar, footer, section-specific)
- Layout: `components/layout.blade.php`

### Database
- Migrations in `database/migrations/`
- Seeders: `DatabaseSeeder`, `BranchSeeder`
- `DatabaseSeeder` runs `BranchSeeder` + inline seeds for Terminals, Articles, Reports, Directors, Documents, MeetingSchedules
- Session, queue, cache all use database driver (not Redis)
- Tests use in-memory SQLite

## Conventions

### Filament Resources
When adding/modifying Filament resources, follow the existing pattern:
- `XxxResource.php` - main resource definition
- `Pages/ListXxx.php`, `Pages/CreateXxx.php`, `Pages/EditXxx.php`
- `Schemas/XxxForm.php` - form schema
- `Tables/XxxTable.php` - table configuration

### Filament Widgets
Dashboard widgets go in `app/Filament/Widgets/` and are auto-discovered. Example: `ResourceStatsOverview` extends `StatsOverviewWidget` to show model counts.

### Frontend
- Custom Tailwind theme tokens defined in `resources/css/app.css` under `@theme` block
- Claymorphism utility classes: `clay-card`, `clay-card-interactive`, `clay-btn-*`, `clay-input`, `clay-badge`
- Brand colors: `--color-pmt-primary: #0066AE`, `--color-pmt-accent: #00A3E0`
- Font: Plus Jakarta Sans

### i18n
- Two locales: `en` (English), `id` (Indonesian)
- Language files: `lang/en/`, `lang/id/`
- Locale switched via `/lang/{locale}` route, stored in session
- `id` locale has only `messages.php` - may be incomplete

### Testing
- Pest with `TestCase` base class
- `RefreshDatabase` trait is commented out in `tests/Pest.php` - enable per-test if needed
- `phpunit.xml` sets `DB_DATABASE=:memory:` for test isolation
- Tests use in-memory SQLite; no external services required

### Environment
- `.npmrc`: `ignore-scripts=true`, `audit=true`
- `.editorconfig`: 4-space indent, LF line endings
- `.gitattributes`: `text=auto eol=lf`

## Gotchas

- `composer test` clears config cache before running tests (important for CI-like behavior)
- Filament panel uses `#0066AE` as primary color, Slate as gray
- Vite watches `storage/framework/views/` is explicitly ignored
- `@laravel/multiplex` is in `optionalDependencies` — may not be installed
- Models have no fillable/guarded consistency — check before assuming mass-assignment behavior
- No CI workflows defined — testing is manual
- `laravel/boost` is in `require-dev` — provides AI agent tooling if needed
