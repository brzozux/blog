<?php
session_start();
//error_reporting(0);
include_once 'config.php';
db_connect();

// sprawdzamy czy user nie jest przypadkiem zalogowany
if(!$_SESSION['logged']) {
    // jeśli zostanie naciśnięty przycisk "Zaloguj"
    if(isset($_POST['name'])) {
        // filtrujemy dane...
        $_POST['name'] = clear($_POST['name']);
        $_POST['password'] = clear($_POST['password']);
        // i kodujemy hasło
        $_POST['password'] = codepass($_POST['password']);
 
        // sprawdzamy prostym zapytaniem sql czy podane dane są prawidłowe
        $result = mysql_query("SELECT `user_id` FROM `users` WHERE `user_name` = '{$_POST['name']}' AND `user_password` = '{$_POST['password']}' LIMIT 1");
        if(mysql_num_rows($result) > 0) {
            // jeśli tak to ustawiamy sesje "logged" na true oraz do sesji "user_id" wstawiamy id usera
            $row = mysql_fetch_assoc($result);
            $_SESSION['logged'] = true;
            $_SESSION['user_id'] = $row['user_id'];
			
            header('Location: index.php');
        } else {
            echo '<p>Podany login i/lub hasło jest nieprawidłowe.</p>';
        }
    }
} else {
header('Location: index.php');
}
db_close();
?>