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


// let answerBox = document.createElement('div');
// let correctText = document.createElement('p');

// let correct = document.getElementById("correct");
// correct.onclick = function() {
//     correct.classList.add("correct"); 
//     //divタグを作ってanswerBoxというクラスを作る
//     let answerBox = document.createElement('div');
//     answerBox.classList.add("answerBox");
//     let quiz = document.getElementById("quiz");
//     quiz.appendChild(answerBox);

//     let answerText = document.createElement('p');
//     answerText.innerText = "正解！";
//     answerText.classList.add("correctText");
//     answerBox.appendChild(answerText);

//     correctText.innerText = "正解は「たかなわ」です！";
//     answerBox.appendChild(correctText)
//     // answerBox.innerText="正解" divタグの中に直接書かれてしまうから問題

// };

// let incorrect = document.getElementById("incorrect1");
// let wrong = document.getElementById("incorrect2");
// incorrect.onclick = function() {
//     incorrect.classList.add("incorrect"); 
//     correct.classList.add("correct");

//     answerBox.classList.add("answerBox");
//     let quiz = document.getElementById("quiz");
//     quiz.appendChild(answerBox);

//     let incorrectAnswerText = document.createElement('p');
//     incorrectAnswerText.innerText = "不正解！";
//     incorrectAnswerText.classList.add("incorrectAnswerText");
//     answerBox.appendChild(incorrectAnswerText);

//     correctText.innerText = "正解は「たかなわ」です！";
//     answerBox.appendChild(correctText)
//     // answerBox.innerText="正解" divタグの中に直接書かれてしまうから問題

// };


//pタグにすると縦並びになるのは、displayがblockだから

//HTMLにアンサーボックスのクラスを設定したdivにｐタグを書いておいて、

//  div.appendChild(box); エラー div is not defined
// 


// 設問数を変えてもJSを変えないでいいようにする
// for文を使う

let choices = ['こうわ', 'たかなわ', 'たかわ', 'かめと', 'かめいど', 'かめど', 'かゆまち', 'こうじまち', 'おかとまち', 'おかどもん', 'おなりもん', 'ごせいもん', 'たたら', 'とどろき', 'たたりき', 'せきこうい', 'しゃくじい', 'いじい', 'ざっしょく', 'ぞうしき', 'ざっしき' ,'ごしろちょう', 'おかちまち', 'みとちょう', 'ろっこつ', 'ししぼね', 'しこね', 'こばく', 'こぐれ', 'こしゃく'];
let correctAnswer = {
    1:'たかなわ',
    2:'かめいど',
    3:'こうじまち',
    4:'おなりもん',
    5:'とどろき',
    6:'しゃくじい',
    7:'ぞうしき',
    8:'おかちまち',
    9:'ししぼね',
    10:'こぐれ',
}

for (let questions = 1; questions < 11; questions++) {
    let questionContent = 
    '<div class="quiz">'
    +'<div class="question"  id ="quiz">'
    +'<h2 class="underline">' + questions + '. この地名はなんて読む？</h2>'
    +'<img src="../quizy/' + questions + '.png" alt=問いとなる地名の画像 />'
    +'<ul>'+'<li class="choice" id = "incorrect"' + questions + '>' + choices[questions] + '</li>' + '<li class="choice" id = "correct">' + choices[questions+1] +'</li>'
    +'<li class="choice" id = "incorrect2">' + choices[questions+2] + '</li>'
    +'</ul>'
    +'</div>'

    document.currentScript.insertAdjacentHTML('beforebegin', questionContent)

    // innerHTMLを書き換えると要素の中身をすべて新しいものに書き換えるので、既存の要素は新たな要素として扱われてしまう
    // insertAdjacentHTML は文字列をHTMLとして指定した箇所に挿入するメソッドです。
    // element.insertAdjacentHTML(挿入する箇所, 挿入する文字列);
    // position には'beforebegin''afterbegin''beforeend''afterend'の4つを指定できる
    // document.currentScript 現在処理を実行しているSCRIPT要素を取得
}