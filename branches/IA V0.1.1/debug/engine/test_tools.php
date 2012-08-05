<?php
/** 
* BoolToString($a_bool)
* function transformant un bool en string
* @param bool $a_bool, le booleen à transofmer
* @return string renvoie "true" ou "false"
*/	
function BoolToString($a_bool)
{
	if($a_bool) return "true";
	if($a_bool==null) return "null";
	return "false";
}

/**
 * Méthode ajoutant un repertoire à l'include_path
 * @param $a_chaine
 */
function Init($a_chaine, $a_separateur = ";")
{
    $tmp = explode($a_separateur, $a_chaine);
    foreach($tmp as $elmt)
    {
        if(is_dir($elmt)) set_include_path (get_include_path().$a_separateur.$elmt);
    }
}
?>