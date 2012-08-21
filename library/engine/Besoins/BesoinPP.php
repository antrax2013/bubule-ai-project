<?php
require_once "engine/Besoins/Besoin.php";


/**
 * Classe BesoinPP, hérite de la classe Besoin
 * BesoinPP est une extension de la classe Besoin où la propriété est passée par référence
 * @class classe BesoinPP avec une référence sur la propriété, permettant ainsi de partagé la proriété du besoin avec un autre besoin
 * @date 11/08/2012
 * @autor Cyril Cophignon
 * @extends Besoin
 */
class BesoinPP extends Besoin
{
    /**
     * Constructeur
     * @param AAction $a_action
     * @param ProprieteBornee $a_propriete
     * @param AEtat $a_etat
     */
    public function __construct(AAction $a_action, &$a_propriete, AEtat $a_etat)
    {
        $this->_action = $a_action;

        if(!($a_propriete instanceof APropriete))
        {
            throw new Exception('Le pramétre $a_propriete (type: '.get_class ($a_propriete).') n\'est pas une instance de la classe APropriete.');
        }

        $this->_propriete = &$a_propriete;
        $this->_etat = $a_etat;
    }


};
?>