---

## 🚀 Cara Clone & Menjalankan Project

Berikut adalah langkah-langkah untuk menjalankan aplikasi secara lokal:

### 1. Clone Repository

```bash
git clone https://github.com/BimaFdilana/coursework-USTI-TeknikInformatika.git
cd coursework-USTI-TeknikInformatika
```

### 2. Install Dependency

```bash
composer install
npm install
```

### 3. Konfigurasi .Env

 Buat DB dengan nama ** mahasiswa ** menggunakan MySQL atau yang lain 

```bash
cp .env.example .env
```
lalu sesuaikan .env dengan database yang akan digunakan
```bash
APP_NAME=Mahasiswa
APP_URL=http://localhost:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mahasiswa
DB_USERNAME=root
DB_PASSWORD=

BROADCAST_DRIVER=pusher
PUSHER_APP_ID=your_id
PUSHER_APP_KEY=your_key
PUSHER_APP_SECRET=your_secret
```

### 4. Generate Key

```bash
php artisan key:generate
```

### 5. Migrate Database

```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

### 6. Run Development Server

```bash
php artisan serve
```

### 7. Akses Aplikasi

Buka browser dan akses aplikasi di `http://localhost:8000`.




