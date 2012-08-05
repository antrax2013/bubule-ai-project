<?php
    require_once "engine/Abstract/AbstractAction.php";


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
    public function Run(&$a_energie, $a_energieMax)
    {
        if($a_energie < $a_energieMax)
        {
            $a_energie += 1;
            echo "Je me repose.<br /> ";
        }

        if($a_energie == $a_energieMax)
        {
            $this->_active = false;
            echo "Je suis en forme.<br /> ";
        }
    }
};
?>