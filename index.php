<html>
  <head>
    <title>PHP Test</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
      .inputfield {
        border: solid #c7c7c7 10px;
        border-radius: 10px;
      }
      .divider {
        height: 3px;
        width: 100%;
        background: #adadad;
        margin-top: 3px;
      }
      .responses {
        background: #c7c7c7;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
      }
      h1, h2, h3, h4, span, input, form {
        padding: 0;
        margin: 0;
        font-family: 'Lato', sans-serif;
      }
      .repolist {
        -webkit-padding-start: 0;
        list-style: none;
        margin: 0;
      }
      .repoliste {
        padding: 5px;
        border-radius: 10px;
        background: #dbdbdb;
      }
      .repoliste + .repoliste {
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    
    <?php

    function clean($string) {
      $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

      return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if(isset($_POST["submit"]) && !$err) { 
      // define variables and set to empty values
      $name = $response = $gender = $comment = $website = $emailErr = $reasonErr = "";
      $err = false;
      $missedform = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        if (empty($_POST["name"])) {
          $err = true;
          $emailErr = "Input is required here.";
        } else {
          $name = test_input($_POST["name"]);
        }
      
        if (empty($_POST["response"])) {
          $err = true;
          $reasonErr = "Input is required here.";
        } else {
          $response = test_input($_POST["response"]);
        }
        
      }

  
      if (!$err) {
        $filetowrite = fopen("responses/".$name.".txt", "w");
        fwrite($filetowrite, "From: ".$name."\n".$response);
        fclose($filetowrite);
      }
    }
    ?>

    <div class="responses">
      <div class="repoliste">
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post'>
          <span>Email:</span> <input type='text' name='name'>
          <span class="error">* <?php echo $emailErr; ?></span><br>
          
          <span>Reason:</span> <textarea rows="5" cols="80" name="response"></textarea>
          <span class="error">* <?php echo $reasonErr; ?></span><br>
          <input type="submit" name="submit">
        </form>
      </div>
    </div>
    <div class="responses">
      <ul class="repolist">
        <?php 
        
        $files = array_diff(scandir("responses"), array('.', '..'));
        for ($i = 0; $i <= count($files)+1; $i++) {
          if($files[$i]) {
            $file = file("responses/".$files[$i]);
            $count = 0;
            echo "<li class='repoliste'>";
            foreach ($file as $line) {
              $count++;
              if ($count==1) {
                echo "<h3>".$line."</h3>";
                echo "<div class='divider'></div>";
              } else {
                echo "<span>".$line."</span><br>";
              }
            }
            echo "</li>";
          }
        }
         
        ?>
      </ul>
    </div>
    
  </body>
</html><html>
  <head>
    <title>PHP Test</title>
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap');
      .inputfield {
        border: solid #c7c7c7 10px;
        border-radius: 10px;
      }
      .divider {
        height: 3px;
        width: 100%;
        background: #adadad;
        margin-top: 3px;
      }
      .responses {
        background: #c7c7c7;
        padding: 10px;
        border-radius: 10px;
        margin-bottom: 10px;
      }
      h1, h2, h3, h4, span, input, form {
        padding: 0;
        margin: 0;
        font-family: 'Lato', sans-serif;
      }
      .repolist {
        -webkit-padding-start: 0;
        list-style: none;
        margin: 0;
      }
      .repoliste {
        padding: 5px;
        border-radius: 10px;
        background: #dbdbdb;
      }
      .repoliste + .repoliste {
        margin-top: 10px;
      }
    </style>
  </head>
  <body>
    
    <?php

    function clean($string) {
      $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

      return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    if(isset($_POST["submit"]) && !$err) { 
      // define variables and set to empty values
      $name = $response = $gender = $comment = $website = $emailErr = $reasonErr = "";
      $err = false;
      $missedform = "";
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        if (empty($_POST["name"])) {
          $err = true;
          $emailErr = "Input is required here.";
        } else {
          $name = test_input($_POST["name"]);
        }
      
        if (empty($_POST["response"])) {
          $err = true;
          $reasonErr = "Input is required here.";
        } else {
          $response = test_input($_POST["response"]);
        }
        
      }

  
      if (!$err) {
        $filetowrite = fopen("responses/".$name.".txt", "w");
        fwrite($filetowrite, "From: ".$name."\n".$response);
        fclose($filetowrite);
      }
    }
    ?>

    <div class="responses">
      <div class="repoliste">
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method='post'>
          <span>Email:</span> <input type='text' name='name'>
          <span class="error">* <?php echo $emailErr; ?></span><br>
          
          <span>Reason:</span> <textarea rows="5" cols="80" name="response"></textarea>
          <span class="error">* <?php echo $reasonErr; ?></span><br>
          <input type="submit" name="submit">
        </form>
      </div>
    </div>
    <div class="responses">
      <ul class="repolist">
        <?php 
        
        $files = array_diff(scandir("responses"), array('.', '..'));
        for ($i = 0; $i <= count($files)+1; $i++) {
          if($files[$i]) {
            $file = file("responses/".$files[$i]);
            $count = 0;
            echo "<li class='repoliste'>";
            foreach ($file as $line) {
              $count++;
              if ($count==1) {
                echo "<h3>".$line."</h3>";
                echo "<div class='divider'></div>";
              } else {
                echo "<span>".$line."</span><br>";
              }
            }
            echo "</li>";
          }
        }
         
        ?>
      </ul>
    </div>
    
  </body>
</html>
