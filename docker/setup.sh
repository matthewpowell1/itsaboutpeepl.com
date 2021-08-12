#!/bin/bash

WORDPRESS_ADMIN_USERNAME="admin"
WORDPRESS_ADMIN_PASSWORD="password"
WORDPRESS_ADMIN_EMAIL="admin@example.com"
WORDPRESS_SITEURL="localhost:7000"
WORDPRESS_SITENAME="Peepl"

chown www-data:www-data /var/www/html/wp-content
ln -sf /var/www/html/wp-content/uploads /var/www/html/files

cd /usr/local/bin
curl --silent -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
mv wp-cli.phar wp
chmod +x wp

WP_CMD="/usr/local/bin/wp --allow-root --path=/var/www/html"

"$WP_CMD" config set --type="constant" --raw WP_DEBUG true

"$WP_CMD" core install --url="$WORDPRESS_SITEURL" --title="$WORDPRESS_SITENAME" --admin_user="$WORDPRESS_ADMIN_USERNAME" --admin_password="$WORDPRESS_ADMIN_PASSWORD" --admin_email="$WORDPRESS_ADMIN_EMAIL" --skip-email

"$WP_CMD" theme activate peepl-wordpress

"$WP_CMD" rewrite structure '/%year%/%monthnum%/%postname%/' --hard

"$WP_CMD" plugin install --activate codepress-admin-columns
"$WP_CMD" plugin install --activate advanced-custom-fields
"$WP_CMD" plugin install --activate blocks-css
"$WP_CMD" plugin install --activate check-email
"$WP_CMD" plugin install --activate crop-thumbnails
"$WP_CMD" plugin install --activate duplicate-post
"$WP_CMD" plugin install --activate enable-media-replace
"$WP_CMD" plugin install --activate heroic-table-of-contents
"$WP_CMD" plugin install --activate postpage-specific-custom-css
"$WP_CMD" plugin install --activate redirection
"$WP_CMD" plugin install --activate regenerate-thumbnails
"$WP_CMD" plugin install --activate svg-support
