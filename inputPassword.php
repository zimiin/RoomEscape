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
        <div class="deleteSection"><p>글 작성 시 입력했던 비밀번호를 입력하세요.</p></div>
        <div class="deleteSection">
          <form method="post" action="deleteWriting.php?no=<? echo $_GET['no'] ?>">
            <input type="password" maxlength="20" name="password">
            <input type="submit" value="확인">
          </form>
        </div>
      </section>
    </div>
  </body>
</html>
