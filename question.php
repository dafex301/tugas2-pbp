<?php
  require_once 'data.php';
  require_once 'functions.php';

  // Get the question from the id
  $question = getQuestion($_GET['id'], $questions);
  // If there is no question, then redirect to the index page
  if (!$question) {
    header('Location: index.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>

  <title>Question</title>
</head>
<body>
  <!-- Question -->
  <div class="m-12">
    <!-- Back button to index -->
    <a href="index.php" class="text-2xl text-blue-500">
      &#8592;
    </a>

    <h1 class="text-3xl">Question</h1>
    <p class="text-xl">
      <?= $question['question'] ?>
    </p>
    <ul class="list-disc">
      <?php foreach ($question['options'] as $key => $option): ?>
        <input type='radio' name='answer' value='<?= $key ?>'>
          <?= $option ?>
        </input>
        <br/>
      <?php endforeach ?>
    </ul>

    <!-- Previous and Forward Question -->
    <div class="flex justify-between">
      <?php if ($_GET['id'] > 1): ?>
        <a href="question.php?id=<?= $_GET['id'] - 1 ?>" class="text-xl">
          Previous
        </a>
      <?php else : ?>
        <a href=""></a>
      <?php endif ?>
      <?php if ($_GET['id'] < count($questions)): ?>
        <a href="question.php?id=<?= $_GET['id'] + 1 ?>" class="text-xl">
          Next
        </a>
      <?php endif ?>
    </div>

    <!-- Available Questions -->
    <div class="mt-5">
      <?php foreach ($questions as $key => $question): ?>
        <!-- If the page is opened, can't be clicked -->
        <?php if ($_GET['id'] == $key) : ?>
          <span href="question.php?id=<?= $key ?>" class="text-xl text-gray-500">
            <?= $key ?>
          </span>
        <?php else : ?>
          <a href="question.php?id=<?= $key ?>" class="text-xl">
            <?= $key ?>
          </a>
        <?php endif ?>
      <?php endforeach ?>
    </div>
  </div>
</body>
</html>