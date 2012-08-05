<?php
/**
 * Classe abstraite AAction
 * @class classe définissant le concept d'action
 * @date 03/08/2012
 * @autor Cyril Cophignon
 */
abstract class AAction
{
    /**
     * Nom de l'action
     * @var string
     */
    protected  $_name;

    /**
     * Booléen pour savoir si l'action est active
     * @var bool
     */
    protected $_active;

    /**
     * Constructeur par défaut
     */
    public function __construct()
    {
        $this->active = true;
    }

    /**
     * Méthode abstraite permettant l'execution de l'action
     * @param &object $a_param parametre de la méthode passé par référence
     * @param object $a_paramRef parametre de référence qui sera comparé à $_param
     */
    abstract public function Run(&$a_param, $a_paramRef);

    /**
     * Accesseur public en lecture sur les champs privés
     * @param string $a_name, le nom du champ à lire
     * @return object la valeur du champ
     * @throws Exception : méthode indéfinie
     */
    public function __get($a_name)
    {
        switch($a_name)
        {
            case "name":
                return $this->_name;
            default:
                throw new Exception("La propriete \"$a_name\" est indefinie.");
        }
    }
};
?>
