<?php
    require_once "engine/Abstract/AbstractPropriete.php";

    /**
     * Classe ProprieteBornee, hérite de la classe abstraite APropriete
     * Proriété bornée: min <= valeur <= max
     * @class classe définissant le concepte de proriété bornée
     * @date 05/08/2012
     * @autor Cyril Cophignon
     * @extends APropriete
     */
class ProprieteBornee extends APropriete
{
    /**
     * Seuil minimal de la valeur de la propriété
     * @var object
     */
    protected $_min;
    /**
     * Seuil maximal de la valeur de la propriété
     * @var object
     */
    protected $_max;

    /**
     * Pas d'augementatin de la valeur de la propriété
     * @var object
     */
    protected $_pasUp;

    /**
     * Pas de diminution de la valeur de la propriété
     * @var object
     */
    protected $_pasDown;


    /**
     * Méthode faisaint croitre la valeur de la propriété
     * @param bool $a_avecControl, option pour désactiver le control de l'état de la propriété
     */
    protected function Up($a_avecControl=true)
    {
        if($a_avecControl && $this->Etat() != true  || !$a_avecControl)
        {
            $this->valeur += $this->_pasUp;
        }
    }

    /**
     * Méthode faisaint croitre la valeur de la propriété
     * @param bool $a_avecControl, option pour désactiver le control de l'état de la propriété
     */
    protected function Down($a_avecControl=true)
    {
        if($a_avecControl && $this->Etat() != false || !$a_avecControl)
        {
            $this->valeur -= $this->_pasDown;
        }
    }

    /**
     * Accesseur en lecture sur l'état de la propriété
     * @return bool|null, ture si la propriété est a son état max, false si elle est à son état min, null dans les autres cas
     */
    protected function Etat()
    {
        if($this->valeur == $this->_max)
        {
            return true;
        }

        else if($this->valeur == $this->_min)
        {
           return false;
        }

        else return null;
    }

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
            case "max":
                return $this->_max;
            case "min":
                return $this->_min;
            case "pasUp":
                return $this->_min;
            case "pasDown":
                return $this->_min;
            default:
                return parent::__get($a_name);
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
            case "max":
                if($this->_min<= $a_val)
                {
                    $this->max = $a_val;
                }
                return $this->max;
            case "min":
                if($this->_max>= $a_val)
                {
                    $this->min = $a_val;
                }
                return $this->min;
            case "pasUp":
                if($this->_pasUp>= 0)
                {
                    $this->_pasUp = $a_val;
                }
                return $this->_pasUp;
            case "pasDown":
                if($this->_pasDown>= $a_val)
                {
                    $this->_pasDown = $a_val;
                }
                return $this->_pasDown;
            default:
                return parent::__set($a_name, $a_val);
        }
    }
};
?>