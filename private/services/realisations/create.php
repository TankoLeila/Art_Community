<?php
            include ("../../database/access_db.php");

            $err_message = "";

            if( isset($_POST["register_btn"]) &&
                isset($_FILES["upload_file"])
            ){

                $title = $_POST["title"];
                $categorie = $_POST["categorie_selection"];
                $price = $_POST["price"];

                $target_dir = "../../../public/assets/images/created_realisations/";
                $filename = basename($_FILES["upload_file"]["name"]);
                $target_file = $target_dir . $filename;
                $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $allowed_extention = array("jpg", "png", "jfif", "gif");
                //$request = "INSERT INTO realisations(title, price, image_url, id_artist, registed_date) VALUES(?, ?, ?, 1, CURRENT_DATE)";
                if(!in_array($imageFileType, $allowed_extention)) {
                    $_POST["err_message"] = "Seuls les fichiers JPG, JFIF, PNG et GIF sont acceptés";
                } else {
                    $statement = $pdo -> prepare("INSERT INTO realisations(title, price, image_url, id_artist, id_categorie,registed_date) VALUES(?, ?, ?, 1, ?, CURRENT_DATE)");

                    $res = $statement -> execute([$title, $price, $filename, $categorie]);

                    if($res && !file_exists($target_file)){
                        move_uploaded_file(
                            $_FILES["upload_file"]["tmp_name"], 
                            $target_file
                        );
                    } 
                }
            }
    header("location:../../../public/views/artists/realisation/list.php");
?>