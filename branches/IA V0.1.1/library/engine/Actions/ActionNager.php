<?php
    require_once "engine/Abstract/AbstractAction.php";


/**
 * Class definissant l'action de nager
 * @class ActionNage
 * @category Engine
 * @author Cyril Cophignon
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
     * Méthode d'execution de l'action
     */
    public function Run(&$a_energie, $a_energieMax)
    {
        if($a_energie > 0)
        {
            $a_energie -= 1;
            echo "Je nage.<br /> ";
        }
        if($a_energie == 0)
        {
            $this->_active = false;
            echo "Je suis fatigué.<br /> ";
        }
    }
};
?>