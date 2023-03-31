
<?php
            include ("../../../../private/database/access_db.php");

            $id_realisation = $_GET["id"];

            $request = "SELECT title, price, image_url FROM realisations WHERE id = $id_realisation";

            $result = $pdo -> query($request);

            $row = $result -> fetch(); 

            $target_dir = "../../../assets/images/created_realisations/";

            $filename = $row["image_url"];

            $target_file = $target_dir . $filename;

            if( isset($_POST["id_realisation"])&&
                isset($_POST["update_btn"])
            ){

                $title = $_POST["title"];
                $price = $_POST["price"];

                if($_FILES["upload_file"]["error"] == 0){
                    $target_dir = "../../../assets/images/created_realisations/";
                    // if(!isset($_FILES["upload_file"]["name"])){
                         $filename = basename($_FILES["upload_file"]["name"]);
                    // }
                    $target_file = $target_dir . $filename;
                    $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                    $allowed_extention = array("jpg", "png", "jfif", "gif");
                    //$request = "INSERT INTO realisations(title, price, image_url, id_artist, registed_date) VALUES(?, ?, ?, 1, CURRENT_DATE)";
                    if(!in_array($imageFileType, $allowed_extention)) {
                        $_POST["err_message"] = "Seuls les fichiers JPG, JFIF, PNG et GIF sont acceptés";
                    } else {
                        if(!file_exists($target_file)){
                            move_uploaded_file(
                                $_FILES["upload_file"]["tmp_name"], 
                                $target_file
                            );
                        } 
                    }
                }
                
                $statement = $pdo -> prepare("UPDATE realisations SET title='$title', price=$price, image_url='$filename' WHERE id=$id_realisation");

                $resu = $statement -> execute();

                header("location:list.php");
            }
        ?>

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

        
        <form method="POST" enctype="multipart/form-data">

            <div class="header_form">
                <span>Realisation update</span>
            </div>

            <div class="body_form">

                <div class="image_area">
                    <div class="image_input"><img id="output" src=<?php echo $target_file ; ?> alt="realisation image"/></div>
                    <span name="err_message"></span>
                    <input type="file" name="upload_file" accept="image/*" class="upload_file_update" onchange="loadFile(event)"/>
                </div>

                <div class="textfield_area">
                    <input type="hidden" name="id_realisation" value=<?php echo $id_realisation; ?>/>
                    <input type="text" name="title" class="input_text" value=<?php echo  $row["title"]; ?> placeholder="Enter a title"/>
                    <input type="number" name="price" step="0.01" class="input_text" value=<?php echo $row["price"] ?> placeholder="Enter a price"/>
                </div>

            </div>

            <div class="footer_form">
                <input type="submit" name="update_btn" value="Update"/>
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