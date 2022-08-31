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
  <link rel="stylesheet" href="css/submit.css">
  <title>Submit</title>
</head>

<body>
  <div class="flex-row items-center justify-center">
    <div class="luar">
      <span class="text"><?= $_SESSION['username'] ?></span>
      <div class="circular-progress">
          <span class="progress-value">0%</span>
      </div>
      <span class="text">This Is Your Score</span>
  
    </div>
  
      <!-- Back to index -->
      <a href="index.php" class="mt-5 text-xl text-center block text-white no-underline" 
      onclick="">
        Back to Home
      </a>

  </div>

  <script>
    // get the score value from php to javascript
    let nilai = <?= $score ?>;

    // do the magic
    let circularProgress = document.querySelector(".circular-progress"),
    progressValue = document.querySelector(".progress-value");

    let progressStartValue = 0,
        progressEndValue = parseInt(nilai),
        speed = 50;
        let progress = setInterval(() => {

          if (progressStartValue == progressEndValue){
              clearInterval(progress);
          } else {
              progressStartValue++;
              progressValue.textContent = `${progressStartValue}%`
              circularProgress.style.background = `conic-gradient(#7d2ae8 ${progressStartValue * 3.6}deg, #ededed 0deg)`
          }

          
    }, speed);
  </script>
</body>

</html>