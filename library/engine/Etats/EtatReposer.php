<?php

require_once "engine/Abstract/AbstractEtat.php";

/**
 * Classe EtatReposer, hérite de la classe abstraite AEtat
 * Dans cette version de base EtatReposer = régénération de sa propriete lorsque celle-ci est à faux.
 * @class classe définissant l'état de se reposer
 * @date 03/08/2012
 * @autor Cyril Cophignon
 * @extends AEtat
 */
class EtatReposer extends AEtat
{
    /**
     * Méthode gérant l'activation/désactivations en fonction de l'état des paramètres
     * @param APropriete $a_propriete la propriété à vérifier
     * @return bool renvoi true si le besoin est actif ou false
     */
    public function Check($a_propriete)
    {
        if($a_propriete->etat == false && !$this->actif)
        {
            $this->Activer();
            return true;
        }

        if($a_propriete->etat == true && $this->actif)
        {
            $this->Desactiver();
            return false;
        }

        return $this->actif;
    }

};
?>