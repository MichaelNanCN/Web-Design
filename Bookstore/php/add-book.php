<?php


// Connect to the database
$db = mysqli_connect('localhost', 'root', 'SPS!23', 'bookstore');

// Prepare the INSERT statement
$query = "INSERT INTO book (bookId,categoryId,title, author,price,image,readNow) VALUES ('{$_POST['bookId']}', '{$_POST['categoryId']}', '{$_POST['title']}','{$_POST['author']}','{$_POST['price']}','{$_POST['image']}','{$_POST['readNow']}')";

// Execute the query
mysqli_query($db, $query);

header('Location: Administration.php');
?>

