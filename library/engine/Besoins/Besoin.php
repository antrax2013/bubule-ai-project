<?php
/**
 * Classe Besoin
 * @class classe définissant le concept de besoin
 * @date 06/08/2012
 * @autor Cyril Cophignon
 */
class Besoin
{
    /**
     * Une propriete
     * @var APropriete
     */
    protected $_propriete;

    /**
     * Un état
     * @var AEtat
     */
    protected $_etat;

    /**
     * Une action
     * @var AAction
     */
    protected $_action;

    /**
     * Constructeur
     * @param AAction $a_action
     * @param APropiete $a_propriete
     * @param AEtat $a_etat
     */
    public function __construct(AAction $a_action, $a_propriete, AEtat $a_etat)
    {
        $this->_action = $a_action;
        if(!($a_propriete instanceof APropriete))
        {
            throw new Exception('Le pramétre $a_propriete (type: '.get_class ($a_propriete).') n\'est pas une instance de la classe APropriete.');
        }

        $this->_propriete = $a_propriete;
        $this->_etat = $a_etat;
    }

    /**
     * Méthode exécutant l'action du besoin en fonction de son état et de sa propriete
     * @return bool true si l'état est actif, false sinon
     */
    public function Run()
    {
        //echo "Besoin:".$this->_action->name()."Etat:".$this->_etat->actif()."Propriete:".$this->_propriete->valeur;
        //On vérifie l'état du besoin.
        if($this->_etat->Check($this->_propriete))
        {
            //On execute l'action
            $this->_action->Run($this->_propriete);

            //Si le besoin est encore actif, on s'arréte sinon on passe au besoin suivant
            if($this->_etat->actif) return true;
        }
        return false;
    }

};
?>