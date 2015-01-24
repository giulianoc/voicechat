<?php

$rname = $_GET['name'];


print "<h3>Crea la tua stanza di chat</h3>";
print "Scegli un nome";

print '<form action="index.php">Username: <input type="text" name="name" /><br /> <br /> <input type="submit" value="Crea" />  </form>' ;

if ($rname != "")
{
	if (strlen($rname) < 20)
	{
		$newroom = $rname."-|-".date("YmdHis").md5($_SERVER['REMOTE_ADDR']);
	}
	else
	{
		$newroom = substr($rname, 0, 20)."-|-".date("YmdHis").md5($_SERVER['REMOTE_ADDR']);
	}

	file_put_contents("rooms/".$newroom, $rname);

	$furl = substr(pageUrl(), 0, strpos(pageURL(),"/index.php?"))."/rooms/".$newroom;

	print "La tua chatroom è stata creata all'indirizzo ".$furl.".";

	$curl = substr(pageUrl(), 0, strpos(pageURL(),"/index.php?"))."/newchat.html?room=".$newroom;
	print "<br> Puoi entrarvi seguendo l'URL ".$curl;
}

function pageURL()
{
	$pageURL = 'http';
	if ($_SERVER["HTTPS"] == "on")
	{
		$pageURL .= "s";
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80")
	{
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	}
	else
	{
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}

	return $pageURL;
}
?> 

