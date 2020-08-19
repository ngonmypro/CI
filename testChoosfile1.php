<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
.btn {
  font-family: Arial;
  color: #ffffff;
  font-size: 20px;
  background: #3f88b8;
  padding: 10px 20px 10px 20px;
  text-decoration: none;
}

.btn:hover {
  background: #3cb0fd;
  background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
  background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
  background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
  text-decoration: none;
}
</style>
</head>

<body>
<div>
  <div style="display:block;text-align:center;margin-top:20%;">
    <label for="files"> <span class="btn">Select Image</span></label>
    <input style="visibility: hidden; position: absolute;" id="files" class="form-control" type="file" name="files">
  </div>
</div>
</body>
</html>