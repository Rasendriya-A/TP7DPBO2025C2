<h3>Customer List</h3>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="phone" placeholder="Phone" required>
    <button type="submit" name="add_customer">Add Customer</button>
</form>

<h3>Customers</h3>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Action</th>
    </tr>
    <?php foreach ($customer->getAllCustomers() as $c): ?>
    <tr>
        <td><?= $c['id'] ?></td>
        <td><?= $c['name'] ?></td>
        <td><?= $c['email'] ?></td>
        <td><?= $c['phone'] ?></td>
        <td>
            <a href="?page=rentals&customer_id=<?= $c['id'] ?>">Rent Movie</a>
            <a href="?page=edit_customer&id=<?= $c['id'] ?>">Edit</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
