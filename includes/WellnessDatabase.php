<?php
/*
    FUNCTIONS:
*/
class WellnessDatabase extends SQLite3{
    function __construct(){
        $this -> open(plugin_dir_path(__FILE__) . 'database/FiveStarWellbeing.sqlite');
    }

    /*
        Get UserID Function:
        Given a first name, last name, and email, checks to see if a user already exists in the database.
        If the User exists, returns their UserID. If not, returns -1.
    */
    function getUserID($firstName, $lastName, $email){
        $selectQuery = 'SELECT UserID FROM "User" WHERE ((FirstName == ?) AND (LastName == ?)) AND (Email == ?);';
        $preppedQuery = $this -> prepare($selectQuery);
        $preppedQuery -> bindValue(1, $firstName, SQLITE3_TEXT);
        $preppedQuery -> bindValue(2, $lastName, SQLITE3_TEXT);
        $preppedQuery -> bindValue(3, $email, SQLITE3_TEXT);
        $queryResults = $preppedQuery -> execute();
        $resultsArray = $queryResults -> fetchArray(SQLITE3_BOTH);

        if($resultsArray == false){
            $resultsAreEmpty = true;
        }
        else{
            $resultsAreEmpty = false;
        }

        if(!$resultsAreEmpty){
            return $resultsArray[0];
        }
        else{
            return -1;
        }
    }
    
    /*
        Insert New User Function:
        Inserts a new user into the database and returns their UserID.
    */
    function insertNewUser($firstName, $lastName, $email, $age, $gender){
        $insertQuery = 'INSERT INTO "User" (FirstName, LastName, Email, Age, Gender) ';
        $insertQuery .= ' VALUES (?, ?, ?, ?, ?);';
        $preppedQuery = $this -> prepare($insertQuery);
        $preppedQuery -> bindValue(1, $firstName, SQLITE3_TEXT);
        $preppedQuery -> bindValue(2, $lastName, SQLITE3_TEXT);
        $preppedQuery -> bindValue(3, $email, SQLITE3_TEXT);
        $preppedQuery -> bindValue(4, $age, SQLITE3_INTEGER);
        $preppedQuery -> bindValue(5, $gender, SQLITE3_TEXT);
        $preppedQuery -> execute();
        return $this -> getUserID($firstName, $lastName, $email);
    }

    /*
            Insert UserSurvey Function:
            Inserts a new UserSurvey into the database.
            Assumes the TotalScore is 0.
            Returns the UserSurveyID as an integer.
    */
    function insertUserSurvey($userID, $surveyID){
        $dateStarted = date('Y-m-d');
        $dateCompleted = date('Y-m-d');
        $isComplete = 1;
        $insertQuery = 'INSERT INTO UserSurvey (UserID, SurveyID, TotalScore, DateStarted, DateCompleted, IsComplete) ';
        $insertQuery .= 'VALUES (?, ?, 0,' . $dateStarted . ', ';
        $insertQuery .= $dateCompleted . ', ' . $isComplete . ');';
        $preppedQuery = $this -> prepare($insertQuery);
        $preppedQuery -> bindValue(1, $userID, SQLITE3_INTEGER);
        $preppedQuery -> bindValue(2, $surveyID, SQLITE3_INTEGER);
        $preppedQuery -> execute();
        $userSurveyID = $this -> lastInsertRowid();
        return $userSurveyID;
    }

