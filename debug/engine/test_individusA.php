<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Tests Classe IndividusA</title>
</head>

<body>
<h1>Tests Classe Individus A</h1>
<?PHP
$path_library = 'engine/';
$path_abstract = $path_library.'Abstract/';
$path_actions = $path_library.'Actions/';
$path_besoins = $path_library.'Besoins/';
$path_individus = $path_library.'Individus/';

require_once 'test.php';
require_once $path_individus.'IndividusA.php';
require_once $path_abstract."AbstractAction.php";
require_once $path_abstract."AbstractBesoin.php";
require_once $path_actions."ActionNager.php";
require_once $path_actions."ActionReposer.php";
require_once $path_besoins."BesoinNager.php";
require_once $path_besoins."BesoinReposer.php";

$bubule = new IndividusA("Bubule", 3);
$bubule->AddAction(new ActionNager());
$bubule->AddAction(new ActionReposer());
$bubule->AddBesoin(new BesoinNager(true));
$bubule->AddBesoin(new BesoinReposer(false));


$duree = 100;

/*print_r($bubule->_needs);
echo "<br>";
print_r($bubule->_actions);
echo "<br>";*/

while(($duree--) > 0)
{
    //echo "***** Tour: $duree <br>";
    $bubule->Run();
}

?>

</body>
</html>
