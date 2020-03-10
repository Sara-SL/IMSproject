<?php
session_start();
//1. Receive the result from questionnaire.php
//1. Calculate the result from the questionnaire.php
//2. HTML page showing the results
$min_score = 0;
$max_score = 0;
$json = $_SESSION['json'];
$n_rows = $_SESSION['nrows'];
$json_input = json_encode($json);
$json_output = json_decode($json_input);
foreach ($json_output as $rg) {
  if ("{$rg->rg}" >= 0) {
    $max_score += "{$rg->rg}";
  }
  else {
    $min_score += "{$rg->rg}";
  }
}
$span = $max_score - $min_score;
$length = $n_rows;

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <link href="style.css" rel="stylesheet" type="text/css" />
  <title>Result</title>
</head>
  <body>
    <div class="main">
      <div class="header">
        <div class="header_resize">
          <div class="clr"></div>
          <div class="logo">
            <h1><a href="questionnaire_mobile.php">F2FD<br />
              <small>Faster phenotypic prediction for everyone</small></a></h1>
          </div>
          <div class="clr"></div>
          <img src="images/image.jpg" width="930" height="160" alt="" />
          <div class="clr"></div>
        </div>
      </div>
      <div class="content">
        <div class="content_resize">
            <div class="article">
    <div class = "table" style = "width: 50%; margin: auto; text-align: center;
    margin-top: 10%;">
    <h1>Hi there!</h1>
    <br>
    <?php
    $score = 0;
    foreach($json_output as $q) {
      if ($_POST["Q"."{$q->id}"] == "Yes"){
        $score += "{$q->rg}";
      }
    }


    //echo "Your absolute depression score is: ".$score;
      $rel_score = ($score - $min_score)*100/$span;
      ?>
      <?php
    if ($rel_score <= 50) {
      echo "<br><hr><br>Your mental health is good as FUCK!!! Enjoy your life and rock on!";
    } else {
      $compare_to_50 = round(($rel_score-50)*2, 2);
      echo "<br><hr><br>You are {$compare_to_50}% more likely to develop
      depression in the rest of your life than normal people.<br>Congratulations!";

    }
    ?>
    </div>
  </div>
</div>
</div>
</div>
  </body>
</html>
