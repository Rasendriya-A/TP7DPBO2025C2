<?php
require_once 'config/db.php';

class Rental {
    private $db;

    // Konstruktor untuk inisialisasi koneksi database
    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // Fungsi untuk menambah penyewaan baru
    public function addRental($customer_id, $movie_id, $rent_date, $return_date = NULL, $rental_status = 'borrowed') {
        $stmt = $this->db->prepare("INSERT INTO rentals (customer_id, movie_id, rent_date, return_date, rental_status) VALUES (?, ?, ?, ?, ?)");
        return $stmt->execute([$customer_id, $movie_id, $rent_date, $return_date, $rental_status]);
    }

    // Fungsi untuk mengambil semua data penyewaan
    public function getAllRentals() {
        $stmt = $this->db->query("
            SELECT rentals.*, customers.name AS customer_name, movies.title AS movie_title
            FROM rentals
            JOIN customers ON rentals.customer_id = customers.id
            JOIN movies ON rentals.movie_id = movies.id
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }    

    // Fungsi untuk mendapatkan data penyewaan berdasarkan ID
    public function getRentalById($id) {
        $stmt = $this->db->prepare("SELECT * FROM rentals WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk memperbarui status pengembalian
    public function returnMovie($rental_id, $return_date) {
        $stmt = $this->db->prepare("UPDATE rentals SET return_date = ?, rental_status = 'returned' WHERE id = ?");
        return $stmt->execute([$return_date, $rental_id]);
    }

    // Fungsi untuk menghapus penyewaan
    public function deleteRental($id) {
        $stmt = $this->db->prepare("DELETE FROM rentals WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
