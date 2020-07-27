var xnumQuestionsAnswered = 0;
// ** Change this if the number of questions changes **
var xnumQuestions = 25;

var xCurrentCarouselPage = 1;

(function(){

    // Add listners to radio buttons to increment the progress bar
    let questions = document.getElementsByClassName("cus-toggle")
    // Loops through all questions and adds a listener on each
    for(let i = 0; i < questions.length; i++){
      questions[i].addEventListener("input", increment_progress, {once: true})
    }

    // Adds a custom listener to the next button to allow for validation
    document.getElementById("cus-carousel-next").addEventListener("click", validate_questions)

    // Counts the number of questions answered
    document.getElementById("cus-question-counter").innerText = xnumQuestionsAnswered + "/" + xnumQuestions

    // Reduces the carousel page count when the previous button is clicked
    document.getElementById('cus-carousel-prev').addEventListener("click", decrease_carousel_page)
})()


// Increments the progress bar
function increment_progress(){
  // Increment the number of questions answered by one
  xnumQuestionsAnswered++;
  // Percentage to increase the progress by each time
  let increment = 1/xnumQuestions * 100;

  // Revtrieve the current width
  let cusWidth = parseInt((document.getElementById("cus-progress-bar").style.width).replace("%", ""));
  // Add the increment and change the width property to reflect the new progress %
  document.getElementById("cus-progress-bar").style.width= (cusWidth + increment) +'%';

  // Update the document to reflect a question has been answered
  document.getElementById("cus-question-counter").innerText = xnumQuestionsAnswered + "/" + xnumQuestions

}

function decrease_carousel_page(){
  xCurrentCarouselPage--;
  document.getElementById("cus-carousel-next").style.visibility = "visible"
  if(xCurrentCarouselPage === 1){
    document.getElementById('cus-carousel-prev').style.visibility = "hidden";
  }
}
// Checks to see if all questions on carousel slide have been answered.
// If yes, proceeds to the next slide
// If no, does nothing
function validate_questions(){

  let currentQuestionGroup = document.querySelector('.carousel-item.active')

  // Cycles to the next item
  if (isQuestionsAnswered(currentQuestionGroup)) {
    console.log("All questions answered. Moving to next slide")
    xCurrentCarouselPage++;
    document.getElementById('cus-carousel-prev').style.visibility = "visible"
    if(xCurrentCarouselPage === 6){
      document.getElementById("cus-carousel-next").style.visibility = "hidden"
    }
    $("#cus-carousel-assessment").carousel('next');
  }
  else{
    console.log("NO SOUP")
  }
}

// Checks to see if all questions in question group (one carousel slide) have been answered
function isQuestionsAnswered(questionGroup){
  let questions = questionGroup.getElementsByClassName("question")
  let isQuestionsAnswered = true;

  for(let i = 0; i < questions.length; i++){
    let radioButtons = questions[i].getElementsByTagName("input")
    if(!isOneQuestionAnswered(radioButtons)){
      console.log("Question " + (i + 1) + " not answered")
      questions[i].getElementsByClassName('cus-question-not-answered')[0].hidden = false;
      isQuestionsAnswered = false;
    }
    else{
      questions[i].getElementsByClassName('cus-question-not-answered')[0].hidden = true;
    }
  }
  return isQuestionsAnswered
}

// Checks all radio buttons in a radio button group to see if that question has been answered
function isOneQuestionAnswered(radioButtons){
  for(let i = 0; i < radioButtons.length; i++){
    if(radioButtons[i].checked){
      return true
    }
  }
  return false
}