<?php //On créer tout d'abord un tableau pour les mois de l'année et un autre pour les jours de la semaine
    $monthsList = array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'); 
    $daysList = array('lundi', 'Mardi', 'Mercredi', 'jeudi', 'Vendredi', 'Samedi', 'Dimanche');
    //On vérifie si le formulaire a été envoyer pour récupérer la date sélectionnée, sinon on  récupére l'année et le mois courant
    (isset($_POST['month'])) ? $selectedMonth = $_POST['month'] : $selectedMonth = date('n'); 
    (isset($_POST['year'])) ? $selectedYear = $_POST['year'] : $selectedYear = date('Y');
    // On récupère le timestamp du premier jour et du dernier jour du mois de l'année sélectionné
    $firstDay = mktime(1, 1, 0, $selectedMonth, 1, $selectedYear);
    $lastDay = mktime(0, 0, 0, $selectedMonth + 1, 0, $selectedYear);
    // On calcul le nombre de semaine qui seront affiché dans notre tableau
    $nbOfWeeks = ceil(((date('N', $firstDay) - 1) + date('d', $lastDay)) / 7);
    // On calcul le timestamp du premier jour du calendrier
    $startDate = $firstDay - ((date('N', $firstDay) - 1) * (24 * 60 * 60));
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Php-Partie9-TP</title>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <form id="myForm" action="index.php" method="POST">
            <ul>
                <li><select name="month"><?php 
                // On utilise une boucle sur notre tableau des mois pour construire une liste déroulante permettant de sélectionner le mois de notre choix
                    foreach($monthsList as $monthIndex => $monthName) {
                        //On écrit $monthIndex + 1 pour la valeur, de sorte que celle-ci corresponde au numéro du mois et non à l'index du tableau mois
                        ?><option value="<?= $monthIndex + 1 ?>"><?= $monthName ?></option><?php
                    } ?>
                </select></li>
                <li><select name="year">
                <?php //On utilise une boucle pour construire une liste déroulante comportant les années entre les 2 années de notre choix
                    for ($year = 1920; $year <= 2030; $year++) {
                        //On écrit $year dans l'attribut valeur pour récupérer l'année sélectionner à l'envoy du formulaire
                        ?><option value="<?= $year ?>"><?= $year ?></option><?php
                    } ?>
                </select></li>
                <li><input type="submit" value="Valider" /></li>
            </ul>
        </form><?php /* On affiche le mois en toute lettre en utilisant le tableau des mois suivi de l'année sélectionné 
                        On utilise $selectedMonth -1 car ici on a besoin de l'index et non du numéro du mois sélectionné*/?>
        <h1><?= $monthsList[$selectedMonth -1] . ' ' . $selectedYear ?></h1> 
        <table>
            <thead><?php // On utilise une boucle sur le tableau des jour pour construire les entête de notre calendrier
                foreach($daysList as $dayNb => $dayName) {
                    ?><th><?= $dayName ?></th><?php
                } ?>
            </thead>
            <tbody><?php // On utilise une boucle pour construire les lignes de notre calendrier
                for ($week = 1; $week <= $nbOfWeeks; $week++) { // On utilise le nombre de semaine max déterminer précédement comme limite de fin de notre boucle
                    ?><tr><?php // On imprique une nouvelle boucle pour créer nos cellules, à raison de 7 cellule (jour), cette boucle ce répétera pour chaque semaine
                        for ($day = 1; $day <= 7; $day++) {
                            // On calcule le timestamp du jour (Cellule) en ajoutant le nombre de seconde qui le sépare de notre startDate
                            $date = $startDate + (($week - 1) * 7 + ($day -1)) * (24 * 60 * 60);
                            //On compare le timestamp de la cellule avec celui du premier et du dernier jour du mois sélectionné
                            if ($date > ($lastDay + 10000) || $date < $firstDay) { 
                                ?><td class="outDate"><?= date('j', $date) ?></td><?php // On affiche le numéro du jour avec un fond gris
                            }else {
                                ?><td class="inDate"><?= date('j', $date) ?></td><?php // On affiche le numéro du jour avec un fond blanc
                            }
                        }
                    ?></tr><?php
                } ?>
            </tbody>
        </table>
    </body>
</html>