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
        $(document).ready(function(){
            $("button").click(function(){
                $.ajax({
                    url: "ex1/content",
                    success: function (result) {
                        $("#myDiv").html(result);
                    }
                });
            });
        });
    </script>
</body>

</html>