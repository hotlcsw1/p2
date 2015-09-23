<?php
/* Create an array with 30 words that I can use
To Generate the xkcd password
*/
?>

<!DOCTYPE html>
<html>
<head>
  <title> Arcot Prakash - Project 2 - xkcd Style Password Generator</title>
  <link rel="stylesheet" type="text/css" href="defaultstyle.css">
  <meta charset = "utf-8">
  <meta name = "author" content = "Arcot Prakash">
  <meta name = "description" content ="xkcd Style Password">
</head>

<body>
<?php
// Words for xkcd password
// There are 30 words in the array below
// Array Index then is 0 to 29
$listOfWords = Array('bit','crumb','dab','dash','fleck','glimmer','hint','iota','jot','lick','modicum','morsel','nugget','pinch','scrap','scruple','shadow','shred','sliver','smatter','smidgen','snippet','horse','dog','cat','donkey','rat','mouse','zibra','kangaroo');

// Retrieve the # of words entered by the user in the index.php page
$noOfWordsFromPost = $_POST['numberOfWords'];

// Convert $noOfWordsFromPost to be long - got a warning msg_send

// Generate a random array list of words from the array library
// Up to the number of words entered by the user
// Parameters are the listOfWords and noOfWordsFromPost
// echo "\n";
// echo "value from noOfWordsFromPost is $noOfWordsFromPost";
$rand_keys = array_rand($listOfWords, $noOfWordsFromPost);
// print_r ($rand_keys);
// echo "<br />\n";

// Array to store the digits 0-9
$listOfNumbers = Array('0','1','2','3','4','5','6','7','8','9');
// Generate a random number
$rand_keys1 = array_rand($listOfNumbers, 1);
$randomNumber=$listOfNumbers[$rand_keys1];
// echo "No randomly chosen is $randomNumber";
// echo "<br />\n";

// Array to store the digits 0-9
// echo "<br />\n";
$listOfSpl = Array("@","%","+","\\","/","!","#",",","$","^","?",":",".","(",")","{","}","[","]","~","-","_");
// Generate a random number
$rand_keys2 = array_rand($listOfSpl, 1);
$randomSpl=$listOfSpl[$rand_keys2];
// echo "Randomly chosen is $randomSpl";
// echo "<br />\n";

// Reset passwordString each time
$passwordString="";

if ($noOfWordsFromPost==1) {
  // echo "only 1 value";
  // echo "<br />\n";
  // echo "rand_keys is $rand_keys";
  $passwordString=$listOfWords[$rand_keys];
  // echo "password string is $passwordString";
} else {
  // echo "has more than 1 value";
  // echo "<br />\n";
  for ($a = 0; $a < count($rand_keys); $a++) {
    // echo "a is $a<br />\n";
    $t=$rand_keys[$a];
    // echo "value: $listOfWords[$t]<br />\n";
      $passwordString.=$listOfWords[$t]."-";
    echo "password string is $passwordString<br />\n";
  }
}

echo "<br />\n";
echo "<br />\n";

// var dump
// var_dump($noOfWordsFromPost);
// var_dump($_POST['numberOfWords']);
// echo "\n";

// Retrieve value of 'addNumber' from Post
// This tell me if the user wants to include a number as well in the pwd
// echo "<pre>"; print_r($_POST) ;  echo "</pre>";

// if(isset($_POST['addNumber']) && $_POST['addNumber']!="")
if(isset($_POST['addNumber']))
{
    echo "number checkbox is checked<br />\n";
    // Add the randomly chosen number to password at the end of the string
    if ($noOfWordsFromPost==1) {
      $passwordString.=strval($randomNumber);
    } else {
        $passwordString=substr($passwordString,0,-1).strval($randomNumber);
    }
} else {
    echo "number checkbox is not checked<br />\n";
    // do nothing to the $passwordString value
}
echo "password string after number is $passwordString<br />\n";

if(!isset($_POST['addNumber'])) {
  echo "notset<br />\n";
}
// Check to see if the user wanted a random symbol added
if(isset($_POST['addSymbol']))
{
    echo "symbol checkbox is checked<br />\n";
    // Add the randomly chosen symbol to password
    // at the end of the string
    if ($noOfWordsFromPost==1) {
      $passwordString.=strval($randomSpl);
    } else {
      if (!isset($_POST['addNumber'])) {
        echo "notset2<br />\n";
        $passwordString=substr($passwordString,0,-1).strval($randomSpl);
        echo "password string after notset2 is $passwordString<br />\n";
      } else {
        echo "is set 2<br />\n";
        $passwordString=$passwordString.strval($randomSpl);
        echo "password string after is set 2 is $passwordString<br />\n";
      }
      }
} else {
    echo "checkbox is not checked<br />\n";
    // do nothing to the $passwordString value
  }
echo "password string after ch is $passwordString<br />\n";

// Remove - from the $passwordString if it is the last value
if (substr($passwordString,-1)=="-") {
  $passwordString=substr($passwordString,0,-1);
}

echo "final password string is $passwordString<br />\n";

?>
</body>
</html>
