<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="/css/app.css">
  <script src="{{ mix('/js/app.js') }}"></script>

</head>
<body>
  <div id="divh" class="">
    <form name="theForm" id="theForm">

    @csrf
    <table style="width: 100%;">
      <col width="35%">
      <col width="65%">
      <thead>

      </thead>
      <tbody>
        <tr>
          <td>
            <div id="wbckgr" style="text-align:center;">Список</div>
            <div id="divlist" class="">
            </div>
          </td>
          <td style="display: flex;padding:15px;align-items:flex-start;padding-left:5px;">
            <label for="bckgr">Фон - </label>
            <input name="bckgr" id="bckgr" type="text" value="" style="margin-left:5px;width:80px;" title="формат-'(0-255,0-255,0-255)'"
            pattern="^\((((25[0-5])|(2[0-4]\d)|(1\d{2})|(\d{1,2})),){2}(((25[0-5]|(2[0-4]\d)|(1\d{2})|(\d{1,2}))))?\)" required >
            <label for="dpth" style="margin-left:5px;">Глубина - </label>
            <input name="dpth" id="dpth" type="number" min="1" max="7" value="1" style="margin-left:5px;width:35px;" required >
            <button type="button" id="btn-load" name="btn-load" style="margin-left:10px;">Загрузить</button>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</form>
  <script type="text/javascript">
  window.onload = function() {
  if (window.$) {
    // jQuery is loaded
    console.log("jQuery has loaded!");

  } else {
      // jQuery is not loaded
      console.log("jQuery has not loaded!");
  }
}
  </script>
</body>
</html>
