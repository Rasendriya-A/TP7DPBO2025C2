# Tugas Praktikum 7

## Janji
Saya Rasendriya Andhika dengan NIM 2305309 mengerjakan Tugas Praktikum 7 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Movie Rental
Sebuah aplikasi berbasis web modular menggunakan PHP untuk mengelola data film, pelanggan, dan transaksi peminjaman film.
Proyek ini dirancang dengan pendekatan Object-Oriented Programming (OOP) dan diorganisir secara terstruktur menggunakan arsitektur modular yang memisahkan antara model (class PHP), view (file HTML/embedded PHP), dan controller (index.php).

## Desain Program
![drawSQL-image-export-2025-04-20](https://github.com/user-attachments/assets/65b3c162-5185-475b-b7fe-8156a210cf14)

Program ini adalah aplikasi berbasis web menggunakan PHP untuk mengelola data film, pelanggan, dan transaksi peminjaman film. Aplikasi ini dibuat dengan pendekatan Object-Oriented Programming (OOP) dan menggunakan model-view-controller (MVC) untuk memisahkan logika aplikasi, tampilan, dan pengelolaan data.

### 1. Class Movie
Class ini berfungsi untuk mengelola data film. Beberapa fungsionalitas utama dari class ini meliputi:
- Menambahkan film baru ke database.
- Mengambil semua data film untuk ditampilkan di tampilan utama.
- Mencari film berdasarkan judul menggunakan query SQL dengan parameter LIKE.
- Mengupdate dan menghapus data film berdasarkan ID.
- Menyediakan metode untuk mengakses data film yang akan digunakan oleh halaman movies.php untuk menampilkan dan mengelola data film.

### 2. Class Customer
Class ini bertanggung jawab untuk mengelola data pelanggan. Fungsi-fungsi utama class ini mencakup:
- Menambahkan pelanggan baru ke database.
- Mengambil semua data pelanggan untuk ditampilkan di tampilan.
- Mengupdate dan menghapus data pelanggan berdasarkan ID.
- Digunakan oleh halaman customers.php untuk menampilkan data pelanggan dan memungkinkan pengguna untuk menambah, mengubah, atau menghapus data pelanggan.

### 3. Class Rental
Class ini menangani semua logika yang berhubungan dengan transaksi peminjaman film. Fungsi utama dari class ini adalah:
- Menambahkan transaksi peminjaman baru dengan data ID pelanggan, ID film, dan tanggal pinjam.
- Mengelola status pengembalian film dan memperbarui status transaksi.
- Menampilkan daftar transaksi peminjaman yang sudah dilakukan, termasuk informasi status pengembalian dan tombol untuk mengembalikan film yang dipinjam.
- Menghubungkan data pelanggan dan film untuk menghasilkan laporan transaksi yang dapat ditampilkan di halaman rentals.php.

### 4. Class App (index.php)
Class ini berfungsi sebagai entry point dari aplikasi. Fungsinya adalah untuk:
- Mengontrol rute halaman berdasarkan parameter page dalam URL.
- Menangani request untuk menambahkan film, pelanggan, atau transaksi peminjaman.
- Menampilkan halaman-halaman yang sesuai (seperti movies.php, customers.php, dan rentals.php).
- Melakukan validasi untuk pengembalian film dengan mengubah status transaksi menjadi "kembali".

### 5. View (movies.php, customers.php, rentals.php)
Tampilan HTML yang menampilkan antarmuka pengguna (UI) untuk menampilkan data film, pelanggan, dan transaksi peminjaman.
- movies.php: Menampilkan daftar film yang tersedia, memungkinkan pengguna untuk menambah, mengedit, dan menghapus film.
- customers.php: Menampilkan daftar pelanggan dan memungkinkan pengguna untuk menambah atau mengedit data pelanggan.
- rentals.php: Menampilkan transaksi peminjaman film, serta memberikan opsi untuk mengembalikan film jika statusnya "dipinjam".

## Penjelasan Alur
### 1. Inisialisasi
Proses:
- Program dijalankan melalui index.php yang mengarahkan pengguna untuk memilih menu sesuai dengan parameter page.
- Halaman pertama yang tampil adalah daftar film di movies.php. Jika pengguna ingin menambah film, mereka bisa mengisi form dan mengklik tombol "Add Movie".
- Data film yang ditambahkan akan dimasukkan ke dalam database melalui class Movie.

### 2. Menambah Pelanggan
Proses:
- Pengguna dapat menambah data pelanggan melalui form di halaman customers.php.
- Setelah menambah pelanggan, pengguna bisa memilih pelanggan yang telah terdaftar untuk melakukan peminjaman film di halaman rentals.php.

### 3. Menyewa Film
Proses:
- Halaman rentals.php memungkinkan pengguna untuk memilih pelanggan dan film yang akan disewa. Setelah memilih film dan pelanggan, pengguna bisa menekan tombol "Rent" untuk membuat transaksi peminjaman baru.
- Transaksi peminjaman akan disimpan dalam tabel rentals dan menampilkan detail transaksi seperti ID rental, nama pelanggan, judul film, tanggal pinjam, dan status pengembalian.

### 4. Pengembalian Film
Proses:
- Pada halaman rentals.php, jika status rental adalah "dipinjam", pengguna bisa menekan tombol "Return Movie" untuk mengembalikan film.
- Status peminjaman film akan diperbarui menjadi "kembali" dan tanggal pengembalian akan dicatat.

### 5. Edit dan Hapus Data
Proses:
- Pengguna dapat mengedit atau menghapus film dan pelanggan melalui tampilan yang ada.
- Untuk mengedit data film atau pelanggan, pengguna cukup mengklik tombol edit dan mengubah nilai yang sesuai. Setelah itu, data akan diperbarui di database.
- Penghapusan dilakukan dengan mengklik tombol "Delete" di samping data yang ingin dihapus.

## Dokumentasi
https://github.com/user-attachments/assets/db969aca-26f9-4334-b0e9-08a98ef8fa27

