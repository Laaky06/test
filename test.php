<?php
	$bddPDO = new PDO('mysql:host=localhost;dbname=basedados','root','');
	$bddPDO->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION );
	if ($_POST['enter']){
  
//On prépare la requête
$requete = $bdd->prepare('INSERT INTO contacto VALUES(:Nome,:Email,:Phone,:Message)');
// On lie les variables définie au-dessus au paramètres de la requête préparée
$requete->bindValue(':Nome', $_POST['nome'], PDO::PARAM_STR); 
$requete->bindValue(':Email', $_POST['email'], PDO::PARAM_STR);
$requete->bindValue(':Phone', $_POST['phone'], PDO::PARAM_STR);
$requete->bindValue(':Message', $_POST['msg'], PDO::PARAM_STR);
//On exécute la requête
$requete->execute();
}else {}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Affichage des donnees</title>
</head>


<body>
<?php
$requete = "SELECT * FROM contacto ORDER BY id ASC";
$result=$bddPDO->query($requete);
if (!$result){
	echo "La recuperation des donnees a un probleme";

}else {
	$nbr = $result->rowCount();
?>
<h1>Affichage des donnees</h1>
<h2> Nous avons <? $nbr ?></h2>
<table style="border: 2px;">
	<tr style="border:  1px;">
		<th>Id </th>
		<th>Nome</th>
		<th>E-mail</th>
		<th>Phone</th>
		<th>Message</th>
	</tr>
<?php
while ($ligne = $result->fetch(PDO::FETCH_NUM)){
	echo "<tr>";
	foreach ($ligne as $valeur ) {
		echo "<td>$valeur</td>";
	}
	echo "</tr>";
}
?>
</table>
<?php 
$result->closeCursor();
}
?>
<h3>Suprimer</h3>
    <form action="#" method="post">
        <p>
        <label for="idSupr"> ID à supprimer</label> : <input type="text" name="idSupr" id="idSupr" /><br />
        <input type="submit" value="Supprimer" />
    </p>
    </form>
<?php
if ($_POST['idSupr']){
	$req = $bddPDO->prepare('DELETE FROM contacto WHERE id= ?');
	$req->execute(array($_POST['idSupr']));
	$req->closeCursor();
	echo 'Donnee supprimé !';
}else{
echo " Ajoutez un id valide";
}
?>
</body>
</html>