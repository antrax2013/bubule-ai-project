<?php

abstract class ABesoin
{
    /**
     * Nom de l'action
     * @bool string
     */
    protected $_actif;

    /**
     * Constructeur par défaut
     */
    public function __construct($a_actif = false)
    {
        $this->_actif = $a_actif;
    }

    /**
     * Méthode vérifiant les propriétés passées en paramètres
     */
    abstract public function Check($a_proprietes);

    protected function Activer()
    {
        $this->_actif = true;
    }

    /**
     * Méthode d'execution de l'action
     */
    protected function Assouvi()
    {
        $this->_actif = false;
    }


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
            case "active":
                return $this->_actif;
            default:
                throw new Exception("La propriete \"$a_name\" est indefinie.");
        }
    }
};
?>
