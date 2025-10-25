<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Binary Search Tree (Books)</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
  <div class="container bg-white shadow p-4 rounded">
    <h2 class="text-center text-primary mb-4">🌳 Binary Search Tree of Books</h2>

<?php
// Node Class
class Node {
  public $data;
  public $left;
  public $right;

  public function __construct($data) {
    $this->data = $data;
    $this->left = null;
    $this->right = null;
  }
}

// Binary Search Tree Class
class BinarySearchTree {
  public $root;

  public function __construct() {
    $this->root = null;
  }

  public function insert($data) {
    $this->root = $this->insertRec($this->root, $data);
  }

  private function insertRec($node, $data) {
    if ($node === null) return new Node($data);
    if (strcasecmp($data, $node->data) < 0)
      $node->left = $this->insertRec($node->left, $data);
    else
      $node->right = $this->insertRec($node->right, $data);
    return $node;
  }

  public function search($data) {
    return $this->searchRec($this->root, $data);
  }

  private function searchRec($node, $data) {
    if ($node === null) return false;
    if (strcasecmp($node->data, $data) == 0) return true;
    if (strcasecmp($data, $node->data) < 0)
      return $this->searchRec($node->left, $data);
    else
      return $this->searchRec($node->right, $data);
  }

  public function inorderTraversal($node) {
    if ($node !== null) {
      $this->inorderTraversal($node->left);
      echo "<li class='list-group-item'>{$node->data}</li>";
      $this->inorderTraversal($node->right);
    }
  }
}

// Insert Book Titles
$bst = new BinarySearchTree();
$books = ["Harry Potter", "Gone Girl", "A Brief History of Time", "Becoming", "Sherlock Holmes", "The Hobbit"];
foreach ($books as $book) {
  $bst->insert($book);
}

// Display Inorder Traversal
echo "<h5 class='text-secondary mb-3'>Inorder Traversal (Alphabetical Order):</h5>";
echo "<ul class='list-group mb-4'>";
$bst->inorderTraversal($bst->root);
echo "</ul>";
?>

<form method="POST" class="d-flex gap-2">
  <input type="text" name="search" class="form-control" placeholder="Enter book title to search" required>
  <button type="submit" class="btn btn-primary">Search</button>
</form>

<?php
// Search Result
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $search = trim($_POST["search"]);
  echo "<div class='mt-3'>";
  if ($bst->search($search)) {
    echo "<div class='alert alert-success'> Searching for \"$search\": Found!</div>";
  } else {
    echo "<div class='alert alert-danger'> Searching for \"$search\": Not Found.</div>";
  }
  echo "</div>";
}
?>
  </div>
</body>
</html>