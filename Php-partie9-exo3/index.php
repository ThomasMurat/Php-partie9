
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Php-Partie9-exo3</title>
    </head>
    <body>
        <p><?= date('l j M Y') ?></p><?php
        setlocale(LC_TIME, 'fra');
        ?><p><?= strftime('%A %e %B %Y') ?></p>
    </body>
</html>