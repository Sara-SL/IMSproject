<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php
    session_start();
    ?>
    <meta charset="utf-8">
    <link href="style.css" rel="stylesheet" type="text/css" />
    <title>Questionnaire</title>
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
              <h2>Depression</h2>
              <p><strong>Depression is the leading cause of disability worldwide, the United Nations health agency reported, estimating that it affects more than 300 million people worldwide – the majority of them women, young people and the elderly.</strong></p>
              <p>Depression is a state of low mood and aversion to activity. It can affect a person's thoughts, behavior, motivation, feelings, and sense of well-being. It may feature sadness, difficulty in thinking and concentration and a significant increase or
              decrease in appetite and time spent sleeping. People experiencing depression may have feelings of dejection, hopelessness and, sometimes, suicidal thoughts.</p>
            </div>
            <div class="article">
              <h2>Test</h2>
              <table class = "table1" border='0'>
              <form name="Depression" action="result_mobile.php" method="post" target="_self">
                <tr><th style = "width: 60%;">Question</th><th style =
                  "width: 40%;">Please choose:</th></tr>
                  <?php
                  $json = $_SESSION['json'];
                  $json_input = json_encode($json);

                  $json_output = json_decode($json_input);
                  foreach ($json_output as $q)
                  {?>
                    <tr><td style = "padding: 2.5%;">
                  <?php
                    echo "{$q->question}";?>
                    </td><td>
                   <input class= "option-input radio" type="radio" value="Yes"
                           name="<?php echo "Q{$q->id}";?>"  checked> Yes <p>
                   <input class= "option-input2 radio" type="radio" value="No"
                           name="<?php echo "Q{$q->id}"; ?>" >No<p>
                   </td></tr>
                   <?php
                 }
                 ?>
                <tr style = "background: none;"><td></td><td align = "right">
                  <input class = "btn btn1" type="submit"
                          value="Submit" name="Submit"
                  style = "border-style: solid; border-width: 1px;
                          width:150px;"></table></td></tr>
              </form>
              </table>
            </div>
        </div>
      </div>
    <div id="radioResults"></div>
    <script type="text/javascript">
      function loopForm(form) {
        var radioResults = 'Radio buttons: ';
        for (var i = 1; i < form.elements.length; i++ ) {
            if (form.elements[i].type == 'radio') {
                if (form.elements[i]. == true) {
                    radioResults += form.elements[i].value + ' ';
                }
            }
        }
        document.getElementById("radioResults").innerHTML = radioResults;
    }
    </script>
    <div class="footer">
      <div class="footer_resize">
        <p class="lf">&copy; F2FD. Designed by Blue <a href="http://www.bluewebtemplates.com/">Website Templates</a></p>
      </div>
    </div>
  </div>
  </body>
</html>
