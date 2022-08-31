<?php

// Function to calculate how many questions are correct
function calculateScore($answers, $questions) {
  $score = 0;
  // Loop in foreach question
  foreach ($questions as $key => $question) {
    // If there is no answer for the question, then skip it
    if (!isset($answers[$key])) {
      continue;
    }
    // If the answer is correct, add 1 to the score
    if ($answers[$key] == $question['answer']) {
      $score++;
    }
  }
  // Count how many questions
  $total = count($questions);
  // Calculate the percentage of correct answers
  $percentage = $score / $total * 100;
  // Round the percentage to 2 decimal places
  $percentage = round($percentage, 2);
  // Return the percentage
  return $percentage;
}

// Function to get the question from ID url
function getQuestion($id, $questions) {
  // If there is no question with the ID, then return false
  if (!isset($questions[$id])) {
    return false;
  }
  // Return the question
  return $questions[$id];
}

// Function to reset answer
function resetAnswer() {
  // Unset the answers answer
  unset($_SESSION['answers']);
}