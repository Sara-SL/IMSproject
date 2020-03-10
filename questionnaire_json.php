<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php
    session_start();
    include("connectDB.php");
    //$_SESSION['choice']=$_GET['choice'];
    //$disease_chosen = $_SESSION['choice'];
    //$json = mysqli_query($link,
    //"SELECT JSON_OBJECT(Traits.id, question)
    //INTO OUTFILE 'c:/wamp64/tmp/questionnaire.json'
    //FROM Traits, Correlations, Diseases
    //where Diseases.id = disease_id
    //and Traits.id = trait_id
    //and disease_name = 'Depression';"
    //);
    $result = mysqli_query($link,
    "SELECT DISTINCT Traits.id, question, rg
    FROM Traits, Correlations, Diseases
    where Diseases.id = disease_id
    and Traits.id = trait_id
    and disease_name = 'Depression';"
    );
    $n_rows = 0;
    while($row = mysqli_fetch_assoc($result))
        $json[] = $row;
        $n_rows++;
    echo json_encode($json);
    include("disconnectDB.php");
    $_SESSION['nrows'] = $n_rows;
    ?>
  </head>
  <body>
    <?php $_SESSION['json'] = $json;
    //header("Location: questionnaire2.php");?>
  </body>
</html>
