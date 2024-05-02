# INSTALLATION
ASHMERLYN PORTAL, A Laravel Full stack application for automating academic result collation and pyschomotor/psychosocial grading for [Ash Merlyn School.](https://ashmerlynintsch.com/)

# PREREQUISITES
The following software programs are needed to run this project
| Software | Minimum Version | Guides |
|----------|----------|----------|
| PHP | 8.2.x | [Install PHP](https://discussions.eramba.org/t/php8-2-update-source-code-installs/3093) |
| MySQL | 5.7 | [Install MySQL5.7](https://medium.com/@lesliedouglas23/how-to-install-mysql-5-0-on-ubuntu-20-04-or-later-4d27de464eef) |
| Composer | 2.x | [Download Composer](https://getcomposer.org/download/) |
| Node | 16.20.x | [Download Node Version Manager](https://monovm.com/blog/install-nvm-on-ubuntu/) |

# SETTING UP THE PROJECT
1. Clone the repo:

```bash
$ git clone git@github.com:doobie-droid/ashmerlynportal.git && cd ashmerlynportal
```
2. Copy the contents of .env.example file to your .env

```bash
$ cp .env.example .env
```
3. Install php  and node packages

```bash
$ composer install && npm install
```

4. Generate your application encryption key

```bash
$ php artisan key:generate
```

# DATABASE
Run the command below so that you can migrate and seed your DB

```bash
$ php artisan migrate --seed
```

# SERVING APPLICATION
Run the laravel application in your Terminal
```bash
$ php artisan serve
```
Open another terminal and run your Node for asset bundling
```bash
$ npm run dev
```

# NOTE
After serving your laravel app locally, Visit [http://localhost:8000/login-dev](http://localhost:8000/admin/user/login-dev) to log in as an admin

# EXTRAS
In case you want to use a free mailing service with unlimited usage, check out [my terse guide](https://medium.com/@lesliedouglas23/how-to-set-up-mailpit-on-ubuntu-wsl-541778d13fd1) for setting up mailpit for local development.
