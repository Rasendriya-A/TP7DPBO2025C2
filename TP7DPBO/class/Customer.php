<?php
require_once 'config/db.php';

class Customer {
    private $db;

    // Konstruktor untuk inisialisasi koneksi database
    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // Fungsi untuk menambah pelanggan baru
    public function addCustomer($name, $email, $phone) {
        $stmt = $this->db->prepare("INSERT INTO customers (name, email, phone) VALUES (?, ?, ?)");
        return $stmt->execute([$name, $email, $phone]);
    }

    // Fungsi untuk mengambil semua data pelanggan
    public function getAllCustomers() {
        $stmt = $this->db->query("SELECT * FROM customers");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk mendapatkan data pelanggan berdasarkan ID
    public function getCustomerById($id) {
        $stmt = $this->db->prepare("SELECT * FROM customers WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk memperbarui data pelanggan
    public function updateCustomer($id, $name, $email, $phone) {
        $stmt = $this->db->prepare("UPDATE customers SET name = ?, email = ?, phone = ? WHERE id = ?");
        return $stmt->execute([$name, $email, $phone, $id]);
    }

    // Fungsi untuk menghapus pelanggan
    public function deleteCustomer($id) {
        $stmt = $this->db->prepare("DELETE FROM customers WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
