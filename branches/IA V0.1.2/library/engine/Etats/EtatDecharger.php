<?php
    require_once "engine/Abstract/AbstractEtat.php";

/**
 * Classe EtatDecharger, hérite de la classe abstraite AEtat
 * Dans cette version de base EtatDecharger = consommation de sa propriete dès lors que celle-ci n'est pas à faux.
 * @class classe définissant l'état de nager
 * @date 03/08/2012
 * @autor Cyril Cophignon
 * @extends AEtat
 */
class EtatDecharger extends AEtat
{

    /**
     * Méthode gérant l'activation/désactivations en fonction de l'état des paramètres
     * @param APropriete $a_propriete la propriété à vérifier
     * @return bool renvoi true si le besoin est actif ou false
     */
    public function Check($a_propriete)
    {
        if($a_propriete->etat === true && !$this->actif)
        {
            $this->Activer();
            return true;
        }

        if($a_propriete->etat === false && $this->actif)
        {
            $this->Desactiver();
            return false;
        }

        return $this->actif;
    }

};
?>