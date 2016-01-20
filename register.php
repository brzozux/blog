<?php
//error_reporting(0);
include_once 'config.php';
db_connect();

// sprawdzamy czy user nie jest przypadkiem zalogowany
if(!$_SESSION['logged']) {
    // jeśli zostanie naciśnięty przycisk "Zarejestruj"
    if(isset($_POST['name'])) {
        // filtrujemy dane...
        $_POST['name'] = clear($_POST['name']);
        $_POST['password'] = clear($_POST['password']);
        $_POST['password2'] = clear($_POST['password2']);
        $_POST['email'] = clear($_POST['email']);
 
        // sprawdzamy czy wszystkie pola zostały wypełnione
        if(empty($_POST['name']) || empty($_POST['password']) || empty($_POST['password2']) || empty($_POST['email'])) {
            echo '<p>Musisz wypełnić wszystkie pola.</p>';
        // sprawdzamy czy podane dwa hasła są takie same
        } elseif($_POST['password'] != $_POST['password2']) {
            echo '<p>Podane hasła różnią się od siebie.</p>';
        // sprawdzamy poprawność emaila
        } elseif(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) === false) {
            echo '<p>Podany email jest nieprawidłowy.</p>';
        } else {
            // sprawdzamy czy są jacyś uzytkownicy z takim loginem lub adresem email
            $result = mysql_query("SELECT Count(user_id) FROM `users` WHERE `user_name` = '{$_POST['name']}' OR `user_email` = '{$_POST['email']}'");
            $row = mysql_fetch_row($result);
            if($row[0] > 0) {
                echo '<p>Już istnieje użytkownik z takim loginem lub adresem e-mail.</p>';
            } else {
                // jeśli nie istnieje to kodujemy haslo...
                $_POST['password'] = codepass($_POST['password']);
                // i wykonujemy zapytanie na dodanie usera
                mysql_query("INSERT INTO `users` (`user_name`, `user_password`, `user_email`, `user_regdate`) VALUES ('{$_POST['name']}', '{$_POST['password']}', '{$_POST['email']}', '".time()."')");
                $_SESSION['logged'] = true;
				$_SESSION['user_id'] = $row['user_id'];
				header('Location: index.php');
				//echo '<p>Zostałeś poprawnie zarejestrowany! Możesz się teraz <a href="login.php">zalogować</a>.</p>';
            }
        }
	} 
} else {
	echo '<p>Jesteś już zalogowany, więc nie możesz stworzyć nowego konta.</p>';
	header('Location: index.php');
}
db_close();
?>