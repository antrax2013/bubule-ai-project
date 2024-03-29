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
     * Constructeur paramétré
     * @param $a_val
     * @param $a_min
     * @param $a_max
     * @param $a_pasUp
     * @param $a_pasDown
     */
    public function __construct($a_val=0, $a_min=0, $a_max=1, $a_pasUp=1, $a_pasDown=1)
    {
        $this->valeur = $a_val;
        $this->_min = $a_min;
        $this->max = $a_max;
        $this->pasUp = $a_pasUp;
        $this->pasDown = $a_pasDown;
        $this->Recadrer();
        $this->Etat();
    }

    /**
     * Méthode recadrant la valeur entre les bornes
     */
    private function Recadrer()
    {
        if($this->valeur > $this->max)
        {
            $this->valeur = $this->max;
        }
        else if($this->valeur < $this->min)
        {
            $this->valeur = $this->min;
        }
    }

    /**
     * Méthode faisaint croitre la valeur de la propriété
     * @param bool $a_avecControl, option pour désactiver le control de l'état de la propriété
     */
    public function Up($a_avecControl=true)
    {
        if($a_avecControl == true && $this->Etat() !== true  || !$a_avecControl)
        {
            $this->valeur += $this->_pasUp;
        }
    }

    /**
     * Méthode faisaint croitre la valeur de la propriété
     * @param bool $a_avecControl, option pour désactiver le control de l'état de la propriété
     */
    public function Down($a_avecControl=true)
    {
        if($a_avecControl == true && $this->Etat() !== false || !$a_avecControl)
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
        if($this->valeur == $this->max)
        {
            return true;
        }

        else if($this->valeur == $this->min)
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
                return $this->_pasUp;
            case "pasDown":
                return $this->_pasDown;
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
                if((!empty($this->_min) || $this->_min==0))
                {
                    //Vérification du paramétrage
                    if($this->min >= $a_val)
                    {
                        throw new Exception('La propriete _min('.$this->_min.') a une valeur supérieure ou égale à celle de _max('.$a_val.')');
                    }
                    $this->_max = $a_val;
                    $this->Recadrer();
                }
                return $this->max;
            case "min":
                if((!empty($this->_max) || $this->_max==0))
                {
                    //Vérification du paramétrage
                    if($this->_max <= $a_val)
                    {
                        throw new Exception('La propriete _min('.$a_val.') a une valeur supérieure ou égale à celle de _max('.$this->_max.')');
                    }
                    $this->_min = $a_val;
                    $this->Recadrer();
                }
                return $this->min;
            case "pasUp":
                if($this->_pasUp>= 0)
                {
                    $this->_pasUp = $a_val;
                }
                return $this->_pasUp;
            case "pasDown":
                if($this->_pasDown>= 0)
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