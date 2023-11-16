document.addEventListener("DOMContentLoaded", function () {
  const submitButton = document.getElementById("submit");
  const statusBadge = document.getElementById("status");
  const scoreBadge = document.getElementById("score");

  const correctAnswer = "paris"; // Set the correct answer here

  submitButton.addEventListener("click", function () {
    const selectedAnswer = document.querySelector("input[name='q1']:checked");

    if (selectedAnswer) {
      if (selectedAnswer.value === correctAnswer) {
        statusBadge.textContent = "Status: Correct!";
        scoreBadge.textContent = "Score: 1"; // You can manage the score as needed
      } else {
        statusBadge.textContent = "Status: Wrong";
      }
    } else {
      statusBadge.textContent = "Status: Not Submitted";
    }
  });
});
