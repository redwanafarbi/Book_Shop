<?php
    // include the function
    include_once './functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/dest/tailwind.css">
    <link rel="stylesheet" href="./assets/src/style.css">
    <title>BookShop</title>
</head>
<body>
    <h3>Edit Book Information</h3>
    <?php
        $books = fetch_data_from_database();
        $index = intval($_POST["index"]);
        $book = $books[$index];
    ?>

    <!-- displaying books in a table -->
    <form action="controller.php" method="POST" class="w-full flex flex-col py-10">
        <input type="hidden" name="operation" value="edit">
        <input type="hidden" name="index" value="<?php echo $index; ?>">
        <input type="text"  placeholder="Book Title" name="title" required value="<?php echo $book['title'] ?>">
        <input type="text"  placeholder="Author" name="author" required value="<?php echo $book['author'] ?>">
        <input type="text"  placeholder="Pages" name="pages" required value="<?php echo $book['pages'] ?>">
        <input type="text"  placeholder="ISBN" name="isbn" required value="<?php echo $book['isbn'] ?>">
        <select  required name="available">
            <option value="Status" hidden>Status</option>
            <option value="Available" <?php echo ($book['available']?"selected":"") ?>>Available</option>
            <option value="Not Available" <?php echo ($book['available']?"":"selected") ?>>Not Available</option>
        </select>
        <button type="submit">Save</button>
    </form>

</body>
</html>