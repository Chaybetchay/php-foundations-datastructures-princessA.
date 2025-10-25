<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Book Information (Hash Table)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
  <div class="container bg-white shadow p-4 rounded">
    <h2 class="text-center text-success mb-4">📖 Book Information Lookup</h2>
    
    <form method="POST" class="mb-4">
      <div class="input-group">
        <input type="text" name="title" class="form-control" placeholder="Enter book title (e.g. Harry Potter)" required>
        <button type="submit" class="btn btn-success">Search</button>
      </div>
    </form>

<?php
// Hash Table for Book Details
$bookInfo = [
  "Harry Potter" => ["author" => "J.K. Rowling", "year" => 1997, "genre" => "Fantasy"],
  "The Hobbit" => ["author" => "J.R.R. Tolkien", "year" => 1937, "genre" => "Fantasy"],
  "Sherlock Holmes" => ["author" => "Arthur Conan Doyle", "year" => 1892, "genre" => "Mystery"],
  "Gone Girl" => ["author" => "Gillian Flynn", "year" => 2012, "genre" => "Mystery"],
  "A Brief History of Time" => ["author" => "Stephen Hawking", "year" => 1988, "genre" => "Science"],
  "Becoming" => ["author" => "Michelle Obama", "year" => 2018, "genre" => "Biography"]
];

// Function to Get Book Info
function getBookInfo($title, $bookInfo) {
  if (array_key_exists($title, $bookInfo)) {
    $book = $bookInfo[$title];
    echo "<div class='alert alert-info'>
      <strong>Title:</strong> $title<br>
      <strong>Author:</strong> {$book['author']}<br>
      <strong>Year:</strong> {$book['year']}<br>
      <strong>Genre:</strong> {$book['genre']}
    </div>";
  } else {
    echo "<div class='alert alert-danger'>Book not found.</div>";
  }
}

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $title = trim($_POST["title"]);
  getBookInfo($title, $bookInfo);
}
?>
  </div>
</body>
</html>
