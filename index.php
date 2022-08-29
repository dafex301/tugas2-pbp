<?php
require_once 'data.php';
require_once 'functions.php';
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
  <div class="m-12">
    <h1 class="text-3xl">List Soal</h1>
    <ul class="list-disc">
      <?php foreach ($questions as $key => $question): ?>
        <li>
          <a href="question.php?id=<?= $key ?>">
            <?= $key ?>
          </a>
        </li>
      <?php endforeach ?>
  </div>
</body>
</html>