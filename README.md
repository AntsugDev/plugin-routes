# Laravel Routes Viewer

[![Latest Stable Version](https://poser.pugx.org/antonio-sugamele/plugin-routes/v)](https://packagist.org/packages/antonio-sugamele/plugin-routes)
[![Total Downloads](https://poser.pugx.org/antonio-sugamele/plugin-routes/downloads)](https://packagist.org/packages/antonio-sugamele/plugin-routes)
[![License](https://poser.pugx.org/antonio-sugamele/plugin-routes/license)](https://packagist.org/packages/antonio-sugamele/plugin-routes)

**Laravel Routes Viewer** provides a clean, web-based dashboard to inspect all registered routes in your Laravel application—eliminating the need to repeatedly run `php artisan route:list` in your terminal.

---

## Features

- 🔍 **Visual Route Inspection**: View all your application routes in a user-friendly table.
- 📋 **Key Route Information**:
    - **URI** (Route path)
    - **HTTP Method** (`GET`, `POST`, `PUT`, `DELETE`, etc.)
    - **Controller** class
    - **Action / Function** handling the request

---

## Requirements & Compatibility

- **PHP**: `>=8.2`
- **Laravel Framework**: `>=8.0` (using `illuminate/support` & `illuminate/routing`)

---

## Installation

Install the package via Composer:

```bash
       composer require antonio-sugamele/plugin-routes
```

## Post-Installation
Publish vendor:

```bash
       php artisan vendor:publish --tag=plugin-routes-assets --force  
```

Clear your route cache to ensure the new endpoint is properly registered:

```bash
       php artisan route:clear
```

## How to Access the Page
Once installed, open your browser and navigate to the dedicated route viewer page:

👉 http://your-app-domain/routes-viewer

(For local development with php artisan serve, go to: http://127.0.0.1:8000/routes-viewer)

# Installation Verification
To check if the package was installed correctly, run the following CLI command:
```bash
       php artisan route:list
```
Verification step: Look through the output list and verify that the /routes-viewer route is present. If it appears in the list, the installation was successful!

## License
This package is open-sourced software licensed under the MIT license.