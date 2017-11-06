<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>アンケートフォーム</title>
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link href="https://fonts.googleapis.com/earlyaccess/notosansjapanese.css" rel="stylesheet" />
  <link rel="stylesheet" href="style.min.css">
</head>
<body>
<div id="page">
	<header>
    <h1 class="en"><a href="form.html">Ferica Technical Academy</a></h1>
    <nav class="pc_nav">
      <ul>
        <li>
          <a href="#">受講生の作品</a>
          <a href="#">卒業生の声</a>
          <a href="#">カリキュラム概要</a>
          <a href="#">募集要項</a>
          <a href="#">申し込み方法</a>
          <a href="#">施設見学会のご予約</a>
        </li>
      </ul>
    </nav>
    <div class="ham_menu">
      <span class="top"></span>
      <span class="middle"></span>
      <span class="bottom"></span>
    </div>
    <!-- /.ham_menu -->
    <nav class="mobile_nav">
      <ul>
        <li><a href="form.html">HOME</a></li>
        <li><a href="#">受講生の作品</a></li>
        <li><a href="#">卒業生の声</a></li>
        <li><a href="#">カリキュラム概要</a></li>
        <li><a href="#">募集要項</a></li>
        <li><a href="#">申し込み方法</a></li>
        <li><a href="#">施設見学会のご予約</a></li>
      </ul>
    </nav>
    <!-- /.mobile_nav -->
  </header>
	<p>
<?php
mb_language("japanese");
mb_internal_encoding("UTF-8");
$errors = array();
foreach($_POST as $key => $value) {
  if (is_array($value)) { $value = implode('', $value); }
  if (!mb_check_encoding($value)) {
    $errors[] = '文字コードに誤りがあります。';
    break;
  }
}

// if (trim($_POST['name']) === '') {
//   $errors[] = '名前はかならず入力してください。';
// }
// if (mb_strlen($_POST['name']) > 50) {
//   $errors[] = '名前は50文字未満で入力してください。';
// }
// if (trim($_POST['email']) === '') {
//   $errors[] = '住所は必ず入力してください。';
// }
// $age_array = array('10代','20代','30代','40代');
// if (isset($_POST['age'])) {
//     if (!in_array($_POST['age'], $age_array)) {
//       $errors[] = '年齢は選択肢の中から選択してください。';
//     }
// }
// $sex_array = array('男性','女性');
// if (isset($_POST['sex'])) {
//     if (!in_array($_POST['sex'], $sex_array)) {
//       $errors[] = '性別は選択肢の中から選択してください。';
//     }
// }
// $hobby_array = array('HTML5','CSS3','JavaScript','PHP','Photoshop','Illustrator','SEO','Other');
// if (isset($_POST['interest[]'])) {
//   foreach ($_POST['interest[]'] as $interest_value) {
//     if (!in_array($interest_value, $interest_array)) {
//       $errors[] = '趣味は決められた選択肢の中から選択してください。';
//       break;
//     }
//   }
// }
$name = htmlspecialchars($_POST['name'], ENT_QUOTES);
$email = htmlspecialchars($_POST['email'], ENT_QUOTES);
$age = htmlspecialchars($_POST['age'], ENT_QUOTES);
$sex = htmlspecialchars($_POST['sex'], ENT_QUOTES);
$interest = htmlspecialchars(implode(',', $_POST['interest']),ENT_QUOTES);
$question = htmlspecialchars($_POST['question'], ENT_QUOTES);
$to = "how.to.read.a.photograph@gmail.com";//このメールアドレスを変更
if (count($errors) > 0) {
  die(implode('<br />', $errors).
    '<br />[<a href="form.html">戻る</a>]');
}
$subject = '施設見学会アンケート';
$body = "名前：".$name."\n"."アドレス：".$email."\n"."年齢：".$age."\n"."性別：".$sex."\n"."関心：".$interest."\n"."質問：".$question;
$success = mb_send_mail($to,$subject,$body,"From:info@example.aa.bb");

if ($success) {
	print('<div class="wrap"><div class="inner"><div class="head"><h2>メッセージを送信しました</h2></div><p>この度はアンケートにご協力いただき、<br>誠にありがとうございました。</div></div>');
} else {
	print('<div class="wrap"><div class="inner">送信に失敗しました</div></div>');
}
?>
	</p>
	</div>
</div>
<div class="layer"></div>
<!-- /.layer -->
<div class="layer1"></div>
<!-- /.layer1 -->
<script src="jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="index.js"></script>
</body>
</html>
