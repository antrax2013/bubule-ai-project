<?php

require_once "Abstract/AbstractBesoin.php";

class BesoinReposer extends ABesoin
{

    public function Check($a_proprietes)
    {
        if($a_proprietes['energie'] == 0)
        {
            $this->Activer();
            return true;
        }

        if($a_proprietes['energie'] == $a_proprietes['energieMax'])
        {
            $this->Assouvi();
            return false;
        }
    }

};
?>