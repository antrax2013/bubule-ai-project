<?php
    require_once "AbastractPropriete.php";
/**
 * Classe abstraite AEtat
 * @class classe définissant le concept d'état
 * @date 03/08/2012
 * @autor Cyril Cophignon
 */
abstract class AEtat
{
    /**
     * Booléen pour savoir si l'action est active
     * @var bool
     */
    protected $_actif;


    /**
     * Constructeur par défaut
     * @param bool $a_actif, permet de renseigner l'état du champ $_actif à la construction. A false par défaut.
     */
    public function __construct($a_actif = false)
    {
        $this->_actif = $a_actif;
    }

    /**
     * Méthode abstraite gérant l'activation/désactivations en fonction de l'état des paramètres
     * @param APropriete $a_propriete la propriété à vérifier
     * @return bool renvoi true si le besoin est actif ou false
     */
    abstract public function Check($a_propriete);

    /**
     * Méthode permettant d'activer l'état
     * passe $_active à true
     */
    protected function Activer()
    {
        $this->_actif = true;
    }

    /**
     * Méthode permettant de désactiver l'état
     * passe $_active à false
     */
    protected function Desactiver()
    {
        $this->_actif = false;
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
            case "actif":
                return $this->_actif;
            default:
                throw new Exception("La propriete \"$a_name\" est indefinie.");
        }
    }
};
?>
