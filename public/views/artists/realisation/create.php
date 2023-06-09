<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/styles/navbar_style.css"/>
    <link rel="stylesheet" href="../../../assets/styles/create_realisation_style.css"/>
    <title>Realisation registment</title>
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
            include "../../../../private/database/access_db.php";
            $query = "SELECT id, name FROM categories WHERE is_active = 1";
            $result = $pdo -> query($query);
        ?>

        <form method="POST" enctype="multipart/form-data" action="../../../../private/services/realisations/create.php">

            <div class="header_form">
                <span>Realisation registment</span>
            </div>

            <div class="body_form">

                <div class="image_area">
                    <div class="image_input"><img id="output" alt="realisation image"/></div>
                    <span name="err_message"></span>
                    <input type="file" name="upload_file" accept="image/*" class="upload_file_create" onchange="loadFile(event)"/>
                </div>

                <div class="textfield_area">
                    <input type="text" name="title" class="input_text" placeholder="Enter a title"/>
                    <select name="categorie_selection" class="input_text">
                        <?php
                            while($row = $result -> fetch()){
                                echo "<option value=" . $row["id"] . ">" . $row["name"] . "</option>";
                            }
                        ?>
                    </select>
                    <input type="number" name="price" step="0.01" class="input_text" placeholder="Enter a price"/>
                </div>

            </div>

            <div class="footer_form">
                <input type="submit" name="register_btn" value="Register"/>
            </div>

        </form>

    </div>

    <script>
        var loadFile = function(event) {
	        var image = document.getElementById('output');
	        image.src = URL.createObjectURL(event.target.files[0]);
        };
    </script>
</body>
</html>