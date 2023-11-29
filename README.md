## Table of Contents
- [Installation](#installation)

### Installation

    1. clone this repo
    2. run `composer install`
    3. run `npm install`
    4. create a '.env.dev' file in root folder
    5. add on the .env.dev DATABASE_URL="mysql://root:@127.0.0.1:3306/nclh_dev?serverVersion=8.0.32&charset=utf8mb4" (edit mo nalang based sa version and user and pass mo)
    6. run `php bin\console doctrine:database:create`
    7. run `php bin\console make:migration`
    8. run `php bin\console doctrine:migrations:migrate`
    9. run `php bin\console doctrine:fixtures:load`

    10. try to login. check `src/DataFixtures/AppFixtures.php` for user credentials