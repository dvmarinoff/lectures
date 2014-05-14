/*PHP Intro*/
//variables:
-Case sensitive, start with '$', but not numbers, underscore is ok,
but is used for special meaning sometimes.

$my_Var = 10;

//Strings:
- you can output html as string
- '.' for concatenation
<?php 

$first = "The quick brown fox";
$second = " jumped over the lazy dog.";

$third = $first;
$third .= $second;
echo $third;

?>
<br />
Lowercase: <?php echo strtolower($third); ?><br />
Uppercase: <?php echo strtoupper($third); ?><br />
Uppercase first: <?php echo ucfirst($third); ?><br />
Uppercase words: <?php echo ucwords($third); ?><br />
Length:		<?php echo strlen($third); ?><br />
Trim:		<?php echo "A" . trim(" B C D "); ?><br />
Find:		<?php echo strstr($third, "brown"); ?><br />
Replace by string:	<?php echo str_replace("quick", "super-fast", $third); ?><br />
Repeat:		<?php echo str_repeat($third, 2) ;?><br />
Make substring:	<?php echo substr($third, 5, 10) ;?><br />
Find position:	<?php echo strpos($third, "brown") ;?><br />
Find character:	<?php echo strchr($third, "z") ;?><br />
<br />
//Numbers:
<?php echo rand(1,10); //returns random number?>		

//Nul and empty:

<?php empty(var) // empty: "", null, 0, 0.0, "0", false, array(); ?>

//Type juggling and type casting:

Get type:	<?php gettype($var) ?>

Casting:	<?php settype($var, "string"); //permanent cast on place ?>
Casting:	<?php  (string) $var; //only in this use not permanantly ?>

//Constants:
-All capital letters and no '$'

<?php 

	$max_width = 980;	//var

	define("MAX_WIDTH", 980);	//first must be defined with ""
	echo MAX_WIDTH;				//than use it

 ?>
var_dump($varToCheckType);	//returns type of the variable

/*Array*/:
-
//Declare:
<?php

$numbers = array(4,8,15,16,23,42);
echo $numbers[1];


?>
//Print:
<?php $mixed = array(6, "fox", "dog", array("x", "y", "z")); ?>
<?php echo $mixed[2]; ?><br />
<?php echo $mixed[3]; ?><br />

//Debug:
<pre>
	<?php echo print_r($mixed)?>	
</pre>

<?php echo $mixed[3][1]; ?><br />

//Add:
<?php $mixed[2] = "cat";?>
<?php $mixed[4] = "cat";?>
<?php $mixed[] = "horse"?>	//will add to the end

//Short: since PHP 5.4
$myArray = [1,2,3];

//Associative Array:
- An object-indexed collection of objects

key --> value pairs

-when the order dosn't matter and need a reference label

<?php $assoc = array("first_name" => "Kevin", "last_name" => "Skoglund"); ?>
<?php echo $assoc["first_name"]; ?><br />
<?php echo $assoc["first_name"] . " " . ["last_name"]; ?><br />

//Array functions:

<?php $numbers = array(4,8,15,16,23,42); ?>
	
Count:			<?php echo count($numbers)?>
Max value:		<?php echo max($numbers)?>
Min value:		<?php echo min($numbers)?><br />
<pre>
Sort:			<?php sort($numbers); print_r($numbers);?><br />

Reverse sort:	<?php rsort($numbers); print_r($numbers);?><br />
</pre>
Implode:		<?php echo $num_string = implode(" * ", $numbers); ?><br />
Explode:		<?php echo $print_r(explode(" * ", $num_string)); ?><br />

Value in array?:	<?php echo in_array(15, $numbers); //returns T(1) or F(nothing)?><br />

<?php array_push(array, var)?>
<?php array_pop(array)?>
<?php array_shift(array)?>
<?php array_replace(array, array1)?>
<?php array_reverse(array)?>
<?php array_slice(array, offset)?>
<?php array_unique(array)?>
<?php array_search(needle, haystack)?>
<?php array_merge(array1)?>
<?php array_values(input)?>

/*Loops*/
//Foraech:

<?php foreach ($variable as $key => $value) {
	# code...
} ?>

<?php 

$myArray = array( 4, 2, 3, 8, 5, 6, 7, 9, 10);

foreach ($myArray as $value) {
	echo "Number: {$value}<br />";
} 

