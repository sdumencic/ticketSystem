<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

# Ticketing system
## Content
- [Ticketing system](#ticketing-system)
  - [Content](#content)
  - [About Laravel](#about-laravel)
  - [Learning Laravel](#learning-laravel)
  - [Laravel Sponsors](#laravel-sponsors)
  - [Contributing](#contributing)
  - [Code of Conduct](#code-of-conduct)
  - [Security Vulnerabilities](#security-vulnerabilities)
- [About this project](#about-this-project)
  - [What you need to run this project](#what-you-need-to-run-this-project)
  - [Installing](#installing)
  - [License](#license)

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[British Software Development](https://www.britishsoftware.co)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)
- [云软科技](http://www.yunruan.ltd/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

# About this project

## What you need to run this project
To run this project, you will need to have: 
- [Composer](https://getcomposer.org/)
- [XAMPP](https://www.apachefriends.org/download.html)
- [VS 2015 redistributable](https://www.microsoft.com/en-us/p/surface-book-3/8XBW9G3Z71F1?activetab=pivot%3aoverviewtab)

I worked in [Visual Studio Code](https://code.visualstudio.com/download)

It is also preferable to have [git bash](https://git-scm.com/downloads) for cloning this project and having some UNIX commands

```
git clone https://github.com/sdumencic/ticketSystem
```

## Installing
Clone the repository to *C:\xampp\htdocs* 

Go to  *C:\Windows\System32\drivers\etc* and open file *hosts*, there you should write 
```
127.0.0.1 localhost
127.0.0.1 lsapp.localhost
```
at the bottom. 

Also, you will need to open *C:\xampp\apache\conf\extra* and open file httpd-vhosts.conf and paste following code at the bottom:
```
<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs"
    ServerName localhost
</VirtualHost>

<VirtualHost *:80>
    DocumentRoot "C:/xampp/htdocs/lsapp/public"
    ServerName lsapp.localhost
</VirtualHost>
```
Turn on xampp for Apache and MySQL.

Now you are ready to open your project folder in VS Code. Open the integrated terminal which you should put to git bash.

Follow these steps:
1. Run ```composer install```
2. Run ```npm install```
3. Copy the *.env.example.* to a new *.env* file ```cp .env.example .env```
4. Generate app_key ```php artisan key:generate``` 
5. Go to PhpMyAdmin (open xampp -> in the row where MySQL is press Admin), now Create new Table, give it a name, put charset to utf8mb4_unicode_ci
6. go to .env file in VS Code and put the name of DB_DATABASE=*the name you gave the table*
7. Create the database with ```php artisan:migrate```

For running this project in a browser, you will need to turn on Apache and MySQL in xampp and write ticketsystem.localhost in the URL.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
