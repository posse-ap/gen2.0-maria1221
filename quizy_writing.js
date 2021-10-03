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
function question(questionNumber) {
  let questionContent =
    '<div id="questionContent" class="questionContent">' +
    `<h1>${questionNumber}. この地名はなんて読む？</h1>` +
    `<img src="img/${questionNumber}.png">` +
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
    `<p>正解は「${choice}」です！</p>` +
    "</div>";
  // answerBoxのdisplayをnone→クリックしたときにblockにする
  // 正解をクリックした時と不正解をクリックした時でanswerTextの中身を変える

  document.getElementById("main").insertAdjacentHTML("beforeend", questionContent);
}

// 選択肢を選んだ時の処理
function click(questionNumber) {
  let answerText = getElementById("answerText");
  let answerBox = getElementById("answerBox");

  let correctChoice = getElementById(`choice_${questionNumber}_0`);
  let incorrectChoice1 = getElementById(`choice_${questionNumber}_1`);
  let incorrectChoice2 = getElementById(`choice_${questionNumber}_2`);

  correctChoice.addEventListener('click', function() {
    // 正解の選択肢の背景色を変更する
    correctChoice.classList.add("correct");
    answerText.innerText = "正解！"
    // 解答ボックスを表示させる
    answerBox.style.display = "block";
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
}

// question();