?>

<?php 

$person = array(
	"first_name" => "Kevin",
	"last_name" => "Skoglund",
	"address" => "123 Main Street",
	"city" => "Beverly Hills",
	"state" => "CA", 
	"zip_code" => "90210",
	);
foreach ($person as $attribute => $data) {
	$attr_nice = ucwords(str_replace("_", " ", $attribute));
	echo "{$attr_nice}: {$data}<br />";
}

 ?>

 //Array pointers:
- points to the current item in an array
 <?php  

	$myArray = array( 4, 2, 3, 8, 5, 6, 7, 9, 10);

	// current: current pointer value
	echo "1: " . current($myArray) . "<br />";

	// next: move the pointer forward
	next($myArray);
	echo "2: " . current($myArray) . "<br />";

 ?>
<br />
<?php
// usefull for database pointers, for and foreach may not work
 while ($myArray = current($myArray)) {
 	echo $myArray . ", ";
 	next($myArray);
 }

 ?>

/*Functions*/
<?php 

	function add_numbers($number1, $number2) {
		return $number1 + $number2;
	}

	echo add_numbers(4,4);

 ?>

/*Debugging*/
//Display error:
- in php.ini file - display_error = On

<?php phpinfo(); ?>

/*Building web pages with php*/
//

Request --> Response cycle

URL/Links	GET
Forms		POST
Cookies		COOKIE

-link name may be fetched from a database
<?php $link_name = "Second Page"; ?>
<a href="second_page.php"><?php echo $link_name; ?></a>

//URL query parameters:
- part of the URL that comes after the question mark

?<name_of_parameter>=<value>
someone.php?page=2 

-use '&' for more then one parameter

- Super global variable -
	- an asociative array were php will sent all the query parameters
	- 9 super global variables and they always start with '_'
	- always available in all scopes, php assigns them before processing page
- $_GET - http method that relates to URLs and Links

<?php $link_name = "Second Page"; ?>
<?php  $id = 2; ?>
<a href="second_page.php?id=<?php echo $id; ?>"><?php echo $link_name; ?></a>



