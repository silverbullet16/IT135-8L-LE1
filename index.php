<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./design.css">
  <link rel='stylesheet' type='text/css' href="./phpstyle.php" />
</head>

<body>

  <div class="box-area">
    <header>
      <div class="wrapper">
        <div class="catchphr">
          <a href="#">Laboratory Exercise 1</a>
        </div>
      </div>
    </header>
    <div class="banner-area"></div>
  </div>
  <div class="content-area">
    <div class="flexbox-container">
      <div class="flexbox-item form">
        <form action="" method="post">
          <h2>Your name: <input type="text" id="yourName" class="form__input" autocomplete="off" name="yourName" placeholder="Alden Richards" required></h2>
          <h2>Crush's name: <input type="text" id="crushName" class="form__input" autocomplete="off" name="crushName" placeholder="Maine Mendoza" required></h2>
          <input type="submit" class="btn btn-send" value="Send">
          <input type="reset" class="btn btn-clear" value="Clear">
        </form>
      </div>

      <div class="flexbox-item result">
        
        <?php
        if (!empty($_POST["yourName"]) && !empty($_POST["crushName"])) {
          //defining variables
          $yourName = strtoupper(str_replace(" ", "", $_POST["yourName"]));
          $crushName = strtoupper(str_replace(" ", "", $_POST["crushName"]));

          $yourNameSplit = str_split($yourName);
          $crushNameSplit = str_split($crushName);

          $commonLetters = implode(array_unique(array_intersect($yourNameSplit, $crushNameSplit)));
          $commonLettersSplit = str_split($commonLetters);

          //Count the common letter for yourName
          $commonLetterCount1 = strlen(implode(array_intersect($yourNameSplit, $commonLettersSplit)));
          //Count the common letter for crushName
          $commonLetterCount2 = strlen(implode(array_intersect($crushNameSplit, $commonLettersSplit)));

          //Total Count of Common Letters
          $commonLetterSum = $commonLetterCount1 + $commonLetterCount2;


          $flameNumberEquivalent = $commonLetterSum % 6;

          $flames = array(
            "1" => "Friends",
            "2" => "Lovers",
            "3" => "Anger",
            "4" => "Married",
            "5" => "Engaged",
            "0" => "Soulmates"
          );

          echo nl2br("<h1>Result: </h1><h3>$flames[$flameNumberEquivalent]</h3>\n");
       
          if (strlen($commonLetters) < 1) {
            echo nl2br("They have no common letters\n");
          } elseif (strlen($commonLetters) === 1) {
            echo nl2br("Their common letter is  " . implode(", ", $commonLettersSplit) . " \n");
            echo nl2br($_POST["yourName"] . " has " . $commonLetterCount1 . " common letter , " . $_POST["crushName"] . " has " . $commonLetterCount2 . " common letter\n");
            echo nl2br("Total number of common letters are $commonLetterSum\n");
          } else {
            echo nl2br("Their common letters are  " . implode(", ", $commonLettersSplit) . " \n");
            echo nl2br($_POST["yourName"] . " has " . $commonLetterCount1 . " common letters , " . $_POST["crushName"] . " has " . $commonLetterCount2 . " common letters\n");
            echo nl2br("Total number of common letters are $commonLetterSum\n");
          }


          echo nl2br($_POST["yourName"] . " and " . $_POST["crushName"] . " are both " . "$flames[$flameNumberEquivalent]");
        }

        else {
          echo "<h1>Result: </h1>";
        }
        ?>

      </div>
      <input id="resultButton" type="button" onclick="showHideResult()" value="Hide Result">
    </div>

 
  <script>
    function showHideResult() {
      var x = document.getElementsByClassName("flexbox-container")[0].getElementsByClassName("flexbox-item result")[0];
      if (x.style.display === "none") {
        x.style.display = "block";
      } else {
        x.style.display = "none";
      }
    }
    document.getElementById("resultButton").addEventListener(
      "click",
      function(event) {
        if (event.target.value == "Hide Result") {
          event.target.value = "Show Result";
        } else {
          event.target.value = "Hide Result";
        }
      },
      false
    );
  </script>
</body>

</html>