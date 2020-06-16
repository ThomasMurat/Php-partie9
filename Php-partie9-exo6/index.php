
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Php-Partie9-exo6</title>
    </head>
    <body>
    <?php
        $lastDay = mktime(0, 0, 0, 3, 0, 2016);
        ?><p><?= 'il y a ' . date('d', $lastDay) . ' jours dans le mois de février 2016.' ?></p>
    </body>
</html>