    /*
        Insert UserSurveySurveyQuestion Function:
        Given a UserSurveyID, inserts all of the questions and responses on that survey.
        Returns the SurveyQuestionUserSurveyID of the LAST entry inserted.
    */
    function insertSurveyQuestionUserSurveys($userSurveyID){
        $response = '0';
        $score = 0;
        $insertQueryBase = 'INSERT INTO SurveyQuestionUserSurvey ';
        $insertQueryBase .= '(Response, Score, UserSurveyID, SurveyQuestionID) ';
        $insertQueryBase .= 'VALUES ';
        for ($question = 1; $question <= 25; $question++) {
            $insertQueryBase .= '(?, ?, ' . $userSurveyID . ', ' . $question . ')';
            if ($question == 25){
                $insertQueryBase .= "; ";
            }
            else {
                $insertQueryBase .= ", ";
            }
        }
        $pairIndex = 1;
        $preppedQuery = $this -> prepare($insertQueryBase);
        for ($question = 1; $question <= 25; $question++) {
            $response = $_POST["Q" . (string)$question];
            $preppedQuery -> bindValue($pairIndex, $response, SQLITE3_TEXT);
            $pairIndex++;
            $score = (int)$response;
            $preppedQuery -> bindValue($pairIndex, $score, SQLITE3_INTEGER);
            $pairIndex++;
        }
        
        $preppedQuery -> execute();
        $finalID = $this -> lastInsertRowid();
        return $finalID;
    }

    /*
        Select Score Method:
    */
    function selectScore($surveyQuestionUserSurveyID){
        $selectQuery = 'SELECT Score FROM SurveyQuestionUserSurvey WHERE SurveyQuestionUserSurveyID = ?;';
        $preppedQuery = $this -> prepare($selectQuery);
        $preppedQuery -> bindValue(1, $surveyQuestionUserSurveyID, SQLITE3_INTEGER);
        $queryResults = $preppedQuery -> execute();
        $resultsArray = $queryResults -> fetchArray(SQLITE3_BOTH);

        if($resultsArray == false){
            $resultsAreEmpty = true;
        }
        else{
            $resultsAreEmpty = false;
        }

        if(!$resultsAreEmpty){
            return $resultsArray[0];
        }
        else{
            return -1;
        }
    }
    /*
        Insert SurveyQuestionUserSurveyChoices
        Fields:
            IsSelected: BIT
            ChoiceID: INT
            SurveyQuestionUserSurveyID: INT
    */
    function insertSurveyQuestionUserSurveyChoices($maxSurveyQuestionUserSurveyID){
        $insertQueryBase = 'INSERT INTO SurveyQuestionUserSurveyChoice (IsSelected, ChoiceID, SurveyQuestionUserSurveyID) VALUES';
        $choiceID = 0;
        $isSelected = -1;

        for ($surveyQuestion = $maxSurveyQuestionUserSurveyID - 24; $surveyQuestion <= $maxSurveyQuestionUserSurveyID; $surveyQuestion ++){
            $score = $this -> selectScore($surveyQuestion);
            for($choice = 0; $choice < 5; $choice++){
                $choiceID++;
                if ($choiceID % 5 == $score){
                    $isSelected = 1;
                }
                else{
                    $isSelected = 0;
                }
                $insertQueryBase .= '(' . $isSelected . ', ' . $choiceID . ', ' . $surveyQuestion . ')';
                
                if (($choiceID % 5 == 0) and ($surveyQuestion == $maxSurveyQuestionUserSurveyID)){
                    $insertQueryBase .= ';';
                }

                else{
                    $insertQueryBase .= ', ';
                }
            }
        }
        $preppedQuery = $this -> prepare($insertQueryBase);
        $preppedQuery -> execute();
    }

    function getTotalScore($userSurveyID){
        $selectQuery = <<<'EOD'
            SELECT SUM(Score) FROM SurveyQuestionUserSurvey 
            WHERE UserSurveyID = ?;
        EOD;

        $preppedQuery = $this -> prepare($selectQuery);
        $preppedQuery -> bindValue(1, $userSurveyID, SQLITE3_INTEGER);
        $queryResults = $preppedQuery -> execute();
        $resultsArray = $queryResults -> fetchArray(SQLITE3_BOTH);
        if($resultsArray == false){
            $resultsAreEmpty = true;
        }
        else{
            $resultsAreEmpty = false;
        }

        if(!$resultsAreEmpty){
            return $resultsArray[0];
        }
        else {
            return -1;
        }
    }

