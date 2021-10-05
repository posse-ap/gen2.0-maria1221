"use strict";
// サンプルコードガン無視で自分の書き方でいいのか？
// tukaetaraii.
// sekkakunarajunzurukakikata
// 自分の書き方だと前提出したのとほぼ同じになっちゃう気がするけどそれでいいのか

let quizSet = new Array();
quizSet.push(["たかなわ", "こうわ", "たかわ"]);
quizSet.push(["かめいど", "かめど", "かめと"]);
quizSet.push(["こうじまち", "おかとまち", "かゆまち"]);
quizSet.push(["おなりもん", "ごせいもん", "おかどもん"]);
quizSet.push(["とどろき", "たたりき", "たたら"]);
quizSet.push(["しゃくじい", "いじい", "せきこうい"]);
quizSet.push(["ぞうしき", "ざっしき", "ざっしょく"]);
quizSet.push(["おかちまち", "みとちょう", "ごしろちょう"]);
quizSet.push(["ししぼね", "ろっこつ", "しこね"]);
quizSet.push(["こぐれ", "こばく", "こしゃく"]);

// questionNumber 問題番号
// quizSetList 選択肢の一覧
// correctNumber 正解の選択肢の番号
function question(questionNumber, quizSetList) {
  let questionContent =
    '<div id="questionContent" class="questionContent">' +
    `<h1>${questionNumber}. この地名はなんて読む？</h1>` +
    `<img src="image/${questionNumber}.png">` +
    "<ul>";

  quizSetList.forEach(function (choice, index) {
    questionContent +=
      `<li id="choice_${questionNumber}_${index}" class="choice">` +
      `${choice}</li>`;
  });
  // forEach(コールバック関数(取り出している要素の値, 要素のインデックス))
  // 一回目のchoice = [たかなわ, たかわ, こうわ]
  // idは「たかなわ」はchoice_0_0。「たかわ」はchoice_0_1。「こうわ」はchoice_0_2

  questionContent += "</ul>" + "</div>";

  // 解答ボックス
  // <p>正解！</p>
  // <p>`正解は「${choice}」です！`</p>
  // <p>不正解！</p>
  // <p>正解は「」です！</p>
  questionContent +=
    '<div id="answerBox" class="answerBox">' +
    '<p id="answerText"></p>' +
    `<p>正解は「${quizSetList[0]}」です！</p>` +
    "</div>";

    document.getElementById("main").insertAdjacentHTML("beforeend", questionContent);
}


  // answerBoxのdisplayをnone→クリックしたときにblockにする
  // 正解をクリックした時と不正解をクリックした時でanswerTextの中身を変える
let answerText = document.getElementById("answerText");
let answerBox = document.getElementById("answerBox");

let correctChoice = document.getElementById(`choice_${questionNumber}_0`);
let incorrectChoice1 = document.getElementById(`choice_${questionNumber}_1`);
let incorrectChoice2 = document.getElementById(`choice_${questionNumber}_2`);

correctChoice.addEventListener('click', function() {
  // 正解の選択肢の背景色を変更する
  correctChoice.classList.add("correct");
  answerText.innerText = "正解！"
  // 解答ボックスを表示させる
  answerBox.style.display = "block";
  // answerTextをanswerBoxの子要素として追加
  answerBox.appendChild(answerText); 

  // 選択肢をクリックできないようにする  
  incorrectChoice1.style.pointerEvents = "none";
  incorrectChoice2.style.pointerEvents = "none";
  correctChoice.style.pointerEvents = "none";
})
incorrectChoice1.addEventListener('click', function() {
  // 正解と不正解の選択肢の背景色を変更する
    correctChoice.classList.add("correct");
    incorrectChoice1.classList.add("incorrect");
    answerText.innerText = "不正解！"
  // 解答ボックスを表示させる
    answerBox.style.display = "block";
  //  選択肢をクリックできないようにする
  incorrectChoice1.style.pointerEvents = "none";
  incorrectChoice2.style.pointerEvents = "none";
  correctChoice.style.pointerEvents = "none";
})
incorrectChoice2.addEventListener('click', function() {
  // 正解と不正解の選択肢の背景色を変更する
    correctChoice.classList.add("correct");
    incorrectChoice2.classList.add("incorrect");
    answerText.innerText = "不正解！"
  //  解答ボックスを表示させる
    answerBox.style.display = "block";
  //   選択肢をクリックできないようにする
  incorrectChoice1.style.pointerEvents = "none";
  incorrectChoice2.style.pointerEvents = "none";
  correctChoice.style.pointerEvents = "none";
})

// 選択肢を選んだ時の処理
// function click(questionNumber) {
  
// }

// questionContentのHTMLを出力する

// 選択肢がシャッフルされるようにする
// // フィッシャーイェーツのシャッフル
// for ( let i = quizSet.length; i > 0; i--) {
//   const j = Math.floor(Math.random() * (i + 1));
//   // j 範囲内からランダムに選ばれる変数
//   [quizSet[j], quizSet[i]] = [quizSet[i], quizSet[j]];
//   // 分割代入を利用してiとjを入れ替える
// }
// これだと、配列quizSetがシャッフルされるから、例えば["たかなわ", "こうわ", "たかわ"]と["かめいど", "かめど", "かめと"]が入れ替わることになってしまう
// forEachでquizSetから問題の選択肢をそれぞれ取り出してシャッフルさせる

function quizContent() {

  quizSet.forEach(function(questionChoices, index) {
    // forEach(コールバック関数(現在取り出している要素の値, 要素のインデックス))

 for ( let i = questionChoices.length - 1; i > 0; i--) {
  const j = Math.floor(Math.random() * (i + 1));
  // j 範囲内からランダムに選ばれる変数
  [questionChoices[j], questionChoices[i]] = [questionChoices[i], questionChoices[j]];
  // 分割代入を利用してiとjを入れ替える
}
// 第一引数 questionNumber 問題番号
// 第二引数 quizSetList 選択肢の一覧
question(index + 1, questionChoices);
// index + 1 indexだと0になってしまうから
})
}
// JavaScriptのファイルを読み込む処理
// ページが読み込まれ終わってから、関数
window.onload = question();


