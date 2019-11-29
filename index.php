<?php

spl_autoload_register(function ($class) {
    include './classes/' . $class . '.php';
});

$lucie = new Warrior('Lucie');
$anto = new Mage('Anto');

$legolas= new Archer('Legolas');
$jon= new Mage('Jon');
echo "<u>$anto->pseudo et $lucie->pseudo entre dans l'arène</u>:<br><br>";
// Characters attacking while both alive
while ($lucie->isAlive() && $anto->isAlive()) {
    // First Character attacking the 2nd
    echo $lucie->action($anto);
    // Check if target is alive
    if (!$anto->isAlive()) {
        echo '<br>';
        echo "$anto->pseudo est KO!";
        break;
    };
    echo '<br>';

    // Second Character attaking the first
    echo $anto->action($lucie);
    // Check if target is alive
    if (!$lucie->isAlive()) {
        echo '<br>';
        echo "$lucie->pseudo est KO!";
        break;
    };
    echo '<br>';
    echo '<br>';
}

echo "<br><br><u>$jon->pseudo et $legolas->pseudo entre dans l'arène</u>:<br><br>";
// Characters attacking while both alive
while ($jon->isAlive() && $legolas->isAlive()) {
    // First Character attacking the 2nd
    echo $jon->action($legolas);
    // Check if target is alive
    if (!$legolas->isAlive()) {
        echo '<br>';
        echo "$legolas->pseudo est KO!";
        break;
    };
    echo '<br>';

    // Second Character attaking the first
    echo $legolas->action($jon);
    // Check if target is alive
    if (!$jon->isAlive()) {
        echo '<br>';
        echo "$jon->pseudo est KO!";
        break;
    };
    echo '<br>';
    echo '<br>';
}
