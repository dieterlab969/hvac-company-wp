#!/bin/bash
set -e

cd /home/runner/workspace

echo "[start.sh] Setting up WordPress environment..."

# Ensure database directory exists with proper permissions
mkdir -p wp-content/database
chmod 755 wp-content/database

# Ensure SQLite db.php drop-in is in place
if [ ! -f "wp-content/db.php" ]; then
  echo "[start.sh] Installing SQLite drop-in..."
  cp wp-content/plugins/sqlite-database-integration/db.copy wp-content/db.php
fi

# Create .env file if not present
if [ ! -f ".env" ]; then
  echo "[start.sh] Creating .env file..."
  cat > .env << 'ENVEOF'
DB_NAME=wordpress
DB_USER=wpuser
DB_PASSWORD=wppassword
DB_HOST=localhost
DB_CHARSET=utf8mb4
DB_COLLATE=

AUTH_KEY='replit-hvac-auth-key-7f3a9b2e4d1c6a5b'
SECURE_AUTH_KEY='replit-hvac-secure-auth-key-2d8c4f1a9e3b7c6d'
LOGGED_IN_KEY='replit-hvac-logged-in-key-5e6b3d9c2a1f8e4b'
NONCE_KEY='replit-hvac-nonce-key-1a4f7e8b3c9d2e6f'
AUTH_SALT='replit-hvac-auth-salt-3c9d2b6f1a5e8c4d'
SECURE_AUTH_SALT='replit-hvac-secure-auth-salt-8e1c5a4d6b3f9e2c'
LOGGED_IN_SALT='replit-hvac-logged-in-salt-6b2f9e3c4a7d1c8e'
NONCE_SALT='replit-hvac-nonce-salt-4a7d1c8e2b5f9c3a'

WP_DEBUG=false
ZALO_URL=https://zalo.me/164848896161853582
ENVEOF
fi

echo "[start.sh] Starting PHP built-in server on 0.0.0.0:5000..."
exec php -S 0.0.0.0:5000 /home/runner/workspace/router.php
