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
        <div class="navElement">
          <a href="book.php">예 약</a>
        </div>
        <div class="navElement" style="background-image: url('img/parchment.jpg')">
          <a href="forum.php">후 기</a>
        </div>
      </nav>
      <section>
        <h1 id="forumTitle">후기게시판</h1>
        <hr>
        <?
        if ($_GET['action'] == "write") {
        ?>
        <form action="uploadWriting.php" method="post">
          <table class="writing">
            <tr>
              <td>작성자</td>
              <td><input type="text" name="writer" maxlength="5"></td>
            </tr>
            <tr>
              <td>비밀번호&nbsp;&nbsp;</td>
              <td><input type="password" name="password" maxlength="20"></td>
            </tr>
            <tr>
              <td>제목</td>
              <td><input type="text" name="title" maxlength="50"></td>
            </tr>
            <tr>
              <td>내용</td>
              <td><textarea name="content"></textarea></td>
            </tr>
          </table>
          <div class="buttons writing">
            <input type="reset" value="다시 작성">
            <input type="submit" value="저장">
          </div>
        </form>
        <?
        } elseif ($_GET['no'] != null) {
          $connect = mysql_connect("localhost", "kdhong", "1234");
          mysql_set_charset("utf8", $connect);
          mysql_select_db("escaperoom", $connect);

          $sql = "select * from forum where no={$_GET['no']}";
          $result = mysql_query($sql, $connect);
          $row = mysql_fetch_array($result);
        ?>
          <div class="article">
        <?
              echo "<span class='title'>{$row['title']}&nbsp;&nbsp;</span>";
              echo "<span class='writer'>작성자: {$row['name']}</span>";
              echo "<p class='content'>{$row['content']}</p>";
        ?>
            <div class="buttons">
              <button class="articleBtn" onclick="location.href = 'forum.php'">글 목록</button>
              <button class="articleBtn" onclick="location.href = '?action=write'">글쓰기</button>
              <button class="articleBtn" onclick="location.href = 'inputPassword.php?no=<? echo $row['no'] ?>'">삭제</button>
            </div>
          </div>

        <?
        } else {
          $connect = mysql_connect("localhost", "kdhong", "1234");
          mysql_set_charset("utf8", $connect);
          mysql_select_db("escaperoom", $connect);

          $sql = "select no, name, title from forum";
          $result = mysql_query($sql, $connect);

        ?>
        <div class="forumList">
          <table>
            <tr>
              <th>글번호</th>
              <th>제목</th>
              <th>작성자</th>
            </tr>
            <?
            while ($row = mysql_fetch_array($result)) {
              echo "<tr>";
              echo "<td>{$row['no']}</td>";
              echo "<td>&nbsp;&nbsp;<a href='?no={$row['no']}'>{$row['title']}</a></td>";
              echo "<td>{$row['name']}</td>";
            }
            ?>
          </table>
          <button class="write" onclick="location.href = '?action=write'">글쓰기</button>
        <?
        }
        ?>
        </div>
      </section>
    </div>
  </body>
</html>
