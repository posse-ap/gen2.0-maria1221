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

//中の配列の最初に正解来るように多次元配列(配列の中に配列がある配列のこと)を書く
// const quizSet = [
//   ["たかなわ","こうわ","たかわ"],
//   ["かめいど","かめど","かめと"],
//   ["こうじまち","おかとまち","かゆまち"],
//   ["おなりもん","ごせいもん","おかどもん"],
//   ["とどろき","たたりき","たたら"],
//   ["しゃくじい","いじい","せきこうい"],
//   ["ぞうしき","ざっしき","ざっしょく"],
//   ["おかちまち","みとちょう","ごしろちょう"],
//   ["ししぼね","ろっこつ","しこね"],
//   ["こぐれ","こばく","こしゃく"],
// ]

// //Object.keys(配列名).length 配列の要素数を得る
// let quizSetLength = Object.keys(quizSet).length;
// for (let i = 0; i < quizSetLength; i++) {
//   let questionContent =
//     '<div class="quiz">' +
//     '<div class="question">' +
//     '<h2 class="underline">' +
//     `${i + 1}` +
//     ". この地名はなんて読む？</h2>" +
//     '<img src="./image/' +
//     `${i + 1}` +
//     '.png" alt=問いとなる地名の画像 />' +
//     `<ul id='choices${i}'>` +
//     "</ul>" +
//     "</div>";

//   document.currentScript.insertAdjacentHTML("beforebegin", questionContent);
//   // document.currentScript 現在処理を実行しているSCRIPT要素を取得
//   // insertAdjacentHTML 文字列をHTMLとして指定した箇所に挿入する
//   // element.insertAdjacentHTML(挿入する箇所, 挿入する文字列);
//   // position には'beforebegin''afterbegin''beforeend''afterend'の4つを指定できる
  
// }

// 「絶対パス」は、インターネット上での一意のアドレスだからファイルの場所を確実に伝えることができるが、同一サーバー上のファイルを全て「絶対パス」で記述すると画像ファイルを読み込む度にドメインからIPを探し、サーバーの画像ファイルを見つけて呼び出しリクエストするため、処理が余計にかかる。「相対パス」を指定しておけば、その手間がない



// 選択肢をシャッフルさせる
// フィッシャー・イェーツ 範囲を狭めながら、最後の要素とランダムに選んだ要素を入れ替えていく
// // 引数arrayに配列を渡して、それをシャッフルして返す
// function shuffle(array) { 
//   for (let i = array.length - 1; i > 0; i--) { 
//     const j = Math.floor(Math.random() * (i + 1));  
//     // j  範囲内から選ぶランダム変数
//     [array[j], array[i]] = [array[i], array[j]]; 
//     // 分割代入を利用してiとjを入れ替える
//   }
//   return array;
//   // 関数の実行を終了し、関数の呼び出し元に返す
// };

// for (let i = 0; i < quizSetLength; i++) {
// const shuffledChoices = shuffle([...quizSet[i]]);
// // ...配列名 スプレッド構文。配列やオブジェクトの要素を展開する。[...配列名]で配列をクローン出来る
// //クローンした配列をさらに[]で囲い新たに配列化させたものをシャッフルに使うことで、元の配列には影響なくシャッフルした配列を用意
// shuffledChoices.forEach(choiceShuffle => {  
//   //変数choiceShuffleにshuffledChoicesを一つずつ入れる
//   const li = document.createElement('li');//li要素の作成
//   li.textContent = choiceShuffle;//li要素にchoiceShuffleを入れる
//   li.classList.add('choice');
//   let choices = document.getElementById(`choices${i}`);
//   choices.appendChild(li);//choicesというidがついたul要素の下に追加

//   // 正解と不正解の選択肢にそれぞれid属性を追加する
//   for (let i = 0; i < quizSetLength; i++) {
//     if (li.textContent === quizSet[i][0]){
//        let correct = `correct${i}`; //付与するid名
//         li.setAttribute("id", correct); //id属性を追加
      
//     } else if (li.textContent === quizSet[i][1]) {
//       let incorrectChoice1 = `incorrectChoice${i}_1`
//       li.setAttribute("id", incorrectChoice1);
//     }
//     else if (li.textContent === quizSet[i][2]) {
//       let incorrectChoice2 = `incorrectChoice${i}_2`
//       li.setAttribute("id", incorrectChoice2);
//     }
//   } 
// });
// }

// for (let i = 0; i < quizSetLength; i++) {

//       let correctChoice =document.getElementById(`correct${i}`);
//       correctChoice.addEventListener("click", function () {
//         correctChoice.classList.add("correct");
//         //answerBoxというクラスを作ったdivタグに追加
//         let answerBox = document.createElement("div");
//         answerBox.classList.add("answerBox");
    
//         let question = document.getElementsByClassName("question")[i]; // [i]をつけないと、すべての解答ボックスが高輪の所に表示されてしまう
//         question.appendChild(answerBox);
    
//         let answerText = document.createElement("p");
//         answerText.innerText = "正解！";
//         answerText.classList.add("answerText");
//         answerBox.appendChild(answerText);
    
//         let correctText = document.createElement("p");
//         correctText.innerText = `正解は「 ${quizSet[i][0]} 」です！`;
//         answerBox.appendChild(correctText);
//         correctChoice.style.pointerEvents = "none";
//         incorrectChoice1.style.pointerEvents = "none";
//         incorrectChoice2.style.pointerEvents = "none";
//         // 複数回、回答できないようにする
//         // answerBox.innerText="正解" divタグの中に直接書かれてしまうから問題
//       });

//   // 不正解を選んだ場合
//   let incorrectChoice1 = document.getElementById(`incorrectChoice${i}_1`);
//   let incorrectChoice2 = document.getElementById(`incorrectChoice${i}_2`);
//   incorrectChoice1.addEventListener("click", function () {
//     incorrectChoice1.classList.add("incorrect");
//     correctChoice.classList.add("correct");
//     let answerBox = document.createElement("div");
//     answerBox.classList.add("answerBox");

//       let question = document.getElementsByClassName("question")[i];
//       question.appendChild(answerBox);

//       let incorrectAnswerText = document.createElement("p");
//       incorrectAnswerText.innerText = "不正解！";
//       incorrectAnswerText.classList.add("incorrectAnswerText");
//       answerBox.appendChild(incorrectAnswerText);

//       let correctText = document.createElement("p");
//       correctText.innerText = `正解は「 ${quizSet[i][0]} 」です！`;
//       answerBox.appendChild(correctText);
//       incorrectChoice1.style.pointerEvents = "none";
//       incorrectChoice2.style.pointerEvents = "none";
//       correctChoice.style.pointerEvents = "none";
    
//   });
//   incorrectChoice2.addEventListener("click", function () {
//     incorrectChoice2.classList.add("incorrect");
//     correctChoice.classList.add("correct");
//     let answerBox = document.createElement("div");
//     answerBox.classList.add("answerBox");

//       let question = document.getElementsByClassName("question")[i];
//       question.appendChild(answerBox);

//       let incorrectAnswerText = document.createElement("p");
//       incorrectAnswerText.innerText = "不正解！";
//       incorrectAnswerText.classList.add("incorrectAnswerText");
//       answerBox.appendChild(incorrectAnswerText);

//       let correctText = document.createElement("p");
//       correctText.innerText = `正解は「 ${quizSet[i][0]} 」です！`;
//       answerBox.appendChild(correctText);
//       incorrectChoice1.style.pointerEvents = "none";
//       incorrectChoice2.style.pointerEvents = "none";
//       correctChoice.style.pointerEvents = "none";
    
//   });
// }
