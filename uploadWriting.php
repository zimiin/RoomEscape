<meta charset="utf-8">
<?
$connect = mysql_connect("localhost", "kdhong", "1234");
mysql_set_charset("utf8", $connect);
mysql_select_db("escaperoom", $connect);

if ($_POST['writer'] == "" || $_POST['password'] == "" || $_POST['content'] == "" || $_POST['title'] == "") {
  echo "<script>";
  echo "alert('입력이 안 된 항목이 있습니다.');";
  echo "history.back();";
  echo "</script>";
  exit();
}

$sql = "insert into forum values ('', '{$_POST['writer']}', '{$_POST['password']}', '{$_POST['content']}', '{$_POST['title']}')";
$result = mysql_query($sql, $connect);

if ($result) {
  echo "<script>";
  echo "alert('등록되었습니다');";
  echo "location.href = 'forum.php';";
  echo "</script>";
}
else {
  echo mysql_error();
  echo "<script>";
  echo "alert('후기 등록에 실패했습니다.')";
  echo "location.href = 'forum.php';";
  echo "</script>";
}
?>
