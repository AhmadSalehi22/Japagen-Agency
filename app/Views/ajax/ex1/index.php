<html>

<head>
  <title>Ajax exercise</title>
</head>

<body>

  <h1>Ajax example</h1>

  <p>Something must appear here:</p>
  <div id="myDiv"></div>

  <script>
    function loadXMLDoc() {
      var xmlhttp;
      xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
          document.getElementById("myDiv").innerHTML = xmlhttp.responseText;
      }
      xmlhttp.open("GET", "ex1/content", true);
      xmlhttp.send();
    }
    loadXMLDoc();
  </script>
</body>

</html>