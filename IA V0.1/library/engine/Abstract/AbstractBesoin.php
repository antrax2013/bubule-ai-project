<?php
/**
 * Classe abstraite ABesoin
 * @class classe définissant le concept de besoin
 * @date 03/08/2012
 * @autor Cyril Cophignon
 */
abstract class ABesoin
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
     * @param object $a_param parametre
     * @param object $a_paramRef parametre de référence
     * @return bool renvoi true si le besoin est actif ou false
     */
    abstract public function Check($a_param, $a_paramRef);

    /**
     * Méthode permettant d'activer le besoin
     * passe $_active à true
     */
    protected function Activer()
    {
        $this->_actif = true;
    }

    /**
     * Méthode permettant de désactiver le besoin
     * passe $_active à false
     */
    protected function Assouvi()
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
            case "active":
                return $this->_actif;
            default:
                throw new Exception("La propriete \"$a_name\" est indefinie.");
        }
    }
};
?>
