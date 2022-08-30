<?php
require_once 'init.php';

// jika user belum login, maka redirect ke halaman login
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}


// Get the all the answers from the session
$answers = isset($_SESSION['answers']) ? $_SESSION['answers'] : [];

// Calculate the score
$score = calculateScore($answers, $questions);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Document</title>
</head>

<body>
  <div class="m-12 mx-64">
    <h1>Submit Page</h1>
    <p>Score : <?= $score ?></p>

    <!-- Back to index -->
    <a href="index.php" class="text-2xl text-blue-500" onclick="<?php resetSession() ?>">
      Back to Home
    </a>
  </div>
</body>

</html>