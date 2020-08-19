<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="dist/css/bootstrap-select.css">

    <style>
      body {
        padding-top: 70px;
      }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="dist/js/bootstrap-select.js"></script>

  </head>
  <body>
    <form class="form-horizontal" role="form">
      <div class="form-group">
        <label for="basic" class="col-lg-2 control-label">"Basic" (liveSearch enabled)</label>

        <div class="col-lg-10">
          <select id="basic" class="selectpicker show-tick form-control" data-live-search="true">
            <option>cow</option>
            <option data-subtext="option subtext">bull</option>
            <option class="get-class" disabled>ox</option>
            <optgroup label="test" data-subtext="optgroup subtext">
              <option>ASD</option>
              <option selected>Bla</option>
              <option>Ble</option>
            </optgroup>
          </select>
        </div>
      </div>
    </form>
  </body>
</html>
