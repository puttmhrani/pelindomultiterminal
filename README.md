# PT Pelindo Multi Terminal - Corporate Website

Corporate website for PT Pelindo Multi Terminal (PMT), an Indonesian port authority and multipurpose terminal operator. Built with Laravel and Filament admin panel.

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 13.x, PHP 8.3+ |
| Admin Panel | Filament 5.x |
| Frontend | Tailwind CSS 4.x, Alpine.js |
| Build Tool | Vite 8.x |
| Database | SQLite |
| Testing | Pest 5.x (PHPUnit wrapper) |
| Permissions | Filament Shield (Spatie Permission) |
| Profile | Filament Breezy |
| Font | Plus Jakarta Sans |
| Node | 25 (per `.nvmrc`) |

## Getting Started

### Prerequisites

- PHP 8.3+
- Composer
- Node.js 25+
- SQLite (default) or configure another database in `.env`

### Installation

```bash
# Clone the repository
git clone <repo-url>
cd pelindo

# Run the setup script (installs deps, creates .env, generates key, migrates, builds frontend)
composer setup
```

### Development

```bash
# Start all services (artisan serve + queue:listen + vite dev server)
composer dev
```

- App: `http://localhost:8000`
- Admin: `http://localhost:8000/admin`

### Other Commands

```bash
composer test          # Clear config cache + run Pest tests
npm run build          # Vite production build
npm run dev            # Vite dev server only
./vendor/bin/pint      # Laravel Pint (PHP CS Fixer)
```

## Architecture

```
pelindo/
├── app/
│   ├── Filament/
│   │   ├── Resources/       # 8 CRUD resources (Articles, Branches, etc.)
│   │   │   └── {Resource}/
│   │   │       ├── {Resource}Resource.php
│   │   │       ├── Pages/   # List, Create, Edit pages
│   │   │       ├── Schemas/ # Form schema
│   │   │       └── Tables/  # Table configuration
│   │   └── Widgets/
│   │       └── ResourceStatsOverview.php   # Dashboard stats widget
│   ├── Models/              # 8 Eloquent models
│   └── Providers/
│       └── Filament/
│           └── AdminPanelProvider.php
├── database/
│   ├── migrations/          # Database schema
│   └── seeders/             # DatabaseSeeder + BranchSeeder
├── lang/
│   ├── en/messages.php      # English translations
│   └── id/messages.php      # Indonesian translations
├── resources/
│   ├── css/
│   │   ├── app.css          # Tailwind + claymorphism design system
│   │   └── filament/admin/theme.css
│   ├── js/app.js
│   └── views/
│       ├── components/      # Blade components (navbar, footer, layout)
│       └── pages/           # Page templates by section
├── routes/web.php           # All public routes
└── tests/
    ├── Feature/
    └── Unit/
```

### Models

| Model | Table | Key Fields | Notes |
|-------|-------|-----------|-------|
| Article | `articles` | type, title, content, date, image_url | `type`: `press_release` or `media_news` |
| Branch | `branches` | name, parent_company, address, dock_length, stacking_area, image_url | Has `$fillable` |
| Director | `directors` | name, position, image_url | |
| Document | `documents` | type, title, year, file_url | `type`: `pedoman` or `rups` |
| MeetingSchedule | `meeting_schedules` | title, date, location, agenda | |
| Report | `reports` | title, year, file_url | |
| Terminal | `terminals` | name, description, key_feature, image_url | `$guarded = []` |
| User | `users` | name, email, password | Uses `#[Fillable]` attributes, Spatie `HasRoles` |

No Eloquent relationships are defined. Routes query models directly.

## Routes

All routes are GET-only (no API endpoints). Defined in `routes/web.php`.

