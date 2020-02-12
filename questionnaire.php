<?php
include("connectDB.php");
$result = mysqli_query($link,"select disease_name, Traits.id, question, rg
from Diseases, Traits, Correlations
where Diseases.id = disease_id and Traits.id = trait_id and disease_name = 'Depression';");

for($i = 0; $i < mysqli_num_rows($result) + 1; $i++) {
     ${"result$i"} = mysqli_query($link,"select disease_name, Traits.id, question, rg
     from Diseases, Traits, Correlations
     where Diseases.id = disease_id and Traits.id = trait_id and disease_name = 'Depression'
     LIMIT ".$i.",1;");
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Auto Generated Questions</title>
  </head>
  <body>
    <table border='1'>

      <form name="Depression" action="result.php" method="post" target="_self">
        <tr><th>Question</th><th>Please choose:</th></tr>
          <?php
          $j = 1;
            for ($i= 0; $i < mysqli_num_rows($result); $i++) {
              $arr = mysqli_fetch_row(${"result$i"});
              ?>
              <tr><td>
              <?php echo $arr[2]; ?>
              </td><td>
              <input type="radio" value="Yes" name="<?php echo "Q".$j ?>"  checked> Yes <p>
              <input type="radio" value="No" name="<?php echo "Q".$j ?>" >No<p>
              </td></tr>
              <?php
              $j++;
            }
           ?>
        <tr><td><input type="submit" value="Submit" name="Submit"></td></tr>
      </form>
    </table>
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


  </body>
</html>
