'use strict';

let allQuiz = [ 
    ['たかなわ', 'こうわ', 'たかわ'],
    ['かめいど', 'かめど', 'かめと'],
    ['こうじまち', 'かゆまち', 'おかとまち'],
    ['おなりもん', 'おかどもん', 'ごせいもん'],
    ['とどろき', 'たたら', 'たたりき'],
    ['しゃくじい', 'いじい', 'せきこうい'],
    ['ぞうしき', 'ざっしょく', 'ざっしき'],
    ['おかちまち', 'ごしろちょう', 'みとちょう'],
    ['ししぼね', 'ろっこつ', 'しこね'],
    ['こぐれ', 'こばく', 'こしゃく']
  ];

let allImg = [
"https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png",
"https://d1khcm40x1j0f.cloudfront.net/quiz/512b8146e7661821c45dbb8fefedf731.png",
"https://d1khcm40x1j0f.cloudfront.net/quiz/ad4f8badd896f1a9b527c530ebf8ac7f.png",
"https://d1khcm40x1j0f.cloudfront.net/quiz/ee645c9f43be1ab3992d121ee9e780fb.png",
"https://d1khcm40x1j0f.cloudfront.net/quiz/6a235aaa10f0bd3ca57871f76907797b.png",
"https://d1khcm40x1j0f.cloudfront.net/quiz/0b6789cf496fb75191edf1e3a6e05039.png",
"https://d1khcm40x1j0f.cloudfront.net/quiz/23e698eec548ff20a4f7969ca8823c53.png",
"https://d1khcm40x1j0f.cloudfront.net/quiz/50a753d151d35f8602d2c3e2790ea6e4.png",
"https://d1khcm40x1j0f.cloudfront.net/words/8cad76c39c43e2b651041c6d812ea26e.png",
"https://d1khcm40x1j0f.cloudfront.net/words/34508ddb0789ee73471b9f17977e7c9c.png"]

const  questions = document.getElementById('question-area');
const choices = document.querySelectorAll('ul > li');

//querySelectorAll('取得したい要素名')  取得したい要素に合致するセレクタをすべて引数として渡して使う
// #choices > li  choicesというidがついた直下のli要素

// questions.innerText = `${i + 1}. この地名はなんて読む？`;
// let questionInnerText = question.innerText;






function questionArea () {
    for (let i = 0; i <= allQuiz.length; i++) {
        for(let x = 0; x<= allQuiz.length; x++) {
            for(let a = 0; a < 4; a++){
                for(let j = 0; j <= allQuiz.length; j++) {
                    questions.innerText = `${i + 1}. この地名はなんて読む？`;
                   

}}}}};
questionArea();
let questionInnerText = questions.innerText;
document.write(questionInnerText + allImg[x] + quizChoices)

// function imgArea () {
//     for(let x = 0; x<= allQuiz.length; x++) {
//         allImg[x];
//     }
// // }

// function choice () {
//     for(let a = 0; a < 4; a++) {
//         for(let j = 0; j <= allQuiz.length; j++) {
//               allQuiz[j,a]  
//             }
//         }   
//     }

//     allQuestion = questionArea + imgArea +choice
//     document.write(allQuestion)}
