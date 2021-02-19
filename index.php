<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title>A table</title>
	<script src="https://kit.fontawesome.com/c70a4c5665.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-pizza.png">
</head>
<body>

<?php require "bdd.php"?>

<header>
	<h1><i class="fas fa-utensils"></i>BDD : Restaurant</h1>
	<p class="title-tp">TP : A table !</p>
	<p>On apprend à créer une base de données en script php, à se connecter à la base de données, à créer les tables dynamiquement, puis à afficher les résultats de requêtes préparées SQL.</p>

	<a href = "#ancre1"><button>Affluence</button></a>
	<a href = "#ancre2"><button>Stats Clients</button></a>
</header>

<div>
	<table class = "global">
		<!--nbre flash février-->
		<?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>
			<?php 
				echo 
				"	<tr>
						<td colspan='4' class='h3'>
							<h3 class='statglobales'>Statistiques globales</h3>
						</td>
					</tr>
					<tr>
						<th colspan ='2'>Requête</th>
						<th>Mois/Période</th>
						<th>Résultat</th>
					</tr>
					<tr>
						<td colspan ='2'>Nbre de flash
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
						<td colspan ='2'>N°Table la plus utilisée
						</td>
						<td>Février, Mars, Avril
						</td>";
						echo 
						"<td>
							<span class='result'>" . ($row['id_table']) . 
							"</span>
						</td>
					</tr>"; 
			?>
	    <?php endwhile; ?>

	    <!--plat le plus commandé toute période confondue-->
	    <?php while($row = $stmt4->fetch(PDO::FETCH_ASSOC)) : ?>
	     	<?php
	     		echo
	     			"<tr>
						<td colspan ='2'>
							Plat le plus commandé
						</td>
						<td>Depuis l'ouverture du restaurant
						</td>";
						echo
						"<td>
							<span class='result'>" . ($row['nom_plat']) . 
							"</span>
						</td>
					</tr>";
			?>
		<?php endwhile; ?>

		<!--plat le plus commandé en avril-->
	    <?php while($row = $stmt6->fetch(PDO::FETCH_ASSOC)) : ?>
	     	<?php
	     		echo
	     			"<tr>
						<td colspan ='2'>
							Plat le plus commandé
						</td>
						<td>Avril
						</td>";
						echo
						"<td>
							<span class='result'>" . ($row['nom_plat']) . 
							"</span>
						</td>
					</tr>";
			?>
		<?php endwhile; ?>

		<!--plat le moins commandé toute période confondue-->
	    <?php while($row = $stmt5->fetch(PDO::FETCH_ASSOC)) : ?>
	     	<?php
	     		echo
	     			"<tr>
						<td colspan ='2'>
							Plat le moins commandé
						</td>
						<td>Depuis l'ouverture du restaurant
						</td>";
						echo
						"<td>
							<span class='result'>" . ($row['nom_plat']) . 
							"</span>
						</td>
					</tr>";
			?>
		<?php endwhile; ?>

		<!--nbre de tables au soleil-->
	    <?php while($row = $stmt8->fetch(PDO::FETCH_ASSOC)) : ?>
	     	<?php
	     		echo
	     			"<tr>
						<td colspan ='2'>
							Nbre de tables au soleil
						</td>
						<td>/
						</td>";
						echo
						"<td>
							<span class='result'>" . ($row['nbre_table_au_soleil']) . 
							"</span>
						</td>
					</tr>";
			?>
		<?php endwhile; ?>

		<!--nbre de table à l'ombre et à l'extérieur-->
	    <?php while($row = $stmt9->fetch(PDO::FETCH_ASSOC)) : ?>
	     	<?php
	     		echo
	     			"<tr>
						<td colspan ='2'>
							Nbre de tables à l'ombre en extérieur
						</td>
						<td>/
						</td>";
						echo
						"<td>
							<span class='result'>" . ($row['nbre_table_ombre_exterieur']) . 
							"</span>
						</td>
					</tr>";
			?>
		<?php endwhile; ?>

		<!--nbre total de clients depuis l'ouverture du restaurant-->
	    <?php while($row = $stmt7->fetch(PDO::FETCH_ASSOC)) : ?>
	     	<?php
	     		echo
	     			"<tr>
						<td colspan = '2'>
							Nbre total de clients
						</td>
						<td>Depuis l'ouverture du restaurant
						</td>";
						echo
						"<td>
							<span class='result'>" . ($row['nbre_client']) . 
							"</span>
						</td>
					</tr>";
			?>
		<?php endwhile; ?>

		<!--titre date et nbre clients par mois-->
		<tr>
				<td colspan='4' class='h3'>
					<h3 class='statglobales' id ="ancre1">Affluence des clients</h3>
				</td>
			</tr>
			<tr>
				<th colspan = '2'>Requête</th>
				<th>Mois</th>
				<th>Résultat</th>
			</tr>

		<?php
			echo "<tr>
					<td colspan = '2' rowspan = '6' class='fusion'>
						Nombre de clients <br/> chaque mois
					</td>
				</tr>";
		?>

		<!--date et nbre clients par jour-->
		 <?php while($row = $stmt11->fetch(PDO::FETCH_ASSOC)) : ?>
		 	<?php 
				echo "<tr>
						<td class = 'date'>
							<span>"
							 . ($row['mois']) . " / " . ($row['annee']) . "
							</span>
						</td>";
						echo 
						"<td>
							<span>" . ($row['nbre_clients']) . 
							"</span>
						</td>
					</tr>"; 
			?>
		 <?php endwhile; ?>
		 <tr>
				<th colspan = '2'>Requête</th>
				<th>Jour</th>
				<th>Résultat</th>
			</tr>

		<?php
			echo "<tr>
					<td colspan = '2' rowspan = '22' class='fusion'>
						Nombre de clients <br/> chaque jour
					</td>
				</tr>";
		?>

		<!--date et nbre clients par jour-->
		 <?php while($row = $stmt10->fetch(PDO::FETCH_ASSOC)) : ?>
		 	<?php 
				echo 
				"	<tr>
						<td class = 'date'>
							<span>" . ($row['day']) . 
							"</span> / " . ($row['month']) . " / " . ($row['year']) . "
						</td>";
						echo 
						"<td>
							<span>" . ($row['nbre_client']) . 
							"</span>
						</td>
					</tr>"; 
			?>
		 <?php endwhile; ?>
	</table>

	<table class="global">
		<tr>
			<th colspan="10" class="stats">
				<h3 id = "ancre2">Statistiques clients</h3>
			</th>
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
</div>
<script src="assets/js/script.js"></script>
</body>
</html>