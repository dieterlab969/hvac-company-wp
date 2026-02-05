# hvac-company-wp - WordPress Website

A WordPress-based website for Phan Gia company.

## Prerequisites

Before setting up this project, ensure you have the following installed:

### Required Software
- **PHP**: Version 7.4 or higher (8.0+ recommended)
- **MySQL/MariaDB**: Version 5.7+ or MariaDB 10.3+
- **Web Server**: Apache 2.4+ or Nginx 1.18+
- **Composer**: For PHP dependency management (optional)
- **Git**: For version control

### System Requirements
- Minimum 512MB RAM (1GB+ recommended)
- At least 1GB of free disk space
- PHP Extensions:
  - `mysqli` or `pdo_mysql`
  - `curl`
  - `gd` or `imagick`
  - `mbstring`
  - `xml`
  - `zip`

### Server Configuration
- `mod_rewrite` enabled (Apache) or proper URL rewriting configuration (Nginx)
- HTTPS enabled (recommended for production)
- Proper file permissions (directories: 755, files: 644)

## Installation

Follow these steps to set up the project locally:

### 1. Clone the Repository

```bash
git clone git@github.com:dieterlab969/hvac-company-wp.git
cd hvac-company-wp
```

### 2. Configure Database

Create a MySQL database and user:

```sql
CREATE DATABASE your_database_name;
CREATE USER 'your_database_user'@'localhost' IDENTIFIED BY 'your_password';
GRANT ALL PRIVILEGES ON your_database_name.* TO 'your_database_user'@'localhost';
FLUSH PRIVILEGES;
```

### 3. Configure Environment Variables

Copy the example environment file and configure it:

```bash
cp .env.example .env
```

Edit `.env` and update the following variables:

```env
DB_NAME=your_database_name
DB_USER=your_database_user
DB_PASSWORD=your_database_password
DB_HOST=localhost
DB_CHARSET=utf8
DB_COLLATE=

# Generate unique keys at: https://api.wordpress.org/secret-key/1.1/salt/
AUTH_KEY='your-unique-auth-key'
SECURE_AUTH_KEY='your-unique-secure-auth-key'
LOGGED_IN_KEY='your-unique-logged-in-key'
NONCE_KEY='your-unique-nonce-key'
AUTH_SALT='your-unique-auth-salt'
SECURE_AUTH_SALT='your-unique-secure-auth-salt'
LOGGED_IN_SALT='your-unique-logged-in-salt'
NONCE_SALT='your-unique-nonce-salt'

WP_DEBUG=false
```

### 4. Set File Permissions

```bash
# Set proper ownership (replace 'www-data' with your web server user)
sudo chown -R www-data:www-data /path/to/hvac-company-wp

# Set directory permissions
find . -type d -exec chmod 755 {} \;

# Set file permissions
find . -type f -exec chmod 644 {} \;
```

### 5. Configure Web Server

#### Apache Configuration

Ensure `.htaccess` is present and `mod_rewrite` is enabled:

```bash
sudo a2enmod rewrite
sudo systemctl restart apache2
```

#### Nginx Configuration (Example)

```nginx
server {
    ## Your website name goes here.
    server_name yourdomain.com;
    ## Your only path reference.
    root /var/www/yourproject;
    ## This should be in your http block and if it is, it's not needed here.
    index index.php;

    location = /favicon.ico {
        log_not_found off;
        access_log off;
    }

    location = /robots.txt {
        allow all;
        log_not_found off;
        access_log off;
    }

    location / {
        # This is cool because no php is touched for static content.
        # include the "?$args" part so non-default permalinks doesn't break when using query string
        try_files $uri $uri/ /index.php?$args;
    }

    location ~ \.php$ {
        #NOTE: You should have "cgi.fix_pathinfo = 0;" in php.ini
        include fastcgi_params;
        fastcgi_intercept_errors on;
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        #The following parameter can be also included in fastcgi_params file
        fastcgi_param  SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }

    location ~* \.(js|css|png|jpg|jpeg|gif|ico)$ {
        expires max;
        log_not_found off;
    }

    listen 443 ssl; # managed by Certbot
    ssl_certificate /etc/letsencrypt/live/yourdomain.com/fullchain.pem; # managed by Certbot
    ssl_certificate_key /etc/letsencrypt/live/yourdomain.com/privkey.pem; # managed by Certbot
    include /etc/letsencrypt/options-ssl-nginx.conf; # managed by Certbot
    ssl_dhparam /etc/letsencrypt/ssl-dhparams.pem; # managed by Certbot
}

# HTTP to HTTPS redirect
server {
    if ($host = yourdomain.com) {
        return 301 https://$host$request_uri;
    } # managed by Certbot

    server_name yourdomain.com;
    listen 80;
    return 404; # managed by Certbot
}
```

### 6. Import Database (if applicable)

If you have a database backup:

```bash
mysql -u your_database_user -p your_database_name < backup.sql
```

### 7. Access WordPress

Navigate to your site:
- Local: `http://localhost/hvac-company-wp`
- Production: `http://yourdomain.com`

If this is a fresh installation, complete the WordPress setup wizard.

## Configuration

### WordPress Admin Access

- Admin URL: `http://yourdomain.com/wp-admin`
- Use credentials provided by your team lead or created during installation

### Updating Site URL

If migrating or changing domain:

```bash
wp-cli.phar search-replace 'old-domain.com' 'new-domain.com' --all-tables
```

Or manually in database:
```sql
UPDATE wp_options SET option_value = 'http://new-domain.com' WHERE option_name = 'siteurl';
UPDATE wp_options SET option_value = 'http://new-domain.com' WHERE option_name = 'home';
```

## Development

### Local Development Setup

For local development, you can use:
- **XAMPP** / **WAMP** / **MAMP**: All-in-one solutions
- **Docker**: For containerized environments
- **Local by Flywheel**: WordPress-specific development tool

### Git Workflow

1. Create a new branch for your feature:
   ```bash
   git checkout -b feature/your-feature-name
   ```

2. Make your changes and commit:
   ```bash
   git add .
   git commit -m "Description of changes"
   ```

3. Push to GitLab:
   ```bash
   git push origin feature/your-feature-name
   ```

4. Create a merge request on GitLab

## Troubleshooting

### Common Issues

**Database connection errors:**
- Verify credentials in `.env` file
- Ensure MySQL service is running
- Check database user permissions

**White screen of death:**
- Enable debug mode: Set `WP_DEBUG=true` in `.env`
- Check PHP error logs
- Verify file permissions

**Permalink issues:**
- Ensure `mod_rewrite` is enabled (Apache)
- Reset permalinks in WordPress Admin: Settings → Permalinks → Save

**File upload issues:**
- Check `upload_max_filesize` and `post_max_size` in `php.ini`
- Verify `wp-content/uploads` directory permissions

## Security

- Keep WordPress core, themes, and plugins updated
- Use strong passwords and enable two-factor authentication
- Regularly backup your database and files
- Keep `.env` file secure and never commit it to version control
- Use HTTPS in production

## License

Proprietary - All rights reserved
