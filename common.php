<?php
	include_once 'dbaccess.php';

	session_start();


	function require_login(){
		$user = $_SESSION["USER"];
		if(empty($user->userId)){
			header("Location: login.php");
		}
	}

	function require_login_item($specificItemID){
		global $db;
		$sqlQuery = "SELECT userId FROM iBayItems WHERE itemId = {$specificItemID}";
        $query = $db->prepare($sqlQuery);
        $query->execute();
        $query->store_result();
        $query->bind_result($intendedUser);
        $query->fetch();
		$user = $_SESSION["USER"];
		if($user->userId != $intendedUser){
			header("Location: account.php");
		}
	}



	function init_empty_session(){
		$_SESSION = array();
		$_SESSION["SESSION"] = new \stdClass();
		$_SESSION["USER"]    = new \stdClass();
	}

	function login(\stdClass $user){
		$_SESSION['USER'] = $user;
		unset($_SESSION['USER']->password);
}

	function logout(){

		session_start();
		session_destroy();
		init_empty_session();
		header("Location: login.php");
	}

	function authenticate_user($uUsername, $uPassword){
		global $db;
		$uUsername = strtolower($uUsername);

		$query = $db->prepare("SELECT * FROM iBayMembers;");

		$query->execute();
		$query->store_result();

		$query->bind_result($userid, $password, $name, $username, $email, $address, $postcode, $rating);

		while ($query->fetch()) {
			if ( password_verify($uPassword,$password) and $uUsername==strtolower($username)) {
				$user = new \stdClass();
				$user->name = $name;
				$user->username = $username;
				$user->userId = $userid;
				$user->email = $email;
				$user->password = $password;
				$user->address = $address;
				$user->postcode = $postcode;
				$user->rating = $rating;
			return $user;
			}
		}
		return false;
	}
?>
