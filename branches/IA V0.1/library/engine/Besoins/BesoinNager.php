<?php
    require_once "engine/Abstract/AbstractBesoin.php";

/**
 * Classe BesoinNager, hérite de la classe abstraite ABesoin
 * Dans cette version de base nager consomme de l'ernergie.
 * Pas de notion de déplacement ici.
 * @class classe définissant l'action de nager
 * @date 03/08/2012
 * @autor Cyril Cophignon
 * @extends ABesoin
 */
class BesoinNager extends ABesoin
{

    /**
     * Méthode gérant l'activation/désactivations en fonction de l'état des paramètres
     * @param int $a_param parametre
     * @param int $a_paramRef parametre de référence
     * @return bool renvoi true si le besoin est actif ou false
     */
    public function Check($a_param, $a_paramRef)
    {
        if($a_param ==  $a_paramRef && !$this->active)
        {
            $this->Activer();
            return true;
        }

        if($a_param <= 0 && $this->active)
        {
            $this->Assouvi();
            return false;
        }

        return $this->active;
    }

};
?>