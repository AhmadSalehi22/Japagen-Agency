<html>

<head>
    <title>Ajax exercise</title>
</head>

<body>
    <h1>Ajax example</h1>
    <button>Something must appear here:</button>
    <div id="myDiv"></div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>
        $(function () {
            $("button").click(function () {
                $.ajax({
                    url: '/ajax/ex3/content',
                    dataType: 'json',
                    error: function (XMLHttpRequest, textStatus, errorThrown) {
                        alert(errorThrown);
                    },
                    success: function (res) {
                        $("#myDiv").html("Server software: " + res.info.SERVER_SOFTWARE);
                    },
                });
            });
        });
    </script>
</body>

</html>