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
        .container {
            display: flex;
            justify-content: center;
        }

        #loadBtn {
            background-color: blueviolet;
            padding: 7px 20px;
            border-radius: 5px;
            border: none;
            color: white;
            cursor: pointer;
        }

        #loadBtn:hover {
            transform: scale(1.1);
            transition: 0.2s ease;
        }
    </style>
</head>

<body>
    <div class="container">
        <button id="loadBtn">Load</button>
    </div>

    <div class="response"></div>

    <script src="../js/main.js"></script>
</body>

</html>