| Method | Route | Name | Parameters | Description |
|--------|-------|------|-----------|-------------|
| GET | `/` | `home` | | Landing page with terminals and latest news |
| GET | `/lang/{locale}` | `lang.switch` | `locale` (en or id) | Switch language, stored in session |
| **Profile** | | | | |
| GET | `/profile/tentang-kami` | `profile.about` | | About us page |
| GET | `/profile/manajemen` | `profile.manajemen` | | Management team (directors) |
| GET | `/profile/struktur-manajemen` | `profile.struktur` | | Management structure |
| GET | `/profile/entitas-bisnis` | `profile.entitas` | | Business entities |
| **Investor** | | | | |
| GET | `/investor/anggaran-dasar` | `investor.anggaran_dasar` | | Articles of association + meeting schedules |
| GET | `/investor/laporan` | `investor.laporan` | | Reports (annual, financial, sustainability) |
| GET | `/investor/ppid` | `investor.ppid` | | Public information disclosure |
| **Tata Kelola (Governance)** | | | | |
| GET | `/tata-kelola/pedoman` | `tk.pedoman` | | Governance guidelines (documents) |
| GET | `/tata-kelola/kode-etik-bisnis` | `tk.kode_etik` | | Code of business ethics |
| GET | `/tata-kelola/wbs` | `tk.wbs` | | Whistle blowing system |
| GET | `/tata-kelola/kebijakan-smt` | `tk.kebijakan_smt` | | Integrated management system policy |
| GET | `/tata-kelola/rups` | `tk.rups` | | GMS documents (General Meeting of Shareholders) |
| **Layanan (Services)** | | | | |
| GET | `/layanan` | `layanan.index` | | Services overview |
| GET | `/layanan/branch` | `layanan.branch` | | All branches listing |
| GET | `/layanan/branch/{id}` | `layanan.branch.detail` | `id` | Branch detail page |
| **TJSL (CSR)** | | | | |
| GET | `/tjsl` | `tjsl.index` | | Corporate social responsibility |
| GET | `/pjsl` | `pjsl.index` | | Redirects to `/tjsl` |
| **Media** | | | | |
| GET | `/media/siaran-pers` | `media.siaran_pers` | | Press releases |
| GET | `/media/pemberitaan` | `media.pemberitaan` | | Media news |
| GET | `/media/detail/{id}` | `media.detail` | `id` | Article detail page |
| GET | `/media/search` | `media.search` | `q` (query string) | Search articles by title/content |

## Admin Panel

Filament 5.x admin panel at `/admin`. Managed via `AdminPanelProvider.php`.

### Authentication

- Standard Filament login at `/admin/login`
- Filament Breezy for profile management at `/admin/my-profile`
- Filament Shield for role/permission management

### Resources

8 CRUD resources, each following the Filament 5 pattern:

| Resource | Manages | Form Fields | Upload Type |
|----------|---------|------------|-------------|
| Articles | Press releases & media news | type, title, content, date, image_url | Image (public disk) |
| Branches | Port branches | name, parent_company, address, dock_length, stacking_area, image_url | Image (public disk) |
| Directors | Board of directors | name, position, image_url | Image (public disk) |
| Documents | Governance documents | type, title, year, file_url | PDF (public disk) |
| MeetingSchedules | Board meeting schedules | title, date, location, agenda | None |
| Reports | Annual/financial reports | title, year, file_url | PDF (public disk) |
| Terminals | Terminal types | name, description, key_feature, image_url | Image (public disk) |
| Users | Admin users | name, email, email_verified_at, password | None |

### Dashboard Widget

`ResourceStatsOverview` displays counts for all 8 models on the admin dashboard.

## Database

SQLite by default. Session, queue, and cache all use database driver (not Redis).

### Schema

```
users              id, name, email, email_verified_at, password, remember_token, timestamps
sessions           id, user_id, ip_address, user_agent, payload, last_activity
cache              key, value, expiration
cache_locks        key, owner
jobs               id, queue, payload, attempts, reserved_at, available_at, created_at
job_batches        id, name, total_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at
failed_jobs        id, uuid, connection, queue, payload, exception
terminals          id, name, description, key_feature, image_url, timestamps
articles           id, type, title, content, date, image_url, timestamps
reports            id, title, year, file_url, timestamps
directors          id, name, position, image_url, timestamps
documents          id, type, title, year, file_url, timestamps
meeting_schedules  id, title, date, location, agenda, timestamps
branches           id, name, parent_company, address, dock_length, stacking_area, image_url, timestamps
permissions        id, name, guard_name, timestamps
roles              id, name, guard_name, timestamps
model_has_permissions   permission_id, model_type, model_id
model_has_roles         role_id, model_type, model_id
role_has_permissions    role_id, permission_id
```

