<?php
    require_once "Abstract/AbstractAction.php";


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
    private $_actions;

    /**
     * Tableau contenant les besoins
     * @var AbastractNeed[]
     */
    private $_needs;

    /**
     * Constructeur par défaut
     */
    public function __construct($a_energieMax)
    {
        $this->_energie = $this->_energieMax = $a_energieMax;
        $this->_needs = array();
        $this->_actions = array();
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
        for($i=0; $i < count($this->_needs) && $i < count($this->_actions) ;$i++)
        {
            $tmp = array("energieMax" => $this->_energieMax, "energie" => $this->_energie);
            if($this->_needs[$i]->Check($tmp))
            {
                $this->_actions[$i]->Run($tmp);
            }
        }

    }
};
?>