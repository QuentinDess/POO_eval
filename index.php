<?php

spl_autoload_register(function ($class) {
    include './classes/' . $class . '.php';
});

$lucie = new Warrior('Lucie');
$anto = new Mage('Anto');

$legolas= new Archer('Legolas');
var_dump($legolas);

// Characters attacking while both alive
while ($lucie->isAlive() && $legolas->isAlive()) {
    // First Character attacking the 2nd
    echo $lucie->action($legolas);
    // Check if target is alive
    if (!$legolas->isAlive()) {
        echo '<br>';
        echo "$legolas->pseudo est KO!";
        break;
    };
    echo '<br>';

    // Second Character attaking the first
    echo $legolas->attack($lucie);
    // Check if target is alive
    if (!$lucie->isAlive()) {
        echo '<br>';
        echo "$lucie->pseudo est KO!";
        break;
    };
    echo '<br>';
    echo '<br>';
}
