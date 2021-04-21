<?php require_once "../repository/MysqlConnection.php" ?>
<?php
function allMessagesGenerated($mysqli, $specificStartDate, $specificEndDate)
{

    $messagesGenerated  = $mysqli->query("SELECT * FROM Messages m
    WHERE messageDateTime >= '" . $specificStartDate . "' AND 
    messageDateTime <= '" . $specificEndDate . "'");

    // Looping through every region 
    if ($messagesGenerated->num_rows > 0) {

        for ($i = 0; $i < $messagesGenerated->num_rows; $i++) {
            $messagesGenerated->data_seek($i);
            $row = $messagesGenerated->fetch_assoc();
            $x = $i + 1;


            // if guideline , description and recommendation were found ( 0 0 0)
            if (isset($row['guideline']) && isset($row['description']) && isset($row['recommendation'])) {

                echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
                    "Guideline = " . $row['guideline'] . "\t" . "Recommendation = " . $row['recommendation'] . "\n"); // writing into the webpage 

                // if guideline and description were found , but recommendation wasnt ( 0 0 1)
            } elseif (isset($row['guideline']) && isset($row['description']) && !isset($row['recommendation'])) {

                echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
                    "Guideline = " . $row['guideline'] . "\t" . "Recommendation = N/A" . "\n"); // writing into the webpage 

                // ( 0 1 0)
            } elseif (isset($row['guideline']) && !isset($row['description']) && isset($row['recommendation'])) {

                echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
                    "Guideline = " . $row['guideline'] . "\t" . "Recommendation = " . $row['recommendation'] . "\n"); // writing into the webpage 

                //  ( 0 1 1)
            } elseif (isset($row['guideline']) && !isset($row['description']) && !isset($row['recommendation'])) {

                echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
                    "Guideline = " . $row['guideline'] . "\t" . "Recommendation = N/A" . "\n"); // writing into the webpage 

                //  ( 1 0 0 )
            } elseif (!isset($row['guideline']) && isset($row['description']) && isset($row['recommendation'])) {

                echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
                    "Guideline = N/A" . "\t" . "Recommendation = " . $row['recommendation'] . "\n"); // writing into the webpage 

                //  ( 1 0 1)
            } elseif (!isset($row['guideline']) && isset($row['description']) && !isset($row['recommendation'])) {

                echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= " . $row['description'] . "\t" .
                    "Guideline = N/A" . "\t" . "Recommendation = N/A" . "\n"); // writing into the webpage 

                //  ( 1 1 0)
            } elseif (!isset($row['guideline']) && !isset($row['description']) && isset($row['recommendation'])) {

                echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
                    "Guideline = N/A" . "\t" . "Recommendation = " . $row['recommendation'] . "\n"); // writing into the webpage 

                // ( 1 1 1)
            } else {

                echo nl2br("Message Date Time $x= " . $row['messageDateTime'] . "\t" . "Description= N/A" . "\t" .
                    "Guideline = N/A" . "\t" . "Recommendation = N/A" . "\n"); // writing into the webpage 

            }
        }
    } else {

        // no mesages were found 
        echo ("0 messages were generated  ");
    }
} ?>

<?php
$mysqli = MysqlConnection::getInstance()->getMysqli();
$fromDate = $_POST['fromDate'];
$toDate = $_POST['toDate'];
allMessagesGenerated($mysqli, $fromDate, $toDate);
?>