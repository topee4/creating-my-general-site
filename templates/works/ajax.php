<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WORKS</title>
    <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        $(function(){
            $('#form').submit(function(e){
                e.preventDefault();
                var data = $(this).serialize();
                $.ajax({
                    type: "POST",
                    url: "ajax_return.php",
                    data: data,
                    success: function(result){
                        $('#result').html(result);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <form id="form">
        <input type="text" name="name">
        <input type="submit" name="submit">
    </form>

    <div id="result"></div>
    
</body>
</html>