### Seeders

`DatabaseSeeder` seeds:
- Branches (via `BranchSeeder`)
- 6 terminal types (Curah Cair, Curah Kering, Kendaraan, Khusus, Multipurpose, TUKS)
- 5 articles (3 press releases + 2 media news)
- 10 reports (annual, financial, sustainability from 2022-2025)
- 6 directors
- 19 documents (4 pedoman + 15 rups)
- 4 meeting schedules

## Frontend Page Structure

### Layout

```
components/layout.blade.php
├── <x-navbar />              (top sticky + right sidebar)
│   ├── navbar/top.blade.php  (logo, search, lang switch, mobile menu)
│   └── navbar/side.blade.php (right sidebar navigation)
├── <main>{{ $slot }}</main>
└── <x-footer />              (footer with contact, links, newsletter)
```

### Pages

| Page | File | Components Used |
|------|------|----------------|
| Landing | `pages/landing.blade.php` | `landing.notice-popup`, `landing.jumbotron`, `landing.about-section`, `landing.terminal-accordion`, `landing.map-section`, `landing.news-section` |
| About Us | `pages/profile/tentang_kami.blade.php` | `shared.page-header`, `shared.page-content-box` |
| Management | `pages/profile/manajemen.blade.php` | Director cards from model |
| Management Structure | `pages/profile/struktur_manajemen.blade.php` | Static org chart |
| Business Entities | `pages/profile/entitas_bisnis.blade.php` | Static content |
| Articles of Association | `pages/investor/anggaran_dasar.blade.php` | Meeting schedule table |
| Reports | `pages/investor/laporan.blade.php` | `investor.report-card` |
| PPID | `pages/investor/ppid.blade.php` | Static content |
| Governance Guidelines | `pages/tata_kelola/pedoman.blade.php` | Document list |
| Code of Ethics | `pages/tata_kelola/kode_etik.blade.php` | Static content |
| WBS | `pages/tata_kelola/wbs.blade.php` | Static content |
| IMS Policy | `pages/tata_kelola/kebijakan_smt.blade.php` | Static content |
| GMS | `pages/tata_kelola/rups.blade.php` | Document list by year |
| Services | `pages/layanan/index.blade.php` | Static overview |
| Branches | `pages/layanan/branches.blade.php` | Branch cards |
| Branch Detail | `pages/layanan/branch_detail.blade.php` | Single branch info |
| TJSL | `pages/tjsl/index.blade.php` | CSR content |
| Press Releases | `pages/media/siaran_pers.blade.php` | `media.article-card` |
| Media News | `pages/media/pemberitaan.blade.php` | `media.article-card` |
| Article Detail | `pages/media/detail.blade.php` | Single article content |
| Search Results | `pages/media/search_results.blade.php` | `media.article-list-item` |

### Reusable Components

| Component | Path | Purpose |
|-----------|------|---------|
| `landing.jumbotron` | Homepage hero | Full-screen hero with background image, title, subtitle |
| `landing.about-section` | Homepage | Company description |
| `landing.terminal-accordion` | Homepage | Accordion listing all terminal types |
| `landing.map-section` | Homepage | Operations map |
| `landing.news-section` | Homepage | Latest news grid |
| `landing.notice-popup` | Homepage | Modal popup carousel |
| `frontend.jumbotron` | Inner pages | Reusable page hero banner |
| `shared.page-header` | Inner pages | Page header wrapper |
| `shared.page-content-box` | Inner pages | Content card wrapper |
| `media.article-card` | Media pages | Article grid card |
| `media.article-list-item` | Search results | Article list row |
| `investor.report-card` | Reports page | Report download card |

