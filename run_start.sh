export PATH_ROOT=$PWD

echo ">entering dir $PATH_ROOT"
cd $PATH_ROOT || { echo '!cd failed' ; exit 1; }

echo ">composer install"
git clone git@bitbucket.org:antonmakasin/oblako.git

echo ">composer install"
/opt/php80/bin/php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
/opt/php80/bin/php -r "if (hash_file('sha384', 'composer-setup.php') === '906a84df04cea2aa72f40b5f787e49f22d4c2f19492ac310e8cba5b96ac8b64115ac402c8cd292b8a03482574915d1a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
/opt/php80/bin/php composer-setup.php
/opt/php80/bin/php -r "unlink('composer-setup.php');"

echo ">oblako install"
/opt/php80/bin/php composer.phar install --no-interaction --optimize-autoloader --no-dev

echo ">key generate"
/opt/php80/bin/php artisan key:generate

echo ">link storage"
/opt/php80/bin/php artisan storage:link

echo ">create db"
/opt/php80/bin/php artisan create_database:run

echo ">artisan migrate"
/opt/php80/bin/php artisan migrate --force

echo ">basic commands run"
/opt/php80/bin/php artisan basic_commands:run

echo ">create admin"
/opt/php80/bin/php artisan db:seed --class=AdminSeeder

exit
