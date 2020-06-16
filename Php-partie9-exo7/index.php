
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Php-Partie9-exo7</title>
    </head>
    <body>
    <?php
        ?><p><?= 'La date à +20j d\'aujourd\'hui est : ' . date('l j M Y', time() + (20 * 24 * 60 * 60)) . '.' ?></p>
    </body>
</html>