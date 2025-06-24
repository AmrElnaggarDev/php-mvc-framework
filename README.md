# Custom MVC Framework in Pure PHP

This is a fully functional MVC framework built from scratch using pure PHP, inspired by the Laracasts PHP course by Jeffrey Way. The project focuses on understanding the core architecture of MVC applications without using external frameworks like Laravel or Symfony.

---

## 🚀 Features

- ✅ MVC Architecture (Models, Views, Controllers)
- ✅ Custom Routing System
- ✅ Full CRUD Functionality
- ✅ Form Validation & Error Handling
- ✅ Authentication & Authorization
- ✅ Session Management
- ✅ Middleware (Auth / Guest)
- ✅ PSR-4 Autoloading via Composer
- ✅ Basic Testing Structure (Feature/Unit)

---

## 🗂 Folder Structure

```
demo
├── .idea
├── Core
│   ├── App.php
│   ├── Authenticator.php
│   ├── Container.php
│   ├── Database.php
│   ├── functions.php
│   ├── Response.php
│   ├── Router.php
│   ├── Session.php
│   ├── ValidationException.php
│   └── Validator.php
├── Http
│   ├── Forms
│   │   └── LoginForm.php
│   └── controllers
│       ├── about.php
│       ├── contact.php
│       ├── index.php
│       ├── notes
│       │   ├── create.php
│       │   ├── destroy.php
│       │   ├── edit.php
│       │   ├── index.php
│       │   ├── show.php
│       │   ├── store.php
│       │   └── update.php
│       ├── registration
│       │   ├── create.php
│       │   └── store.php
│       └── session
│           ├── create.php
│           ├── destroy.php
│           └── store.php
├── Middleware
│   ├── Auth.php
│   ├── Guest.php
│   └── Middleware.php
├── public
│   └── index.php
├── tests
│   ├── Feature
│   ├── Unit
│   ├── Pest.php
│   └── TestCase.php
├── vendor
├── views
│   ├── notes
│   │   ├── create.view.php
│   │   ├── edit.view.php
│   │   ├── index.view.php
│   │   └── show.view.php
│   ├── partials
│   │   ├── banner.php
│   │   ├── footer.php
│   │   ├── head.php
│   │   └── nav.php
│   ├── registration
│   │   └── create.view.php
│   ├── session
│   │   └── create.view.php
│   ├── 403.php
│   ├── 404.php
│   ├── about_view.php
│   ├── contact.view.php
│   └── index.view.php
├── .htaccess
├── bootstrap.php
├── composer.json
├── composer.lock
├── config.php
├── contact.php
├── phpunit.xml
└── routes.php
```

## ⚙️ Technologies Used

- PHP (Object-Oriented)
- Composer (for autoloading)
- Apache (.htaccess routing)
- PHPUnit / Pest (for tests)
- XAMPP (local dev)

---

## 📌 Notes

This project was built for educational purposes to practice implementing backend systems without relying on frameworks. It showcases core PHP architecture and principles such as dependency injection, middleware handling, and request routing.

---
