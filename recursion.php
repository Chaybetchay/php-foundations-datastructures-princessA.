<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Recursive Directory Display</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f8f9fa; }
    pre { font-size: 16px; line-height: 1.5; }
    .category { color: #0d6efd; font-weight: 600; }
    .book { color: #212529; }
  </style>
</head>
<body class="p-5">
  <div class="container bg-white shadow p-4 rounded">
    <h2 class="text-center text-primary mb-4">Recursive Library Directory</h2>
    <pre>
<?php
// Nested PHP Array for the Library
$library = [
  "Fiction" => [
    "Fantasy" => ["Harry Potter", "The Hobbit"],
    "Mystery" => ["Sherlock Holmes", "Gone Girl"]
  ],
  "Non-Fiction" => [
    "Science" => ["A Brief History of Time", "The Selfish Gene"],
    "Biography" => ["Steve Jobs", "Becoming"]
  ]
];

// Recursive Function
function displayLibrary($library, $indent = 0) {
  foreach ($library as $key => $value) {
    echo str_repeat("  ", $indent) . "<span class='category'>$key</span><br>";
    if (is_array($value)) {
      displayLibrary($value, $indent + 1);
    } else {
      echo str_repeat("  ", $indent + 1) . "<span class='book'>$value</span><br>";
    }
  }
}

displayLibrary($library);
?>
    </pre>
  </div>
</body>
</html>