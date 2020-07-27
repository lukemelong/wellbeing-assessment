<?php
    get_header();
    include_once(plugin_dir_path(__FILE__) . '/WellnessDatabase.php');

    /*
        PROCEDURE
    */     
    $database = new WellnessDatabase();
    if(!$database) {
        echo($database->lastErrorMsg());
    } 
    else {
        $wellnessSurveyID = 1;

        $firstName = $_POST["userFirstName"];
        $lastName = $_POST["userLastName"];
        $email = $_POST["userEmail"];
        $age = (int)$_POST["userAge"];
        $gender = $_POST["userGender"];
        $userID = $database -> getUserID($firstName, $lastName, $email);
        $totalScore = 0;


        if ($userID == -1){
            $userID = $database -> insertNewUser($firstName, $lastName, $email, $age, $gender);
        }

        $userSurveyID = $database -> insertUserSurvey($userID, $wellnessSurveyID);
        $surveyQuestionUserSurveyID = $database -> insertSurveyQuestionUserSurveys($userSurveyID);
        $surveyQuestionUserSurveyChoicesQuery = $database -> insertSurveyQuestionUserSurveyChoices($surveyQuestionUserSurveyID);
        $totalScore = $database -> getTotalScore($userSurveyID);
        $database -> updateTotalScore($userSurveyID, $totalScore);

        $purposeScore = $database -> getCategoryScore(1, $userSurveyID);
        $socialScore = $database -> getCategoryScore(2, $userSurveyID);
        $physicalScore = $database -> getCategoryScore(3, $userSurveyID);
        $financialScore = $database -> getCategoryScore(4, $userSurveyID);
        $communityScore = $database -> getCategoryScore(5, $userSurveyID);

        $chartOptionsString = "{type:'bar',data:{labels:['Purpose','Social','Physical','Financial','Community'],datasets:[{data:[" . $purposeScore . "," . $socialScore . "," .  $physicalScore . "," . $financialScore . "," . $communityScore . "],backgroundColor:['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'],borderColor:['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'],borderWidth:1}]},options:{legend:{display:!1},title:{display:!0,text:'Five Star Wellbeing Quality Of Life Assessment'},scales:{yAxes:[{ticks:{beginAtZero:!0,max:25},scaleLabel:{display:true,labelString:'Wellbeing Score'}}]}}}";

        $markup = $emailMarkup = "<div id='cus-results-wrapper'>";
        /*
            DYNAMICALLY GENERATED PAGE CONTENT:
        */
        // echo ('<h2>' . $firstName . ', here are your results:</h2>');
        // echo ('<p><b>Total Score: </b>'. (string)$totalScore . '</p>');
        $markup = $emailMarkup .= '<h2>' . $firstName . ', here are your results:</h2>';
        $markup = $emailMarkup .= '<p><b>Total Score: </b>'. (string)$totalScore . '</p>';

        $markup .= '<canvas id="myChart" height="150"></canvas>';
        $emailMarkup .= '<img src = "https://quickchart.io/chart?c=' . $chartOptionsString . '">';

        $markup .= '<div id="cus-debriefing">';
        $markup .= '<div id="cus-what-score-means">';
        $markup .= '<h3>What Your Score Means</h3>';
        $markup .= '    <p>';
        $markup .= '        Wellbeing is more than an absence of illness, and you can take an active role in your wellbeing and';
        $markup .= '        mental health. Your score will give you insight into your wellbeing in five important areas:';
        $markup .= '        Purpose, Social, Physical, Financial and Community.';
        $markup .= '    </p>';
        $markup .= '    <p>';
        $markup .= '        Each of these areas is interconnected, so suffering in one area can affect others. At the same time';
        $markup .= '        boosting one area can improve your wellbeing in others.';
        $markup .= '    </p>';
        $markup .= '</div>';
        $markup .= '<div id="cus-result-breakdown">';

        $emailMarkup .= '<div id="cus-debriefing">';
        $emailMarkup .= '<div id="cus-what-score-means">';
        $emailMarkup .= '<h3>What Your Score Means</h3>';
        $emailMarkup .= '    <p>';
        $emailMarkup .= '        Wellbeing is more than an absence of illness, and you can take an active role in your wellbeing and';
        $emailMarkup .= '        mental health. Your score will give you insight into your wellbeing in five important areas:';
        $emailMarkup .= '        Purpose, Social, Physical, Financial and Community.';
        $emailMarkup .= '    </p>';
        $emailMarkup .= '    <p>';
        $emailMarkup .= '        Each of these areas is interconnected, so suffering in one area can affect others. At the same time';
        $emailMarkup .= '        boosting one area can improve your wellbeing in others.';
        $emailMarkup .= '    </p>';
        $emailMarkup .= '</div>';
        $emailMarkup .= '<div id="cus-result-breakdown">';


                $purposeText = <<<'EOD'
                    <p>
                    Your purpose wellbeing score is a measure of how interested, motivated
                    and engaged you are in your day-to-day life. People find purpose primarily
                    in their work, learning and leisure activities.
                    </p>
                EOD;

                $socialText = <<<'EOD'
                    <p>
                    Your social wellbeing score indicates how positive, supportive and connected 
                    you feel about your relationships at this moment. Emotional connections
                    have a significant impapct on your overall wellbeing and mental health.
                    </p>
                EOD;

                $physicalText = <<<'EOD'
                    <p>
                    Your physical wellbeing score indicates how you are feeling about your 
                    physical health at this moment. Three lifestyle habits: nutrition, sleep and
                    physical activity are crucial to our physical wellbeing.
                    </p>
                EOD;

                $financialText = <<<'EOD'
                    <p>
                    Your financial wellbeing score indicates how you are feeling about your
                    financial wellbeing at the moment. Financial wellbeing is the experience of having
                    a sense of financial security, feeling in control of your financial life and the 
                    freedom to make choices that allow you to enjoy life.
                    </p>
                EOD;

                $communityText = <<<'EOD'
                    <p>
                    Your community wellbeing score indicates the sense of safety, belonging and connectedness
                    you feel in the communities where you live and work at the moment. 
                    </p>
                    <p>
                    It is important that we understand the difference between social wellbeing and community 
                    wellbeing. Social wellbeing is how positive, supportive and connected you feel about your
                    close relationships. Community wellbeing is the sense of belonging and connectedness we feel
                    by being a part of something larger than ourselves.
                    </p>
                EOD;
        $markup .= '<h3>Purpose Wellbeing</h3>';
        $markup .= $database -> insertResultParagraph($purposeScore);
        $markup .= $purposeText;
        $markup .= '<h3>Social Wellbeing</h3>';
        $markup .= $database -> insertResultParagraph($socialScore);
        $markup .= $socialText;
        $markup .= '<h3>Physical Wellbeing</h3>';
        $markup .= $database -> insertResultParagraph($physicalScore);
        $markup .= $physicalText;
        $markup .= '<h3>Financial Wellbeing</h3>';
        $markup .= $database -> insertResultParagraph($financialScore);
        $markup .= $financialText;
        $markup .= '<h3>Community Wellbeing</h3>';
        $markup .= $database -> insertResultParagraph($communityScore);
        $markup .= $communityText;
        $markup .= '</div>';
        $markup .= '</div>';

        $emailMarkup .= '<h3>Purpose Wellbeing</h3>';
        $emailMarkup .= $database -> insertResultParagraph($purposeScore);
        $emailMarkup .= $purposeText;
        $emailMarkup .= '<h3>Social Wellbeing</h3>';
        $emailMarkup .= $database -> insertResultParagraph($socialScore);
        $emailMarkup .= $socialText;
        $emailMarkup .= '<h3>Physical Wellbeing</h3>';
        $emailMarkup .= $database -> insertResultParagraph($physicalScore);
        $emailMarkup .= $physicalText;
        $emailMarkup .= '<h3>Financial Wellbeing</h3>';
        $emailMarkup .= $database -> insertResultParagraph($financialScore);
        $emailMarkup .= $financialText;
        $emailMarkup .= '<h3>Community Wellbeing</h3>';
        $emailMarkup .= $database -> insertResultParagraph($communityScore);
        $emailMarkup .= $communityText;
        $emailMarkup .= '</div>';
        $emailMarkup .= '</div>';

        echo $markup;

        $to = "luke.melong13@gmail.com";
        $subject = "Test Wellbeing email";
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: luke.melong13@outlook.com' . "\r\n";
        add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

        echo wp_mail( $to, $subject, $emailMarkup );

        $database->close_connection();
        unset($database);
    }

    function wpse27856_set_content_type(){
        return "text/html";
    }
    
    function mailtrap($phpmailer) {
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 25;
        $phpmailer->Username = '86773772ca2a7d';
        $phpmailer->Password = '35b7ae39b54bca';
    }
     
    add_action('phpmailer_init', 'mailtrap');
