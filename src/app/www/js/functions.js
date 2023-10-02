function request(url, action, table, data, result) {
  $.ajax({
    url: url+"?action="+action+"&table="+table,
    data: {
      data: data,
      submit: true,
    },
    success: function (response) {
      result(true, response);
    },
    error: function (response) {
      result(false, response);
    },
  });
}
