<meta charset="utf-8">
<?
$connect = mysql_connect("localhost", "kdhong", "1234");
mysql_set_charset("utf8", $connect);
mysql_select_db("escaperoom", $connect);

$sql = "select password from forum where no={$_GET['no']}";
$result = mysql_query($sql, $connect);
$row = mysql_fetch_array($result);

if (strcmp($row['password'], $_POST['password']) == 0) {
  $sql = "delete from forum where no={$_GET['no']}";
  $result = mysql_query($sql, $connect);
  
  if ($result) {
    echo "<script>";
    echo "alert('삭제되었습니다.');";
    echo "location.href = 'forum.php';";
    echo "</script>";
  }
}
else {
  echo "<script>";
  echo "alert('비밀번호가 틀렸습니다.');";
  echo "window.history.go(-2);";
  echo "</script>";
}
?>
