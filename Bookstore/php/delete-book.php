<?php


// Connect to the database
$db = mysqli_connect('localhost', 'root', 'SPS!23', 'bookstore');

$delete_id = $_POST['bookId'];
// Prepare the DELETE statement
$query = "DELETE FROM book WHERE book.bookId = $delete_id";

// Execute the query
mysqli_query($db, $query);

header('Location: Administration.php');
?>