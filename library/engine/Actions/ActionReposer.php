<?php
    require_once "Abstract/AbstractAction.php";


/**
 * Class definissant l'action de se reposer
 * @class ActionNage
 * @category Engine
 * @author Cyril Cophignon
 */
class ActionReposer extends AAction
{
    /**
     * Constructeur par défaut
     */
    public function __construct()
    {
        $this->name = "Reposer";
    }

    /**
     * Méthode d'execution de l'action
     */
    public function Run(&$a_proprietes)
    {
        if($a_proprietes['energie'] < $a_proprietes['energieMax'])
        {
            $a_proprietes['energie'] += 1;
        }

        if($a_proprietes['energie'] == $a_proprietes['energieMax'])
        {
            $this->_active = false;
        }
    }
};
?>