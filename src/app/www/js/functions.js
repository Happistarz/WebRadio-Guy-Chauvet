function request(url, action, data, result) {
  $.ajax({
    url: url,
    data: data,
    success: function (response) {
      result(true, response);
    },
    error: function (response) {
      result(false, response);
    },
  });
}