## Design System

Custom **claymorphism** design system defined in `resources/css/app.css`.

### Color Tokens

| Token | Value | Usage |
|-------|-------|-------|
| `--color-pmt-primary` | `#0066AE` | Primary brand blue |
| `--color-pmt-accent` | `#00A3E0` | Accent cyan |
| `--color-pmt-dark` | `#0F243C` | Dark backgrounds |
| `--color-pmt-light` | `#38BDF8` | Light highlights |
| `--color-pmt-coral` | `#FF6B4A` | Accent coral |
| `--color-pmt-bg` | `#EEF5F9` | Page background |

### Utility Classes

| Class | Description |
|-------|-------------|
| `clay-card` | Base clay card with soft shadows |
| `clay-card-interactive` | Card with springy hover animation |
| `clay-card-soft` | Pastel tint card |
| `clay-card-primary` | Blue gradient card |
| `clay-panel` / `glass-panel` | Frosted glass panel |
| `clay-btn-primary` | Primary blue button |
| `clay-btn-secondary` | Secondary outline button |
| `clay-btn-white` | White button |
| `clay-btn-accent` | Coral accent button |
| `clay-input` | Inset form input |
| `clay-input-box` | Box-style form input |
| `clay-badge` | Light badge |
| `clay-badge-primary` | Primary blue badge |
| `bg-gradient-pmt` | Primary gradient |
| `bg-gradient-pmt-soft` | Soft gradient |
| `bg-gradient-pmt-dark` | Dark gradient |
| `text-shadow-sm` / `text-shadow` | Text shadow utilities |

## Features

### Public Website

- **Homepage**: Full-screen hero, company overview, terminal types accordion, operations map, latest news
- **Company Profile**: About us, management team, org structure, business entities
- **Investor Relations**: Articles of association, downloadable reports (annual, financial, sustainability), PPID
- **Corporate Governance**: Governance guidelines, code of ethics, whistle blowing system, IMS policy, GMS documents
- **Services**: Branch listing with detail pages, branch info (dock length, stacking area, address)
- **TJSL/CSR**: Corporate social responsibility programs
- **Media**: Press releases, media news, article detail pages, full-text search
- **Internationalization**: Indonesian (id) and English (en) with session-based locale switching
- **Responsive**: Mobile-first with right sidebar navigation, mobile hamburger menu

### Admin Panel

- **CRUD Management**: 8 resources for all content types
- **File Uploads**: Image uploads for articles, branches, directors, terminals; PDF uploads for documents and reports (stored on public disk)
- **Dashboard**: Stats overview widget showing counts for all models
- **Role-Based Access**: Filament Shield for permissions and roles
- **User Profile**: Filament Breezy for profile management
- **Authentication**: Standard login with session management

### Design

- **Claymorphism UI**: Soft 3D-like shadows, inset effects, springy hover animations
- **Sticky Top Navbar**: Transforms from transparent to solid on scroll with blur backdrop
- **Right Sidebar Navigation**: Persistent sidebar on desktop, slide-in drawer on mobile
- **Frosted Glass Effects**: Backdrop blur panels throughout
- **Dark Gradient Footer**: Multi-column footer with contact info, links, newsletter signup, social icons

## Testing

```bash
composer test    # Clears config cache, runs Pest tests
```

- Pest 5.x with `TestCase` base class
- Tests use in-memory SQLite (`phpunit.xml` sets `DB_DATABASE=:memory:`)
- `RefreshDatabase` trait is commented out in `tests/Pest.php` — enable per-test if needed
- Currently only example tests in `tests/Feature/` and `tests/Unit/`

## Environment

| File | Convention |
|------|-----------|
| `.npmrc` | `ignore-scripts=true`, `audit=true` |
| `.editorconfig` | 4-space indent, LF line endings |
| `.gitattributes` | `text=auto eol=lf` |
| `.nvmrc` | Node 25 |
