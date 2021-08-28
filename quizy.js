"use strict";

// let choices = document.getElementsByClassName('choice');
// //classNameの方は返り値がHTMLCollection
// choices = Array.from( choices );
// //HTMLCollectionから配列にする [たかなわ, たかわ, こうわ]
// choices.forEach(choice => {
//     choice.classList.add("correct");
// });
// let correct = document.getElementsByClassName('correct');
// console.log(choice);

//

//pタグにすると縦並びになるのは、displayがblockだから

//HTMLにアンサーボックスのクラスを設定したdivにｐタグを書いておいて、

//  div.appendChild(box); エラー div is not defined
//

// 設問数を変えてもJSを変えないでいいようにする
// for文を使う

let choices = [
  "こうわ",
  "たかわ",
  "かめと",
  "かめど",
  "かゆまち",
  "おかとまち",
  "おかどもん",
  "ごせいもん",
  "たたら",
  "たたりき",
  "せきこうい",
  "いじい",
  "ざっしょく",
  "ざっしき",
  "ごしろちょう",
  "みとちょう",
  "ろっこつ",
  "しこね",
  "こばく",
  "こしゃく",
];
let correctAnswer = {
  0: "たかなわ",
  1: "かめいど",
  2: "こうじまち",
  3: "おなりもん",
  4: "とどろき",
  5: "しゃくじい",
  6: "ぞうしき",
  7: "おかちまち",
  8: "ししぼね",
  9: "こぐれ",
};

let questionsLength = Object.keys(correctAnswer).length;
// Object.keys(オブジェクト名).length   オブジェクトの長さを取得する
// console.log(questionsLength);

for (let questions = 0; questions < questionsLength; questions++) {
  let questionContent =
    '<div class="quiz">' +
    '<div class="question">' +
    '<h2 class="underline">' +
    `${questions + 1}` +
    ". この地名はなんて読む？</h2>" +
    '<img src="../image/' +
    `${questions + 1}` +
    '.png" alt=問いとなる地名の画像 />' +
    "<ul>" +
    `<li class="choice" id="incorrect_choice${questions}_1">` +
    choices[questions * 2] +
    "</li>" +
    '<li class="choice correct_choice" id = "correct' +
    questions +
    '">' +
    correctAnswer[questions] +
    "</li>" +
    `<li class="choice" id="incorrect_choice${questions}_2">` +
    choices[questions * 2 + 1] +
    "</li>" +
    "</ul>" +
    "</div>";

  document.currentScript.insertAdjacentHTML("beforebegin", questionContent);

  // innerHTMLを書き換えると要素の中身をすべて新しいものに書き換えるので、既存の要素は新たな要素として扱われてしまう
  // insertAdjacentHTML は文字列をHTMLとして指定した箇所に挿入するメソッドです。
  // element.insertAdjacentHTML(挿入する箇所, 挿入する文字列);
  // position には'beforebegin''afterbegin''beforeend''afterend'の4つを指定できる
  // document.currentScript 現在処理を実行しているSCRIPT要素を取得
}

// 「絶対パス」は、インターネット上での一意のアドレスだからファイルの場所を確実に伝えることができるが、同一サーバー上のファイルを全て「絶対パス」で記述すると画像ファイルを読み込む度にドメインからIPを探し、サーバーの画像ファイルを見つけて呼び出しリクエストするため、処理が余計にかかる。「相対パス」を指定しておけば、その手間がない

for (let i = 0; i < questionsLength; i++) {
  // 正解を選んだ場合
  let correctChoice = document.getElementsByClassName("correct_choice")[i];
  correctChoice.addEventListener("click", function () {
    correctChoice.classList.add("correct");
    //answerBoxというクラスを作ったdivタグに追加
    let answerBox = document.createElement("div");
    answerBox.classList.add("answerBox");

    let question = document.getElementsByClassName("question")[i]; // [i]をつけないと、すべての解答ボックスが高輪の所に表示されてしまう
    question.appendChild(answerBox);

    let answerText = document.createElement("p");
    answerText.innerText = "正解！";
    answerText.classList.add("answerText");
    answerBox.appendChild(answerText);

    let correctText = document.createElement("p");
    correctText.innerText = `正解は「 ${correctAnswer[i]} 」です！`;
    answerBox.appendChild(correctText);
    correctChoice.style.pointerEvents = "none";
    incorrectChoice1.style.pointerEvents = "none";
    incorrectChoice2.style.pointerEvents = "none";
    // 複数回、回答できないようにする
    // answerBox.innerText="正解" divタグの中に直接書かれてしまうから問題
  });
  // 不正解を選んだ場合
  let incorrectChoice1 = document.getElementById("incorrect_choice"+[i]+"_1");
  let incorrectChoice2 = document.getElementById("incorrect_choice"+[i]+"_2");
  incorrectChoice1.addEventListener("click", function () {
    incorrectChoice1.classList.add("incorrect");
    let answerBox = document.createElement("div");
    answerBox.classList.add("answerBox");

      let question = document.getElementsByClassName("question")[i];
      question.appendChild(answerBox);

      let incorrectAnswerText = document.createElement("p");
      incorrectAnswerText.innerText = "不正解！";
      incorrectAnswerText.classList.add("incorrectAnswerText");
      answerBox.appendChild(incorrectAnswerText);

      let correctText = document.createElement("p");
      correctText.innerText = `正解は「 ${correctAnswer[i]} 」です！`;
      answerBox.appendChild(correctText);
      incorrectChoice1.style.pointerEvents = "none";
      incorrectChoice2.style.pointerEvents = "none";
      correctChoice.style.pointerEvents = "none";
    //   answerBox.innerText = "正解";
    
  }, false);
  incorrectChoice2.addEventListener("click", function () {
    incorrectChoice2.classList.add("incorrect");
    let answerBox = document.createElement("div");
    answerBox.classList.add("answerBox");

      let question = document.getElementsByClassName("question")[i];
      question.appendChild(answerBox);

      let incorrectAnswerText = document.createElement("p");
      incorrectAnswerText.innerText = "不正解！";
      incorrectAnswerText.classList.add("incorrectAnswerText");
      answerBox.appendChild(incorrectAnswerText);

      let correctText = document.createElement("p");
      correctText.innerText = `正解は「 ${correctAnswer[i]} 」です！`;
      answerBox.appendChild(correctText);
      incorrectChoice1.style.pointerEvents = "none";
      incorrectChoice2.style.pointerEvents = "none";
      correctChoice.style.pointerEvents = "none";
    //   answerBox.innerText = "正解";
    
  }, false);
}
