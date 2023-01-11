<html>
    <head>
        <title>My Chat!</title>
        <?php $style = ($theme == "night") ? "style-night.css" : "style.css"; ?>
        <link rel="stylesheet" href="<?php echo($style); ?>">
    </head>
    <body>
        <form method="post">
            <input type="text" name="user_login">
            <input type="submit" value="Login">
        </from>
    </body>
</html>