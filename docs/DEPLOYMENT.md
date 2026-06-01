# Deployment Guide

## Ubuntu/Nginx/SSL

1. Provision Ubuntu 24.04 LTS with PHP 8.3-FPM, Composer, Node.js 22, MySQL 8, Redis, Nginx, Certbot.
2. Clone repository to `/var/www/smwkp`.
3. Configure `.env`: `APP_ENV=production`, `APP_DEBUG=false`, MySQL, Redis queue, mail, Google Maps key, Firebase credentials.
4. Run `composer install --no-dev --optimize-autoloader` and `npm ci && npm run build`.
5. Run `php artisan migrate --force`, `php artisan config:cache`, `route:cache`, `view:cache`, `storage:link`.
6. Configure Supervisor for `php artisan queue:work --tries=3`.
7. Configure Nginx root to `public` and enable HTTPS via Certbot.

## Nginx Server Block

```nginx
server {
  listen 80;
  server_name smwkp.palembang.go.id;
  root /var/www/smwkp/public;
  index index.php index.html;
  location / { try_files $uri $uri/ /index.php?$query_string; }
  location ~ \.php$ { include snippets/fastcgi-php.conf; fastcgi_pass unix:/run/php/php8.3-fpm.sock; }
  location ~ /\.ht { deny all; }
}
```

## GitHub Actions

The CI workflow installs PHP and Node dependencies, runs Pint, PHPUnit, and frontend build. Secrets required for deployment: `SSH_HOST`, `SSH_USER`, `SSH_KEY`, `DEPLOY_PATH`.
