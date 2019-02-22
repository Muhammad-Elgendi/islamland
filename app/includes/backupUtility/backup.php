<?

// Inspired by tutorials: http://www.phpfreaks.com/tutorials/130/6.php
// http://www.vbulletin.com/forum/archive/index.php/t-113143.html
// http://hudzilla.org


// Create the mysql backup file
// edit this section
$dbhost = App::environment('DB_HOST'); // usually localhost
$dbuser = App::environment('DB_USERNAME');
$dbpass = App::environment('DB_PASSWORD');
$dbname = App::environment('DB_DATABASE');
$sendto = "Webmaster <actnoon@gmail.com>";
$sendfrom = "Automated Backup <backup@islamland.net>";
$sendsubject = "Daily Mysql Backup";
$bodyofemail = "Here is the daily backup.";
// don't need to edit below this section

$backupfile = $dbname . date("Y-m-d") . '.sql';
$backupzip = $backupfile . '.tar.gz';
system("mysqldump -h $dbhost -u $dbuser -p$dbpass $dbname > $backupfile");
system("tar -czvf $backupzip $backupfile");

// Mail the file


include('Mail.php');
include('Mail/mime.php');


$message = new Mail_mime();
$text = "$bodyofemail";
$message->setTXTBody($text);
$message->AddAttachment($backupzip);
$body = $message->get();
$extraheaders = array("From"=>"$sendfrom", "Subject"=>"$sendsubject");
$headers = $message->headers($extraheaders);
$mail = Mail::factory("mail");
$mail->send("$sendto", $headers, $body);


// Delete the file from your server
unlink($backupfile);
unlink($backupzip);
?>
