<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Test Task Description

- Create a new Laravel and Livewire application (you can use the latest version)

- Create a 2 page form (livewire form so both pages are on the same URL route). First page should have Next button, the second page should have Previous and Submit buttons. (Previous goes to page 1, where it should keep all of the form input user entered, the submit button submits the form, etc...)

- Page 1 fields:

- First name

- Last name

- Address

- City

- Country

- Date of birth (3 separate select fields month/day/year) - on the backend combine these so it's easy to save as date time field in MySQL.

- Page 2 fields:

- "Are you married?" - Yes/No

- If Yes, the following fields show up conditionally:

- Date of marriage - same logic as Date of birth (If date of marriage occurred before the user was 18 years old, show an error message "You are not eligible to apply because your marriage occurred before your 18th birthday." and do not allow submission of form.)

- Country of marriage

- If No, the following fields show up conditionally:

- Are you widowed? Yes/No

- Have you ever been married in the past? Yes/No

Submit - Form submission should show a white page with output of the form results.

* Do not worry about the design/style of the form for now.

* We want to evaluate how the form functions when you're ready to show us.

* We want to evaluate how you developed the form, so we'll need access to the source code when it's ready.
* You will have up to 12 hours to complete this. You do not have to use all 12 hours if you think you can get it done sooner with good code readability, functionality, and performance.


## Features
- **[PHP8.2]**
- **[Larevel 10]**
- **[Livewire v3]**
- **[Tailwind]**

## Installation

- git clone
- Edit .env and set your database connection details.
- php artisan key:generate
- composer install
- php artisan migrate
- php artisan serve
