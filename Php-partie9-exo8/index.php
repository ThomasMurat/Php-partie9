
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Php-Partie9-exo8</title>
    </head>
    <body>
    <?php
        ?><p><?= 'La date à -22j d\'aujourd\'hui est : ' . date('l j M Y', time() + (-22 * 24 * 60 * 60)) . '.' ?></p>
    </body>
</html>