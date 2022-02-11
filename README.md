## Start

- Make all actions with User, that run web server. It doesn't have to be a root 
- Copy "run_start.sh" to the project root
- If PHP installed as main, change all "/opt/php80/bin/php" to "php" 
- Make command: "sh run_start.sh"
- Follow instructions


## Dashboard

- /auth/login
- Login and password: ADMIN_EMAIL & ADMIN_PASSWORD (watch .env in the project root)
- !!! CHANGE login and password in dashboard after log in !!!
- !!! CHANGE ADMIN_TOKEN in .env !!!


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


