<?php
/**
 * Class definissant un individus de type A : individus avec 2 actions et 1 besoin
 * @class ActionNage
 * @category Engine
 * @author Cyril Cophignon
 */
class IndividusA
{
    /**
     * Nom de l'individus
     * @var string
     */
    private $_name;

    /**
     * Niveau d'énergie de l'individus
     * @var int
     */
    private $_energie;

    /**
     * Niveau d'énergie maximum de l'individus
     * @var int
     */
    private $_energieMax;

    /**
     * Tableau contenant les actions
     * @var AbastractAction[]
     */
    public $_actions;

    /**
     * Tableau contenant les besoins
     * @var AbastractNeed[]
     */
    public $_needs;

    /**
     * Constructeur par défaut
     */
    public function __construct($a_name, $a_energieMax=5)
    {
        $this->_energie = $this->_energieMax = $a_energieMax;
        $this->_needs = array();
        $this->_actions = array();
        $this->_name = $a_name;
    }

    /**
     * Ajouter une action
     * @param $a_object [AbastractAction]
     */
    public function AddAction($a_object)
    {
        Array_Push($this->_actions, $a_object);
    }

    /**
     * Ajouter un besoin
     * @param $a_object [AbastractAction]
     */
    public function AddBesoin($a_object)
    {
        Array_Push($this->_needs, $a_object);
    }

    public function Run()
    {
        /*echo $this->_energie." ". $this->_energieMax ."<br>";
        echo "Nager:".$this->_needs[0]->active." Reposer:". $this->_needs[1]->active ."<br>";*/
        echo $this->_name." : ";
        for($i=0; $i < count($this->_needs) && $i < count($this->_actions) ;$i++)
        {

            if($this->_needs[$i]->Check($this->_energie, $this->_energieMax))
            {
                $this->_actions[$i]->Run($this->_energie, $this->_energieMax);
                if($this->_needs[$i]->active) return;
            }
        }
        echo "<br>";


    }
};
?>