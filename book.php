<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <title>해리포터 방탈출</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link rel="icon" href="img/icon.png">
  </head>
  <body>
    <div id="wrap">
      <header>
        <a href="index.php"><img src="img/logo.png" alt="logo"></a>
      </header>
      <nav>
        <div class="navElement">
          <a href="theme.php">테 마</a>
        </div>
        <div class="navElement" style="background-image: url('img/parchment.jpg')">
          <a href="book.php">예 약</a>
        </div>
        <div class="navElement">
          <a href="forum.php">후 기</a>
        </div>
      </nav>
      <section>
        <h1 class="bookTitle">예약하기</h1>
        <hr>
        <div class="bookingOption">
          <form action="book.php" method="post">
            <table>
              <tr>
                <td><label for="datefield"><span class="colored">방문 날짜</span>&nbsp;</label></td>
                <td><input name="datefield" id="datefield" type='date' min='2020-07-02' max='2020-07-31'></input></td>
              </tr>
              <tr>
                <td><span class="colored">테마 선택</span>&nbsp;</td>
                <td>
                  <input type="checkbox" name="themeFilter" id="theme0" value="0" onclick="toggle(this);">
                  <label for="theme0">전체</label>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type="checkbox" name="themeFilter" id="theme1" value="1">
                  <label for="theme1">마법사의 돌</label>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type="checkbox" name="themeFilter" id="theme2" value="2">
                  <label for="theme2">불의 잔</label>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input type="checkbox" name="themeFilter" id="theme3" value="3">
                  <label for="theme3">죽음의 성물</label><br>
                </td>
              </tr>
              <tr>
                <td colspan="2" style="text-align:right"><input type="submit" value="적용"></td>
              </tr>
            </table>
          </form>
        </div>

        <div class="timetable">
          <table style="width: 100%">
            <colgroup>
              <col span="1" style="width: 15%;">
              <col span="1" style="width: 10%;">
              <col span="1" style="width: 40%;">
              <col span="1" style="width: 10%;">
            </colgroup>

            <tr>
              <th>날짜</th>
              <th>시간</th>
              <th>테마</th>
              <th></th>
            </tr>
            <?
            $connect = mysql_connect("localhost", "kdhong", "1234");
            mysql_set_charset("utf8", $connect);
            mysql_select_db("escaperoom", $connect);

            $sql = "select * from timetable where booked = 0";
            $result = mysql_query($sql, $connect);

            while ($row = mysql_fetch_array($result)) {
              if ($row['theme'] == 1) {
                $title = "마법사의 돌";
              }
              elseif ($row['theme'] == 2) {
                $title = "불의 잔";
              }
              if ($row['theme'] == 3) {
                $title = "죽음의 성물";
              }

              echo "<form action='bookingAction.php' method='post'>";
              echo "<tr>";
              echo "<td>{$row['date']}</td>";
              echo "<td>{$row['time']}</td>";
              echo "<td>{$title}</td>";
              echo "<td>";
              echo "<input type='hidden' name='date' value='{$row['date']}'>";
              echo "<input type='hidden' name='time' value='{$row['time']}'>";
              echo "<input type='hidden' name='theme' value='{$row['theme']}'>";
              echo "<input type='submit' value='예약하기'>";
              echo "</td>";
              echo "</tr>";
              echo "</form>";
            }
            ?>
          </table>
        </div>
      </section>
    </div>

    <script>
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }

      today = yyyy + '-' + mm + '-' + dd;
      document.getElementById("datefield").setAttribute("min", today);
      document.getElementById("datefield").setAttribute("value", today);

      function toggle(source) {
        checkboxes = document.getElementsByName('themeFilter');
        for(var i=0, n=checkboxes.length;i<n;i++) {
          checkboxes[i].checked = source.checked;
        }
      }
    </script>
  </body>
</html>
