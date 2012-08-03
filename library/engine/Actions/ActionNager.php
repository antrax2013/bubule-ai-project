<?php
    require_once "Abstract/AbstractAction.php";


/**
 * Class definissant l'action de nager
 * @class ActionNage
 * @category Engine
 * @author Cyril Cophignon
 */
class ActionNage extends AAction
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
    public function Run(&$a_proprietes)
    {
        if($a_proprietes['energie'] > 0)
        {
            $a_proprietes['energie'] -= 1;
        }
        if($a_proprietes['energie'] == 0)
        {
            $this->_active = false;
        }
    }
};
?>