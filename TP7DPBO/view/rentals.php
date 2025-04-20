<h3>Rental List</h3>
<?php if (isset($_GET['movie_id']) && isset($_GET['customer_id'])): ?>
    <form method="POST">
        <input type="hidden" name="movie_id" value="<?= $_GET['movie_id'] ?>">
        <input type="hidden" name="customer_id" value="<?= $_GET['customer_id'] ?>">
        <input type="date" name="rent_date" value="<?= date('Y-m-d') ?>" required>
        <button type="submit" name="rent_movie">Rent Movie</button>
    </form>
<?php endif; ?>

<h3>Rent a Movie</h3>
<form method="POST">
    <label for="movie_id">Movie:</label>
    <select name="movie_id" required>
        <?php foreach ($movie->getAllMovies() as $m): ?>
            <option value="<?= $m['id'] ?>"><?= htmlspecialchars($m['title']) ?></option>
        <?php endforeach; ?>
    </select>

    <label for="customer_id">Customer:</label>
    <select name="customer_id" required>
        <?php foreach ($customer->getAllCustomers() as $c): ?>
            <option value="<?= $c['id'] ?>"><?= htmlspecialchars($c['name']) ?></option>
        <?php endforeach; ?>
    </select>

    <button type="submit" name="rent_movie">Rent</button>
</form>


<h3>All Rentals</h3>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>Rental ID</th>
        <th>Customer</th>
        <th>Movie</th>
        <th>Rent Date</th>
        <th>Return Date</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
    <?php foreach ($rental->getAllRentals() as $r): ?>
    <tr>
        <td><?= $r['id'] ?></td>
        <td><?= htmlspecialchars($r['customer_name']) ?></td>
        <td><?= htmlspecialchars($r['movie_title']) ?></td>
        <td><?= $r['rent_date'] ?></td>
        <td><?= $r['return_date'] ?></td>
        <td><?= $r['rental_status'] ?></td>
        <td>
            <?php if ($r['rental_status'] == 'borrowed'): ?>
                <a href="?page=rentals&return=<?= $r['id'] ?>">Return Movie</a>
            <?php endif; ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
