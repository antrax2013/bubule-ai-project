<?php
    require_once "engine/Abstract/AbstractAction.php";


/**
 * Classe ActionNager, hérite de la classe abstraite AAction
 * Dans cette version de base nager consomme de l'ernergie.
 * Pas de notion de déplacement ici.
 * @class classe définissant l'action de nager
 * @date 03/08/2012
 * @autor Cyril Cophignon
 * @extends AAction
 */
class ActionNager extends AAction
{
    /**
     * Constructeur par défaut
     */
    public function __construct()
    {
        parent::__construct();
        $this->name = "Nager";
    }

    /**
     * Méthode abstraite permettant l'execution de l'action
     * @param APropiete &$a_propriete propriete de l'action passée par référence
     */
    public function Run(&$a_propriete)
    {
        if(!($a_propriete instanceof APropriete))
        {
            throw new Exception('Le pramétre $a_propriete (type: '.get_class ($a_propriete).') n\'est pas une instance de la classe APropriete.');
        }
        $a_propriete->Down();
    }
};
?>