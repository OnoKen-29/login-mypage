<?php
    mb_internal_encoding("utf8");

    session_start();

    //mypage.phpからの導線以外はlogin_error.phpへリダイレクト
    if(empty($_SESSION['id'])){
        header("Location:login_error.php");
    }

?>

<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <title>マイページ登録</title>
        <link rel="stylesheet" type="text/css" href="mypage_hensyu.css">
    </head>

    <body>
        <header>
            <img src="4eachblog_logo.jpg">
        </header>

        <main>

        </main>


            <div class="box">

                <h2>会員情報</h2>

                <div class="box01">
                    

                    <div class="hello">
                        <?php echo "こんにちは！　".$_SESSION['name']."さん" ?>
                    </div>

                    <form action="maypage_update.php" method="post">

                        <div class="profile_pic">
                            <img src="<?php echo $_SESSION['picture']; ?>">
                        </div>

                        <div class="info">
                            <p>氏名：<input type="text" size="30" value="<?php echo $_SESSION['name']; ?> " name="name">
                            </p>
                            <p>メール：<input type="text" size="30" value="<?php echo $_SESSION['mail']; ?>" name="mail">
                            </p>
                            <p>パスワード：<input type="text" size="30" value="<?php echo $_SESSION['password']; ?>" name="password">
                            </p>
                        </div>
                        
                        <div class="comments">
                            <textarea rows="5" cols="45"><?php echo $_SESSION['comments']; ?></textarea>
                        </div>

                        <div class="form_button">
                            <input type="submit" class="button" value="編集する"/>
                        </div>
                    </form>  

                </div>

            </div>

        <footer>
            ©2018InterNous.inc.All rights reserved
        </footer>

    </body>


</html>