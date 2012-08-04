<?php

require_once "engine/Abstract/AbstractBesoin.php";

class BesoinNager extends ABesoin
{

    public function Check($a_energie, $a_energieMax)
    {
        if($a_energie ==  $a_energieMax && !$this->active)
        {
            //echo "Nager activer";
            $this->Activer();
            return true;
        }

        if($a_energie <= 0 && $this->active)
        {
            //echo "Nager désactiver";
            $this->Assouvi();
            return false;
        }

        return $this->active;
    }

};
?>