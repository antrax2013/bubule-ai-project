<?php
/**
 * Class definissant un individus de type A: concept simple
 * individus avec X actions et X besoins, l'action n°X fonctionne avec le besoin n°X
 * pour simplifier, individus ayant toujours un et un seul besoin actif
 * @class IndividusA
 * @author Cyril Cophignon
 */
class IndividusA
{
    /**
     * Nom de l'individus
     * @var string
     */
    protected $_name;

    /**
     * Niveau d'énergie de l'individus
     * @var int
     */
    protected $_energie;

    /**
     * Niveau d'énergie maximum de l'individus
     * @var int
     */
    protected $_energieMax;

    /**
     * Tableau contenant les actions
     * @var AbastractAction[]
     */
    protected  $_actions;

    /**
     * Tableau contenant les besoins
     * @var AbastractNeed[]
     */
    protected $_needs;

    /**
     * Booléen pour savoir si l'individu est correctement formatté
     * @var bool
     */
    protected $_ready;

    /**
     * Constructeur par défaut
     * @param string $a_name nom de l'invividus
     * @param int $a_energieMax energie maximum dont dispose l'individu, minimum 1. 5 par défaut
     */
    public function __construct($a_name, $a_energieMax=5)
    {
        if($a_energieMax < 1) $a_energieMax = 1;
        $this->_energie = $this->_energieMax = $a_energieMax;
        $this->_needs = array();
        $this->_actions = array();
        $this->_name = $a_name;
        $this->_ready = false;
    }

    /**
     * Ajouter une action
     * @param AAction $a_action, l'action à ajouter
     */
    public function AddAction($a_action)
    {
        if($a_action instanceof AAction)
        {
            Array_Push($this->_actions, $a_action);
        }

        try { $this->EstPret(); }
        catch(Exception $e) { }
    }

    /**
     * Ajouter un besoin
     * @param ABesoin $a_besoin, l'action à ajouter
     */
    public function AddBesoin($a_besoin)
    {
        if($a_besoin instanceof ABesoin)
        {
            Array_Push($this->_needs, $a_besoin);
        }

        try { $this->EstPret(); }
        catch(Exception $e) { }
    }

    /**
     * Méthode permettant de savoir si le paramètrage de l'individu est correct
     *  @throw Exception
     *  @return bool true si le paramètrage est correct, false sinon
     */
    public function EstPret()
    {
        $this->_ready = true;
        $nb_needs = count($this->_needs);
        $nb_actions = count($this->_actions);
        if($nb_needs != $nb_actions)
        {
            $this->_ready = false;
            throw new Exception($this->_name.": Le nombre de besoins différent du nombre d'actions:".$nb_needs." - ".$nb_actions);
        }
        if($nb_needs == 0)
        {
            $this->_ready = false;
            throw new Exception($this->_name.": Aucun besoin n'est défini.");
        }
        return $this->_ready;
    }

    /**
     * Méthode exécutant les actions en fonction de l'état des besoins
     * @return bool ture si une action a été éxécutée, false sinon et null en cas d'erreur
     */
    public function Run()
    {
        if(!$this->_ready) return null;

        $nb = count($this->_needs);

        for($i=0; $i < $nb ;$i++)
        {
            //On vérifie l'état du besoin.
            if($this->_needs[$i]->Check($this->_energie, $this->_energieMax))
            {
                //On execute l'action
                $this->_actions[$i]->Run($this->_energie, $this->_energieMax);
                //Si le besoin est encore actif, on s'arréte sinon on passe au besoin suivant
                if($this->_needs[$i]->active) return true;
            }
        }
        return false;

    }
};
?>