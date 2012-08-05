<?php
    require_once "engine/Abstract/AbstractAction.php";


/**
 * Classe ActionReposer, hérite de la classe abstraite AAction
 * Dans cette verion reposer est l'action antagoniste de l'action nager.
 * Aucun lien n'est fait entre les deux actions
 * @class classe définissant l'action de se reposer.
 * @date 03/08/2012
 * @autor Cyril Cophignon
 * @extends AAction
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
     * Méthode abstraite permettant l'execution de l'action
     * @param &int $a_param parametre de la méthode passé par référence
     * @param int $a_paramRef parametre de référence qui sera comparé à $_param
     */
    public function Run(&$a_energie, $a_energieMax)
    {
        if($a_energie < $a_energieMax)
        {
            $a_energie += 1;
        }

        if($a_energie == $a_energieMax)
        {
            $this->_active = false;
        }
    }
};
?>