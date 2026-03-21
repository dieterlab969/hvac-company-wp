#!/bin/bash
# Start WordPress on PHP built-in server at port 5000

cd /home/runner/workspace

# Ensure database directory exists with proper permissions
mkdir -p wp-content/database
chmod 755 wp-content/database

# Start PHP built-in server with router
exec php -S 0.0.0.0:5000 router.php
