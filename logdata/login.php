<?php   

$title= "Login";
$email=$_SESSION['email'];
$pw=$_SESSION['pw'];

$str = <<<HTML_FORM
   	<!DOCTYPE html>
	   <html>
	   <head>
	   <title>PHPLogin</title>
	   <link rel="stylesheet" href="css/stili.css" type="text/css">
	   </head>
	   <body>
       <div>
       <form  action="{$_SERVER['PHP_SELF']}" method="POST" name="invio">
	   <div id="titolo"><b>$title</b></div>
       <div class="testo">EMail:</div>
          <input class="casella" type="text" name="email" placeholder="inserisci qui il tuo indirizzo eMail" value='$email'/>
          <div class="testo">Password:</div>
          <input class="casella" type="password" name="pass" placeholder="Inserisci qui la tua password" value='$pass'/>
        <input type="hidden" name="mySessionID" value='$mySessionID'>  
        <p>
        <CENTER>
           <button id="acc" name="submit" type="submit">Accedi</button>
           </CENTER>
           </p>
	   </form>
       </div>
	   </body>
	   </html>

HTML_FORM;

echo($str);

?>