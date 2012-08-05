<?php

require_once "engine/Abstract/AbstractBesoin.php";

class BesoinReposer extends ABesoin
{

    public function Check($a_energie, $a_energieMax)
    {
        if($a_energie == 0 && !$this->active)
        {
           // echo "Repos activer";
            $this->Activer();
            return true;
        }

        if($a_energie == $a_energieMax && $this->active)
        {
           // echo "Repos désactiver";
            $this->Assouvi();
            return false;
        }

        return $this->active;
    }

};
?>