<html>

<head>
    <title>Ajax exercise</title>
</head>

<body>

    <h1>Ajax example</h1>

    <input type="text"></input>
    <button>Show images</button>
    <div id="myDiv"></div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>

    <script>
        $("button").on("click", handleButtonClick);
        function jsonFlickrFeed(json) {
            $("#myDiv").html('');
            $.each(json.items, function (i, item) {
                $("<img />").attr("src", item.media.m).appendTo("#myDiv");
            });
        };

        function handleButtonClick() {
            $.ajax({
                url: 'https://api.flickr.com/services/feeds/photos_public.gne',
                dataType: 'jsonp',
                data: { "tags": $('input').val(), "format": "json" }
            });
        }

    </script>
</body>

</html>