<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>My page</title>
 
    <!-- CSS dependencies -->
    <link rel="stylesheet" type="text/css" href="<?echo $this->config->item('css')?>backend/assets/css/bootstrap.min.css">
</head>
<body>
 
    <p>Content here. <a class="alert" href=#>Alert!</a></p>
 
    <!-- JS dependencies -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="<?echo $this->config->item('css')?>backend/assets/js/bootstrap.min.js"></script>
 
    <!-- bootbox code -->
    <script src="<?echo $this->config->item('css')?>backend/assets/js/bootbox.min.js"></script>
    <script>
        $(document).on("click", ".alert", function(e) {
            bootbox.alert("Hello world!", function() {
                if(result) {
                    bootbox.alert("You are sure!");
                }
            });
        });
    </script>
</body>
</html>