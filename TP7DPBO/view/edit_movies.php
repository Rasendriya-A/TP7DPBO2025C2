<?php
if (isset($_GET['id'])) {
    $movieData = $movie->getMovieById($_GET['id']);

    if (!$movieData) {
        echo "<p>Movie not found!</p>";
        return;
    }

    if (isset($_POST['update_movie'])) {
        $movie->updateMovie($_GET['id'], $_POST['title'], $_POST['genre'], $_POST['year'], $_POST['stock']);
        header("Location: index.php?page=movies");
        exit;
    }
} else {
    echo "<p>Invalid movie ID.</p>";
    return;
}
?>

<h3>Edit Movie</h3>
<form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($movieData['title']) ?>" required>
    <input type="text" name="genre" value="<?= htmlspecialchars($movieData['genre']) ?>" required>
    <input type="number" name="year" value="<?= $movieData['year'] ?>" required>
    <input type="number" name="stock" value="<?= $movieData['stock'] ?>" required>
    <button type="submit" name="update_movie">Update Movie</button>
</form>
