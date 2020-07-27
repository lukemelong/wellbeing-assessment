<div class="cus-wellbeing-assessment">
    <h2>Five Star Wellbeing</h2>
    <h2>Quality of Life Assessment</h2>
    <div class="cus-intro-text">
        <p>
            Welcome to the Quality of Life Assessment!
        </p>
        <p>
            This assessment is designed to help you assess your current
            level of wellbeing based on five evidence-based areas. Questions
            are based on research on wellbeing and mental health by Gallup,
            the Canadian Index of Wellbeing and research on anxiety and depression.
        </p>
        <p>
            Your results are confidential! By completing the following form, you will
            see your results onscreen, and also receive an email of your results and
            follow-up communitcation from Five Star Wellbeing to support your ongoing
            wellbeing and mental health.
        </p>
        <p>
            <b>Please select the most appropriate response to each statement:</b>
        </p>
        <p>
            <b>1 - Strongly Disagree, 2 - Disagree, 3 - Neither Agree nor Disagree, 
            4 - Agree, 5 - Strongly Agree</b>
        </p>
    </div>
    <form id="wellnessAssessment" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>"  method="POST">
        <!-- Carousel  -->
        <div id="cus-carousel-assessment" class="carousel slide" data-interval="false" data-wrap="false">
            <p id="cus-question-counter-cont">Progress: <span id="cus-question-counter"></span></p>
            <div class="progress">
                <div class="progress-bar" id="cus-progress-bar" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="25" style="width: 0%"></div>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active cus-question-group">
                    <div class="question purposeWellbeing">
                        <p class="cus-question-text">I am doing tasks and activities that I find interesting each day.</p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q1" id="Q1-1" value="1"/>
                            <label for="Q1-1">Strongly Disagree</label>
                            <input type="radio" name="Q1" id="Q1-2" value="2"/>
                            <label for="Q1-2">Disagree</label>
                            <input type="radio" name="Q1" id="Q1-3" value="3"/>
                            <label for="Q1-3">Neutral</label>
                            <input type="radio" name="Q1" id="Q1-4" value="4"/>
                            <label for="Q1-4">Agree</label>
                            <input type="radio" name="Q1" id="Q1-5" value="5"/>
                            <label for="Q1-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question socialWellbeing">
                        <p class="cus-question-text">
                            I  have people I can depend on if I was sick, in trouble, or needed help.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q2" id="Q2-1" value="1"/>
                            <label for="Q2-1">Strongly Disagree</label>
                            <input type="radio" name="Q2" id="Q2-2" value="2"/>
                            <label for="Q2-2">Disagree</label>
                            <input type="radio" name="Q2" id="Q2-3" value="3"/>
                            <label for="Q2-3">Neutral</label>
                            <input type="radio" name="Q2" id="Q2-4" value="4"/>
                            <label for="Q2-4">Agree</label>
                            <input type="radio" name="Q2" id="Q2-5" value="5"/>
                            <label for="Q2-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>  
                    <div class="question physicalWellbeing">
                        <p class="cus-question-text">
                            I get a minimum of 45 minutes of moderate physical activity (brisk walking, 
                            gardening) each day.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q3" id="Q3-1" value="1"/>
                            <label for="Q3-1">Strongly Disagree</label>
                            <input type="radio" name="Q3" id="Q3-2" value="2"/>
                            <label for="Q3-2">Disagree</label>
                            <input type="radio" name="Q3" id="Q3-3" value="3"/>
                            <label for="Q3-3">Neutral</label>
                            <input type="radio" name="Q3" id="Q3-4" value="4"/>
                            <label for="Q3-4">Agree</label>
                            <input type="radio" name="Q3" id="Q3-5" value="5"/>
                            <label for="Q3-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question financialWellbeing">
                        <p class="cus-question-text">
                            I have enough money to meet my basic needs.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q4" id="Q4-1" value="1"/>
                            <label for="Q4-1">Strongly Disagree</label>
                            <input type="radio" name="Q4" id="Q4-2" value="2"/>
                            <label for="Q4-2">Disagree</label>
                            <input type="radio" name="Q4" id="Q4-3" value="3"/>
                            <label for="Q4-3">Neutral</label>
                            <input type="radio" name="Q4" id="Q4-4" value="4"/>
                            <label for="Q4-4">Agree</label>
                            <input type="radio" name="Q4" id="Q4-5" value="5"/>
                            <label for="Q4-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question communityWellbeing">
                        <p class="cus-question-text">
                            My neighborhood is a safe place to live in.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q5" id="Q5-1" value="1"/>
                            <label for="Q5-1">Strongly Disagree</label>
                            <input type="radio" name="Q5" id="Q5-2" value="2"/>
                            <label for="Q5-2">Disagree</label>
                            <input type="radio" name="Q5" id="Q5-3" value="3"/>
                            <label for="Q5-3">Neutral</label>
                            <input type="radio" name="Q5" id="Q5-4" value="4"/>
                            <label for="Q5-4">Agree</label>
                            <input type="radio" name="Q5" id="Q5-5" value="5"/>
                            <label for="Q5-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                </div>

                <div class="carousel-item cus-question-group">
                    <div class="question purposeWellbeing">
                        <p class="cus-question-text">
                            I have opportunities to use my strengths each day.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q6" id="Q6-1" value="1"/>
                            <label for="Q6-1">Strongly Disagree</label>
                            <input type="radio" name="Q6" id="Q6-2" value="2"/>
                            <label for="Q6-2">Disagree</label>
                            <input type="radio" name="Q6" id="Q6-3" value="3"/>
                            <label for="Q6-3">Neutral</label>
                            <input type="radio" name="Q6" id="Q6-4" value="4"/>
                            <label for="Q6-4">Agree</label>
                            <input type="radio" name="Q6" id="Q6-5" value="5"/>
                            <label for="Q6-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>  
                    <div class="question socialWellbeing">
                        <p class="cus-question-text">
                            I have all the love I need right now in my life.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q7" id="Q7-1" value="1"/>
                            <label for="Q7-1">Strongly Disagree</label>
                            <input type="radio" name="Q7" id="Q7-2" value="2"/>
                            <label for="Q7-2">Disagree</label>
                            <input type="radio" name="Q7" id="Q7-3" value="3"/>
                            <label for="Q7-3">Neutral</label>
                            <input type="radio" name="Q7" id="Q7-4" value="4"/>
                            <label for="Q7-4">Agree</label>
                            <input type="radio" name="Q7" id="Q7-5" value="5"/>
                            <label for="Q7-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question physicalWellbeing">
                        <p class="cus-question-text">
                            I get enough physical activity and exercise to feel strong and 
                            energized each day.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q8" id="Q8-1" value="1"/>
                            <label for="Q8-1">Strongly Disagree</label>
                            <input type="radio" name="Q8" id="Q8-2" value="2"/>
                            <label for="Q8-2">Disagree</label>
                            <input type="radio" name="Q8" id="Q8-3" value="3"/>
                            <label for="Q8-3">Neutral</label>
                            <input type="radio" name="Q8" id="Q8-4" value="4"/>
                            <label for="Q8-4">Agree</label>
                            <input type="radio" name="Q8" id="Q8-5" value="5"/>
                            <label for="Q8-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question financialWellbeing">
                        <p class="cus-question-text">
                            I spend money on activities and experiences rather than on 
                            non-essential things.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q9" id="Q9-1" value="1"/>
                            <label for="Q9-1">Strongly Disagree</label>
                            <input type="radio" name="Q9" id="Q9-2" value="2"/>
                            <label for="Q9-2">Disagree</label>
                            <input type="radio" name="Q9" id="Q9-3" value="3"/>
                            <label for="Q9-3">Neutral</label>
                            <input type="radio" name="Q9" id="Q9-4" value="4"/>
                            <label for="Q9-4">Agree</label>
                            <input type="radio" name="Q9" id="Q9-5" value="5"/>
                            <label for="Q9-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question communityWellbeing">
                        <p class="cus-question-text">
                            I live in a home and community very well suited to my needs 
                            and lifestyle.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q10" id="Q10-1" value="1"/>
                            <label for="Q10-1">Strongly Disagree</label>
                            <input type="radio" name="Q10" id="Q10-2" value="2"/>
                            <label for="Q10-2">Disagree</label>
                            <input type="radio" name="Q10" id="Q10-3" value="3"/>
                            <label for="Q10-3">Neutral</label>
                            <input type="radio" name="Q10" id="Q10-4" value="4"/>
                            <label for="Q10-4">Agree</label>
                            <input type="radio" name="Q10" id="Q10-5" value="5"/>
                            <label for="Q10-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                </div>
                <div class="carousel-item cus-question-group">
                    <div class="question purposeWellbeing">
                        <p class="cus-question-text">
                            I have a leader or mentor in my life who supports my development
                            or career.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q11" id="Q11-1" value="1"/>
                            <label for="Q11-1">Strongly Disagree</label>
                            <input type="radio" name="Q11" id="Q11-2" value="2"/>
                            <label for="Q11-2">Disagree</label>
                            <input type="radio" name="Q11" id="Q11-3" value="3"/>
                            <label for="Q11-3">Neutral</label>
                            <input type="radio" name="Q11" id="Q11-4" value="4"/>
                            <label for="Q11-4">Agree</label>
                            <input type="radio" name="Q11" id="Q11-5" value="5"/>
                            <label for="Q11-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>  
                    <div class="question socialWellbeing">
                        <p class="cus-question-text">
                            I play, sing, laugh, and have fun with others regularly.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q12" id="Q12-1" value="1"/>
                            <label for="Q12-1">Strongly Disagree</label>
                            <input type="radio" name="Q12" id="Q12-2" value="2"/>
                            <label for="Q12-2">Disagree</label>
                            <input type="radio" name="Q12" id="Q12-3" value="3"/>
                            <label for="Q12-3">Neutral</label>
                            <input type="radio" name="Q12" id="Q12-4" value="4"/>
                            <label for="Q12-4">Agree</label>
                            <input type="radio" name="Q12" id="Q12-5" value="5"/>
                            <label for="Q12-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question physicalWellbeing">
                        <p class="cus-question-text">
                            I consistently get sleep 7-8 hours per night allowing me to 
                            be focused and energized throughout the day.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q13" id="Q13-1" value="1"/>
                            <label for="Q13-1">Strongly Disagree</label>
                            <input type="radio" name="Q13" id="Q13-2" value="2"/>
                            <label for="Q13-2">Disagree</label>
                            <input type="radio" name="Q13" id="Q13-3" value="3"/>
                            <label for="Q13-3">Neutral</label>
                            <input type="radio" name="Q13" id="Q13-4" value="4"/>
                            <label for="Q13-4">Agree</label>
                            <input type="radio" name="Q13" id="Q13-5" value="5"/>
                            <label for="Q13-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question financialWellbeing">
                        <p class="cus-question-text">
                            I am debt free, or have a date set for being debt free.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q14" id="Q14-1" value="1"/>
                            <label for="Q14-1">Strongly Disagree</label>
                            <input type="radio" name="Q14" id="Q14-2" value="2"/>
                            <label for="Q14-2">Disagree</label>
                            <input type="radio" name="Q14" id="Q14-3" value="3"/>
                            <label for="Q14-3">Neutral</label>
                            <input type="radio" name="Q14" id="Q14-4" value="4"/>
                            <label for="Q14-4">Agree</label>
                            <input type="radio" name="Q14" id="Q14-5" value="5"/>
                            <label for="Q14-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question communityWellbeing">
                        <p class="cus-question-text">
                            I regularly contribute to a community-based organization or cause 
                            (ie. cultural, educational, spiritual, environmental, political, 
                            or recreational).
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q15" id="Q15-1" value="1"/>
                            <label for="Q15-1">Strongly Disagree</label>
                            <input type="radio" name="Q15" id="Q15-2" value="2"/>
                            <label for="Q15-2">Disagree</label>
                            <input type="radio" name="Q15" id="Q15-3" value="3"/>
                            <label for="Q15-3">Neutral</label>
                            <input type="radio" name="Q15" id="Q15-4" value="4"/>
                            <label for="Q15-4">Agree</label>
                            <input type="radio" name="Q15" id="Q15-5" value="5"/>
                            <label for="Q15-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                </div>
                <div class="carousel-item cus-question-group">
                    <div class="question purposeWellbeing">
                        <p class="cus-question-text">
                            I am doing important and meaningful things each day.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q16" id="Q16-1" value="1"/>
                            <label for="Q16-1">Strongly Disagree</label>
                            <input type="radio" name="Q16" id="Q16-2" value="2"/>
                            <label for="Q16-2">Disagree</label>
                            <input type="radio" name="Q16" id="Q16-3" value="3"/>
                            <label for="Q16-3">Neutral</label>
                            <input type="radio" name="Q16" id="Q16-4" value="4"/>
                            <label for="Q16-4">Agree</label>
                            <input type="radio" name="Q16" id="Q16-5" value="5"/>
                            <label for="Q16-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>  
                    <div class="question socialWellbeing">
                        <p class="cus-question-text">
                            The closest people in my life are healthy and well.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q17" id="Q17-1" value="1"/>
                            <label for="Q17-1">Strongly Disagree</label>
                            <input type="radio" name="Q17" id="Q17-2" value="2"/>
                            <label for="Q17-2">Disagree</label>
                            <input type="radio" name="Q17" id="Q17-3" value="3"/>
                            <label for="Q17-3">Neutral</label>
                            <input type="radio" name="Q17" id="Q17-4" value="4"/>
                            <label for="Q17-4">Agree</label>
                            <input type="radio" name="Q17" id="Q17-5" value="5"/>
                            <label for="Q17-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question physicalWellbeing">
                        <p class="cus-question-text">
                            I eat more whole, plant-based foods than fatty, sweet or
                            highly processed foods.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q18" id="Q18-1" value="1"/>
                            <label for="Q18-1">Strongly Disagree</label>
                            <input type="radio" name="Q18" id="Q18-2" value="2"/>
                            <label for="Q18-2">Disagree</label>
                            <input type="radio" name="Q18" id="Q18-3" value="3"/>
                            <label for="Q18-3">Neutral</label>
                            <input type="radio" name="Q18" id="Q18-4" value="4"/>
                            <label for="Q18-4">Agree</label>
                            <input type="radio" name="Q18" id="Q18-5" value="5"/>
                            <label for="Q18-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question financialWellbeing">
                        <p class="cus-question-text">
                            I have money set aside for unexpected expenses or emergencies.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q19" id="Q19-1" value="1"/>
                            <label for="Q19-1">Strongly Disagree</label>
                            <input type="radio" name="Q19" id="Q19-2" value="2"/>
                            <label for="Q19-2">Disagree</label>
                            <input type="radio" name="Q19" id="Q19-3" value="3"/>
                            <label for="Q19-3">Neutral</label>
                            <input type="radio" name="Q19" id="Q19-4" value="4"/>
                            <label for="Q19-4">Agree</label>
                            <input type="radio" name="Q19" id="Q19-5" value="5"/>
                            <label for="Q19-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question communityWellbeing">
                        <p class="cus-question-text">
                            I belong and am accepted unconditionally in my community.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q20" id="Q20-1" value="1"/>
                            <label for="Q20-1">Strongly Disagree</label>
                            <input type="radio" name="Q20" id="Q20-2" value="2"/>
                            <label for="Q20-2">Disagree</label>
                            <input type="radio" name="Q20" id="Q20-3" value="3"/>
                            <label for="Q20-3">Neutral</label>
                            <input type="radio" name="Q20" id="Q20-4" value="4"/>
                            <label for="Q20-4">Agree</label>
                            <input type="radio" name="Q20" id="Q20-5" value="5"/>
                            <label for="Q20-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                </div>
                <div class="carousel-item cus-question-group">
                    <div class="question purposeWellbeing">
                        <p class="cus-question-text">
                            I have the education, training and skills I need to achieve my 
                            career goals.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q21" id="Q21-1" value="1"/>
                            <label for="Q21-1">Strongly Disagree</label>
                            <input type="radio" name="Q21" id="Q21-2" value="2"/>
                            <label for="Q21-2">Disagree</label>
                            <input type="radio" name="Q21" id="Q21-3" value="3"/>
                            <label for="Q21-3">Neutral</label>
                            <input type="radio" name="Q21" id="Q21-4" value="4"/>
                            <label for="Q21-4">Agree</label>
                            <input type="radio" name="Q21" id="Q21-5" value="5"/>
                            <label for="Q21-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>  
                    <div class="question socialWellbeing">
                        <p class="cus-question-text">
                            I socially interact with others for at least six hours each day.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q22" id="Q22-1" value="1"/>
                            <label for="Q22-1">Strongly Disagree</label>
                            <input type="radio" name="Q22" id="Q22-2" value="2"/>
                            <label for="Q22-2">Disagree</label>
                            <input type="radio" name="Q22" id="Q22-3" value="3"/>
                            <label for="Q22-3">Neutral</label>
                            <input type="radio" name="Q22" id="Q22-4" value="4"/>
                            <label for="Q22-4">Agree</label>
                            <input type="radio" name="Q22" id="Q22-5" value="5"/>
                            <label for="Q22-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question physicalWellbeing">
                        <p class="cus-question-text">
                            I make time to "unplug" and do activities that restore my energy.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q23" id="Q23-1" value="1"/>
                            <label for="Q23-1">Strongly Disagree</label>
                            <input type="radio" name="Q23" id="Q23-2" value="2"/>
                            <label for="Q23-2">Disagree</label>
                            <input type="radio" name="Q23" id="Q23-3" value="3"/>
                            <label for="Q23-3">Neutral</label>
                            <input type="radio" name="Q23" id="Q23-4" value="4"/>
                            <label for="Q23-4">Agree</label>
                            <input type="radio" name="Q23" id="Q23-5" value="5"/>
                            <label for="Q23-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question financialWellbeing">
                        <p class="cus-question-text">
                            I am saving enough money and feel confident about my financial future.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q24" id="Q24-1" value="1"/>
                            <label for="Q24-1">Strongly Disagree</label>
                            <input type="radio" name="Q24" id="Q24-2" value="2"/>
                            <label for="Q24-2">Disagree</label>
                            <input type="radio" name="Q24" id="Q24-3" value="3"/>
                            <label for="Q24-3">Neutral</label>
                            <input type="radio" name="Q24" id="Q24-4" value="4"/>
                            <label for="Q24-4">Agree</label>
                            <input type="radio" name="Q24" id="Q24-5" value="5"/>
                            <label for="Q24-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                    <div class="question communityWellbeing">
                        <p class="cus-question-text">
                            My community relies on me for the contributions I make.
                        </p>
                        <div class="toggle cus-toggle">
                            <input type="radio" name="Q25" id="Q25-1" value="1"/>
                            <label for="Q25-1">Strongly Disagree</label>
                            <input type="radio" name="Q25" id="Q25-2" value="2"/>
                            <label for="Q25-2">Disagree</label>
                            <input type="radio" name="Q25" id="Q25-3" value="3"/>
                            <label for="Q25-3">Neutral</label>
                            <input type="radio" name="Q25" id="Q25-4" value="4"/>
                            <label for="Q25-4">Agree</label>
                            <input type="radio" name="Q25" id="Q25-5" value="5"/>
                            <label for="Q25-5">Strongly Agree</label>
                        </div>
                        <span class="cus-question-not-answered" hidden>Please answer all questions before proceeding</span>
                    </div>
                </div>
                <div class="carousel-item">
                    <div id="cus-user-questions">
                        <label for="userFirstName">First Name</label>
                        <input type="text" id="userFirstName" name="userFirstName"><br>
                        <label for="userLastName">Last Name</label>
                        <input type="text" id="userLastName" name="userLastName"><br>
                        <label for="userAge">Age</label>
                        <input type="text" id="userAge" name="userAge"><br>
                        <label for="userEmail">Email</label>
                        <input type="text" id="userEmail" name="userEmail"><br>
                        <p>Gender (optional)</p>
                        <div class="cus-user-gender">
                            <input type="radio" id="genderFemale" name="userGender" value="Female">
                            <label for="genderFemale">Female</label><br>
                            <input type="radio" id="genderMale" name="userGender" value="Male">
                            <label for="genderMale">Male</label><br>
                            <input type="radio" id="genderNonbinary" name="userGender" value="Nonbinary">
                            <label for="genderNonbinary">Nonbinary</label><br>
                            <input type="radio" id="genderOther" name="userGender" value="NULL">
                            <label for="genderOther">Other</label><br>
                        </div>
                    </div>
                    <button id="cus-submit-button" type="submit" class="btn btn-primary cus-submit-button">Submit</button>
                </div>
            </div>
            <div class="cus-controls-container">
                <ol class="carousel-indicators cus-indi">
                    <li data-target="#cus-carousel-assessment" data-slide-to="0" class="active"></li>
                    <li data-target="#cus-carousel-assessment" data-slide-to="1"></li>
                    <li data-target="#cus-carousel-assessment" data-slide-to="2"></li>
                    <li data-target="#cus-carousel-assessment" data-slide-to="3"></li>
                    <li data-target="#cus-carousel-assessment" data-slide-to="4"></li>
                    <li data-target="#cus-carousel-assessment" data-slide-to="5"></li>
                </ol>

                <div class="cus-car-button-cont">
                    <a id="cus-carousel-prev" class="cus-car-control carousel-control-prev" href="#cus-carousel-assessment" role="button" data-slide="prev" style="visibility: hidden;">
                        <span class="btn btn-outline-primary cus-car-button" style="margin-right: 20px" aria-hidden="true">Previous</span>
                    </a>
                    <a id="cus-carousel-next" class="cus-car-control" id="cus-carousel-next" href="#cus-carousel-assessment" role="button">
                        <span class="btn btn-primary cus-car-button" aria-hidden="true">Next <span class="glyphicon glyphicon-circle-arrow-right"></span></span>
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>