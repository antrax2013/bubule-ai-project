<?php
    require_once "engine/Abstract/AbstractAction.php";


/**
 * Classe ActionCharger, hérite de la classe abstraite AAction
 * Action augmentant "l'énergie"
 * @class classe définissant l'action ressoursant "l'énergie"
 * @date 03/08/2012
 * @autor Cyril Cophignon
 * @extends AAction
 */
class ActionCharger extends AAction
{
    /**
     * Constructeur par défaut
     */
    public function __construct()
    {
        parent::__construct();
        $this->name = "Charger";
    }

    /**
     * Méthode abstraite permettant l'execution de l'action
     * @param ProprieteBornee &$a_propriete propriete de l'action passée par référence
     */
    public function Run(&$a_propriete)
    {
        if(!($a_propriete instanceof APropriete))
        {
            throw new Exception('Le pramétre $a_propriete (type: '.get_class ($a_propriete).') n\'est pas une instance de la classe APropriete.');
        }
        $a_propriete->Up();
    }
};
?>