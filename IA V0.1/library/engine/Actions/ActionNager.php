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
        $this->name = "Nager";
    }

    /**
     * Méthode abstraite permettant l'execution de l'action
     * @param &int $a_param parametre de la méthode passé par référence
     * @param int $a_paramRef parametre de référence qui sera comparé à $_param
     */
    public function Run(&$a_param, $a_paramRef)
    {
        //Je peux nager dès lors qu'il me reste de l'ernergie
        if($a_param > 0)
        {
            $a_param -= 1;
        }
        //J'ai plus d'energie je ne peux plus nager
        if($a_param == 0)
        {
            $this->_active = false;
        }
    }
};
?>