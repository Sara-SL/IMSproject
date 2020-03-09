<?php include("connectDB.php"); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin_f2fp</title>
    <style>
      * {
        box-sizing: border-box;
      }

      body {
        font: 16px Arial;
      }

      /*the container must be positioned relative:*/
      .autocomplete {
        position: relative;
        display: inline-block;
      }

      input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
      }

      input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
      }

      input[type=submit] {
        background-color: DodgerBlue;
        color: #fff;
        cursor: pointer;
      }

      .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
      }

      .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
      }

      /*when hovering an item:*/
      .autocomplete-items div:hover {
        background-color: #e9e9e9;
      }

      /*when navigating through the items using the arrow keys:*/
      .autocomplete-active {
        background-color: DodgerBlue !important;
        color: #ffffff;
      }
      </style>
  </head>

  <body>
    <h1>Hi Admin, enjoy your power</h1>
    <!--1. make three uttons with three tables to alter: Diseases, Traits, Correlations.
      2. make them invisible and only visible if the user has chosen them
      3. post the data which the admin inserted to the form and ost to the same page to insert them
    -->
  <div class="">

    <!-- <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe> -->

    <form action="admin_insert_diseases.php" method="post" target="dummyframe">

      Please enter the disease's name:<br>
      <input type="text" id="D_name" name="D_name" placeholder="Disease's name"><br><br>

      Please enter the disease's description:<br>
      <input type="text" id="D_desc" name="D_desc" placeholder="Short Description"><br><br>

      <input type="submit" value="Submit">
    </form>
  </div>

  <br>
  <hr>
  <br>

  <!--   <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe> -->

    <form action="admin_insert_traits&correlations.php" target="dummyframe" method="post" autocomplete="off">


        Please enter the question sentence:<br>
        <input type="text" id="T_name" name="T_name" placeholder="Human friendly, plz"><br><br>

        <div class="autocomplete" style="width:300px;">
        Please choose the disease's name:<br>
        <input type="text" id="C_D_name" name="C_D_name" placeholder="Type a bit and choose"><br><br>
        </div>

        <br>Please enter the correlation between those two (floating value like 0.45512):<br>
        <input type="text" id="C_rg" name="C_rg" placeholder="A floating number < 1"><br><br>

        <input type="submit" value="Submit">

    </form>

    <!--
    <script type="text/javascript">
      var diseases = ["Dpression","Heart-Disease","Diabetes"];
    </script>
  -->

  <script>
  function autocomplete(inp, arr) {
    /*the autocomplete function takes two arguments,
    the text field element and an array of possible autocompleted values:*/
    var currentFocus;
    /*execute a function when someone writes in the text field:*/
    inp.addEventListener("input", function(e) {
        var a, b, i, val = this.value;
        /*close any already open lists of autocompleted values*/
        closeAllLists();
        if (!val) { return false;}
        currentFocus = -1;
        /*create a DIV element that will contain the items (values):*/
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items");
        /*append the DIV element as a child of the autocomplete container:*/
        this.parentNode.appendChild(a);
        /*for each item in the array...*/
        for (i = 0; i < arr.length; i++) {
          /*check if the item starts with the same letters as the text field value:*/
          if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            /*create a DIV element for each matching element:*/
            b = document.createElement("DIV");
            /*make the matching letters bold:*/
            b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
            b.innerHTML += arr[i].substr(val.length);
            /*insert a input field that will hold the current array item's value:*/
            b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
            /*execute a function when someone clicks on the item value (DIV element):*/
            b.addEventListener("click", function(e) {
                /*insert the value for the autocomplete text field:*/
                inp.value = this.getElementsByTagName("input")[0].value;
                /*close the list of autocompleted values,
                (or any other open lists of autocompleted values:*/
                closeAllLists();
            });
            a.appendChild(b);
          }
        }
    });
    /*execute a function presses a key on the keyboard:*/
    inp.addEventListener("keydown", function(e) {
        var x = document.getElementById(this.id + "autocomplete-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
          /*If the arrow DOWN key is pressed,
          increase the currentFocus variable:*/
          currentFocus++;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 38) { //up
          /*If the arrow UP key is pressed,
          decrease the currentFocus variable:*/
          currentFocus--;
          /*and and make the current item more visible:*/
          addActive(x);
        } else if (e.keyCode == 13) {
          /*If the ENTER key is pressed, prevent the form from being submitted,*/
          e.preventDefault();
          if (currentFocus > -1) {
            /*and simulate a click on the "active" item:*/
            if (x) x[currentFocus].click();
          }
        }
    });
    function addActive(x) {
      /*a function to classify an item as "active":*/
      if (!x) return false;
      /*start by removing the "active" class on all items:*/
      removeActive(x);
      if (currentFocus >= x.length) currentFocus = 0;
      if (currentFocus < 0) currentFocus = (x.length - 1);
      /*add class "autocomplete-active":*/
      x[currentFocus].classList.add("autocomplete-active");
    }
    function removeActive(x) {
      /*a function to remove the "active" class from all autocomplete items:*/
      for (var i = 0; i < x.length; i++) {
        x[i].classList.remove("autocomplete-active");
      }
    }
    function closeAllLists(elmnt) {
      /*close all autocomplete lists in the document,
      except the one passed as an argument:*/
      var x = document.getElementsByClassName("autocomplete-items");
      for (var i = 0; i < x.length; i++) {
        if (elmnt != x[i] && elmnt != inp) {
          x[i].parentNode.removeChild(x[i]);
        }
      }
    }
    /*execute a function when someone clicks in the document:*/
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
  }

  /*An array containing all the country names in the world:*/

  var diseases = ["Depression", "Diabetes", "Heart diseases"];

  /*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
  autocomplete(document.getElementById("C_D_name"), diseases);
  </script>


  <?php include("disconnectDB.php"); ?>

  </body>
</html>
