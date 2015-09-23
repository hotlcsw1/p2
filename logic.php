<?php
/*
    Validate the word length value entered
    It needs to be between 1 & 9
*/
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty(trim($_POST["numberOfWords"])) or !(intval(trim($_POST["numberOfWords"]))>=0 and intval(trim($_POST["numberOfWords"]))<=9) or strval(trim($_POST["numberOfWords"]))=="-0") {
      $message = "You must enter a numeric value for # of Words between 1-9";
      echo "<script type='text/javascript'>alert('$message');</script>";
      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.location.href='http://localhost/p2/index.php';
      </SCRIPT>");
    } elseif (!empty(trim($_POST["numberOfWords"])) and is_int(trim($_POST["numberOfWords"]))) {
      $noOfWordsFromPost = $_POST['numberOfWords'];
    } else {
        $noOfWordsFromPost = $_POST['numberOfWords'];
}
} else {
  $noOfWordsFromPost = 4;
}

/*  Create an array with 30 words that I can use
    to generate the xkcd password
*/

/*  Words array for xkcd password
    there are 30 words in the array below
    Array Index then is 0 to 29
*/
$listOfWords = Array('bit','crumb','dab','dash','fleck','glimmer','hint','iota','jot','lick','modicum','morsel','nugget','pinch','scrap','scruple','shadow','shred','sliver','smatter','smidgen','snippet','horse','dog','cat','donkey','rat','mouse','zibra','kangaroo');

/*  Retrieve the # of words entered
    by the user in the index.php page
*/
//$noOfWordsFromPost = $_POST['numberOfWords'];

/*  Generate a random array list of words from the array library
    up to the number of words entered by the user
    parameters are the listOfWords and noOfWordsFromPost
*/
$rand_keys = array_rand($listOfWords, $noOfWordsFromPost);

// Array to store the digits 0-9
$listOfNumbers = Array('0','1','2','3','4','5','6','7','8','9');

//  Generate a random number
$rand_keys1 = array_rand($listOfNumbers, 1);
$randomNumber=$listOfNumbers[$rand_keys1];

//  Array to store special characters
$listOfSpl = Array("@","%","+","\\","/","!","#",",","$","^","?",":",".","(",")","{","}","[","]","~","-","_");

//  Generate a random array of special characters
$rand_keys2 = array_rand($listOfSpl, 1);
$randomSpl = $listOfSpl[$rand_keys2];

//  Reset passwordString each time we run this logic
$passwordString="";

/*  If only 1 word is requested
    create a passwordString with one word
    else, create a concated multi-word passwordString
*/
if ($noOfWordsFromPost==1) {
  $passwordString=$listOfWords[$rand_keys];
} else {
  //  Loop through the new array of random words
  //  and create a passwordString
  for ($a = 0; $a < count($rand_keys); $a++) {
    $t=$rand_keys[$a];
      $passwordString.=$listOfWords[$t]."-";
  }
}

/*  Check to see if the user checked
    addNumber checkbox.  If so,
    add the randomly selected number
*/
if(isset($_POST['addNumber'])) {
    //  Add the randomly chosen number
    //  to passwordString at the end
    if ($noOfWordsFromPost==1) {
      $passwordString.=strval($randomNumber);
    } else {
        $passwordString=substr($passwordString,0,-1).strval($randomNumber);
    }
}

/*  Check to see if the user checked
    addSymbol checkbox.  If so,
    add the randomly selected symbol
*/
if(isset($_POST['addSymbol'])) {
    // Add the randomly chosen symbol to password
    // at the end of the string
    if ($noOfWordsFromPost==1) {
      // Convert to string
      $passwordString.=strval($randomSpl);
    } else {
      if (!isset($_POST['addNumber'])) {
        //  We need to remove the '-'
        //  that was added
        //  during word concatenation
        $passwordString=substr($passwordString,0,-1).strval($randomSpl);
      } else {
        // Just add the random symbol
        $passwordString=$passwordString.strval($randomSpl);
      }
      }
} else {
    // checkbox for number is not checked
    // No changes needed to the passwordString value
  }

/* Remove '-' from the passwordString if it is the last value
   In the case of more than 1 word, and when number and symbol checkboxes
   Are not selected, there is a '-' that needs to be removed
*/
if (substr($passwordString,-1)=="-") {
  $passwordString=substr($passwordString,0,-1);
}

/*
    Retrieve the value of the label displayPwd
*/
session_start(); //  found a better way to do it using h2
//  $value1=$_SESSION['displayPwd'];

if (!$passwordString=="") {
  $displayPwd = $passwordString;
}

?>
