let modalButton = document.getElementById("headerButton");
modalButton.onclick = function () {
  modalPage.style.display = "block";
  modalCover.style.display = "block";
}

let modalCloseButton = document.getElementById("morderCloseButton");
modalCloseButton.onclick = function () {
  modalPage.style.display = "none";
  modalCover.style.display = "none";
}


$(function() {
  //datepicker処理
  $('.datepicker').datepicker({
    // buttonImageOnly: true, // ボタンとして表示
    showOn: "focus",  // テキストボックスをクリックでもカレンダー表示
    showButtonPanel: true, //閉じるボタンと今日ボタンを表示
    beforeShow: function (textbox, instance) {
      $('.appendDatepicker').append($('#ui-datepicker-div'));
    }
  });
  //カレンダーボタンをクリックしたらモーダルウィンドウを表示
  $('#dpTextbox, .ui-datepicker-trigger').on('click', function(){
    $('.appendDatepicker').addClass('open');
  });
});


