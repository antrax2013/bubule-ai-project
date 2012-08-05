<?php
/**
 * Classe abstraite APropiete
 * @class classe définissant le concept de propriété
 * @date 05/08/2012
 * @autor Cyril Cophignon
 */
abstract class APropiete
{
    /**
     * Valeur de la propriete
     * @var object
     */
    protected $_valeur;

    /**
     * Méthode permettant de determiner l'état de la propriete
     */
    protected abstract function Etat();

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
            case "valeur":
                return $this->_valeur;
            case "etat":
                return $this->Etat();
            default:
                throw new Exception("La propriete \"$a_name\" est indefinie.");
        }
    }
};
?>