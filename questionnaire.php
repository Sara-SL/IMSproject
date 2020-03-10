<?php
	session_start();
	include("connectDB.php");
	$D_names = mysqli_query($link,"SELECT disease_name FROM Diseases;");
$_SESSION['choice']=$_GET['choice'];
$disease_chosen = $_SESSION['choice'];

$result = mysqli_query($link,"SELECT DISTINCT disease_name, Traits.id, question, rg
                              from Diseases, Traits, Correlations
                              where Diseases.id = disease_id
                              and Traits.id = trait_id
                              and disease_name = '{$disease_chosen}'
															order by Traits.id;");

for($i = 0; $i < mysqli_num_rows($result) + 1; $i++) {

   ${"result$i"} = mysqli_query($link,"SELECT DISTINCT disease_name, Traits.id, question, rg
   from Diseases, Traits, Correlations
   where Diseases.id = disease_id and Traits.id = trait_id and disease_name = '{$disease_chosen}'
	 order by Traits.id
   LIMIT ".$i.",1;");

}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="indexcss.css">
    <title>Auto Generated Questions</title>
    <div class = "header">
        <img src="f2fd_logo.png" alt="F2FD" id="logo"/>
        <h1 id="headerh1">Phenotype to Phenotype Prediction</h1>
    </div>
  </head>
  <body>
    <br>
    <div class="navbar" style = "margin-top:-18px;">
      <a href="index.php">Home</a>
      <div class="dropdown">
        <button class="dropbtn" style = "background-color: #D9181D;">Tests
        </button>
        <div class="dropdown-content">
          <?php
          foreach ($D_names as $row) {
            $disease = $row["disease_name"];
            echo "<a href='questionnaire.php?choice=".$disease."'> ".$disease." </a>";
          }
          ?>
          </div></div>
          <?php
          if (isset($_SESSION['user_id'])){
          echo '<div class="dropdown">
          <a href="logout.php" class="dropbtn" onclick = "session_destroy();">Logout</a></div>';
          }
          else {
          echo '<div class="dropdown"><button class="dropbtn">Login</button>
          <div class="dropdown-content">
            <a href="login.php">Login</a>
            <a href="register.php">Register</a></div></div>';}
          ?>
      <a href="profile.php"> Profile</a>
      <div style = "float: right; margin-left: 10%;">
      <a href="profile.php" style = "color: white;"><?php
          if (isset($_SESSION['username']))
          {$user_name = $_SESSION['username'];
            echo "Welcome, $user_name";
          }
      ?></a></div>
    </div>
    <table class = "table1" border='0'>

      <form name="Depression" action="result.php" method="post" target="_self">
        <tr><th style = "width: 60%;">Question</th><th style =
          "width: 40%;">Please choose:</th></tr>
          <?php
          $j = 1;
          for ($i= 0; $i < mysqli_num_rows($result); $i++) {
            $arr = mysqli_fetch_row(${"result$i"});
            ?>
            <tr><td style = "padding: 2.5%;">
            <?php echo $arr[2]; ?>
            </td><td>
            <input class= "option-input radio" type="radio" value="Yes"
                    name="<?php echo "Q".$j ?>"  checked> Yes <p>
            <input class= "option-input2 radio" type="radio" value="No"
                    name="<?php echo "Q".$j ?>" >No<p>
            </td></tr>
            <?php
            $j++;
          }
          ?>
        <tr style = "background: none;"><td></td><td align = "right">
          <input class = "btn btn1" type="submit"
                  value="Submit" name="Submit"
          style = "border-style: solid; border-width: 1px;
                  width:150px;"></table></td></tr>
      </form>
    </table>
    <div id="radioResults"></div>





  </body>
</html>
