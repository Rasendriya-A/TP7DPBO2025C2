<?php
require_once 'config/db.php';

class Movie {
    private $db;

    // Konstruktor untuk inisialisasi koneksi database
    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // Fungsi untuk menambah film baru
    public function addMovie($title, $genre, $year, $stock) {
        $stmt = $this->db->prepare("INSERT INTO movies (title, genre, year, stock) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$title, $genre, $year, $stock]);
    }

    // Fungsi untuk mengambil semua data film
    public function getAllMovies() {
        $stmt = $this->db->query("SELECT * FROM movies");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk mendapatkan data film berdasarkan ID
    public function getMovieById($id) {
        $stmt = $this->db->prepare("SELECT * FROM movies WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk memperbarui data film
    public function updateMovie($id, $title, $genre, $year, $stock) {
        $stmt = $this->db->prepare("UPDATE movies SET title = ?, genre = ?, year = ?, stock = ? WHERE id = ?");
        return $stmt->execute([$title, $genre, $year, $stock, $id]);
    }

    // Fungsi untuk menghapus film
    public function deleteMovie($id) {
        $stmt = $this->db->prepare("DELETE FROM movies WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Fungsi pencarian film berdasarkan judul
    public function searchMovies($search) {
        $stmt = $this->db->prepare("SELECT * FROM movies WHERE title LIKE ?");
        $stmt->execute(['%' . $search . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
?>
