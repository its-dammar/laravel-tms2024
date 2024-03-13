Laravel:

M: Model : 
V: views :
C: Controllers: 

1. Setup
2. Auth (default, Breeze)
3. File Structure
4. Create Project
5. Database Connection (.env file)
   1. migration
6. Explain about the MVC pattern
   1. Model
   2. View 
   3. Controllers
   4. Middleware
   5. Database(migration)
   6. Routing
   7. Seeders
7. CRUD operation
8. File Uploading
9.  Pagination
10. Notification
11. Integrate Frontend into backend ( Develop a complete dynamic project)
    1.  layout management (frontend and backend)
    2.  Data fetching in the frontend template



1. download wampp or xammp and setup
2. download composer and setup
2. create a project: 
	xampp/htdocs/ open terminal
	wampp/www/ open terminal

	2.1.  composer global require laravel/installer (one time setup)
	2.2.  laravel new projectName
		
        a. Would you like to install a starter kit? [No starter kit: Auth]:

		[none     ] No starter kit
  		[breeze   ] Laravel Breeze
  		[jetstream] Laravel Jetstream
 		> breeze

        b. Which Breeze stack would you like to install? [Blade with Alpine]:

        [blade              ] Blade with Alpine
        [livewire           ] Livewire (Volt Class API) with Alpine
        [livewire-functional] Livewire (Volt Functional API) with Alpine
        [react              ] React with Inertia
        [vue                ] Vue with Inertia
        [api                ] API only
        > blade

         c. Would you like dark mode support? (yes/no) [no]:

        > no


        D. Which testing framework do you prefer? [PHPUnit]:

        [0] PHPUnit
        [1] Pest
        > 0


        e. Would you like to initialize a Git repository? (yes/no) [no]:

        > yes

        f. Which database will your application use? [MySQL]:
        
        [mysql  ] MySQL
        [mariadb] MariaDB
        [pgsql  ] PostgreSQL
        [sqlite ] SQLite
        [sqlsrv ] SQL Server
        > mysql

        Optional
        git config --global user.email "you@example.com"
        git config --global user.name "Your Name"

    2.3. a. cd projectname
         b. code .

      **  Run the project **
    2.4 php artisan server

     ** Database migrate**
    2.5 php artisan migrate   (add new tables)

    <!-- optional -->
     Update your /app/Providers/AppServiceProvider.php to contain:

        use Illuminate\Support\Facades\Schema;

        public function boot()
        {
            Schema::defaultStringLength(191);
        }
    
    2.5.1. php artisan migrate:fresh    (remove old data table and add new tables)