//Encoding Get values:
- reserved characters in URLs:
[ !, #, $, %, ', (, ), *, +, ,, /, :, ;, =, ?, @, [, ]]

- urlencode() - convert to % + HEX value, spaces will become '+'

<?php urldecode(str); ?>

<?php $link_name = "Second Page"; ?>
<?php $id = 2; ?>
<?php $company = "Johnson & Johnson"; ?>
<a href="second_page.php?id=<?php echo $id; ?>&company=<?php echo urlencode($company); ?>"><?php echo $link_name; ?></a>

- on second page:

<?php 
	$id = $_GET['id'];
	echo $id;
?>
<br />
<?php 
	$company = $_GET['company'];
	echo $company;
?>

- rawurlencode() - same, but spaces are %20
				 - use for the URL path(before the '?')
				 - the file system and apache server will be able 
				   to read the spaces('+' is concatenation)

//Encoding for HTML:
- reserved characters in HTML:

[ <, >, &, "]
&lt;, &gt;, &amp; &quot;

-htmlspecialchars() -


-htmluentities() -

//Including and requiring files:
- to reuse code

- include() -

	- in file included_header.php the header for a set of pages is kept
	- same for footer, sidebar, images, CSS, JavaScript
	- or other functions in included_functions.php so they can be called anywhere
#Page: include.php
<?php 
	include("included_header.php");
 ?>
	<!-- html body content goes here-->
</body>
</html>
#
#Page: included_header.php
<html>
<head>
	<title></title>
	<meta>
	<link rel="stylesheet" href="">
</head>
<body>
#

- require() - return total error if file is not found
- include_once() - keeps an array of paths to the file that are
				  already included. Once in the array thefile cannot
				  be requested anymore. Functions cannot be defined
				  more than once.
- require_once() -

/**/
/* Headers:
- HTTP header:
	- data sent to the browser so that it can know what to expect

HTTP/1.1 200 OK
Date: Thu, 28 Feb 2013 03:21:16 GMT
Server: Apache/2.2.12
Content-Type: text/html; charset=utf-8
Content-Length:52839
Connection: close

	- use the header() to tell the browsesr how to treat the information

- Headers are sent before page
- Changes must be made before any HTML output -
	- before a single space or line return
	- before whitespace in included files
	- can come after whitespace inside php tags

/ * Page redirection:
-302 Redirect
	- HTTP 1.1/302 Found
	- Location: path
- header('Location: login.php');
- it's a second GET request in the background

<?php 
header('Location: basic.html');
exit;
?>

- function:
<?php 
function redirect_to($new_location){
	header('Location: $new_location');
}
?>

/*Working with cockies and sessions*/
/ * Cockies:


/ * Sessions:
- related to cockies, they relay on them to do thier work
- stored server side not client like cockies
	- pros:
		- more storage(cockie is limited to 4000 charactes)
		- smaller request sizes
		- conceals data values
		- more secure
	- cons:
		- slower to access
		- expire when the browser is closed
- must be maintained with server being cleaned from sessions not used sfor a month

- $_SESSION - super global that stores session
// headers must come before any html output, so session_start() is the first thing you wanna do

<?php 
session_start();

?> 

/*Working with forms and data*/
/ * Building forms:
- form tag + action="target.php" method="POST"
- set name to input tags so it can be used for key in the $_POST asociative array
	- $username = $_POST['username'];

/ * Detscting form submission:
- problem: when the url is loaded directly(not submited) the $_POST is empty
- solutions:
	- isset($_POST['key'])
		- with 'submit'
<?php 
if (isset($_POST['submit'])) {
	echo 'form was submitted<br />';
} else {
	
}

?> 


/ * Single-Form page processing:
- all logic related to the form is in one file
- redisplay the form on errors -
	- return error messages
	- populate fields with previous values

<?php 
	if (isset($_POST['submit'])) {
		// form was submitted
		$username = $_POST['username'];
		$password = $_POST['password'];
		$message = 'Logging in: {$username}';
	} else {
		$message = 'Please log in.';
	}
	
?>

// * Validating data:
- 



/*Using PHP to access mysql*/
- Database APIs
	- mysql
		- old, depricated in v5.5

	- msqli
		- new from v5.0
		- pre-configured for mysql
		- does not suport other databases
		- OOP and Procedural php interface
		- Prepared statements

	- PDO
		- PHP Data Objects
		- newest from v5.5
		- not pre-configured for mysql
		- supports other databases
		- OOP and Procedural php interface
		- Prepared statements

Procedural:					 Object-oriented:
----------------------------------------------------------------
mysqli_connect				| $mysqli = new mysqli
mysqli_connect_errno		| $mysqli->connect_errno
mysqli_connect_error		| $mysqli->connect_error
mysqli_real_escape_string	| $mysqli->real_escape_string
mysqli_query				| $mysqli->query
mysqli_fetch_assoc			| $mysqli->fetch_assoc
mysqli_close				| $mysqli->close
----------------------------------------------------------------

- connect to a database:
- The five steps of databese interaction:
	1. Create a database connection
	2. Perform database query
	3. Use returned data (if any)
	4. Release returned data
	5. Close database connection

	- 1 and 5 must happen once per each php script

<?php 
	// 1. Create a database connection
	$dbhost = "localhost";
	$dbuser = "widget_cms";
	$dbpass = "secretpassword";
	$dbname = "widget_corp";
	$connection = mysqli($dbhost, $dbuser, $dbpass, $dbname);

	// Test if connection occured
	if (mysqli_connect_errno()) {
		die("Database connection failed: " 
			. mysqli_connect_error() . 
			" (" . mysqli_connect_errno() ")"
			);
	}

	// 2. Perform database query
	$query = "SELECT * ";
	$query .= "FROM subjects ";
	$query .= "WHERE visible = 1 ";
	$query .= "ORDER BY position ASC";

	$result = mysqli_query($connection, $query); // will be a resource
	
	// Test if there is a quary error
	if (!$result) {
		die("Database query failed.");
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<?php 
		// 3. Use return data (if any)
		while($row = mysqli_fetch_row($result)){
			// output data from each row

		}
	?>

	<?php 
		// 04. Release the returned data
		mysql_free_result($result);
	?>

</body>
</html>

<?php 
	// 5. Close database connection
	mysqli_close($connection);
?>

- Working with retrieved data:

	- mysqli_fetch_row
		- results are in a standart array
		- keys are integers
	- mysqli_fetch_assoc
		- results are in an associative array
		- keys are column names
	- mysqli_fetch_array
		- results in either or both types of array
		- MYSQL_NUM, MYSQL_ASSOC, MYSQL_BOTH
	- mysqli_fetch_object
		- slowest

- Creating records with php:

<?php 
	// 1. Create a database connection
	$dbhost = "localhost";
	$dbuser = "widget_cms";
	$dbpass = "secretpassword";
	$dbname = "widget_corp";
	$connection = mysqli($dbhost, $dbuser, $dbpass, $dbname);

	// Test if connection occured
	if (mysqli_connect_errno()) {
		die("Database connection failed: " 
			. mysqli_connect_error() . 
			" (" . mysqli_connect_errno() ")"
			);
	}

	// 2. Perform database query
	// Often these are form values in $_POST
	$menu_name = "Today' s Widget Trivia";
	$position = (int)4;
	$visible = (int)1;

	// Escape all strings 
	$menu_name = mysqli_real_escape_string($connection, $menu_name);

	$query = "INSERT INTO subjects ( ";
	$query .= "menu_name, position, visible ";
	$query .= ") VALUES ("; 
	$query .= " '{$menu_name}', {$position}, {$visible}";
	$query .= ")";
	
	$result = mysqli_query($connection, $query);
	
	// Test if there is a quary error
	if ($result) {
		// Success
		// redirect_to("somepage.php");
	} else {
		// Failure
		// $message = "Subject creation failed";
		die("Database query failed." . mysqli_error($connection));
	}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

</body>
</html>

<?php 
	// 5. Close database connection
	mysqli_close($connection);
?>

- Updating and deleting records with php:
	- update:
<?php  
	//2. Perform database query
	$query = "UPDATE subjects SET ";
	$query .= "menu_name = '{$menu_name}', ";
	$query .= "position = {$position}, ";
	$query .= "visible = {$visible}, ";
	$query .= "WHERE id = {$id}";

	$result = mysqli_query($connection, $query);

	if ($result && mysqli_affected_rows() == 1) {
		// Success
		// redirect_to("somepage.php");
	} else {
		// Failure
		// $message = "Subject update failed";
		die("Database query failed. " .
			mysqli_error($connection));
	}
?>

	- delete:
<?php  
	// 2. Perform database query
	$query = "DELETE FROM subjects ";
	$query .= "WHERE id = {$id} ";
	$query .= "LIMIT = 1"; 
?>

- SQL Injections:
- escaping strings for mysql
	- add backslash menualy: 
	$menu_name = "Today\'s Widget Trivia";
	- addslashes($string)

	- Magic Quotes:
		- automatically addslashes on GET
		- added in PHP 2, default in PHP 3
		- Removed in PHP 5.4

	- mysqli_real_escape_string($db, $string)
		- added in PHP 4.3-5.0
		- use this one

- Prepared statements:
	- templetes for query, they save time from database preparing the 
	query plan each time
	- prepar statement once, reuse many times
	- separate query from dynamic data
		- prevents sql injection

- Example:

<?php  
	$query = "SELECT id, first_name, last_name";
	$query .= "FROM users ";
	$query .= "WHERE username = ? AND password = ? ";
	$query .= mysqli_prepare($connection, $query);

	mysqli_stmt_bind_param($stmt, 'ss', $username, $password);

	mysqli_stmt_execute($stmt);

	mysqli_stmt_bind_result($stmt, $id, $first_name, $last_name);

	mysqli_stmt_fetch($stmt);

	mysqli_stmt_close($stmt);
?>

/*Building CMS*/
- blueprinting the application:

	- public area:
		- site pages
			- navigation
			- page content
			- read only
	
	- admin area:
		- login page
			- form
				- username
				- password
		
		- admin menu
			- manage content
			- manage admins
			- logout

			- manage content
				- navigation
				- subject CRUD
				- page CRUD
			
			- manage admins
				- admins CRUD
			
			- logout
				- do logout
				- back to login

- building the database:
	- subjects
		- id
		- menu_name
		- position
		- visible
	- pages
		- id
		- subject_id
		- menu_name
		- position
		- visible
		- content
	- admins
		- id
		- user_name
		- hashed_password

- estalishing your work area:

	- includes
		-
	- public
		- javascripts
		- styles
		- images
			- index.php
			- admin.php
			- manage_content.php

- styles:
- making page assets reusable:
	- use same layout for all your headers and footers 			
