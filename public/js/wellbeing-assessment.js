let xnumQuestionsAnswered = 0;
// ** Change this if the number of questions changes **
let xnumQuestions = 25;

let xCurrentCarouselPage = 1;

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

    // Allows showing of group code
    document.getElementById('cus-group-code-button').addEventListener("click", show_group_code)

    // Validation on firstname, lastname, age, email and group code
    document.getElementById('cus-submit-button').addEventListener("click", validate_submit)
})()


// Increments the progress bar
function increment_progress(){
  // Increment the number of questions answered by one
  xnumQuestionsAnswered++;
  // Percentage to increase the progress by each time
  let increment = 1/xnumQuestions * 100

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
    document.getElementById('cus-carousel-prev').style.visibility = "hidden"
  }
}
// Checks to see if all questions on carousel slide have been answered.
// If yes, proceeds to the next slide
// If no, does nothing
function validate_questions(){

  let currentQuestionGroup = document.querySelector('.carousel-item.active')

  // Cycles to the next item
  if (isQuestionsAnswered(currentQuestionGroup)) {
    $("#cus-carousel-assessment").carousel('next');
    xCurrentCarouselPage++;
    document.getElementById('cus-carousel-prev').style.visibility = "visible"
    if(xCurrentCarouselPage === 6){
      document.getElementById("cus-carousel-next").style.visibility = "hidden"
    }
  }
}

// Checks to see if all questions in question group (one carousel slide) have been answered
function isQuestionsAnswered(questionGroup){
  let questions = questionGroup.getElementsByClassName("question")
  let isQuestionsAnswered = true

  for(let i = 0; i < questions.length; i++){
    let radioButtons = questions[i].getElementsByTagName("input")
    if(!isOneQuestionAnswered(radioButtons)){
      questions[i].getElementsByClassName('cus-question-not-answered')[0].hidden = false
      isQuestionsAnswered = false;
    }
    else{
      questions[i].getElementsByClassName('cus-question-not-answered')[0].hidden = true
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

function show_group_code(){
  let codeFormGroup = document.getElementById("cus-group-code-form-group")
  let groupCodeButton = document.getElementById("cus-group-code-button")

  if(codeFormGroup.style.display === "none"){
    codeFormGroup.style.display = "block"
    groupCodeButton.innerText = "Hide Group Code"
  }
  else{
    codeFormGroup.style.display = "none"
    groupCodeButton.innerText = "Show Group Code"
  }
}

function validate_submit(){

  let nameErrorMessage = "Please input your name"
  let ageErrorMessage = "Please input a valid age"
  let emailErrorMessage = "Please input a valid email"
  let groupCodeErrorMessage = "Please input a valid group code"

  let firstNameError = document.getElementById('cus-first-name-error')
  let lastNameError = document.getElementById('cus-last-name-error')
  let ageError = document.getElementById('cus-age-error')
  let emailError = document.getElementById('cus-email-error')
  let groupCodeError = document.getElementById('cus-group-code-error')

  let firstNameInput = document.getElementById('cus-userFirstName').value
  let lastNameInput = document.getElementById('cus-userLastName').value
  let ageInput = document.getElementById('cus-userAge').value
  let emailInput = document.getElementById('cus-userEmail').value
  let groupCodeInput = document.getElementById('cus-group-code-input').value

  let firstNameValid;
  let lastNameValid;
  let ageValid;
  let emailValid;
  let groupCodeValid;

  let namePattern = /^[a-zA-Z\s,.'-\pL]+$/u
  let emailPattern = /(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])/

  // First Name Validation
  if(!namePattern.test(firstNameInput)){
    firstNameError.innerText = nameErrorMessage
    firstNameValid = false
  }
  else{
    firstNameError.innerText = ""
  }

  // Last Name Validation
  if(!namePattern.test(lastNameInput)){
    lastNameError.innerText = nameErrorMessage
  }
  else{
    lastNameError.innerText = ""
  }

  // Age Validation
  if(isNaN(ageInput) || ageInput > 120 || ageInput < 0 || ageInput === ""){
    ageError.innerText = ageErrorMessage
  }
  else{
    ageError.innerText = ""
  }

  // Email Validation
  if(!emailPattern.test(emailInput)){
    emailError.innerText = emailErrorMessage
  }
  else{
    emailError.innerText = ""
  }


}