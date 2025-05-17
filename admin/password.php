<?php require_once('../Connections/theweddingmatrimony.php'); ?>
<?php
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$link =  $_SERVER['PHP_SELF'];
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $password = $_POST['password'];
  $hash = password_hash($password, PASSWORD_DEFAULT);
  $uname = $_POST['uname'];
  echo $hash;
  $insertSQL = "INSERT INTO `admin` (uname, password, fname, lname) VALUES ('$uname', '$hash', '{$_POST['fname']}', '{$_POST['lname']}')";

  //mysqli_select_db($ggc, $hostname_ggc);
  $Result1 = mysqli_query($theweddingmatrimony, $insertSQL) or die(mysql_error());

  $insertGoTo = "password.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>

<body>
    <form name="form" method="POST" action="<?php echo $editFormAction; ?>">
        uname:<input type="text" name="uname" /><br>
        password:<input type="text" name="password" /><br>
        fname:<input type="text" name="fname" /><br>
        lname<input type="text" name="lname" /><br>
        <input type="submit" value="submit" name="save" />
        <input type="hidden" name="MM_insert" value="form" />
        <p><?php echo $link; ?></p>
    </form>
</body>