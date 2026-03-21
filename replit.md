# WordPress on Replit

## Project Overview

This is a WordPress website running on PHP 8.2 with SQLite as the database backend (via the sqlite-database-integration plugin drop-in). WordPress core is version 6.9.4.

## Architecture

- **Frontend/Backend**: WordPress PHP application
- **Server**: PHP built-in development server on port 5000
- **Database**: SQLite (via WordPress SQLite Database Integration plugin)
- **PHP Version**: 8.2.23
- **WordPress Version**: 6.9.4

## Key Files

- `start.sh` — Startup script that launches PHP server on port 5000
- `router.php` — PHP built-in server router (handles WordPress URL rewriting like mod_rewrite)
- `wp-config.php` — WordPress configuration (loads .env, configures SQLite, trusts Replit proxy)
- `wp-content/db.php` — SQLite drop-in (copied from sqlite-database-integration plugin)
- `wp-content/database/` — SQLite database files location
- `wp-content/plugins/sqlite-database-integration/` — SQLite integration plugin

## Plugins

Pre-installed plugins (inactive by default, can be activated via wp-admin):
- advanced-custom-fields-pro
- ag-custom-admin
- contact-form-7
- loco-translate
- megamenu + megamenu-pro
- user-role-editor
- wordpress-seo (Yoast)
- wp-extra

## Running the Application

```bash
bash start.sh
```

This starts PHP built-in server at `0.0.0.0:5000`.

## WordPress Admin

- URL: `/wp-admin/`
- Default credentials set during initial setup via WP-CLI

## Important Notes

- The site URL is dynamically detected from the request host, supporting Replit's proxy setup
- HTTP_X_FORWARDED_PROTO and HTTP_X_FORWARDED_HOST headers are trusted for HTTPS detection
- SQLite database is stored at `wp-content/database/.ht.sqlite`
- WordPress core was updated from 5.2.12 to 6.9.4 for PHP 8.2 compatibility
- The original wp-content (themes, plugins) was preserved during the core update

## Deployment

Configured for autoscale deployment running `bash start.sh`.
