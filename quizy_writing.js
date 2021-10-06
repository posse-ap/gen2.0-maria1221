"use strict";

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

// answerBoxのdisplayをnone→クリックしたときにblockにする
// 正解をクリックした時と不正解をクリックした時でanswerTextの中身を変える

// questionNumber 問題番号
// selectNumber 選択された選択肢の番号
// correctNumber 正解の選択肢の番号
function select (questionNumber, selectNumber, correctNumber) {
  let answerText = document.getElementById(`answerText_${questionNumber}`);
  let answerBox = document.getElementById(`answerBox_${questionNumber}`);
  let correctChoice = document.getElementById(`choice_${questionNumber}_${correctNumber}`);
  let incorrectChoice = document.getElementById(`choice_${questionNumber}_${selectNumber}`);
  // let incorrectChoice2 = document.getElementById(`choice${questionNumber}_${}`);
  //不正解の場合は選択肢を全部オレンジ色にして、さらに正解の選択肢だけ水色にすればいい
  let choice1 = document.getElementById(`choice_${questionNumber}_0`);
  let choice2 = document.getElementById(`choice_${questionNumber}_1`);
  let choice3 = document.getElementById(`choice_${questionNumber}_2`);
  // クリックできないようにする
  choice1.style.pointerEvents = "none";
  choice2.style.pointerEvents = "none";
  choice3.style.pointerEvents = "none";
  if (selectNumber == correctNumber) {
    answerText.innerText = "正解！" 
    correctChoice.classList.add("correct");
  } else {
    incorrectChoice.classList.add("incorrect");
    correctChoice.classList.add("correct");
    // answerBox.style.display = "block";

    correctChoice.classList.add("correct");
    answerText.innerText = "不正解！"
  }
  answerBox.style.display = "block";
}

// questionNumber 問題番号
// quizSetList 選択肢の一覧
// correctNumber 正解の選択肢の番号
function question(questionNumber, quizSetList, correctNumber) {
  let questionContent =
    '<div id="questionContent" class="questionContent">' +
    `<h1>${questionNumber}. この地名はなんて読む？</h1>` +
    `<img src="image/${questionNumber}.png">` +
    '<ul id="choices">';

  quizSetList.forEach(function (choice, index) {
    questionContent +=
      `<li id="choice_${questionNumber}_${index}" class="choice" onclick="select(${questionNumber}, ${index}, ${correctNumber})">${choice}</li>`;
      // `<li id="choice_${questionNumber}_${index}" class="choice">${choice}</li>`;
      // <li onclick="イベントハンドラ">リスト項目</li>
  });
  // forEach(コールバック関数(取り出している要素の値, 要素のインデックス))
  // 一回目のchoice = [たかなわ, たかわ, こうわ]
  // idは「たかなわ」はchoice_0_0。「たかわ」はchoice_0_1。「こうわ」はchoice_0_2
  // 関数clickの引数 問題番号、選択された選択肢の番号、正解の選択肢の番号
  questionContent += "</ul>" + "</div>";

  // 解答ボックス
   questionContent +=
    `<div id="answerBox_${questionNumber}" class="answerBox">` +
    `<p id="answerText_${questionNumber}"></p>` +
    `<p>正解は「${quizSetList[correctNumber]}」です！</p>` +
    "</div>";

    document.getElementById("main").insertAdjacentHTML("beforeend", questionContent);
}



function quizContent() {

  quizSet.forEach(function(questionChoices, index) {
    // forEach(コールバック関数(現在取り出している要素の値, 要素のインデックス))
 let correct = questionChoices[0]
 for ( let i = questionChoices.length - 1; i > 0; i--) {
  const j = Math.floor(Math.random() * (i + 1));
  // j 範囲内からランダムに選ばれる変数
  [questionChoices[j], questionChoices[i]] = [questionChoices[i], questionChoices[j]];
  // 分割代入を利用してiとjを入れ替える
  }
// 第一引数 questionNumber 問題番号
// 第二引数 quizSetList 選択肢の一覧
  question(index + 1, questionChoices, questionChoices.indexOf(correct));
// index + 1 indexだと0になってしまうから
})
}
// JavaScriptのファイルを読み込む処理
// ページが読み込まれ終わってから、関数quizContent()を読み込む
window.onload = quizContent();


