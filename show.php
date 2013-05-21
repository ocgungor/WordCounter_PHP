<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
        "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<?php

  // Get file name
  $file = $_GET['file'];

  
  if ( empty($file) || $file == "" ) {
      echo "Missing filename.<br>\n";
      exit;
  }

  // Check file path is allowed
  if ( strncmp($file, "/", 1) == 0 || strstr($file, "../") ) {
      echo "File name is not allowed: $file.<br>\n";
      exit;
  }

  // Sanitise file name (unnecessary here?)
  $file = EscapeShellCmd(substr($file, 0, 40));

  // Check file exists
  if ( ! file_exists($file) || ! is_file($file) ) {
      echo "File not found or not printable: $file.<br>\n";
      exit;
  }

  // Attempt to open file
  $fp = fopen($file, "r");
  if ( ! $fp ) {
      echo "Couldn't open file: $file.<br>\n";
      exit;
  }

  // Now print lines of file
  echo "<pre>\n";
  while ( ! feof($fp) ) {
      echo htmlspecialchars(fgets($fp,4096));
  }
  fclose($fp);
  echo "</pre>\n";

?>

</body>
</html>
