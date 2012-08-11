<?php
/**
 * Classe abstraite APropiete
 * @class classe définissant le concept de propriété
 * @date 05/08/2012
 * @autor Cyril Cophignon
 */
abstract class APropriete
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

    /**
     * Accesseur public en écriture sur les champs
     * @param string $a_name, le nom du champ à modifier
     * @param object $a_val, la valeur à écrire dans le champ
     * @return object la valeur du champ
     * @throws Exception
     */
    public function __set($a_name, $a_val)
    {
        switch($a_name)
        {
            case "valeur":
                $this->valeur = $a_val;
                return $this->valeur;

            default:
                throw new Exception("La propriete \"$a_name\" est indefinie.");
        }
    }
};
?>