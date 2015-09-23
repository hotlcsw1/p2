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

<form method="post" action="index2.php">
    <P class="blocktext">
  # of Words <input type="text" name = "numberOfWords"> (Max 9)<br>
  <input type="checkbox" name="addNumber" value=""> Add a number<br>
  <input type="checkbox" name="addSymbol" value=""> Add a symbol<br>
  <br>
  <button type="submit">Gimme Another</button>
  <br>
</form>

<a href ="http://xkcd.com/936/">
  <img src="http://imgs.xkcd.com/comics/password_strength.png" alt="Link to xkcd" class="center" style="width:520px;height:420px;border:0">
</a>

</body>
</html>
