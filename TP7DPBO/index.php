<?php
require_once 'class/Movie.php';
require_once 'class/Customer.php';
require_once 'class/Rental.php';

$movie = new Movie();
$customer = new Customer();
$rental = new Rental();

// Tambah data movie
if (isset($_POST['add_movie'])) {
    $movie->addMovie($_POST['title'], $_POST['genre'], $_POST['year'], $_POST['stock']);
}

// Tambah data customer
if (isset($_POST['add_customer'])) {
    $customer->addCustomer($_POST['name'], $_POST['email'], $_POST['phone']);
}

if (isset($_POST['rent_movie'])) {
    $rental->addRental($_POST['customer_id'], $_POST['movie_id'], date('Y-m-d'));
}

// Pengembalian movie
if (isset($_GET['return'])) {
    $rental->returnMovie($_GET['return'], date('Y-m-d'));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Rental System</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- HEADER -->
    <header>
        <h1 style="text-align:center;">Movie Rental System</h1>
        <hr>
    </header>

    <main>
        <h2>Welcome to Movie Rental System</h2>
        <nav>
            <a href="?page=movies">Movies</a> |
            <a href="?page=customers">Customers</a> |
            <a href="?page=rentals">Rentals</a>
        </nav>
        <hr>

        <?php
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
            if ($page == 'movies') include 'view/movies.php';
            elseif ($page == 'edit_movie') include 'view/edit_movies.php';
            elseif ($page == 'customers') include 'view/customers.php';
            elseif ($page == 'edit_customer') include 'view/edit_customers.php';
            elseif ($page == 'rentals') include 'view/rentals.php';
        } else {
            echo "<p>Silakan pilih menu di atas untuk mengelola data.</p>";
        }
        ?>
    </main>

    <!-- FOOTER -->
    <footer>
        <hr>
        <p style="text-align:center;">&copy; <?= date("Y") ?> Movie Rental App</p>
    </footer>
</body>
</html>
