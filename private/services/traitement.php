<?php


            if(isset($_POST["register_btn"]) && isset($_FILES["upload_file"])){
                
                echo "<pre>";
                print_r($_FILES["upload_file"]);
                echo "</pre>";
            }
?>