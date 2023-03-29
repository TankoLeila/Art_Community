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

        <?php
            include "../../../../private/database/access_db.php"
        ?>
        
        <div class="grid-container">

            <div class="item-grid-container">

                <div class="image-area">
                    <img src="../../../assets/images/chinoise.jpg" alt="realisation image">
                </div>
                <div class="date-area">
                    <span>enregistrée le 31/10/2022</span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">

                <div class="image-area">
                    <img src="../../../assets/images/fidel.jpg" alt="realisation image">
                </div>
                <div class="date-area">
                    <span>enregistrée le 31/10/2022</span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">

                <div class="image-area">
                    <img src="../../../assets/images/view.jpg" alt="realisation image">
                </div>
                <div class="date-area">
                    <span>enregistrée le 31/10/2022</span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">

                <div class="image-area">
                    <img src="../../../assets/images/miror.jpg" alt="realisation image">
                </div>
                <div class="date-area">
                    <span>enregistrée le 31/10/2022</span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">

                <div class="image-area">
                    <img src="../../../assets/images/TableauArt.jpg" alt="realisation image">
                </div>
                <div class="date-area">
                    <span>enregistrée le 31/10/2022</span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">

                <div class="image-area">
                    <img src="../../../assets/images/chinoise.jpg" alt="realisation image">
                </div>
                <div class="date-area">
                    <span>enregistrée le 31/10/2022</span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

            <div class="item-grid-container">

                <div class="image-area">
                    <img src="../../../assets/images/satre.jpg" alt="realisation image">
                </div>
                <div class="date-area">
                    <span>enregistrée le 31/10/2022</span>
                </div>
                <div class="update-btn-area">
                    <button><a href="#update">Update</a></button>
                </div>

            </div>

        </div>
    </div>
</body>
</html>