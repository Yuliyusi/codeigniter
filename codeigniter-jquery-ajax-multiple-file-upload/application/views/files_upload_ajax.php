<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AJAX File upload using Codeigniter, jQuery</title>
        <!--<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>-->
		<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script type="text/javascript">
            $(document).ready(function (e) {
                $('#upload').on('click', function () {
                    var form_data = new FormData();
                    var ins = document.getElementById('multiFiles').files.length;
                    for (var x = 0; x < ins; x++) {
                        form_data.append("files[]", document.getElementById('multiFiles').files[x]);
                    }
                    $.ajax({
                        url: 'http://localhost/codeigniter-jquery-ajax-multiple-file-upload/index.php/ajaxmultiplefileupload/upload_files', // point to server-side controller method
                        dataType: 'text', // what to expect back from the server
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            $('#msg').html(response); // display success response from the server
                        },
                        error: function (response) {
                            $('#msg').html(response); // display error response from the server
                        }
                    });
                });
            });
        </script>
    </head>
    <body>
        <p id="msg"></p>
        <input type="file" id="multiFiles" name="files[]" multiple="multiple"/>
        <button id="upload">Upload</button>
    </body>
</html>