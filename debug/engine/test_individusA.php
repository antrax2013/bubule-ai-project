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
$path_besoins = $path_library.'Besoins/';
$path_etats = $path_library.'Etats/';
$path_individus = $path_library.'Individus/';
$path_propriete = $path_library.'Proprietes/';

//Initialisation
require_once "test_tools.php";
Init($root); //modification de l'include_path


//Classes
require_once $path_individus."IndividusA.php";
require_once $path_propriete."ProprieteBornee.php";
require_once $path_actions."ActionNager.php";
require_once $path_actions."ActionReposer.php";
//require_once $path_besoins."Besoin.php";
require_once $path_besoins."BesoinPP.php";
require_once $path_etats."EtatNager.php";
require_once $path_etats."EtatReposer.php";

//Initialisation des variables
$bubule = new IndividusA("Bubule");

$energie = new ProprieteBornee(5, 0, 5, 1, 1);

var_dump($energie instanceof APropriete);

$nager = new BesoinPP(new ActionNager(), $energie, new EtatNager(true));
$reposer = new BesoinPP(new ActionReposer(), $energie, new EtatReposer());


$bubule->AddBesoin($nager);
$bubule->AddBesoin($reposer);
$bubule->EstPret();

/*$bouboul = new IndividusA("Bouboul", 0);
$bouboul->EstPret();*/

//Lancement de la simulation
$duree = 12;
while(($duree--) > 0)
{
    echo "************************<br>Tour n° $duree<br>";
    $bubule->Run();
    //var_export($bubule);
    echo "<br><br>";
    /*$bouboul->Run();
    var_dump($bouboul);*/
}
?>

</body>
</html>
