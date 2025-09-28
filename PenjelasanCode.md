# Penjelasan Struktur dan Code Aplikasi

## Overview Aplikasi

Aplikasi ini adalah **E-commerce System** yang dibangun menggunakan **Laravel Framework**. Aplikasi memiliki fitur untuk pengguna biasa (customer) dan administrator untuk mengelola produk dan pesanan.

## Teknologi yang Digunakan

### Backend
- **Laravel Framework** (v12.0): Framework PHP untuk web application
- **PHP** (v8.2+): Bahasa pemrograman backend
- **MySQL**: Database untuk menyimpan data
- **Laravel Breeze**: Package untuk authentication

### Frontend
- **Blade Templates**: Template engine Laravel
- **Tailwind CSS**: CSS framework untuk styling
- **Alpine.js**: JavaScript framework untuk interaktivitas
- **Vite**: Build tool untuk asset bundling

## Struktur Direktori

```
JokiPBP/
├── app/                     # Aplikasi utama
│   ├── Http/
│   │   ├── Controllers/     # Controller untuk logic bisnis
│   │   ├── Middleware/      # Middleware untuk request filtering
│   │   └── Requests/        # Form request validation
│   ├── Models/              # Model untuk database entities
│   └── Providers/           # Service providers
├── database/
│   ├── migrations/          # File migrasi database
│   ├── seeders/             # Data seeder
│   └── factories/           # Model factories untuk testing
├── resources/
│   ├── views/               # Blade template files
│   ├── css/                 # CSS files
│   └── js/                  # JavaScript files
├── routes/                  # Route definitions
├── public/                  # Public assets
└── storage/                 # File storage
```

## Models dan Database Schema

### 1. User Model
**File**: `app/Models/User.php`
- Model untuk pengguna sistem (customer dan admin)
- Fields: id, name, email, password, is_admin, email_verified_at
- Relations: hasMany(Order), hasMany(CartItem)

### 2. Product Model
**File**: `app/Models/Product.php`
- Model untuk produk yang dijual
- Fields: id, name, image, price, stock, category_id, is_active
- Relations: belongsTo(Category), hasMany(CartItem), hasMany(OrderItem)
- Scopes: active(), inStock()

### 3. Category Model
**File**: `app/Models/Category.php`
- Model untuk kategori produk
- Fields: id, name, description
- Relations: hasMany(Product)

### 4. Order Model
**File**: `app/Models/Order.php`
- Model untuk pesanan pelanggan
- Fields: id, user_id, total, status, address_text
- Status: pending, processing, shipped, completed, cancelled
- Relations: belongsTo(User), hasMany(OrderItem)

### 5. OrderItem Model
**File**: `app/Models/OrderItem.php`
- Model untuk item dalam pesanan
- Fields: id, order_id, product_id, quantity, price
- Relations: belongsTo(Order), belongsTo(Product)

### 6. Cart & CartItem Models
**Files**: `app/Models/Cart.php`, `app/Models/CartItem.php`
- Model untuk keranjang belanja
- CartItem fields: id, cart_id, product_id, quantity
- Relations: Cart hasMany(CartItem), CartItem belongsTo(Product)

## Controllers dan Logic Bisnis

### 1. HomeController
- Menampilkan halaman utama dengan produk terbaru
- Public access (tidak perlu login)

### 2. ProductListingController
- Menampilkan daftar produk dan detail produk
- Public access untuk browsing produk

### 3. CartController
**File**: `app/Http/Controllers/CartController.php`
- `index()`: Menampilkan isi keranjang
- `store()`: Menambah produk ke keranjang
- `update()`: Mengubah quantity item
- `destroy()`: Menghapus item dari keranjang

### 4. OrderController
**File**: `app/Http/Controllers/OrderController.php`
- `index()`: Menampilkan daftar pesanan user
- `show()`: Detail pesanan
- `checkout()`: Halaman checkout
- `store()`: Memproses pesanan baru

### 5. Admin Controllers

#### AdminController
**File**: `app/Http/Controllers/Admin/AdminController.php`
- Dashboard admin dengan statistik

#### Admin\ProductController
**File**: `app/Http/Controllers/Admin/ProductController.php`
- CRUD operations untuk produk
- `index()`: Daftar produk dengan pagination
- `create()`: Form tambah produk
- `store()`: Simpan produk baru
- `edit()`: Form edit produk
- `update()`: Update produk
- `destroy()`: Hapus produk

