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
     * Tableau contenant les besoins
     * @var AbastractBesoin[]
     */
    protected $_besoins;


    /**
     * Constructeur par défaut
     * @param string $a_name nom de l'invividus
     */
    public function __construct($a_name)
    {
        $this->_besoins = array();
        $this->_name = $a_name;
        $this->_ready = false;
    }

    /**
     * Ajouter un besoin
     * @param ABesoin $a_besoin, le besoin à ajouter
     */
    public function AddBesoin(ABesoin $a_besoin)
    {
       Array_Push($this->_besoins, $a_besoin);

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
        //Initialisation des variables
        $this->_ready = true;
        $nb_besoins = count($this->_besoins);

        if($nb_besoins <= 0)
        {
            $this->_ready = false;
            throw new Exception($this->_name.": Aucun besoin n'est défini");
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

        foreach($this->_besoins as $besoin)
        {
            //On vérifie l'état du besoin et on execute l'action si necessaire.
            if($besoin->Run()) return true;
        }
        return false;

    }
};
?>