<?php
require_once "engine/Abstract/AbstractBesoin.php";


/**
 * Classe BesoinStd, hérite de la classe abstraite ABesoin
 * Dans cette version de base nager consomme de l'ernergie.
 * Pas de notion de déplacement ici.
 * @class classe définissant le besoin de nager
 * @date 11/08/2012
 * @autor Cyril Cophignon
 * @extends ABesoin
 */
class BesoinStd extends ABesoin
{
    /**
     * Constructeur
     * @param AAction $a_action
     * @param ProprieteBornee $a_propriete
     * @param AEtat $a_etat
     */
    public function __construct(AAction $a_action, APropriete &$a_propriete, AEtat $a_etat)
    {
        $this->_action = $a_action;
        $this->_propriete = &$a_propriete;
        $this->_etat = $a_etat;
    }


};
?>