#### Admin\OrderController
**File**: `app/Http/Controllers/Admin/OrderController.php`
- `index()`: Daftar semua pesanan
- `show()`: Detail pesanan
- `updateStatus()`: Update status pesanan

#### Admin\UserController
**File**: `app/Http/Controllers/Admin/UserController.php`
- CRUD operations untuk user management

## Routing System

### Public Routes
**File**: `routes/web.php` (lines 14-19)
```php
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::view('/about', 'about')->name('about');
Route::view('/layanan-informasi', 'information')->name('information');
Route::get('/produk', [ProductListingController::class, 'index'])->name('products.index');
Route::get('/produk/{product}', [ProductListingController::class, 'show'])->name('products.show');
```

### Authenticated Routes
**File**: `routes/web.php` (lines 22-42)
- Dashboard, Profile management
- Cart operations (CRUD)
- Order management (view orders, checkout)

### Admin Routes
**File**: `routes/web.php` (lines 45-58)
- Prefix: `/admin`
- Middleware: `['auth', 'admin']`
- Product management (full CRUD)
- Order management (view, update status)
- User management

## Middleware

### AdminMiddleware
**File**: `app/Http/Middleware/AdminMiddleware.php`
- Mengecek apakah user adalah admin
- Mencegah akses non-admin ke area admin

## Authentication

Menggunakan **Laravel Breeze** untuk:
- Login/Register
- Password reset
- Email verification
- Profile management

## Database Migrations

### Key Tables:
1. **users**: Data pengguna
2. **categories**: Kategori produk
3. **products**: Data produk
4. **cart_items**: Item dalam keranjang
5. **orders**: Data pesanan
6. **order_items**: Item dalam pesanan

## Frontend Architecture

### Blade Templates
- Layout utama menggunakan Blade components
- Template inheritance untuk konsistensi
- Component reusability

### Styling
- **Tailwind CSS**: Utility-first CSS framework
- Responsive design
- Custom components

### JavaScript
- **Alpine.js**: Lightweight framework untuk interaktivitas
- **Axios**: HTTP client untuk AJAX requests

## Features Utama

### Untuk Customer:
1. **Browse Products**: Melihat daftar dan detail produk
2. **Shopping Cart**: Menambah, edit, hapus item dari keranjang
3. **Checkout**: Proses pemesanan dengan alamat pengiriman
4. **Order History**: Melihat riwayat pesanan dan statusnya
5. **Profile Management**: Edit profil dan password

### Untuk Admin:
1. **Dashboard**: Overview statistik penjualan
2. **Product Management**: CRUD produk dengan kategori
3. **Order Management**: Melihat dan update status pesanan
4. **User Management**: Kelola data pengguna
5. **Inventory Control**: Kontrol stok produk

## Security Features

1. **Authentication**: Login required untuk fitur tertentu
2. **Authorization**: Admin middleware untuk area admin
3. **CSRF Protection**: Token CSRF di semua form
4. **Input Validation**: Validasi data input di controller
5. **SQL Injection Prevention**: Eloquent ORM mencegah SQL injection

## Development Tools

1. **Composer**: Dependency management untuk PHP
2. **NPM**: Package management untuk frontend
3. **Vite**: Fast build tool dan hot reload
4. **Laravel Artisan**: CLI tools untuk development
5. **Database Seeding**: Sample data untuk development

## Best Practices yang Diterapkan

1. **MVC Pattern**: Separation of concerns
2. **Eloquent Relationships**: Proper database relations
3. **Route Model Binding**: Automatic model injection
4. **Form Request Validation**: Dedicated validation classes
5. **Middleware Usage**: Request filtering dan authorization
6. **Blade Components**: Reusable UI components
7. **Database Migrations**: Version control untuk schema
8. **Environment Configuration**: Proper config management

## File Konfigurasi Penting

1. **`.env`**: Environment variables (database, app settings)
2. **`composer.json`**: PHP dependencies dan scripts
3. **`package.json`**: JavaScript dependencies
4. **`tailwind.config.js`**: Tailwind CSS configuration
5. **`vite.config.js`**: Build tool configuration

Aplikasi ini mengikuti standar Laravel dan best practices untuk development aplikasi e-commerce yang scalable dan maintainable.