    function updateTotalScore($userSurveyID, $totalScore){
        $updateQuery = <<<'EOD'
            UPDATE UserSurvey
                SET TotalScore = ?
                WHERE UserSurveyID = ?;
        EOD;
        $preppedQuery = $this -> prepare($updateQuery);
        $preppedQuery -> bindValue(1, $totalScore, SQLITE3_INTEGER);
        $preppedQuery -> bindValue(2, $userSurveyID, SQLITE3_INTEGER);
        $preppedQuery -> execute();
    }

    function getCategoryScore($categoryID, $userSurveyID){
        $selectQuery = <<<'EOD'
            SELECT SUM(Score) FROM UserSurvey US INNER JOIN
            SurveyQuestionUserSurvey SQUS ON US.UserSurveyID = SQUS.UserSurveyID
            INNER JOIN
            SurveyQuestion SQ ON SQUS.SurveyQuestionID = SQ.SurveyQuestionID
            INNER JOIN
            Question Q ON SQ.QuestionID = Q.QuestionID
            WHERE CategoryID = ? AND US.UserSurveyID = ?;
        EOD;
        $preppedQuery = $this -> prepare($selectQuery);
        $preppedQuery -> bindValue(1, $categoryID, SQLITE3_INTEGER);
        $preppedQuery -> bindValue(2, $userSurveyID, SQLITE3_INTEGER);
        $queryResults = $preppedQuery -> execute();
        $resultsArray = $queryResults -> fetchArray(SQLITE3_BOTH);
        if($resultsArray == false){
            $resultsAreEmpty = true;
        }
        else{
            $resultsAreEmpty = false;
        }

        if(!$resultsAreEmpty){
            return $resultsArray[0];
        }
        else{
            return -1;
        }
    }

    function insertResultParagraph($categoryScore){
        $veryHigh = <<<'EOD'
            Very High:</span></b> Your score indicates you appear to be thriving in this area of 
            wellbeing. Consider what is working, and be intentional to keep up habits 
            and practices that will maintain your wellbeing in this area.
        EOD;

        $high = <<<'EOD'
            High:</span></b> You appear to be thriving in some aspects of this area. Consider what 
            is working and check your progress regularly to strengthen your wellbeing in 
            that area. What small thing might you do to improve this area of wellbeing?
        EOD;

        $neither = <<<'EOD'
            Average:</span></b> Your score indicates you are currently surviving. 
            Surviving means there may be specific actions you can take that would have 
            immediate benefits for how you feel about your life. Were there times in your 
            life when you might have scored higher? If so, what was different? What were 
            you doing differently? What people, supports, activities or resources did you 
            have? What can you do to strengthen your wellbeing in this area? You don't 
            have to do this alone. Discuss with a friend or find a mentor and plan to 
            make changes to strengthen your life in this area.
        EOD;

        $low = <<<'EOD'
            Low:</span></b> Your score indicates that you may be suffering in this 
            area of wellbeing at this moment in time. Low scores indicate a need for greater 
            attention to this aspect of your life. Research shows that extended periods of 
            suffering may put you at risk for physical or mental health problems. Think for a 
            moment. How would your life be different if you were to score higher in this area? 
            Have there been times in your life when you would have scored higher? What was 
            different? What is one small thing you could do today that would benefit your wellbeing 
            in this area? 
        EOD;

        $returnString = '<p><b>'; 
        $scoreColor;
        $scoreMessage;

        if ($categoryScore >= 21){
            $scoreColor .= "green";
            $scoreMessage= $veryHigh;
        }
        elseif ($categoryScore >= 16){
            $scoreColor .= "lightGreen";
            $scoreMessage .= $high;
        }
        elseif ($categoryScore >= 11){
            $scoreColor .= "orange";
            $scoreMessage .= $neither;
        }
        else{
            $scoreColor .= "red";
            $scoreMessage .= $low;
        }
        $returnString .= "<span style='color: $scoreColor'>$categoryScore - ";
        $returnString .= $scoreMessage;
        $returnString .= '</p>';

        return $returnString;
    }

    function close_connection(){
        $this -> close();
    }
}