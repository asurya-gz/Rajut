# Panduan Instalasi dan Menjalankan Aplikasi

## Persyaratan Sistem

### Software yang Diperlukan
- **PHP**: Versi 8.2 atau lebih tinggi
- **Composer**: Package manager untuk PHP
- **Node.js**: Versi 18 atau lebih tinggi
- **npm**: Package manager untuk Node.js
- **MySQL**: Database server
- **XAMPP/WAMP/MAMP**: (Opsional) Package yang sudah include Apache, MySQL, PHP

### Cara Mengecek Versi
```bash
php --version
composer --version
node --version
npm --version
```

## Langkah-Langkah Instalasi

### 1. Clone atau Download Project
```bash
# Jika menggunakan git
git clone [repository-url]
cd [NamaFolder]

```

### 2. Install Dependencies PHP
```bash
composer install
```

### 3. Install Dependencies JavaScript/CSS
```bash
npm install
```

### 4. Konfigurasi Environment
```bash
# Copy file environment
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Setup Database

#### Cara 1: Manual Setup MySQL
```bash
# 1. Buat database MySQL terlebih dahulu
# Masuk ke MySQL console:
mysql -u root -p

# Buat database:
CREATE DATABASE nama_database;
EXIT;
```

#### Cara 2: Menggunakan XAMPP/WAMP
1. Start Apache dan MySQL di control panel
2. Buka phpMyAdmin di browser: `http://localhost/phpmyadmin`
3. Buat database baru dengan nama yang diinginkan

#### Edit file .env
```bash
# Edit file .env dan ubah konfigurasi database:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=root
DB_PASSWORD=password_mysql_anda
```

#### Jalankan Migrasi
```bash
# Menjalankan migrasi database
php artisan migrate
```

### 6. Seeding Data (Opsional)
```bash
# Jika ada seeder untuk data awal
php artisan db:seed
```

## Cara Menjalankan Aplikasi

### Metode 1: Development Mode (Direkomendasikan)
```bash
# Menjalankan semua service sekaligus (server, queue, logs, vite)
composer run dev
```

Perintah ini akan menjalankan:
- Laravel development server di `http://localhost:8000`
- Queue worker untuk background jobs
- Log monitoring
- Vite development server untuk asset building

### Metode 2: Manual (Jika Metode 1 Tidak Berfungsi)

#### Terminal 1 - Laravel Server
```bash
php artisan serve
```

#### Terminal 2 - Frontend Development
```bash
npm run dev
```

#### Terminal 3 - Queue Worker (Jika Diperlukan)
```bash
php artisan queue:work
```

## URL Akses

Setelah aplikasi berjalan, buka browser dan akses:
- **Development**: `http://localhost:8000`
- **Vite Dev Server**: `http://localhost:5173` (untuk asset development)

## Troubleshooting

### Error Permission
```bash
# Berikan permission pada folder storage dan bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

### Cache Issues
```bash
# Clear semua cache
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Database Issues
```bash
# Reset database
php artisan migrate:fresh
php artisan migrate:fresh --seed  # dengan seeder
```

### Node Modules Issues
```bash
# Hapus dan install ulang node modules
rm -rf node_modules package-lock.json
npm install
```

## Menjalankan Tests
```bash
# Menjalankan semua test
composer run test

# Atau manual
php artisan test
```

## Build untuk Production
```bash
# Build assets untuk production
npm run build

# Optimize Laravel untuk production
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

## Catatan Penting

1. **Database**: Aplikasi menggunakan MySQL sebagai database
2. **Environment**: Pastikan file `.env` sudah dikonfigurasi dengan benar
3. **Assets**: Untuk development, gunakan `npm run dev`. Untuk production, gunakan `npm run build`
4. **Queue**: Jika aplikasi menggunakan queue jobs, pastikan queue worker berjalan
5. **Logs**: Log aplikasi tersimpan di `storage/logs/laravel.log`

## Bantuan

Jika mengalami masalah:
1. Cek log error di `storage/logs/laravel.log`
2. Pastikan semua dependencies terinstall dengan benar
3. Periksa konfigurasi di file `.env`
4. Jalankan perintah troubleshooting di atas