<?php
if (!isset($_GET['id'])) {
    echo "<p>Customer ID tidak ditemukan.</p>";
    return;
}

$id = $_GET['id'];
$data = $customer->getCustomerById($id);

if (!$data) {
    echo "<p>Data tidak ditemukan.</p>";
    return;
}

// Update data jika form disubmit
if (isset($_POST['update_customer'])) {
    $customer->updateCustomer($id, $_POST['name'], $_POST['email'], $_POST['phone']);
    header("Location: index.php?page=customers");
    exit;
}
?>

<h3>Edit Customer</h3>
<form method="POST">
    <input type="text" name="name" value="<?= htmlspecialchars($data['name']) ?>" required>
    <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>
    <input type="text" name="phone" value="<?= htmlspecialchars($data['phone']) ?>" required>
    <button type="submit" name="update_customer">Update</button>
</form>
