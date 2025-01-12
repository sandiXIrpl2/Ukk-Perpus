# 📚 Laravel Sistem Perpustakaan Sekolah

## 🚀 Overview
Projek ini dibuat berdasarkan judul project UKK "Perpustakaan Sekolah", dan ERD yang telah diberikan.

Perpustakaan Laravel adalah aplikasi web yang dibangun dengan framework Laravel, dirancang untuk mengelola buku, anggota, transaksi peminjaman, dan lainnya. Aplikasi ini memiliki berbagai fitur seperti:

- Pengelolaan rak buku, kategori buku, dan format buku.
- Pengelolaan jenis anggota (Admin, Siswa) dengan pembatasan jumlah peminjaman.
- Fitur peminjaman dan pengembalian buku untuk anggota.
- Sistem denda untuk keterlambatan dan kehilangan buku.
- Menyediakan laporan transaksi peminjaman buku.

## 🛠️ Features
1. **Manajemen Rak Buku (tbl_rak)**
   - Menambahkan, mengedit, dan menghapus rak buku.
   - Menyimpan informasi tentang kode rak, nama rak, dan keterangan.

2. **Manajemen DDC (tbl_ddc)**
   - Menambahkan, mengedit, dan menghapus kategori DDC (Dewey Decimal Classification).
   - Mengelola kode DDC, deskripsi, dan hubungan dengan rak buku.

3. **Manajemen Format Buku (tbl_format)**
   - Menambahkan, mengedit, dan menghapus format buku (misalnya: hardcover, paperback).
   - Menyimpan informasi kode format dan keterangan.

4. **Manajemen Jenis Anggota (tbl_jenis_anggota)**
   - Menambahkan, mengedit, dan menghapus jenis anggota (misalnya: Admin, Siswa).
   - Mengelola kode jenis anggota, nama jenis, dan batasan peminjaman (jumlah maksimum peminjaman).

5. **Manajemen Penerbit (tbl_penerbit)**
   - Menambahkan, mengedit, dan menghapus penerbit buku.
   - Mengelola kode penerbit, nama penerbit, alamat, nomor telepon, email, fax, website, dan kontak.

6. **Manajemen Pengarang (tbl_pengarang)**
   - Menambahkan, mengedit, dan menghapus pengarang buku.
   - Menyimpan data pengarang termasuk gelar, nama, kontak, email, biografi, dan keterangan.

7. **Manajemen Perpustakaan (tbl_perpustakaan)**
   - Menambahkan, mengedit, dan menghapus informasi perpustakaan.
   - Mengelola nama perpustakaan, pustakawan, alamat, email, website, nomor telepon, dan keterangan.

8. **Manajemen Pustaka (tbl_pustaka)**
   - Menambahkan, mengedit, dan menghapus buku yang ada di perpustakaan.
   - Menyimpan data buku termasuk ISBN, judul, tahun terbit, pengarang, penerbit, kategori DDC, format, harga, kondisi buku, dan lainnya.

9. **Manajemen Anggota (tbl_anggota)**
   - Menambahkan, mengedit, dan menghapus data anggota perpustakaan.
   - Mengelola informasi anggota seperti kode anggota, nama, alamat, tanggal lahir, jenis anggota, username, password, dan foto.

10. **Manajemen Transaksi Peminjaman (tbl_transaksi)**
    - Menambahkan, mengedit, dan menghapus transaksi peminjaman buku.
    - Mengelola data transaksi termasuk peminjam (anggota), buku yang dipinjam, tanggal pinjam, tanggal kembali, dan denda.

11. **Laporan Transaksi Peminjaman**
    - Melihat laporan transaksi peminjaman dan pengembalian buku.
    - Menampilkan status peminjaman, buku yang terlambat, dan denda yang dikenakan.

12. **Denda Peminjaman dan Kehilangan Buku**
    - Menentukan denda keterlambatan pengembalian buku.
    - Menentukan denda untuk buku yang hilang atau rusak.

Setiap fitur ini memberikan kontrol penuh terhadap manajemen data perpustakaan, mulai dari rak buku hingga transaksi peminjaman dan pengembalian, dengan pengelolaan yang efisien dan mudah.

## 📋 Prerequisites
Ensure you have the following installed on your system:

- **PHP 8.2+**
- **Composer**
- **Laravel 11**
- **MySQL**
- **Node.js & npm**

## 🔧 Installation
Follow these steps to set up the project locally:

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/AxelMardiyo/UKK-Perpustakaan-Sekolah.git
```   
Move into the project directory:
    
```bash
cd UKK-Perpustakaan-Sekolah
```

### 2️⃣ Install Backend Dependencies
```bash
composer install
```

### 3️⃣ Configure Environment Variables
Duplicate the `.env.example` file and rename it to `.env`:
```bash
cp .env.example .env
```
Update the `.env` file with your database credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4️⃣ Generate Application Key
```bash
php artisan key:generate
```

### 5️⃣ Migrate the Database
```bash
php artisan migrate
```

### 6️⃣ Compile Frontend Assets (Optional)
If the project uses custom CSS or JavaScript:
```bash
npm install
npm run dev
```

### 7️⃣ Start the Server
Run the Laravel development server:
```bash
php artisan serve
```
Access the application at `http://127.0.0.1:8000`.

## 🛡️ Default Admin Credentials
```text
Email: admin@gmail.com
Password: password
```
