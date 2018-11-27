# laravel-5-layer

A dev toolkit to transform Laravel to 5-Layered Architecture.

## Get started

```$xslt
$ composer require toanna/laravel-5-layer
```

## Commands

### Initialize folder structure

```
$ php artisan 5l:init
```

Folder structure:

```$xslt
/app
    /Abstraction
        /ExternalServiceInterface
        /RepositoryInterface
    /Business
    /BusinessService
    /Common
        /CircuitBreaker
        /DomainModels
        /Exceptions
        /ExternalConfig
        /Logging
    /Dependency
        /ExternalServices
        /Repositories
    /Providers
    /Representation
        /Console
        /Http
            /Controllers
                /Api
                /Auth
            /Middleware
            /Requests
            Kernel.php
```

### Creating Commands

Create an Abstraction Interface to `app/Abstraction/`:
```
$ php artisan 5l:abstraction ExternalServiceInterface/IFileUploader
```

Create a Business Logic Class to `app/Business/`:
```
$ php artisan 5l:business CreateFileBL
```

Create a Business Service Class to `app/BusinessService/`:
```
$ php artisan 5l:business_service CreateFileBS
```

Create a Controller Class to `app/Representation/Http/`:
```
$ php artisan 5l:controller TestController
```

Create an API Controller Class to `app/Representation/Http/Api`:
```
$ php artisan 5l:api_controller FileController
```

Create a Dependency Class to `app/Dependency/`:
```
$ php artisan 5l:dependency Repositories/SQLFileCreator
```

Create a Domain Model Class to `app/Common/DomainModels`:
```
$ php artisan 5l:domain_model File
```

Create an Eloquent ORM Class to `app/Dependency/Repositories/Eloquent/`:
```
$ php artisan 5l:eloquent FileEloquent
```

Create an Exception Class to `app/Common/Exceptions/`:
```
$ php artisan 5l:exception ValidationException
```

Create a Form Request Class to `app/Representation/Http/Requests/`:
```
$ php artisan 5l:request CreateFileRequest
```

Create a Resource to `app/Representation/Http/Resources/`:
```
$ php artisan 5l:resource
```

Create a Artisan Command to `app/Representation/Console/Commands/`:
```
$ php artisan 5l:console AbstractionMakeCommand
```

## Contributors

- Thắng Lê <thang.le@saf.com.vn>
- Toàn Nguyễn <toan.nguyen@saf.com.vn>