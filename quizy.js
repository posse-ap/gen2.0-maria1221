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

let correct = document.getElementById("correct");
correct.onclick = function() {
    correct.classList.add("correct"); 

    let answerBox = document.createElement('div');
    //divタグを作ってanswerBoxというクラスを作る
    answerBox.classList.add("answerBox");
    let quiz = document.getElementById("quiz");
    quiz.appendChild(answerBox);

    let answerText = document.createElement('p');
    answerText.innerText = "正解！";
    answerText.classList.add("correctText");
    answerBox.appendChild(answerText);

    let correctText = document.createElement('p');
    correctText.innerText = "正解は「たかなわ」です！";
    answerBox.appendChild(correctText)
    // answerBox.innerText="正解" divタグの中に直接書かれてしまうから問題

};

//pタグにすると縦並びになるのは、displayがblockだから

//HTMLにアンサーボックスのクラスを設定したdivにｐタグを書いておいて、

//  div.appendChild(box); エラー div is not defined
// 

