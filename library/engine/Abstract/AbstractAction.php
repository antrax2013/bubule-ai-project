<?php
/**
 * Class abstraite AAction
 * User: antrax
 * Date: 03/08/12
 * Time: 20:58
 * To change this template use File | Settings | File Templates.
 */
abstract class AAction
{
    /**
     * Nom de l'action
     * @var string
     */
    protected $_name;

    protected $_active;

    /**
     * Constructeur par défaut
     */
    public function __construct()
    {
        $this->active = true;
    }

    /**
     * Méthode d'execution de l'action
     */
    abstract public function Run(&$a_proprietes);

    /**
     * Accesseur public en lecture sur les champs privés
     * @param [string] $a_name, le nom du champ à lire
     * @return [object, null] la valeur du champ ou null en cas d'exception
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
