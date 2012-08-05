<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tests Classe IndividusA</title>
</head>

<body>
<h1>Tests Classe Individus A</h1>
<?PHP
// Variables Globales
//Les chemins sont ralatifs car definis dans le include path
$root = "D:/Workspace/IA/IA V0.1.1/library/";
$path_library = 'engine/';
$path_abstract = $path_library.'Abstract/';
$path_actions = $path_library.'Actions/';
$path_etats = $path_library.'Etats/';
$path_individus = $path_library.'Individus/';

//Inclusions
require_once "test_tools.php";
Init($root); //modification de l'include_path

require_once $path_individus."IndividusA.php";
require_once $path_abstract."AbstractAction.php";
require_once $path_abstract."AbstractEtat.php";
require_once $path_actions."ActionNager.php";
require_once $path_actions."ActionReposer.php";
require_once $path_etats."EtatNager.php";
require_once $path_etats."EtatReposer.php";

//Initialisation des variables
$bubule = new IndividusA("Bubule", 3);
$bubule->AddAction(new ActionNager());
$bubule->AddAction(new ActionReposer());
$bubule->AddBesoin(new EtatNager(true));
$bubule->AddBesoin(new EtatReposer());
$bubule->EstPret();
$duree = 12;

$bouboul = new IndividusA("Bouboul", 0);
$bouboul->EstPret();
/*$bubule->AddAction(new ActionNager());
$bubule->AddAction(new ActionReposer());
$bubule->AddBesoin(new EtatNager(true));
$bubule->AddBesoin(new EtatReposer());*/


//Lancement de la simulation
while(($duree--) > 0)
{
    echo "************************<br>Tour $duree<br>";
    /*$bubule->Run();
    var_dump($bubule);*/
    $bouboul->Run();
    var_dump($bouboul);
}
?>

</body>
</html>
