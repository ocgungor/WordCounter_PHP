<html>
<body>
<?php
$text=$_POST['text'];

$nchars = strlen($text);

$lines = preg_split("/\r\n/", $text); // simpler patterns may also work
$nlines = count($lines);

$nwords = 0;
foreach ($lines as $line) {
    $line = trim($line);		// strip leading and trailing spaces
    if (strlen($line) != 0) {		// handle empty lines correctly
	$words = preg_split('/[\s]+/', $line);		
	$nwords += count($words);
    }
}

echo "<p>\n";
echo "$nlines lines $nwords words $nchars chars\n";
?>

</body>
</html>
