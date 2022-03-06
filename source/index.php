<?php
include("./db_connect.php");
// データベースを検索  SELECT 表示するカラム FROM テーブル名 WHERE 検索条件
// SELECT文を変数に格納

// filter_input URLから送信されるPOSTやGETなどの変数をフィルタリングする
// フィルタリング 見込んでいるデータかどうかチェックする
// input_get phpの外部から変数を受け織、オプションでフィルタリングする
// query SQL文をデータベースに対して発行する
// $stmt statement 宣言
// SELECT カラム名 FROM テーブル名 WHERE 条件
// SQL文を実行して結果を変数に格納

// 変数がセットされているかを調べる
// if(isset($$id = $_GET["id"])) {
// }

$id = $_GET["id"];
// var_dump($id);
$stmt = $pdo->query("SELECT * FROM big_questions WHERE id = $id");
$title = $stmt->fetchAll();
// var_dump($title);
$stmt = $pdo->query("SELECT * FROM choices WHERE area_id = $id");
$choices = $stmt->fetchAll();

// if($id == 1) {
//   $stmt = 
// }

// query→?が使えない
// $stmt0 = $pdo->prepare("SELECT * FROM big_questions WHERE id = ?");
// // id=?→特定の値にしない→変数的な感じ
// $stmt1 = $pdo->prepare("SELECT * FROM choices");
// $stmt2 = $pdo->prepare("SELECT count(DISTINCT questions_id) FROM choices"); 
// $stmt3 = $pdo->prepare("SELECT count(DISTINCT questions_id) FROM choices WHERE area_id = ?"); 
// $stmt4 = $pdo->prepare("SELECT * FROM choices WHERE area_id = ?");
// $stmt5 = $pdo->prepare("SELECT DISTINCT questions_id FROM choices WHERE area_id = ?");
// $stmt6 = $pdo->prepare("SELECT MIN(questions_id) FROM choices WHERE area_id = ?");
// for ($i = 0; $i < 7; $i++) {
//   ${"stmt" . $i}->execute([$id]);
//   ${"data" . $i} = ${"stmt" . $i}->fetchAll();
// };



// echo $data2[0]["count(*)"]; //6
// echo $data1[0]["name"];//たかなわ
// echo $data1[0]["questions_id"];//2
// PHPでデータベースの検索結果を受け取ってPHPの中のプログラムの中で利用するには、データベースから受け取ったデータを全て1つの配列に入れ、それをPHPのプログラム内で加工する方法
// $area = $stmt->fetchAll();
// print_r($area[0]["name"]) . PHP_EOL;
// http://localhost/?id=2 ?以降がパラメーター。パラメーターを取ってくるのが $_GET["id"];

// URLのidが1なら東京、2なら広島
// WHERE big_question_id で東京か広島か判別
// $quizSetにとってきた結果の配列を入れる
// count 配列の要素数を数える
?>




<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">  
<title>ガチで<?php echo $data0[0]["name"]; ?>の人しか解けない</title>
<link rel="stylesheet" href="./resetCSS.css">
<link rel="stylesheet" href="./quizy.css">
</head>

<body>
<!-- <div class="quiz"> -->
<?php foreach ($choices as $index => $choice) {
  // $questions_id = $choice["id"];
  // echo $questions_id;
  // $area_name = $choice["name"];
  // echo $area_name;
  ?>
  <?php if(($index . 1) % 3 == 1) { ?>
  <div>
  <?php
  echo $choices[$index]["questions_id"] . ". この地名はなんて読む？"; //問題番号
  ?>
  <!-- 現状$questions_idが7→0にしたい -->
  <img src="./image/<?php echo $id; ?>-<?php echo $choices[$index]["questions_id"]; ?>.png" alt="問いとなる地名の画像"/>
<?php } ?>
<ul>
<li class='choice'> <?php echo $choice["name"]; ?></li>
</ul>
</div>
<?php } ?>

<?php 

// for($i = 0; $i < $choices)
// 3で割った時に余りがない 0
for ($i = 0; $i < $data3[0]["count(DISTINCT questions_id)"]; $i++) {
  // $h = $i + 1;
  foreach($numbers as $number) {

  }
  $main =
    "<div class='question'>" 
    . "<h2 class='underline'>"
    . "{}. この地名はなんて読む？"
    . "</h2>"
    . "<img src='./image/$h.png' alt=問いとなる地名の画像/>"
    . "<ul id='choices'>";
  // $data2[0]["count(DISTINCT questions_id)"] 3 設問の数
  // 問題の選択肢を追加
  // $choice = $pdo->prepare("SELECT name FROM choices WHERE questions_id = $i+1");
  // $choiceArray = []; 
  // $x = $data6[0]["MIN(questions_id)"]; //id=1の時は0、id=2の時は3
  // echo  $data3[0]["count(DISTINCT questions_id)"];//id=1の時は2、id=2の時は1
  // for ($k = 1; $k <= $data3[0]["count(DISTINCT questions_id)"]; $k++) {
  //   ${"choice" . $x} = $pdo->prepare("SELECT name FROM choices WHERE questions_id = $k");
  //   ${"choice" . $x}->execute([$id]);
  //   ${"choiceList" . $x} = ${"choice" . $x}->fetchAll();
  //   array_push($choiceArray, ${"choiceList" . $x});
  //   }
//  idが1の時はarea_id=1のものを持ってくる、2の時はarea_id=2のものをもってくるif文
// area_id=$id
  // $data2[0]["count(DISTINCT questions_id)"] id=1の時は2、id=2の時は1
  for ($j = 0; $j <  $data2[0]["count(DISTINCT questions_id)"]; $j++){
    $questions_id = $data5[$i]["questions_id"]; 
    // echo $questions_id;
    $main .= "<li class='choice'>" 
    // . ${"choiceList" . $questions_id}[$j]["name"]
    // . $choiceArray[$questions_id-1][$j]["name"]
    . $data4[$j]["name"]
    . "</li>";
  }
    $main .= "</ul>"
    . "</div>";
    echo($main);
} 

// var_dump($data4);
?>
<!-- </div> -->
  <script src="quizy.js"></script>                               
</body>

</html> 

