<?php

function fetch_data_from_database(){
    $booksJson = file_get_contents('books.json');
    $books = json_decode($booksJson, true);
    $filtered_books = array_filter($books, function ($book){
        if(strpos($book["title"],$_GET["query"]) !== false)
        {
          return true;
        }
        else if(strpos($book["author"],$_GET["query"]) !== false)
        {
            return true;
        }
        else if(strpos($book["isbn"],$_GET["query"]) !== false)
        {
            return true;
        }
    });
    return $filtered_books;
}

function dump_data_to_database($books){
    $booksJson = json_encode($books);
    file_put_contents('books.json', $booksJson);
}

?>
