<?php
    // include the function
    include_once './functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>BookShop</title>
</head>
<body class="bg-indigo-100">

    <!-- Search Bar -->

    <form action="index.php" method="GET" class="mt-4 mb-12">
        <div>
            <input type="text" name="query" required>
            <button style="margin-top: 10px" type="submit" >Search</button>
        </div>
    </form>


    
    <h3>All Books</h3>
    <?php
        $books = fetch_data_from_database();
    ?>

    <!-- displaying books in a table -->
    <table>
        <thead>
            <th>Title</th>
            <th>Author</th>
            <th>Pages</th>
            <th>ISBN</th>
            <th>Status</th>
            <th>Operations</th>
        </thead>

        <tbody>
            <?php $idx = 0 ?>
            <?php foreach($books as $book): ?>
                <tr>
                    <td> <?php echo $book['title']; ?> </td>
                    <td> <?php echo $book['author']; ?> </td>
                    <td> <?php echo $book['pages']; ?> </td>
                    <td> <?php echo $book['isbn']; ?> </td>
                    <td> <?php echo ($book['available'] ? 'Available' : 'Not Available'); ?> </td>
                    <td> 
                        <div>
                            <form action="edit_form.php" method="POST">
                            <input type="hidden" name="operation" value="edit-request">
                            <input type="hidden" name="index" value="<?php echo $idx; ?>">
                            <button type="submit">Edit</button>
                        </form>

                        <form action="controller.php" method="POST">
                            <input type="hidden" name="operation" value="delete">
                            <input type="hidden" name="index" value="<?php echo $idx; ?>">
                            <button style="margin-top: 10px" onclick="return confirm('Sure?')" type="submit">Delete</button>
                        </form>
                        </div>
                    </td>
                </tr>
                <?php $idx++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
    <form action="add_new.php" method="POST">
      <input type="hidden" name="operation" value="add-request">
        <button style="margin-top: 10px" type="submit">Add New Book</button>
    </form>
</body>
</html>