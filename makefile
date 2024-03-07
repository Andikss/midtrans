roll: rollback refresh user-seed course-seed

rollback:
	php artisan migrate:rollback

refresh:
	php artisan migrate:refresh

user-seed:
	php artisan db:seed --class=UserSeeder

course-seed:
	php artisan db:seed --class=CourseSeeder