1. download wampp or xammp and setup
2. download composer and setup
2. create a project: 
	xampp/htdocs/ open terminal
	wampp/www/ open terminal

	2.1.  composer global require laravel/installer (one time setup)
	2.2.  laravel new projectName
		
        Would you like to install a starter kit? [No starter kit]:
		[none     ] No starter kit
  		[breeze   ] Laravel Breeze
  		[jetstream] Laravel Jetstream
 		> breeze

        Which Breeze stack would you like to install? [Blade with Alpine]:
        [blade              ] Blade with Alpine
        [livewire           ] Livewire (Volt Class API) with Alpine
        [livewire-functional] Livewire (Volt Functional API) with Alpine
        [react              ] React with Inertia
        [vue                ] Vue with Inertia
        [api                ] API only
        > blade

         Would you like dark mode support? (yes/no) [no]:
        > no


        Which testing framework do you prefer? [PHPUnit]:
        [0] PHPUnit
        [1] Pest
        > 0


        Would you like to initialize a Git repository? (yes/no) [no]:
        > yes

        Which database will your application use? [MySQL]:
        [mysql  ] MySQL
        [mariadb] MariaDB
        [pgsql  ] PostgreSQL
        [sqlite ] SQLite
        [sqlsrv ] SQL Server
        > mysql

        Optional
        git config --global user.email "you@example.com"
        git config --global user.name "Your Name"

        a. cd projectname
        b. code .

      **  Run the project **
      php artisan server

     ** Database migrate**
     php artisan migrate

     Update your /app/Providers/AppServiceProvider.php to contain:

        use Illuminate\Support\Facades\Schema;
        
        public function boot()
        {
            Schema::defaultStringLength(191);
        }

