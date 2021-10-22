# UTS PBWL Boromeus Agie 2017110056

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://travis-ci.org/joemccann/dillinger)

Repository ini dibuat untuk melengkapi UTS PBWL STMIK LIKMI.

## Installation

Tugas ini membutuhkan [Node.js](https://nodejs.org/) v12+, [PHP](https://php.net/) v7.4+ dan [Laravel](https://laravel.com) v8+.

### Step 1

Clone repository ini di folder anda.

Lalu masukkan perintah ini di command prompt:
```
composer install
npm install
npm run dev
```

### Step 2
Jalankan perintah ini untuk migrasi database setelah Anda membuat database dan mengatur file .env.
```
php artisan migrate --seed
```

### Step 3
Jalankan server apache atau masukkan perintah ini di command prompt
```
php artisan serve
```

# Terima Kasih
