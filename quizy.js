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

let choices = ['こうわ', 'たかわ', 'かめと', 'かめど', 'かゆまち', 'おかとまち', 'おかどもん', 'ごせいもん', 'たたら', 'たたりき', 'せきこうい', 'いじい', 'ざっしょく', 'ざっしき' ,'ごしろちょう', 'みとちょう', 'ろっこつ', 'しこね', 'こばく', 'こしゃく'];
let correctAnswer = {
    0:'たかなわ',
    1:'かめいど',
    2:'こうじまち',
    3:'おなりもん',
    4:'とどろき',
    5:'しゃくじい',
    6:'ぞうしき',
    7:'おかちまち',
    8:'ししぼね',
    9:'こぐれ',
}

let questionsLength = Object.keys(correctAnswer).length;
// Object.keys(オブジェクト名).length   オブジェクトの長さを取得する
// console.log(questionsLength);


for (let questions = 0; questions < questionsLength; questions++) {
    let questionContent = 
    '<div class="quiz">'
    +'<div class="question"  id ="quiz">'
    +'<h2 class="underline">' + `${questions+1}` + '. この地名はなんて読む？</h2>'
    +'<img src="../quizy/' + `${questions+1}` + '.png" alt=問いとなる地名の画像 />'
    +'<ul>'
    +'<li class="choice" id = "incorrect">' + choices[questions*2] + '</li>' 
    +'<li class="choice correct_choice" id = "correct' + questions +'">' + correctAnswer[questions] +'</li>'
    +'<li class="choice" id = "incorrect2">' + choices[questions*2+1] + '</li>'
    +'</ul>'
    +'</div>'

    document.currentScript.insertAdjacentHTML('beforebegin', questionContent)

    // innerHTMLを書き換えると要素の中身をすべて新しいものに書き換えるので、既存の要素は新たな要素として扱われてしまう
    // insertAdjacentHTML は文字列をHTMLとして指定した箇所に挿入するメソッドです。
    // element.insertAdjacentHTML(挿入する箇所, 挿入する文字列);
    // position には'beforebegin''afterbegin''beforeend''afterend'の4つを指定できる
    // document.currentScript 現在処理を実行しているSCRIPT要素を取得
}

// 「絶対パス」は、インターネット上での一意のアドレスだからファイルの場所を確実に伝えることができるが、同一サーバー上のファイルを全て「絶対パス」で記述すると画像ファイルを読み込む度にドメインからIPを探し、サーバーの画像ファイルを見つけて呼び出しリクエストするため、処理が余計にかかる。「相対パス」を指定しておけば、その手間がない
window.onload = function () {
    for (let i = 0; i < questionsLength; i++) {
        let correct = document.getElementsByClassName('correct_choice')[i];
        correct.addEventListener("click", function () {
            correct.classList.toggle("correct"); 
            //divタグを作ってanswerBoxというクラスを作る
            let answerBox = document.createElement('div');
            answerBox.classList.toggle("answerBox");
            let quiz = document.getElementById("quiz");
            quiz.appendChild(answerBox);
            let answerText = document.createElement('p');
            answerText.innerText = "正解！";
            answerText.classList.toggle("answerText");
            answerBox.appendChild(answerText);
            let correctText = document.createElement('p');
            correctText.innerText = `正解は「 ${correctAnswer[i]} 」です！`;
            answerBox.appendChild(correctText);
            correct.style.pointerEvents = "none";

            // answerBox.innerText="正解" divタグの中に直接書かれてしまうから問題
        });
    }
};




