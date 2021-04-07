<meta charset="utf-8">
<?
$connect = mysql_connect("localhost", "kdhong", "1234");
mysql_set_charset("utf8", $connect);
mysql_select_db("escaperoom", $connect);

$sql = "update timetable set booked=1 where date='{$_POST['date']}' and theme='{$_POST['theme']}' and time='{$_POST['time']}'";
$result = mysql_query($sql, $connect);

echo "<script>";
if ($result) {
  echo "alert('예약되었습니다.');";
}
else {
  echo "alert('예약에 실패했습니다.');";
  echo mysql_error($connect);
}
echo "location.href = 'book.php';";
echo "</script>"

?>
