
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Php-Partie9-exo5</title>
    </head>
    <body>
    <?php
        $today = time(); 
        $targetDate= mktime(10, 0, 0, 5, 16, 2016); 
        $timeInterval = $today - $targetDate;
        $dayInterval = $timeInterval / (24 * 60 * 60);
        ?><p><?= 'il y a ' . floor($dayInterval) . ' jours entre aujourd\'hui et le 16 mai 2016.' ?></p>
    </body>
</html>