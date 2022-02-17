## Start

- Public domain folder mast be setted as "public". For example: domain.com/public 
- Make all actions with User, that run web server. It doesn't have to be a root 
- Copy "run_start.sh" to the project root
- If PHP installed as main, change all "/opt/php80/bin/php" to "php" 
- Make command: "sh run_start.sh"
- Follow instructions


## Dashboard

- /auth/login
- If you forgot the authorization data (entered during installation), it`s in .env at the project`s root (ADMIN_EMAIL and ADMIN_PASSWORD)


## Token for the file uploading
- If you forgot the token, it`s in .env at the project`s root (ADMIN_TOKEN)
- If you want change the token, you have to change ADMIN_TOKEN in .env and then run in console "php artisan optimize". I plan make the token refresh option through the dashboard later.


## Settings
- FILE_MAX_SIZE=20000
- FILE_MIMES=doc,xls,xlsx,docx,pdf,rtf,txt,ppt,pptx,png,jpeg,jpg,jpe,svg,rar,zip,webp,sql,xml,json
- FILE_BASE_PUBLIC_PATH=files
- FILE_IMAGE_PROCESS=1
- FILE_IMAGE_RESIZE_WIDTH=2000
- FILE_IMAGE_RESIZE_HEIGHT=2000
- FILE_IMAGE_QUALITY=90
- FILE_IMAGE_FORMAT=jpg


## Used in the project and many thanks

- <a href="https://github.com/laravel/framework">Laravel Framework Crew</a>
- <a href="https://github.com/Intervention/image">Intervention Image Crew</a>
- <a href="https://github.com/imliam/laravel-env-set-command">Liam Hammett</a>


