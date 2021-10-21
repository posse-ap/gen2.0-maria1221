$(function() {
  $('.datepicker').datepicker({
    buttonImage: "./common/img/calendar.png",  // カレンダーアイコン画像
    buttonText: "カレンダーから選択",  // アイコンホバー時の表示文言
    buttonImageOnly: true, // ボタンとして表示
    showOn: "both",  // アイコン、テキストボックスどちらをクリックでもカレンダー表示
    beforeShow: function(input, inst){
       inst.dpDiv.css({top: 50 + '%', left: 50 + '%'});
    }
  });
});