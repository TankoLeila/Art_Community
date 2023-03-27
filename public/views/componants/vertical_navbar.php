<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../../assets/styles/navbar_style.css"/>
</head>
<body>
        <header class="topbar"></header>
        <div class="navbar">
            <div class="navbar_content">
                <a href="../index.html"> 
                    <div class="logo">   
                        <p><span>A</span>C</p>
                    </div>
                </a>
                <div class="profile_part">
                    <span class="title">Profile</span>
                    <img src="../../assets/images/brunelle.jpg" alt="profile picture" />
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
                            <li><a href="#realisation_list">List</a></li>
                            <li><a href="../artists/create.php">Create</a></li>
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
                <a href="../login.php">
                    <span>Log out</span>
                </a>
            </div>
        </div>
    
</body>
</html>