?>


<!-- Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>
<script>

let purposeScore = <?php echo $purposeScore; ?>;
let socialScore = <?php echo $socialScore; ?>;
let physicalScore = <?php echo $physicalScore; ?>;
let financialScore = <?php echo $financialScore; ?>;
let communityScore = <?php echo $communityScore; ?>;

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Purpose', 'Social', 'Physical', 'Financial', 'Community'],
        datasets: [{
            data: [purposeScore, socialScore, physicalScore, financialScore, communityScore],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        legend: { display: false },
        title: {
            display: true,
            text: "Five Star Wellbeing Quality Of Life Assessment"
        },
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    max: 25
                },
                scaleLabel: {
                    display: true,
                    labelString: "Wellbeing Score"
                }
            }]
        }
    }
});
    // let chartOptionsString = "{type:'bar',data:{labels:['Purpose','Social','Physical','Financial','Community'],datasets:[{data:[" + purposeScore + "," + socialScore + "," +  physicalScore + "," + financialScore + "," + communityScore + "],backgroundColor:['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)','rgba(255, 206, 86, 0.2)','rgba(75, 192, 192, 0.2)','rgba(153, 102, 255, 0.2)','rgba(255, 159, 64, 0.2)'],borderColor:['rgba(255, 99, 132, 1)','rgba(54, 162, 235, 1)','rgba(255, 206, 86, 1)','rgba(75, 192, 192, 1)','rgba(153, 102, 255, 1)','rgba(255, 159, 64, 1)'],borderWidth:1}]},options:{legend:{display:!1},title:{display:!0,text:'Wellbeing Scores'},scales:{yAxes:[{ticks:{beginAtZero:!0,max:25}}]}}}"
    // console.log(chartOptionsString)
    // document.getElementById('cus-testImage').src = "https://quickchart.io/chart?c=" + chartOptionsString
</script>