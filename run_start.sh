export PATH_ROOT=$PWD
export OBLAKO=$PWD/oblako

echo ">entering dir $PATH_ROOT"
cd $PATH_ROOT || { echo '!cd failed' ; exit 1; }

echo ">composer install"
/opt/php80/bin/php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
/opt/php80/bin/php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
/opt/php80/bin/php composer-setup.php
/opt/php80/bin/php -r "unlink('composer-setup.php');"

echo ">oblako install"
rm -Rf $PATH_ROOT/public
/opt/php80/bin/php composer.phar create-project --no-interaction --no-dev antonmakasin/oblako
mv -vf $OBLAKO/* $PATH_ROOT
mv -vf $OBLAKO/.* $PATH_ROOT
rm -Rf $OBLAKO

echo ">link storage"
/opt/php80/bin/php artisan storage:link

echo ">create db"
/opt/php80/bin/php artisan create_database:run

echo ">artisan migrate"
/opt/php80/bin/php artisan migrate --force

echo ">basic commands run"
/opt/php80/bin/php artisan basic_commands:run

echo "Please enter admin email for dashboard:"
read ADMIN_EMAIL
/opt/php80/bin/php artisan env:set admin_email $ADMIN_EMAIL

echo "Please enter admin password for dashboard:"
read ADMIN_PASSWORD
/opt/php80/bin/php artisan env:set admin_password $ADMIN_PASSWORD

echo "Please enter token for file uploads:"
read ADMIN_TOKEN
/opt/php80/bin/php artisan env:set admin_token $ADMIN_TOKEN

echo "Please enter Site url (example, https://makasin.ru):"
read SITE_LINK
/opt/php80/bin/php artisan env:set app_url $SITE_LINK

echo ">create admin"
/opt/php80/bin/php artisan db:seed --class=AdminSeeder --force

echo ">artisan optimize"
/opt/php80/bin/php artisan optimize

exit
