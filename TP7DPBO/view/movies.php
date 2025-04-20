<h3>Movie List</h3>

<!-- Form Tambah Movie -->
<form method="POST" style="margin-bottom: 15px;">
    <input type="text" name="title" placeholder="Title" required>
    <input type="text" name="genre" placeholder="Genre" required>
    <input type="number" name="year" placeholder="Year" required>
    <input type="number" name="stock" placeholder="Stock" required>
    <button type="submit" name="add_movie">Add Movie</button>
</form>

<!-- Form Search -->
<form method="GET" style="margin-bottom: 15px;">
    <input type="hidden" name="page" value="movies">
    <input type="text" name="search" placeholder="Search by Title" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
    <button type="submit">Search</button>
</form>

<h3>Available Movies</h3>
<table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Genre</th>
        <th>Year</th>
        <th>Stock</th>
        <th>Action</th>
    </tr>

    <?php
    $movies = [];

    if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
        $movies = $movie->searchMovies($_GET['search']);
        if (empty($movies)) {
            echo '<tr><td colspan="6">No movies found for "' . htmlspecialchars($_GET['search']) . '"</td></tr>';
        }
    } else {
        $movies = $movie->getAllMovies();
    }

    foreach ($movies as $m):
    ?>
    <tr>
        <td><?= $m['id'] ?></td>
        <td><?= htmlspecialchars($m['title']) ?></td>
        <td><?= htmlspecialchars($m['genre']) ?></td>
        <td><?= $m['year'] ?></td>
        <td><?= $m['stock'] ?></td>
        <td>
            <a href="?page=edit_movie&id=<?= $m['id'] ?>">Edit</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
