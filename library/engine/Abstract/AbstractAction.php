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
    protected $_actif;

    /**
     * Constructeur par défaut
     */
    public function __construct()
    {
        $this->_actif = true;
    }

    /**
     * Méthode abstraite permettant l'éxecution de l'action
     * @param APropiete &$a_propriete propriete de l'action passée par référence
     */
    abstract public function Run(&$a_propriete);

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
