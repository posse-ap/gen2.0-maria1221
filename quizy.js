'use strict';

// let choices = document.getElementsByClassName('choice');
// //classNameの方は返り値がHTMLCollection
// choices = Array.from( choices );
// //HTMLCollectionから配列にする [たかなわ, たかわ, こうわ]
// choices.forEach(choice => {
//     choice.classList.add("correct");
// });
// let correct = document.getElementsByClassName('correct');
// console.log(choice);


let answerBox = document.createElement('div');
let correctText = document.createElement('p');

let correct = document.getElementById("correct");
correct.onclick = function() {
    correct.classList.add("correct"); 
    //divタグを作ってanswerBoxというクラスを作る
    let answerBox = document.createElement('div');
    answerBox.classList.add("answerBox");
    let quiz = document.getElementById("quiz");
    quiz.appendChild(answerBox);

    let answerText = document.createElement('p');
    answerText.innerText = "正解！";
    answerText.classList.add("correctText");
    answerBox.appendChild(answerText);

    correctText.innerText = "正解は「たかなわ」です！";
    answerBox.appendChild(correctText)
    // answerBox.innerText="正解" divタグの中に直接書かれてしまうから問題

};

let incorrect = document.getElementById("incorrect1");
let wrong = document.getElementById("incorrect2");
incorrect.onclick = function() {
    incorrect.classList.add("incorrect"); 
    correct.classList.add("correct");

    answerBox.classList.add("answerBox");
    let quiz = document.getElementById("quiz");
    quiz.appendChild(answerBox);

    let incorrectAnswerText = document.createElement('p');
    incorrectAnswerText.innerText = "不正解！";
    incorrectAnswerText.classList.add("incorrectAnswerText");
    answerBox.appendChild(incorrectAnswerText);

    correctText.innerText = "正解は「たかなわ」です！";
    answerBox.appendChild(correctText)
    // answerBox.innerText="正解" divタグの中に直接書かれてしまうから問題

};


//pタグにすると縦並びになるのは、displayがblockだから

//HTMLにアンサーボックスのクラスを設定したdivにｐタグを書いておいて、

//  div.appendChild(box); エラー div is not defined
// 

