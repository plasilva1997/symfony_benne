# EcoVerre

> Second project of the second year of Bachelor Web Development.



## Technical Requirements
In order to be able to run the application on your workstation, you must install the following dependencies:
  * Symfony 4.4
  * PHP 7.1 or higher
  * Composer
  
### Installation
#### Symfony
  1. [Downdload](https://symfony.com/download)
  
#### PHP (recommended)
  1. Install [Mamp](https://www.mamp.info/en/downloads/) for MacOS 
  2. Install [Wamp](https://www.wampserver.com/) for Windows
  3. Install [Xampp](https://www.apachefriends.org/fr/index.html) for Linux
 
#### Composer
  1. [Downdload](https://getcomposer.org/)
  
  
## Execution
 
  1. Open a command prompt at the root of the project
  2. Check if your computer meets all requirements `$ symfony check:requirements`
  3. `$ composer install`
  4. Configuration .env
  5. `$ php bin/console doctrine:database:create`
  6. `$ php bin/console doctrine:make:migration`
  7. `$ php bin/console doctrine:migrations:migrate`
  8. Run server `$ php bin/console server:start`
  9. Open a browser at [http://localhost:8000](http://localhost:8000)


For detailed explanation on how things work, check out [Synfony Docs](https://symfony.com/doc/4.4//index.html).

## Contributors

[Axel Barbe Husson](https://github.com/AxelBarbeHusson)

[Victor Clarke](https://github.com/Greugreu)


