'use strict';
// サンプルコードガン無視で自分の書き方でいいのか？
// tukaetaraii.
// sekkakunarajunzurukakikata
// 自分の書き方だと前提出したのとほぼ同じになっちゃう気がするけどそれでいいのか

let quizSet = new Array();
quizSet.push(["たかなわ","こうわ","たかわ"])
quizSet.push(["かめいど","かめど","かめと"])
quizSet.push(["こうじまち","おかとまち","かゆまち"])
quizSet.push(["おなりもん","ごせいもん","おかどもん"])
quizSet.push(["とどろき","たたりき","たたら"])
quizSet.push(["しゃくじい","いじい","せきこうい"])
quizSet.push(["ぞうしき","ざっしき","ざっしょく"])
quizSet.push(["おかちまち","みとちょう","ごしろちょう"])
quizSet.push(["ししぼね","ろっこつ","しこね"])
quizSet.push(["こぐれ","こばく","こしゃく"])

// questionNumber 問題番号
// quizSetList 選択肢の一覧
// correctNumber 正解の選択肢の番号
function question(questionNumber, quizSetList, correctNumber) {
    let questionContent =    
    `<div>`
    + `<h1>${questionNumber}. この地名はなんて読む？</h1>`
    + `<img src="img/${questionNumber}.png">`
    + `<ul>`;
    
    quizSet.forEach(function(choice, index) {
        questionContent += `<li>${choice}</li>`
    });
     // forEach(コールバック関数(取り出している要素の値, 要素のインデックス))
    // 一回目のselection = [たかなわ, たかわ, こうわ]
    
        
    questionContent += 
    "</ul>"
    + "</div>";
};
<p>正解！</p>
