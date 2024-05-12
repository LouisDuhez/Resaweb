<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="voitures.css">
    <link
    href="https://fonts.googleapis.com/css2?family=Faster+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Voitures - To drive</title>
   
</head>
<body>
    <?php
    include ("connect.php")
    ?>
    <header>
        <nav>
            <h1><a href="index.php">To drive</a></h1>
            <a class="btn-nav" href="index.php">Accueil</a>
            <a class="btn-nav red-text" href="voitures.php">Voitures</a>
        </nav>
    </header>
    <main>
        <div class="plan-site hide">
            <p class="hide-1 left-transition">Accueil <span class="red-text">></span> Location voitures de sport, limousine, supercars.</p>
        </div>
        <?php
        $nbtotal= "SELECT COUNT(*) AS nbcars FROM rw_cars";
        $nbcars = $db->query($nbtotal);
        $result = $nbcars->fetchall(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        ?>
        <div class="tittle-main hide">
            <h1 class="red-text hide-1 left-transition">Véhicules à louer</h1>
            <p class="location-voiture hide-2 left-transition">Découvrer notre stock disponible de <span class="red-text number"><?= $row["nbcars"]?></span> voitures</p>
        </div>
        <?php
        }
        ?>
        <div class="filtre hide">
            <div>
                <label class="hide-1" for="marques">Filtrer par marques :</label>
                <select class="hide-1" name="marques" id="marques">
                    <option value="all">Toutes les marques</option>
                    <option value="Alpine">ALpine</option>
                    <option value="Aston">Aston Martine</option>
                    <option value="Audi">Audi</option>
                    <option value="BMW">BMW</option>
                </select><br>
                <label class="hide-1" for="categories">Filtrer par Categories :&nbsp;</label>
                <select class="hide-1" name="categories" id="categories">
                    <option value="collection">Voitures de collections</option>
                    <option value="supercars">Supercars</option>
                    <option value="limousine">Limousine</option>
                </select>
            </div>
            <div class="search">
                <label class="hide-1" for="searchbar">Rechercher :</label>
                <input id="searchbar" type="text" class="searchbar hide-1">
            </div>
        </div>

        <div class="cars-wrapper">
        <?php 
        $allCars= "SELECT * FROM rw_cars AS cars";
        $cars = $db->query($allCars);
        $result = $cars->fetchall(PDO::FETCH_ASSOC);
        foreach ($result as $row) {
        ?>
        
            <div class="car-card hide">

                <div class="image-car hide-1">
                    <img src="<?= $row["Cars_image"]?>" alt="">
                </div>
                <div class="header-car hide-2">
                    <h2 class="red-background"><?= $row["Cars_marque"] ?> <?= $row["Cars_nom"]?></h2>
                    <span class="red-text"><?= $row["Cars_prix"]?>&nbsp;€</span>
                </div>
                <p class="hide-3"><?= $row["Cars_desc"]?></p>
                <div class="bottom-car hide-4">
                    <p><?= $row["Cars_vitesse"]?>&nbsp;Km/h</p>
                    <div class="trait-rouge"></div>
                    <p><?= $row["Cars_ch"]?>&nbsp;Ch</p>
                    <div class="trait-rouge"></div>
                    <p class=" <?= $row["Cars_couleur"]?> "><?= $row["Cars_couleur"]?> </p><a href="voituresinformation.php?id=<?= $row["Cars_id"]?>">Voir plus <span class="sr-only"><?= $row["Cars_nom"]?> <?= $row["Cars_marque"]?></span></a>  
                </div>
            </div>
        <?php
        }
        ?>
        </div>
    </main>
    <footer class="hide">
        <div class="trait"></div>
        <div class="list-footer">
            <div class="contact hide-1">
                <h2><a href="ML.php#contact">Contact</a></h2>
                <p> 2 Rue Albert Einstein,<br> 77420 Champs-sur-Marne</p>
                <p>Tél :07 89 00 09 21</p>
                <p>louis.duhez@gmail.com</p>
            </div>
            <div class="information hide-2">
                <h2 ><a href="ML.php#information">Informations</a></h2>
                <p><a href="ML.php#location">Location</a></p>
                <p><a href="ML.php#tarifs">Tarifs</a></p>
                <p><a href="ML.php#Mentions-légales">Mentions Légales</a></p>
                <p><a href="ML.php#politique">Politique de confidentialité</a></p>
            </div>
            
            <div class="reseaux hide-3">
                <h2>Réseaux sociaux</h2>
                <div class="reseaux-icon">
                    <p><i class="fa-brands fa-instagram"></i></p>
                    <p><i class="fa-brands fa-youtube"></i></p>
                    <p><i class="fa-brands fa-facebook"></i></p>
                </div>
                <div class="plan-site">
                    <a href="ML.php#plan-du-site">Plan du site</a>
                </div>
            </div>
        </div>


    </footer>
    <script src="https://unpkg.com/counterup2@2.0.2/dist/index.js">	</script>
    <script src="allScript.js"></script>
    <script src="filter.js"></script>

</body>
</html>