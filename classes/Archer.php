<?php
class Archer extends Character{
    // je construit mon personnage
    private $quiver= 10;
    private $agility=75;

    public function __construct($pseudo) {
        parent::__construct($pseudo);
        $this->load=false;
        
    }
  
    public function action($target){
        if($this->load == true){
             // j'ai chargé alors je balance la sauce
            $status= $this->special_shoot($target);
        }else{
            $rand = rand(1,10);
            if(($rand<=7) && ($this->quiver>=1)){
                //je lance un tir normal
                $status = $this->shoot($target);   
            
            }elseif(($rand>7) && ($this->quiver>=2)){
                // je me met à charge ma flèche de batard
                $status = $this->loading();
            }else{
                //je n'ai plus de flèche alors petite attaque
                return $this->cut($target);
            }
        }
       return $status; 
    }
    public function shoot($target){
        // je peut lancer un fleche qui est une fonction de mes dégats et de mon agility
        $damage =  $this->atk * (1.5 + ($this->agility/100));    
        $target->setHp($damage);
        $this->quiver-=1;
        $target->isAlive();
        $status= "$this->pseudo tire une flèche sur $target->pseudo qui a $target->lifePoint points de vie!Il reste $this->quiver flèches dans le carquois de $this->pseudo ";
        return $status;
    }
    public function special_shoot($target){
        // ma super attaque de la mort qui tue 
        //le mt_rand permet de génerer des aléatoire avec un float que je cible avec une décimal grace au /10
        $damage = $this->atk * (mt_rand((15) , 30)/10);
        $target->setHp($damage);
        $this->quiver-=2;
        $this->load= false;
        $target->isAlive();
        $status = "$this->pseudo tire une double flèche trempée dans le sang d'un troll des cavernes! Il reste $this->quiver dans le carquois de $this->pseudo <br> $target->pseudo n'a plus que $target->lifePoint points de vie ! ";
        return $status;
    }
    public function cut($target){
        //je lance une petite attaque
        $damage = $this->atk - rand(1,5);
        $target->setHp($damage);
        $status = "$this->pseudo sort son petit couteau de cuisine et égratine $target->pseudo qui a $target->lifePoint";
        return $status;
    }

    public function loading(){
        $this->load= true;
        $status= "$this->pseudo charge son attaque spécial.";
        return $status;
    }
    public function setHP($damage) {
        $this->lifePoint -= $damage;
        return;
    }
}