<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Табличка</title>
    <link rel="stylesheet" href="design.css">
</head>

<body class="body_of_table">
    <table>
        <tr>
            <th>
            <?php
            session_start();
            echo $_SESSION["table"];
            ?>
            </th>
            <th>
                <button onclick="window.location.href
                = 'https://se.ifmo.ru/~s334271/';"
                >Хочу обратно спасите</button><br>
            </th>
        </tr>
    </table>

</body>
</html>