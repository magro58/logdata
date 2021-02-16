<?php

function display() 
{

if(isset($_POST['submit']))       
{
	$mySessionID=$_POST['mySessionID'];     
	session_id($mySessionID);              
	session_start();                       
	if (!isset($_SESSION['mySessionID']))   
        {
	  header('Location:form.php');
	  exit;
	} 
        else
        {
        $mySessionID=$_SESSION['mySessionID'];
        
	$pw=$_POST['pw'];
	$_SESSION['pw']=$pw;
	$cognome=$_POST['cognome'];
	$_SESSION['cognome']=$cognome;
	$nome = $_POST['nome'];
	$_SESSION['nome']=$nome;
	$codice= $_POST['codice'];
	$_SESSION['codice']=$codice;
	$email= $_POST['email'];
	$_SESSION['email']=$email;
	$sesso= $_POST['sesso'];
	$_SESSION['sesso']=$sesso;	
        $host  = $_SERVER['HTTP_HOST'];
        $uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
        $save= 'saveDB.php?mySessionID='.$mySessionID;              
        header("Location: http://$host$uri/$save");
        die();
        }
}	
else 
{
    $mtsec = explode(' ', microtime());
    $mySessionID="indoNum-".$mtsec[1];
    session_id($mySessionID);
    session_start();
    $_SESSION['mySessionID']=$mySessionID;
    $cognome="";
    $nome="";
    $codice="";
    $email="";
    $pw="";
}   
$title="Inserisci i tuoi dati";

 $str = <<<HTML_FORM
      	<!DOCTYPE html>
        <html>
        <head>
        <style>
        body
        {
        text-align: center;
        background-color: black;
        }
        </style>
        <title>PHPRegistration</title>
        <link rel="stylesheet" href="css/stili.css?<?php echo time();" type="text/css">
        </head>
        <body>
        <div>
        <form  action="{$_SERVER['PHP_SELF']}" method="POST" name="invio">
          <div id="titolo"><b>$title</b></div>
          <div class="testo">Cognome:</div>
          <input class="casella" type="text" name="cognome"  placeholder="Inserisci qui il tuo cognome" value='$cognome'/>
          <div class="testo">Nome:</div>
          <input class="casella" type="text" name="nome" placeholder="Inserisci qui il tuo nome" value='$nome'/>
          <div class="testo">Sesso: </div>
          <div class="testo1 ">
          <input id="maschio" name="sesso" type=radio value="Maschio"><label for="Maschio" >  M</label>
            </div>
            <div class="testo1">
          <input id="Femina" name="sesso" type=radio value="Femmina" checked> <label for="Femmina">F</label>
          </div>
          <br>
          <div class="testo">Codice Fisicale:</div>
          <input class="casella" type="text" name="cf"  placeholder="Inserisci qui il tuo codice fiscale" value='$cf'/>
          <div class="testo">EMail:</div>
          <input class="casella" type="text" name="email" placeholder="inserisci qui il tuo indirizzo eMail" value='$email'/>
          <div class="testo">Password:</div>
          <input class="casella" type="password" name="pass" placeholder="Inserisci qui la tua password" value='$pass'/>
        <input type="hidden" name="mySessionID" value='$mySessionID'>  
          
        <p>
        <CENTER>
           <button id="conf" name="submit" type="submit">Conferma</button>&nbsp&nbsp&nbsp<button id="canc" type="reset">Annulla</button>
           </CENTER>
           </p>
           
        </form>
        </div>
        </body>
        </html>
HTML_FORM;

return $str;
}
echo display();
?>