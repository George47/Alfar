<?php

// Set up the database connection and start session
function configSession() {
  if (!isset($db)) {
    define('DB_SERVER', '127.0.0.1');
    define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', 'Shgl123.');
    define('DB_PASSWORD', '');
    define('DB_DATABASE', 'alfar_db1');
    global $db;
    $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE) or die('Cannot connect to database');
  }

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }
}

// Check if user has logged in
function loginCheck() {
	if (isset($_SESSION['login_user'])) {
		$un = $_SESSION['login_user'];
		global $db;
		$row = mysqli_query($db,"select username from admin where username = '$un' ");
		if ($row && mysqli_num_rows($row) == 1) {
			return true;
		}
	}
	return false;
}

// Redirect user to login if they haven't.
function loginRequired($errorMsg, $urlAfterLogin) {
	if (!loginCheck()) {
		$_SESSION['redirectError'] = isset($errorMsg) ? $errorMsg : "请先登录再访问此网页";
		$_SESSION['urlAfterLogin'] = $urlAfterLogin;
		header("location:login.php");
	}
}

// Takes a list of variables. Return true iff any is not set/empty
function hasEmpty($lst) {
	foreach ($lst as $elm) {
		if (!isset($elm) || empty($elm))
			return true;
	}
	return false;
}

function getSingleValue($tableName, $prop, $value, $columnName) {
  global $db;
  $q = $db->query("SELECT `$columnName` FROM `$tableName` WHERE $prop='".$value."'");
  $f = $q->fetch_assoc();
  $result = $f[$columnName];
  return $result;
}

function getReceiverID ($conversationID, $currentID) {
  global $db;
  $q = $db->query("SELECT user_one, user_two FROM conversation WHERE c_id='".$conversationID."'");
  $f = $q->fetch_assoc();
  $user_one = $f['user_one'];
  $user_two = $f['user_two'];

  if ($currentID == $user_one){
    return $user_two;
  } else {
    return $user_one;
  }
}

function likeHouse ($userNumber, $houseNumber) {
  //$q = $db->query("INSERT INTO  VALUES ")
  //$f = $q->fetch_assoc();
  //$result = $f['']
  return '42';
}

function dislikeHouse ($userNumber, $houseNumber) {
  return '42';
}



?>
