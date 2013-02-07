<?php
    require_once "engine/Abstract/AbstractAction.php";


/**
 * Classe ActionDecharger, hérite de la classe abstraite AAction
 * Action consommant de "l'énergie" et n'est possible que s'il reste de l'energie à consommer
 * @class classe définissant l'action consommatrice "d'énergie"
 * @date 03/08/2012
 * @autor Cyril Cophignon
 * @extends AAction
 */
class ActionDecharger extends AAction
{
    /**
     * Constructeur par défaut
     */
    public function __construct()
    {
        parent::__construct();
        $this->name = "Decharger";
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