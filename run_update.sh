export PATH_ROOT=$PWD

echo ">entering dir $PATH_ROOT"
cd $PATH_ROOT || { echo '!cd failed' ; exit 1; }

echo ">git pull"
git pull || { echo '!pull failed' ; exit 1; }

echo ">composer"
/opt/php80/bin/php composer.phar install --no-interaction --optimize-autoloader --no-dev

echo ">artisan migrate"
/opt/php80/bin/php artisan migrate --force

echo ">basic commands run"
/opt/php80/bin/php artisan basic_commands:run

echo ">artisan optimize"
/opt/php80/bin/php artisan optimize

exit
