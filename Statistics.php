<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="indexcss.css">
        <script src="plotly-latest.min.js"></script>
	<title>Statistics</title>
        <div class = "header">
			<img src="f2fd_logo.png" alt="F2FD" id="logo"/>
			<h1 id="headerh1">Phenotype to Phenotype Prediction</h1>
	</div>
</head>
<body style = "height: 100%;">
    <br>
    <div id="test" style="margin-left: 200px">
        <?php
            include("connectDB.php");
            $result = mysqli_query($link,"select * from results");
        while ($row = mysqli_fetch_assoc( $result)) {
            $result_array[] = $row['result'];
        }
        $imploded = '["' . implode('", "', array_values($result_array) ) . '"]';
        ?>
        </div>
        <div id="statistics"></div>
        <script>
            var resultJS = <?php echo $imploded; ?>;
            TESTER = document.getElementById('statistics');

            var layout = {
                title: 'Scores for depression',
                xaxis: {range: [0,100]
                        //tickformat: ',.0%'
                    }
            };

            var data = [
              {
                x: resultJS,
                type: 'histogram',
                    xbins: {
                        //start: -3.6,
                        start: 0,
                        //end: 11.42,
                        end: 100,
                        size: 10
                    },
                    histnorm: 'probability',
                    marker: {
                    color: 'rgb(0,0,100)',
                 },
              }
            ];
            Plotly.newPlot(TESTER, data, layout);
        </script>
        <?php
        include("disconnectDB.php");
        ?>

</body>
</html>
