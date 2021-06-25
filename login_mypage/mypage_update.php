<?php
    mb_internal_encoding("utf8");

    session_start();

    //DB接続
    $pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","root");

    //prepared statement(プリペアードステートメント)でSQLをセット
    $stmt=$pdo->prepare("insert into login_mypage(name,mail,password,picture,comments)values(?,?,?,?,?)");

    $stmt->bindValue(1,$_POST['name']);
    $stmt->bindValue(2,$_POST['mail']);
    $stmt->bindValue(3,$_POST['password']);
    $stmt->bindValue(4,$_POST['picture']);
    $stmt->bindValue(5,$_POST['comments']);

    //excuteでクエリを実行
    $stmt->execute();


    //prepared statement(更新された情報をDBからselect文で取得)でsqlをセット
    $stmt=$pdo->prepare("select * from login_mypage where mail=? && password =?");

    $stmt->bindValue(1,$_POST['mail']);
    $stmt->bindValue(2,$_POST['password']);

    //excuteでクエリを実行
    $stmt->execute();

    //データベースを切断
    $pdo=NULL;

    //fetch・while文でDataを取得し、sessionに代入
    while($row=$stmt->fetch()){
        $_SESSION['id']=$row['id'];
        $_SESSION['name']=$row['name'];
        $_SESSION['mail']=$row['mail'];
        $_SESSION['password']=$row['password'];
        $_SESSION['picture']=$row['picture'];
        $_SESSION['comments']=$row['comments'];
    }

    //mypage.phpへリダイレクト
    header("Location:http://localhostlogin_mypage/mypage.php");
?>