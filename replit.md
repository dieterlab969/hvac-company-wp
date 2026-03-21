# WordPress on Replit — Điện Lạnh Phan Gia

## Project Overview

WordPress website for **CÔNG TY TNHH ĐIỆN LẠNH PHAN GIA** (`dienlanhphangia.com`), running on PHP 8.2 with SQLite as the database backend via the WordPress SQLite Database Integration plugin.

## Architecture

- **Frontend/Backend**: WordPress PHP application
- **Server**: PHP built-in development server on port 5000
- **Database**: SQLite (via WordPress SQLite Database Integration plugin drop-in)
- **PHP Version**: 8.2.23
- **WordPress Version**: 6.9.4

## Key Files

- `start.sh` — Startup script that launches PHP server on port 5000
- `router.php` — PHP built-in server router (handles WordPress URL rewriting)
- `wp-config.php` — WordPress configuration (SQLite, Replit proxy trust, dynamic site URL)
- `wp-content/db.php` — SQLite drop-in (copied from sqlite-database-integration plugin)
- `wp-content/database/.ht.sqlite` — SQLite database file (imported from phangia_d MySQL dump)
- `.env.example` — Environment variable template

## Database

- **Source**: Imported from `phangia_d.sql` (MariaDB dump from dienlanhphangia.com)
- **Backend**: SQLite (MySQL translated at runtime by the sqlite-database-integration plugin)
- **Key data**: ~7,400 posts, ~25,700 postmeta rows, 2 admin users, 710 options

## Admin Users (from imported database)

| Login | Email | Role |
|-------|-------|------|
| hoangpv | ace@hoangphan.tech | Administrator |
| huyen | salahuyen02@gmail.com | Administrator |

## Installed Plugins

- `sqlite-database-integration` — SQLite drop-in (active via db.php)
- `advanced-custom-fields-pro` — Custom fields
- `ag-custom-admin` — Admin customization
- `contact-form-7` — Contact forms
- `loco-translate` — Translation management
- `megamenu` + `megamenu-pro` — Mega menu
- `user-role-editor` — User role management
- `wordpress-seo` (Yoast SEO) — SEO plugin
- `wp-extra` — Extra functionality

## Running the Application

```bash
bash start.sh
```

This starts PHP built-in server at `0.0.0.0:5000`.

## Environment Variables

| Variable | Value | Notes |
|----------|-------|-------|
| `ZALO_URL` | `https://zalo.me/164848896161853582` | Zalo contact link |
| `WP_DEBUG` | `false` | Debug mode |

See `.env.example` for all configurable variables.

## Important Notes

- Site URL is dynamically detected from the request host (Replit proxy compatible)
- `HTTP_X_FORWARDED_PROTO` and `HTTP_X_FORWARDED_HOST` headers are trusted for HTTPS
- SQLite database is at `wp-content/database/.ht.sqlite`
- WordPress core is 6.9.4 (updated from 5.2.12 for PHP 8.2 compatibility)
- After import, all domain references updated from `https://dienlanhphangia.com` to the Replit domain

## Deployment

Configured for autoscale deployment running `bash start.sh`.
