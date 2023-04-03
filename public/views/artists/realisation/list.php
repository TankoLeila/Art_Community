<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/styles/navbar_style.css"/>
    <link rel="stylesheet" href="../../../assets/styles/list_realisation_style.css"/>
    <title>List of realisations</title>
</head>
<body>

    <div class="navbar">
        <div class="navbar_content">
            <a href="../../index.html"> 
                <div class="logo">   
                    <p><span>A</span>C</p>
                </div>
            </a>
            <div class="profile_part">
                <span class="title">Profile</span>
                <img src="../../../assets/images/brunelle.jpg" alt="profile picture" />
                <span class="username">Leila Tanko</span>
                <span class="email">tanko.leila123@gmail.com</span>    
            </div>
            <div class="clientPart">
                <span class="title">Clients</span>
                <a href="#dashboard_client">
                    <div class="dashboard_btn">   
                        <p><span>Dashboard</span></p>
                    </div>
                </a>
            </div>
            <div class="artistPart">
                <span class="title">Artists</span>
                <span class="realisation_title">Realisation</span>
                <div class="realisation_field">
                    <ul>
                        <li><a href="./list.php">List</a></li>
                        <li><a href="./create.php">Create</a></li>
                    </ul>
                </div>
                <a href="#dashboard_artist">
                    <div class="dashboard_btn">   
                        <p><span>Dashboard</span></p>
                    </div>
                </a>
            </div>
        </div>
        <div class="logout_btn">
            <a href="../../login.php">
                <span>Log out</span>
            </a>
        </div>
    </div>

    <div class="container">

        <div class="title-container"><span>My realisations<span></div>
        
        <div class="grid-container">

            <?php
                include "../../../../private/database/access_db.php";

                $requete = "SELECT rea.id, title, image_url, price, registed_date, id_artist, cat.name FROM realisations rea JOIN categories cat ON (rea.id_categorie = cat.id) WHERE rea.is_active = 1 AND cat.is_active = 1";

                $res = $pdo -> query($requete);

                $target_dir = "../../../assets/images/created_realisations/";

                while($row = $res -> fetch()){

                    $target_file = $target_dir . $row["image_url"];

                     echo "<div class=\"item-grid-container\">
                            <div class=\"title-area\"><span>" . $row["title"] . "</span></div>
                            <div class=\"image-area\">
                                <img src=$target_file alt='realisation image'>
                            </div>
                            <div class=\"categorie_name\"><span>". $row["name"] . "</span></div>
                            <div class=\"spec-area\">
                                <span><span>" . $row["price"] . " FCFA</span></span>
                                <span>registed the : <span>" . $row["registed_date"] . "</span></span>
                            </div>
                            <div class=\"update-btn-area\">
                                <button><a href=\"./update.php?id=" . $row["id"] . ";\">Update</a></button>
                            </div>
                        </div>";
                }

            ?>

            <!--<div class='item-grid-container'>

                <div class="title-area"><span>Mon titre</span></div>
                <div class="image-area">
                    <img src="../../../assets/images/chinoise.jpg" alt="realisation image">
                </div>
                <div class="categorie_name"><span>Tableau</span></div>
                <div class="spec-area">
                    <span><span>10000000000000000 FCFA</span></span>
                    <span>registed the : <span>31/10/2022</span></span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">
                
                <div class="title-area"><span>Mon titre</span></div>
                <div class="image-area">
                    <img src="../../../assets/images/fidel.jpg" alt="realisation image">
                </div>
                <div class="spec-area">
                    <span><span>10000000000000000 FCFA</span></span>
                    <span>registed the : <span>31/10/2022</span></span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">
                
                <div class="title-area"><span>Mon titre</span></div>
                <div class="image-area">
                    <img src="../../../assets/images/view.jpg" alt="realisation image">
                </div>
                <div class="spec-area">
                    <span><span>10000000000000000 FCFA</span></span>
                    <span>registed the : <span>31/10/2022</span></span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">
                
                <div class="title-area"><span>Mon titre</span></div>
                <div class="image-area">
                    <img src="../../../assets/images/miror.jpg" alt="realisation image">
                </div>
                <div class="spec-area">
                    <span><span>10000000000000000 FCFA</span></span>
                    <span>registed the : <span>31/10/2022</span></span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">
                
                <div class="title-area"><span>Mon titre</span></div>
                <div class="image-area">
                    <img src="../../../assets/images/TableauArt.jpg" alt="realisation image">
                </div>
                <div class="spec-area">
                    <span><span>10000000000000000 FCFA</span></span>
                    <span>registed the : <span>31/10/2022</span></span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">
                
                <div class="title-area"><span>Mon titre</span></div>
                <div class="image-area">
                    <img src="../../../assets/images/chinoise.jpg" alt="realisation image">
                </div>
                <div class="spec-area">
                    <span><span>10000000000000000 FCFA</span></span>
                    <span>registed the : <span>31/10/2022</span></span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">
                
                <div class="title-area"><span>Mon titre</span></div>
                <div class="image-area">
                    <img src="../../../assets/images/satre.jpg" alt="realisation image">
                </div>
                <div class="spec-area">
                    <span><span>10000000000000000 FCFA</span></span>
                    <span>registed the : <span>31/10/2022</span></span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div> -->

        </div>
    </div>
</body>
</html>