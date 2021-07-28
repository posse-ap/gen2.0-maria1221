// const choices = document.getElementById('choice2');
'use strict';



        const img =document.getElementById('img-area');   


    const quizImg = document.createElement('img');
    quizImg.src = "https://d1khcm40x1j0f.cloudfront.net/quiz/34d20397a2a506fe2c1ee636dc011a07.png" 
    quizImg.alt = "問いとなる地名の画像";
    img.appendChild(quizImg);   
    
    let x = 0;
    while (x <= 10) {
        const  questions = document.getElementById('question-area');
        const question = document.createElement('h2');
        question.innerText = `${x + 1}. この地名はなんて読む？`;
        questions.appendChild(question); 

        const choices = document.querySelectorAll('ul > li');
        //querySelectorAll('取得したい要素名')  取得したい要素に合致するセレクタをすべて引数として渡して使う
        // #choices > li  choicesというidがついた直下のli要素
    
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
        allQuiz.forEach(function(element){
           ul[0].textContent = allQuiz[x][element]
           ul[1].textContent = allQuiz[x][element]
           ul[3].textContent = allQuiz[x][element] 
        });

// element 要素

        // choices[0].innerText = allQuiz[x, 1];
        // choices[1].innerText = allQuiz[x, 2];
        // choices[2].innerText = allQuiz[x, 3];
        x += 1;
    }
 
// for(let i = 0; i < allQuiz.length; i++) {
           
 //https://teratail.com/questions/308801

// allQuiz[currentNum].c.forEach(choices => { //choicesにallQuizのnum番目のc要素を1つずつ渡す
//     const li = document.createElement('li');
//     li.textContent = choices; //生成したliタグにchoicesを代入
//     // choices.appendChild(li); // choicesというidにliを入れる
// });

// for (let i = 0; i <= 10; i++) {
//     document.getElementById('choice2').addEventListener('click', function() {
//         document.getElementById('choice2').style.backgroundColor = 'lightblue';
//     });
// }
