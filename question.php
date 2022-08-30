<?php
require_once 'init.php';

// jika user belum login, maka redirect ke halaman login
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

// Get the question from the id
$question = getQuestion($_GET['id'], $questions);
// If there is no question, then redirect to the index page
if (!$question) {
  header('Location: index.php');
  exit;
}

// Save the answer value in the $_SESSION
if (isset($_POST['answer'])) {
  $_SESSION['answers'][$_GET['id']] = $_POST['answer'];
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
  <div class="my-12 mx-64">
    <!-- Back button to index -->
    <a href="index.php" class="text-2xl text-blue-500">
      &#8592;
    </a>

    <h1 class="text-3xl">Question</h1>
    <p class="text-xl">
      <?= $question['question'] ?>
    </p>
    <!-- Form Post Answer -->
    <form action="" method="post">
      <?php foreach ($question['options'] as $key => $option) : ?>
        <!-- Input when clicked, save the answer on session -->
        <input type="radio" name="answer" value="<?= $key ?>" id="<?= $key ?>" <?php if (isset($_SESSION['answers'][$_GET['id']]) && $_SESSION['answers'][$_GET['id']] == $key) : ?> checked <?php endif ?> onchange="this.form.submit()">
        <label for="<?= $key ?>">
          <?= $option ?>
        </label>
        <br />
      <?php endforeach ?>
    </form>


    <!-- Previous and Forward Question -->
    <div class="flex justify-between">
      <?php if ($_GET['id'] > 1) : ?>
        <a href="question.php?id=<?= $_GET['id'] - 1 ?>" class="text-xl">
          Previous
        </a>
      <?php else : ?>
        <a href=""></a>
      <?php endif ?>
      <?php if ($_GET['id'] < count($questions)) : ?>
        <a href="question.php?id=<?= $_GET['id'] + 1 ?>" class="text-xl">
          Next
        </a>
        <!-- If end of the question, go to submit page -->
      <?php else : ?>
        <a onclick="return confirm('Are you sure to submit?')" href="submit.php" class="text-xl">
          Submit
        </a>
      <?php endif ?>
    </div>

    <!-- Available Questions -->
    <div class="mt-5">
      <?php foreach ($questions as $key => $question) : ?>
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