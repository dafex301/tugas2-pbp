<?php
require_once 'init.php';
$id = $_GET['id'];

// jika user belum login, maka redirect ke halaman login
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}

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
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Question</title>
  <script src="https://kit.fontawesome.com/4569be348d.js" crossorigin="anonymous"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased text-gray-700 bg-purple-600">
  <div class="flex w-full h-screen" id="app">
    <div class="item w-1/3 text-center">
      <a href="index.php">
        <i class="fa-solid fa-circle-left text-3xl text-white mt-10" style="cursor: pointer"></i>
      </a>
      <div class="flex justify-center ml-10">
        <div class="bg-white rounded-lg shadow-xl w-1/3 mt-5 text-white">
          <span class="countdown font-mono text-gray-800 text-2xl" id="timer">
          </span>
        </div>
      </div>
      <div class="flex justify-center ml-10">
        <div class="bg-white rounded-lg shadow-lg w-2/3 mt-10">
          <p class="text-2xl px-2 pt-2">Nomor Soal</p>
          <hr class="mx-6" />
          <div class="text-left ml-2">
            <?php foreach ($questions as $key => $question) : ?>
              <a class="inline-block" href="question.php?id=<?= $key ?>">
                <div <?php if ($_GET['id'] == $key) : ?> class="rounded-full bg-slate-200 px-2 m-2 border border-2 border-purple-500 w-10 h-10 font-black flex items-center justify-center" <?php elseif (isset($_SESSION['answers'][$key])) : ?> class="rounded-full bg-neutral-400 px-2 m-2 border border-1 border-purple-500 w-10 h-10 flex items-center justify-center" <?php else : ?> class="rounded-full bg-slate-200 px-2 m-2 border border-1 border-purple-500 w-10 h-10 flex items-center justify-center" <?php endif ?>>
                  <?= $key ?>
                </div>
              </a>
            <?php endforeach ?>
          </div>
          <div>
            <a
            onclick="return confirm('Apakah anda yakin untuk menyelesaikan quiz?')"
            href="submit.php" class="text-center rounded-full bg-green-400 border border-1 border-purple-500 m-2 px-20 font-semibold cursor-pointer my-4 block">
              Submit Jawaban
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="item w-2/3 text-center">
      <h1 class="font-bold text-3xl text-center text-white mt-10">
        Ujian Menjadi Nakama
      </h1>
      <div class="flex justify-center">
        <div class="bg-white rounded-lg shadow-lg w-3/4 mt-14 p-5" id="pilgan">
          <p class="text-left mx-4 mt-2">
            <?= $questions[$id]['question'] ?>
          </p>
          <form method="post" action="">
            <label name="pilgan" class="text-left block m-4 border border-gray-300 rounded-lg py-2 px-6 text-2xl font-mono text-gray-600 cursor-pointer" id="a" onchange="changeColor()">
              <input type="radio" class="hidden" value="a" id="input_a" name="answer" <?php if (isset($_SESSION['answers'][$_GET['id']]) && $_SESSION['answers'][$_GET['id']] == 'a') : ?> checked <?php endif ?> onchange="this.form.submit()" />
              A
              <span class="font-sans text-lg"><?= $questions[$id]['options']['a'] ?></span>
            </label>
            <label name="pilgan" class="text-left block m-4 border border-gray-300 rounded-lg py-2 px-6 text-2xl font-mono text-gray-600 cursor-pointer" id="b" onchange="changeColor()">
              <input type="radio" class="hidden" value="b" id="input_b" name="answer" <?php if (isset($_SESSION['answers'][$_GET['id']]) && $_SESSION['answers'][$_GET['id']] == 'b') : ?> checked <?php endif ?> onchange="this.form.submit()" />
              B
              <span class="font-sans text-lg"><?= $questions[$id]['options']['b'] ?></span>
            </label>
            <label name="pilgan" class="text-left block m-4 border border-gray-300 rounded-lg py-2 px-6 text-2xl font-mono text-gray-600 cursor-pointer" id="c" onchange="changeColor()">
              <input type="radio" class="hidden" value="c" id="input_c" name="answer" <?php if (isset($_SESSION['answers'][$_GET['id']]) && $_SESSION['answers'][$_GET['id']] == 'c') : ?> checked <?php endif ?> onchange="this.form.submit()" />
              C
              <span class="font-sans text-lg"><?= $questions[$id]['options']['c'] ?></span>
            </label>
            <label name="pilgan" class="text-left block m-4 border border-gray-300 rounded-lg py-2 px-6 text-2xl font-mono text-gray-600 cursor-pointer" id="d" onchange="changeColor()">
              <input type="radio" class="hidden" value="d" id="input_d" name="answer" <?php if (isset($_SESSION['answers'][$_GET['id']]) && $_SESSION['answers'][$_GET['id']] == 'd') : ?> checked <?php endif ?> onchange="this.form.submit()" />
              D
              <span class="font-sans text-lg"><?= $questions[$id]['options']['d'] ?></span>
            </label>
            <label name="pilgan" class="text-left block m-4 border border-gray-300 rounded-lg py-2 px-6 text-2xl font-mono text-gray-600 cursor-pointer" id="e" onchange="changeColor()">
              <input type="radio" class="hidden" value="e" id="input_e" name="answer" <?php if (isset($_SESSION['answers'][$_GET['id']]) && $_SESSION['answers'][$_GET['id']] == 'e') : ?> checked <?php endif ?> onchange="this.form.submit()" />
              E
              <span class="font-sans text-lg"><?= $questions[$id]['options']['e'] ?></span>
            </label>
          </form>
        </div>
      </div>
      <div class="flex justify-center">
        <div class="bg-white rounded-lg shadow-lg w-3/4 mt-2">
          <div class="my-1 flex justify-between">
            <?php if ($id > 1) : ?>
              <a href="question.php?id=<?= $_GET['id'] - 1 ?>">
                <i class="fa-solid fa-circle-chevron-left mx-2 cursor-pointer text-lg"></i>
              </a>
            <?php else : ?>
              <div></div>
            <?php endif ?>
            <h2 class="text-lg"><?= $id ?></h2>
            <?php if ($id < count($questions)) : ?>
              <a href="question.php?id=<?= $_GET['id'] + 1 ?>">
                <i class="fa-solid fa-circle-chevron-right mx-2 cursor-pointer text-lg"></i>
              </a>
            <?php else : ?>
              <div></div>
            <?php endif ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script defer src="./js/question.js"></script>
  <script src="./js/timer.js"></script>
</body>

</html>