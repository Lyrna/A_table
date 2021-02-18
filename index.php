<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<title>A table</title>
</head>
<body>

<?php require "bdd.php"?>

<header>
	<h1>A table !</h1>
	<p>On apprend à créer une base de données en script php, à se connecter à la base de données, à créer les tables dynamiquement, puis à afficher les résultats de requêtes préparées SQL.</p>
</header>

<section>
	<!--nbre flash février-->
	<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
		<?php 
			echo 
			"<table>
				<tr>
					<td colspan='3' class='h3'>
						<h3 class='statglobales'>Statistiques globales</h3>
					</td>
				</tr>
				<tr>
					<th>Requête</th>
					<th>Mois/Période</th>
					<th>Résultat</th>
				</tr>
				<tr>
					<td>Nbre de flash
					</td>
					<td>Février
					</td>";
					echo 
					"<td>
						<span class='result'>" . ($row['nbre_flash_fevrier']) . 
						"</span>
					</td>
				</tr>
			"; 
		?>
     <?php endwhile; ?>

     <!--table la plus utilisée pendant un trimestre-->
    <?php while($row = $stmt2->fetch(PDO::FETCH_ASSOC)) : ?>
		<?php 
			echo 
			"	<tr>
					<td>N°Table la plus utilisée
					</td>
					<td>Février, Mars, Avril
					</td>";
					echo 
					"<td>
						<span class='result'>" . ($row['id_table']) . 
						"</span>
					</td>
				</tr>
			</table>"; 
		?>
     <?php endwhile; ?>
</section>

<section>
	<h2>Les Clients</h2>
	<table class="global">
				<tr>
					<th colspan="10" class="stats"><h3>Statistiques basées clients</h3></th>
				</tr>
				<tr>
					<th>N°Client</th>
					<th>N°table</th>
					<th>Lunminosité</th>
					<th>Nombre de chaises</th>
					<th>Intérieur/Extérieur</th>
					<th>Plat commandé</th>
					<th>Marque du smartphone</th>
					<th>Language</th>
					<th>Nom du QRCode</th>
					<th>Date et Heure du Flash</th>
				</tr>

	<?php while($row = $stmt3->fetch(PDO::FETCH_ASSOC)) : ?>
		<?php 
			echo 
			"
				<tr>
					<td>
						<span class='result'>" . ($row['id_client']) . "
						</span>
					</td>
					<td>
						<span class='result'>" . ($row['numero_table']) . "
						</span>
					</td>
					<td>
						<span class='result'>" . ($row['luminosite']) . "
						</span>
					</td>
					<td>
						<span class='result'>" . ($row['nbre_de_chaises']) . "
						</span>
					</td>
					<td>
						<span class='result'>" . ($row['emplacement']) . "
						</span>
					</td>
					<td>
						<span class='result'>" . ($row['nom_plat']) . "
						</span>
					</td>
					<td>
						<span class='result'>" . ($row['marque']) . "
						</span>
					</td>
					<td>
						<span class='result'>" . ($row['langue']) . "
						</span>
					</td>
					<td>
						<span class='result'>" . ($row['nom_QRCode']) . "
						</span>
					</td>
					<td>
						<span class='result'>" . ($row['date_flash']) . "
						</span>
					</td>
				</tr>
			"; 
		?>
		 <?php endwhile; ?>
	</table>
</section>

</body>
</html>