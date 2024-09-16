<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous">
    </script>
    <style>
        .comment-entry {
            border: 1px solid black;
            margin-top: 10px;
            width: 20%;
            padding: 10px;
        }

        .comment-entry .name {
            width: 30%;
        }
    </style>
</head>

<body>
    <form method="post" id="form-comment">
        <label for="name">Nome:</label><br>
        <input type="text" name="name" class="name">
        <br><br>

        <label for="comment">Comentário:</label><br>
        <textarea name="comment" class="comment" id="comment"></textarea>
        <br><br>

        <input type="submit" value="Enviar">
    </form>

    <div class="comments-container">
        <div class="comment-entry">
            <p class="name"></p>
            <p class="comment"></p>
        </div>
    </div>

    <script src="../js/ajax.js"></script>
</body>

</html>