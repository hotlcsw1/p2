<!DOCTYPE html>
<html>
<head>
  <title> Arcot Prakash - Project 2 - xkcd Style Password Generator</title>
  <link rel="stylesheet" type="text/css" href="defaultstyle.css">
  <meta charset = "utf-8">
  <meta name = "author" content = "Arcot Prakash">
  <meta name = "description" content ="xkcd Style Password">
  <?php require 'logic.php'; ?>
</head>

<body>
<h1>
  Arcot Prakash
  <br>
  xkcd Style Password Generator
</h1>

<span>
    <h2><?php echo $displayPwd; ?></h2>
</span>

<h5>
  What is this?: xkcd as per Wikipedia is a webcomic created by Randall Munroe.  He describes it as a "Webcomic of romance, sarcasm, math, and language".  I describe it as clever and intellectually entertaining way to learn and understand models.  Using a model for password creation as suggested by him (see below), I have used php, html and some JavaScript to generate random passwords.  I used 30 words, 10 digits (0-9) and special characters such as $, %, ^, etc. to create this password.  You can try playing with it and see what you think.  You can select between 1-9 range for # of words and whether you would like numbers and special characters when the password is generated. I hope you have fun with it.
</h5>

<form method="post" action="index.php">
    <P class="blocktext">
  # of Words <input type="text" name = "numberOfWords"> (Max 9)<br>
  <input type = "checkbox" name = "addNumber" value = ""> Add a number<br>
  <input type = "checkbox" name = "addSymbol" value = ""> Add a symbol<br>
  <br>
  <button type="submit">Gimme Another</button>
  <br>
</form>

<a href ="http://xkcd.com/936/">
  <img src="http://imgs.xkcd.com/comics/password_strength.png" alt="Link to xkcd" class="center" style="width:520px;height:420px;border:0">
</a>

</body>
</html>
