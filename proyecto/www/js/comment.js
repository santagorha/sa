function comment(){
  $.ajax({
    data: {"evento": 1},
    dataType: "json",
    error: function (err) {
      var t = 1;
      document.write(err.responseText);
      console.log(err.responseJSON);
    },
    success: function (data) {
      if (data.codeStatus === 200) {
        document.write(JSON.stringify(data));
      }
    },
    type: "post",
    url: URL_COMMENT_SERVICE
  });
}