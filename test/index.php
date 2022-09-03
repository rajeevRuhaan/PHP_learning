<h1>Regexp</h1>
<?php
$para = " <This is nepal. Nepal is beautiful.";
$pattern = "/nepal/i"; //i is for eliminate case sensitive

echo preg_match($pattern, $para)
?>

<h1>Globale Variable</h1>
<?php
$x= 25;
$y=75;
function addition() {
    $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];
}
addition();
echo $z;
?>
<h1>Function</h1>
<?php
function add(int $a, int $b) {
    return $a + $b;
}
echo add(5, 10);
?>
<h1>Function</h1>
<?php
function sayHello() {
    echo "Hello!";
}
sayHello();
?>

<h1>ForEach</h1>
<?php
$ages = array(15, 16, 17, 18);

foreach($ages as $age) {
    echo $age;
    echo " , ";
}
?>

<h1>For loop</h1>
<?php
for ($i = 1; $i <= 10; $i++) {
    echo "my name is Rajeev";
    echo "<br>";

}
?>


<h1>Switch Case</h1>
<?php
$day = 4;
switch ($day) {
    case 1: 
        echo "Today is sunday";
        break;
    case 2: 
        echo "Today is monday";
        break;
    case 3: 
        echo "Today is tuesday";
        break;
    default :
        echo " you have enter wrong number" ;

}
?>
<h1>Array</h1>
<?php
$students = ['John', "Abbas", "Mik"];
echo $students[1];
echo "<br>";
?>


<h1>Form</h1>
<?php

echo "Hello Rajeev";
echo "<br>";

if (isset($_POST['submit']))
{

    $username = $_POST['username'];
    echo "It will print here: ";
     echo $username;
}

?>

<form action='#' method='POST'>
    <input type='text' name='username' placeholder="insert soem text">
    <input type='submit' name='submit' value='Submit'>
</form>


