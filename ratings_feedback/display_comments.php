<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit();
}

//$config = include('../../../Mon_projet/config/config.php');
$config = include('../config/config.php');
// Connexion à la base de données
$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Sélection des avis avec une limitation de 5 avis les plus récents approuvés
$sql = "SELECT id, nom AS username, message AS comment, created_at AS timestamp, profile_pic FROM avisusers WHERE is_approved = 1 ORDER BY created_at DESC LIMIT 6";
//$sql = "SELECT id, nom AS username, message AS comment, created_at AS timestamp, profile_pic FROM avisusers WHERE is_approved = 1 ORDER BY created_at DESC";
$result = $conn->query($sql);

$avis = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $row['timestamp'] = (new DateTime($row['timestamp']))->format('d-m-Y H:i:s');//ajouter
        $avis[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrousel d'Avis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"
    type="text/css">

    <style>
        .carousel-item {
            height: 400px; /* Assurez-vous que les items ont une hauteur définie */
        }
        .carousel-item .content-Rating {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .carousel-item img {
            max-height: 100%;
            object-fit: cover;
        }
        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: blue;
            border-radius: 50%;
            padding: 10px;
            height: 35px;
            width: 35px;
        }
        .content-Rating {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            padding: 10px;
            border: 1px solid red;
        }
        .rating {
            border: 1px solid gray;
            border-radius: 15px;
            padding: 10px;
            height: 23.75em;
            /*height: auto;*/
            width: 100%;
            background-color: #ffff;
            box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px,
                        rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;
        }
        .my-profile-img {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .profile-pic {
            border: 1px solid black;
            border-radius: 50%;
            width: 120px;/*80px*/
            height: 120px;/*80px*/
            object-fit: cover;

            display: block;  /* S'assurer que l'image est un bloc */
            margin: auto;  /* Centrer l'image horizontalement */
            align-content: center;
        }
        .profile-name {
            margin-top: 15px;
            margin-bottom: 0;
            font-size: 16px;
            font-weight: 600;
        }
        .avis {
            height: 10.125em;
            border: 1px solid grey;
        }
        blockquote {
            height: auto;
            width: 12.5em;
            padding: 5px;
            margin-bottom: 50px;
            text-align: center;
        }
        /*.art-rtn {
            height: auto;
            font-size: 16px;
            font-weight: normal;
        }*/

        .art-rtn {
            height: auto;
            font-size: 16px;
            font-weight: normal;
            display: -webkit-box;
            -webkit-line-clamp: 3; /* Number of lines to show */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .title-rating {
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        .logo-rtn {
            margin: 0px 5px 0px 0px;
        }
        .rating-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            background: none;
            padding: 0px 0px 0px 0px;
        }
        .btn-rating {
            height: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin: 0px 0px 0px 0px;
            width: 100%;
        }
        .link-btn-Rating {
            margin-top: 20px;
            margin-bottom: 25px;
        }
        .content-rating, .span-box {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 100%;
            word-spacing: 2px;
        }
        .span-box {
            color: red;
            font-family: "Tangerine", Arial, serif;
            font-size: 18px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="content-carousel-2">
        <div class="section-carousel-2">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <?php foreach ($avis as $index => $av): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <div class="content-Rating">
                            <div class="shareRating" data-id="<?php echo htmlspecialchars($av['id']); ?>">
                                <div class="rating">
                                    <div class="my-profile-img">

                                        <div class="profile-pic-wrapper">

                                            <!--<img class="profile-pic" src="<!-?php echo htmlspecialchars($av['profile_pic']); ?>" alt="profile-pic">-->
                                        
                                            <!--?php
                                            $imagePath = '../ratings_feedback/profile_pics/' . htmlspecialchars($av['profile_pic']);

                                            // Debugging: Display the image path
                                            //echo '<p>' . $imagePath . '</p>';
                                            
                                            echo '<img class="profile-pic" src="' . $imagePath . '" alt="Profile Picture">';
                                            ?> -->
                                        
                                        <!--<div class="profile-pic-wrapper">--><!--../ratings_feedback/profile_pics/-->
                                            <img class="profile-pic" src="../profile_pics/<?php echo htmlspecialchars($av['profile_pic']); ?>" alt="Profile Picture">
                                        <!--</div>-->

                                          </div>

                                        <div class="profile-info">
                                            <h3 class="profile-name"><?php echo htmlspecialchars($av['username']); ?></h3>
                                        </div>

                                    </div>
                                    <div class="notice">
                                        <blockquote class="blockquote">
                                            <p class="art-rtn"><?php echo htmlspecialchars($av['comment']); ?></p>
                                        </blockquote>
                                        <div class="content-rating text-center text-dark">
                                            <div class="blockquote-footer mt-2"><?php echo htmlspecialchars($av['timestamp']); ?></div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="next"><!--prev-->
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="prev"><!--next-->
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>                

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!--<script src="../ratings_feedback/scrip.js"></script>-->
    <script src="./scrip.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("JavaScript Loaded");
            $('.carousel').carousel({
                interval: 2000,
                pause: null // Ne pas mettre en pause lors du survol

              });

// Prevent carousel from pausing when mouse enters , Empêcher le carrousel de s’arrêter lorsque la souris entre
$('#carouselExampleFade').on('mouseenter', function () {
    $(this).carousel('cycle');


            });
        });
    </script>

</body>
</html>



<!--?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit();
}

$config = include('../../../Mon_projet/config/config.php');

// Connexion à la base de données
$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, nom AS username, message AS comment, created_at AS timestamp, profile_pic FROM avisusers WHERE is_approved = 1 ORDER BY created_at DESC";
$result = $conn->query($sql);

$avis = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $avis[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrousel d'Avis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .carousel-item {
            height: 400px; /* Assurez-vous que les items ont une hauteur définie */
        }
        .carousel-item .content-Rating {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .carousel-item img {
            max-height: 100%;
            object-fit: cover;
        }
        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: blue;
            border-radius: 50%;
            padding: 10px;
            height: 35px;
            width: 35px;
        }
        .content-Rating {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            padding: 10px;
            border: 1px solid red;
        }
        .rating {
            border: 1px solid gray;
            border-radius: 15px;
            padding: 10px;
            height: 23.75em;
            width: 100%;
            background-color: #ffff;
            box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px,
                        rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;
        }
        .my-profile-img {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .profile-pic {
            border: 1px solid black;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
        .profile-name {
            margin-top: 15px;
            margin-bottom: 0;
            font-size: 16px;
            font-weight: 600;
        }
        .avis {
            height: 10.125em;
            border: 1px solid grey;
        }
        blockquote {
            height: auto;
            width: 12.5em;
            padding: 5px;
            margin-bottom: 50px;
            text-align: center;
        }
        .art-rtn {
            height: auto;
            font-size: 16px;
            font-weight: normal;
        }
        .title-rating {
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        .logo-rtn {
            margin: 0px 5px 0px 0px;
        }
        .rating-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            background: none;
            padding: 0px 0px 0px 0px;
        }
        .btn-rating {
            height: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin: 0px 0px 0px 0px;
            width: 100%;
        }
        .link-btn-Rating {
            margin-top: 20px;
            margin-bottom: 25px;
        }
        .content-rating, .span-box {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 100%;
            word-spacing: 2px;
        }
        .span-box {
            color: red;
            font-family: "Tangerine", Arial, serif;
            font-size: 18px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="content-carousel-2">
        <div class="section-carousel-2">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <!-?php foreach ($avis as $index => $av): ?>
                    <div class="carousel-item <!-?php echo $index === 0 ? 'active' : ''; ?>">
                        <div class="content-Rating">
                            <div class="shareRating" data-id="<!-?php echo htmlspecialchars($av['id']); ?>">
                                <div class="rating">
                                    <div class="my-profile-img">
                                        <div class="profile-pic-wrapper">
                                            <img class="profile-pic" src="<!-?php echo htmlspecialchars($av['profile_pic']); ?>" alt="profile-pic">
                                        </div>
                                        <div class="profile-info">
                                            <h3 class="profile-name"><!-?php echo htmlspecialchars($av['username']); ?></h3>
                                        </div>
                                    </div>
                                    <div class="notice">
                                        <blockquote class="blockquote">
                                            <p class="art-rtn"><!-?php echo htmlspecialchars($av['comment']); ?></p>
                                        </blockquote>
                                        <div class="content-rating text-center text-dark">
                                            <div class="blockquote-footer mt-2"><!-?php echo htmlspecialchars($av['timestamp']); ?></div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../ratings_feedback/scrip.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("JavaScript Loaded");
            $('.carousel').carousel({
                interval: 2000,
                //pause: false // Ne pas mettre en pause lors du survol
                //pause: null // Ne pas mettre en pause lors du survol
                pause: null // Ne pas mettre en pause lors du survol
            });
        });
    </script>

</body>
</html> -->








<!--?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

if (!isset($_SESSION['username'])) {
    header('Location: admin_login.php');
    exit();
}

$config = include('../../../Mon_projet/config/config.php');

// Connexion à la base de données
$servername = $config['db']['host'];
$username = $config['db']['user'];
$password = $config['db']['pass'];
$dbname = $config['db']['dbname'];

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT nom AS username, message AS comment, created_at AS timestamp, profile_pic FROM avisusers WHERE is_approved = 1 ORDER BY created_at DESC";
$result = $conn->query($sql);

$avis = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $avis[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrousel d'Avis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .carousel-item {
            height: 400px; /* Assurez-vous que les items ont une hauteur définie */
        }
        .carousel-item .content-Rating {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .carousel-item img {
            max-height: 100%;
            object-fit: cover;
        }
        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: blue;
            border-radius: 50%;
            padding: 10px;
            height: 35px;
            width: 35px;
        }
        .content-Rating {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            padding: 10px;
            border: 1px solid red;
        }
        .rating {
            border: 1px solid gray;
            border-radius: 15px;
            padding: 10px;
            height: 23.75em;
            width: 100%;
            background-color: #ffff;
            box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px,
                        rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;
        }
        .my-profile-img {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .profile-pic {
            border: 1px solid black;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            object-fit: cover;
        }
        .profile-name {
            margin-top: 15px;
            margin-bottom: 0;
            font-size: 16px;
            font-weight: 600;
        }
        .avis {
            height: 10.125em;
            border: 1px solid grey;
        }
        blockquote {
            height: auto;
            width: 12.5em;
            padding: 5px;
            margin-bottom: 50px;
            text-align: center;
        }
        .art-rtn {
            height: auto;
            font-size: 16px;
            font-weight: normal;
        }
        .title-rating {
            display: flex;
            flex-direction: row;
            align-items: center;
        }
        .logo-rtn {
            margin: 0px 5px 0px 0px;
        }
        .rating-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            background: none;
            padding: 0px 0px 0px 0px;
        }
        .btn-rating {
            height: 100%;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: center;
            margin: 0px 0px 0px 0px;
            width: 100%;
        }
        .link-btn-Rating {
            margin-top: 20px;
            margin-bottom: 25px;
        }
        .content-rating, .span-box {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            width: 100%;
            word-spacing: 2px;
        }
        .span-box {
            color: red;
            font-family: "Tangerine", Arial, serif;
            font-size: 18px;
            font-weight: 700;
        }
    </style>
</head>
<body>
    <div class="content-carousel-2">
        <div class="section-carousel-2">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <!-?php foreach ($avis as $index => $av): ?>
                    <div class="carousel-item <!-?php echo $index === 0 ? 'active' : ''; ?>">
                        <div class="content-Rating">
                            <div class="shareRating" data-id="<!-?php echo htmlspecialchars($av['id']); ?>">
                                <div class="rating">
                                    <div class="my-profile-img">
                                        <div class="profile-pic-wrapper">
                                            <img class="profile-pic" src="<!-?php echo htmlspecialchars($av['profile_pic']); ?>" alt="profile-pic">
                                        </div>
                                        <div class="profile-info">
                                            <h3 class="profile-name"><!-?php echo htmlspecialchars($av['username']); ?></h3>
                                        </div>
                                    </div>
                                    <div class="notice">
                                        <blockquote class="blockquote">
                                            <p class="art-rtn"><!-?php echo htmlspecialchars($av['comment']); ?></p>
                                        </blockquote>
                                        <div class="content-rating text-center text-dark">
                                            <div class="blockquote-footer mt-2"><!-?php echo htmlspecialchars($av['timestamp']); ?></div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-?php endforeach; ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../ratings_feedback/scrip.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("JavaScript Loaded");
            $('.carousel').carousel({
                interval: 2000,
                pause: false // Ne pas mettre en pause lors du survol
            });
        });
    </script>

</body>
</html>


                    -->






<!-------------------------------------------------------------------------------------------------------------------->

<!--<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!--<link rel="stylesheet" href="../styles/avis_style.css">-->  <!--
    <link rel="stylesheet" href="../../styles/avis_style.css">
    <title>Commentaires Approuvés</title>                           -->

    <!-- test -->         <!--
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  </head>
<body>
    <div class="content-carousel-2">
        <div class="section-carousel-2">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">            -->
                    <!--?php
                    // Connexion à la base de données
                    //$config = include('../../config/config_avis.php');
                    $config = include('../../../Mon_projet/config/config.php');
                    $conn = new mysqli($config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['dbname']);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    $sql = "SELECT nom, message, created_at FROM avisusers WHERE is_approved = 1 ORDER BY created_at DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        $active = true;
                        while($row = $result->fetch_assoc()) {
                            $activeClass = $active ? 'active' : '';
                            $active = false;
                            echo "<div class='carousel-item $activeClass'>";
                            echo "<div class='content-Rating'>";
                            echo "<div class='shareRating' data-id='{$row['id']}'>";
                            echo "<div class='rating'>";
                            echo "<div class='my-profile-img'>";
                            echo "<div class='profile-pic-wrapper'>";
                            echo "<img class='profile-pic' src='./images-2/profil1.jpg' alt='profile-pic'>";
                            echo "</div>";
                            echo "<div class='profile-info'>";
                            echo "<h3 class='profile-name'>" . htmlspecialchars($row['nom']) . "</h3>";
                            echo "</div>";
                            echo "</div>";
                            echo "<div class='notice'>";
                            echo "<p></p>";
                            echo "<div class='avis col p-0'>";
                            echo "<blockquote class='blockquote'>";
                            echo "<p class='art-rtn'>" . htmlspecialchars($row['message']) . "</p>";
                            echo "</blockquote>";
                            echo "</div>";
                            echo "<div class='content-rating text-center justify-content-center text-dark'>";
                            echo "<div class='title-rating'></div>";
                            echo "<div class='blockquote-footer text-center mt-2'>" . date('d/m/Y H:i', strtotime($row['created_at'])) . "</div>";
                            echo "</div>";
                            echo "<hr>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                            echo "</div>";
                        }
                    } else {
                        echo "Aucun commentaire approuvé.";
                    }

                    $conn->close();
                    ?>
                    <a href="../../index.html">Retour accueil</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="scripts/script.js"></script>                -->
    <!--<script src="../ratings_feedback/scrip.js"></script>-->        <!--
</body>
</html>
-->
<!------------------------------------------------------------------------------------------------- version utlilisé -->



<!--<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrousel d'Avis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"
    type="text/css">
    
    <style>
        .carousel-item {
            height: 400px; /* Assurez-vous que les items ont une hauteur définie */
        }
        .carousel-item .content-Rating {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .carousel-item img {
            max-height: 100%;
            object-fit: cover;
        }


        /*.carousel-control-prev,  .carousel-control-next {
          background-color: aquamarine;
        }*/
        .carousel-control-prev-icon,  .carousel-control-next-icon {
          background-color:blue;
          border-radius: 50%;
          padding: 10px;
          height: 35px;
          width: 35px;
        }

    </style>

    <style>
        .content-Rating {
          width: 100%;
          display: flex;
          flex-direction: row;
          justify-content: center;
          padding: 10px;

          border: 1px solid red;
        }

        .rating {
          border: 1px solid gray;
          border-radius: 15px;
          padding: 10px;
          height: 23.75em;
          width: 100%;
          background-color: #ffff;
          box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px,
            rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;
        }

        .my-profile-img {
          display: flex;
          flex-direction: column;
          justify-content: center;
          align-items: center;
        }

        /*PHOTO DE PROFIL*/
        .profile-pic {
          border: 1px solid black; 
          /*border-radius: 50%;*/
          border-radius: 50%;
          width: 80px;
          height: 80px;
          object-fit: cover;
        }

        .profile-name {
          margin-top: 15px;
          margin-bottom: 0;
          font-size: 16px;
          font-weight: 600;
        }

        .avis {
          height: 10.125em;
          border: 1px solid grey;
        }

        blockquote {
          height: auto;
          width: 12.5em;
          padding: 5px;
          margin-bottom: 50px;
          text-align: center;
        }

        .art-rtn {
          height: auto;
          font-size: 16px;
          font-weight: normal;
        }

        .title-rating {
          display: flex;
          flex-direction: row;
          align-items: center;
        }

        .logo-rtn {
          margin: 0px 5px 0px 0px;
        }

        /*-- BOUTON DE LIEN ANCRE CARTE AVIS --*/
        .rating-box {
          display: flex;
          flex-direction: column;
          align-items: center;

          position: relative;
          background: none;
          padding: 0px 0px 0px 0px;
        }

        .btn-rating {
          height: 100%;
          display: flex;
          flex-direction: row;
          align-items: center;
          justify-content: center;
          margin: 0px 0px 0px 0px;
          width: 100%;
        }

        /*-- BOUTON DE LIEN ANCRE CARTE AVIS --*/
        .link-btn-Rating {
          margin-top: 20px;
          margin-bottom: 25px;
        }

        /*<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<*/
        .content-rating,
        .span-box {
          /*.span-grid*/
          display: flex;
          flex-direction: row;
          justify-content: center;
          align-items: center;
          width: 100%; /*100%*/
          word-spacing: 2px;
        }

        .span-box {
          color: red;
          font-family: "Tangerine", Arial, serif; /* Typo pour le Titre, et typo de substitution */
          font-size: 18px;
          font-weight: 700;
        }
    </style>
                    -->
    <!--<script>
      window.onload = function () {
  slideOne();
  slideTwo();
};

let sliderOne = document.getElementById("slider-1");
let sliderTwo = document.getElementById("slider-2");
let displayValOne = document.getElementById("range1");
let displayValTwo = document.getElementById("range2");
let minGap = 0;
let sliderTrack = document.querySelector(".slider-track");
let sliderMaxValue = document.getElementById("slider-1").max;

function slideOne() {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
    sliderOne.value = parseInt(sliderTwo.value) - minGap;
  }
  displayValOne.textContent = sliderOne.value;
  fillColor();
}
function slideTwo() {
  if (parseInt(sliderTwo.value) - parseInt(sliderOne.value) <= minGap) {
    sliderTwo.value = parseInt(sliderOne.value) + minGap;
  }
  displayValTwo.textContent = sliderTwo.value;
  fillColor();
}
function fillColor() {
  percent1 = (sliderOne.value / sliderMaxValue) * 100;
  percent2 = (sliderTwo.value / sliderMaxValue) * 100;
  sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;
  /*sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #d9777f ${percent1}% , #d9777f ${percent2}%, #dadae5 ${percent2}%)`;*/
}
/*---------------------------------------------------------------------------------------------------------------------*/
/*-- RANGE SLIDER 2 --*/
window.onload = function () {
  slideTre();
  slideFor();
};/**/

let sliderTre = document.getElementById("slider-3");
let sliderFor = document.getElementById("slider-4");
let displayValTre = document.getElementById("range3");
let displayValFor = document.getElementById("range4");
let minGap = 0;
let sliderTrack = document.querySelector(".slider-track2");
let sliderMaxValue = document.getElementById("slider-3").max;

function slideTre() {
  if (parseInt(sliderTre.value) - parseInt(sliderTre.value) <= minGap) {
    sliderTre.value = parseInt(sliderFor.value) - minGap;
  }
  displayValTre.textContent = sliderTre.value;
  fillColor();
}
function slideFor() {
  if (parseInt(sliderTre.value) - parseInt(sliderTre.value) <= minGap) {
    sliderFor.value = parseInt(sliderTre.value) + minGap;
  }
  displayValFor.textContent = sliderFor.value;
  fillColor();
}
function fillColor() {
  percent1 = (sliderTre.value / sliderMaxValue) * 100;
  percent2 = (sliderFor.value / sliderMaxValue) * 100;
  /*sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;*/
 sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #d9777f ${percent1}% , #d9777f ${percent2}%, #dadae5 ${percent2}%)`;
}
/*---------------------------------------------------------------------------------------------------------------------*/
/*-- RANGE SLIDER 3 --*/
window.onload = function () {
  slideFiv();
  slideSix();
};/**/

let sliderFiv = document3.getElementById("slider-5");
let sliderSix = document3.getElementById("slider-6");
let displayValFiv = document3.getElementById("range5");
let displayValSix = document3.getElementById("range6");
let minGap = 0;
let sliderTrack3 = document3.querySelector(".slider-track3");
let sliderMaxValue = document3.getElementById("slider-5").max;

function slideFiv() {
  if (parseInt(sliderTre.value) - parseInt(sliderFiv.value) <= minGap) {
    sliderFiv.value = parseInt(sliderSix.value) - minGap;
  }
  displayValFiv.textContent = sliderFiv.value;
  fillColor();
}
function slideSix() {
  if (parseInt(sliderFiv.value) - parseInt(sliderFiv.value) <= minGap) {
    sliderSix.value = parseInt(sliderFiv.value) + minGap;
  }
  displayValSix.textContent = sliderSix.value;
  fillColor();
}
function fillColor() {
  percent1 = (sliderFiv.value / sliderMaxValue) * 100;
  percent2 = (sliderSix.value / sliderMaxValue) * 100;
  /*sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #3264fe ${percent1}% , #3264fe ${percent2}%, #dadae5 ${percent2}%)`;*/
 sliderTrack.style.background = `linear-gradient(to right, #dadae5 ${percent1}% , #d9777f ${percent1}% , #d9777f ${percent2}%, #dadae5 ${percent2}%)`;
}
    </script>-->
<!--
</head>
<body>
    <div class="content-carousel-2">
        <div class="section-carousel-2">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="content-Rating">
                            <div class="shareRating" data-id="44654">
                                <div class="rating">
                                    <div class="my-profile-img">
                                        <div class="profile-pic-wrapper"> 
                                            <img class="profile-pic" src="./images-2/profil1.jpg" alt="profile-pic"> -->
                                            <!--<img class="profile-pic" src="<!-?php echo htmlspecialchars($av['profile_pic']); ?>" alt="profile-pic">-->
                                          <!--</div>
                                        <div class="profile-info">
                                            <h3 class="profile-name">John Doe</h3> -->
                                            <!--<h3 class="profile-name"><!-?php echo htmlspecialchars($av['username']); ?></h3>--> <!--
                                        </div>
                                    </div>
                                    <div class="notice">
                                        <blockquote class="blockquote">
                                           <p class="art-rtn">Très bon service, je recommande</p> -->
                                             <!--<p class="art-rtn"><!-?php echo htmlspecialchars($av['comment']); ?></p>--> <!--
                                        </blockquote>
                                        <div class="content-rating text-center text-dark">
                                            <div class="blockquote-footer mt-2">Il y a 20 minutes</div> -->
                                            <!--<div class="blockquote-footer mt-2"><!-?php echo htmlspecialchars($av['timestamp']); ?></div>--> <!--
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="content-Rating">
                            <div class="shareRating" data-id="44654">
                                <div class="rating">
                                    <div class="my-profile-img">
                                        <div class="profile-pic-wrapper">
                                            <img class="profile-pic" src="./images-2/profil2.jpg" alt="profile-pic">
                                        </div>
                                        <div class="profile-info">
                                            <h3 class="profile-name">Jane Doe</h3>
                                        </div>
                                    </div>
                                    <div class="notice">
                                        <blockquote class="blockquote">
                                            <p class="art-rtn">Service de qualité, très satisfait.</p>
                                        </blockquote>
                                        <div class="content-rating text-center text-dark">
                                            <div class="blockquote-footer mt-2">Il y a 10 minutes</div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="content-Rating">
                            <div class="shareRating" data-id="44654">
                                <div class="rating">
                                    <div class="my-profile-img">
                                        <div class="profile-pic-wrapper">
                                            <img class="profile-pic" src="./images-2/profil3.jpg" alt="profile-pic">
                                        </div>
                                        <div class="profile-info">
                                            <h3 class="profile-name">Alex Doe</h3>
                                        </div>
                                    </div>
                                    <div class="notice">
                                        <blockquote class="blockquote">
                                            <p class="art-rtn">Je recommande fortement ce service.</p>
                                        </blockquote>
                                        <div class="content-rating text-center text-dark">
                                            <div class="blockquote-footer mt-2">Il y a 5 minutes</div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>                
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>


            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  -->
    <!--<script src="scripts/script.js"></script>-->  <!--
    <script src="../ratings_feedback/scrip.js"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("JavaScript Loaded");
            $('.carousel').carousel({
                interval: 2000,
                pause: false // Ne pas mettre en pause lors du survol

            });
        });
    </script>
                    -->



<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>-->

  <!-- POPPER BOOTSTRAP -->
  <!--<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
    crossorigin="anonymous"></script>-->

  <!-- JS BOUTSTRAP -->
  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
    crossorigin="anonymous"></script>-->

  <!-- DERNIERE VERSION -->

  <!--============================================ BOOTSTRAP CAROUSEL TEST ========================================-->
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS --><!--
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>-->

  <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>-->


</body>
</html>

<!-------------------------------------------------------------------------------------------------------- version 2 -->

<!--?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "G1i9e6t3";
$dbname = "site_papillons";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

//$sql = "SELECT username, comment, timestamp, profile_pic FROM avis ORDER BY timestamp DESC";
$sql = "SELECT nom, message, timestamp, profile_pic FROM avisusers ORDER BY timestamp DESC";
$result = $conn->query($sql);

$avis = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $avis[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrousel d'Avis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .carousel-item {
            height: 400px; /* Assurez-vous que les items ont une hauteur définie */
        }
        .carousel-item .content-Rating {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .carousel-item img {
            max-height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <div class="content-carousel-2">
        <div class="section-carousel-2">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner"> -->
                    <!--?php
                    $active = true;
                    foreach ($avis as $av) {
                        ?>
                        <div class="carousel-item <!-?php if ($active) { echo 'active'; $active = false; } ?>">
                            <div class="content-Rating">
                                <div class="shareRating">
                                    <div class="rating">
                                        <div class="my-profile-img">
                                            <div class="profile-pic-wrapper"> -->
                                                <!--<img class="profile-pic" src="<!-?php echo htmlspecialchars($av['profile_pic']); ?>" alt="profile-pic">--> <!--
                                                <img class="profile-pic" src="<!-?php echo htmlspecialchars($av['profile_pic']); ?>" alt="profile-pic">
                                              </div>
                                            <div class="profile-info">  -->
                                                <!--<h3 class="profile-name"><!-?php echo htmlspecialchars($av['username']); ?></h3>-->  <!--
                                                <h3 class="profile-name"><!-?php echo htmlspecialchars($av['nom']); ?></h3>
                                              </div>
                                        </div>
                                        <div class="notice">
                                            <blockquote class="blockquote">   -->
                                                <!--<p class="art-rtn"><!-?php echo htmlspecialchars($av['comment']); ?></p>-->   <!--
                                                <p class="art-rtn"><!-?php echo htmlspecialchars($av['message']); ?></p>
                                              </blockquote>
                                            <div class="content-rating text-center text-dark">  -->
                                                <!--<div class="blockquote-footer mt-2"><!-?php echo htmlspecialchars($av['timestamp']); ?></div>-->  <!--
                                                <div class="blockquote-footer mt-2"><!-?php echo htmlspecialchars($av['created_at']); ?></div>
                                              </div>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  <
                        <!-?php
                    }
                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.carousel').carousel({
                interval: 2000,
                pause: false // Ne pas mettre en pause lors du survol
            });
        });
    </script>
</body>
</html>
      -->
<!-------------------------------------------------------------------------------------------------------- version 3 -->
<!--
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrousel d'Avis</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .carousel-item {
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .carousel-item img {
            max-height: 100%;
            object-fit: cover;
        }
        .content-Rating {
            width: 100%;
            display: flex;
            flex-direction: row;
            justify-content: center;
            padding: 0 10px; /* Ajustez le padding */
        }
        .carousel-control-prev,
        .carousel-control-next {
            width: 5%; /* Ajustez la largeur des contrôles si nécessaire */
        }
        .rating {
            border: 1px solid gray;
            border-radius: 15px;
            padding: 10px;
            height: 23.75em;
            width: 100%;
            background-color: #ffff;
            box-shadow: rgba(50, 50, 105, 0.15) 0px 2px 5px 0px, rgba(0, 0, 0, 0.05) 0px 1px 1px 0px;
        }
        /* Autres styles */
    </style>
</head>
<body>
    <div class="content-carousel-2">
        <div class="section-carousel-2">
            <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                <div class="carousel-inner">  -->
                    <!-- Carousel items -->  <!--
                    <div class="carousel-item active">
                        <div class="content-Rating">
                            <div class="shareRating" data-id="44654">
                                <div class="rating">
                                    <div class="my-profile-img">
                                        <div class="profile-pic-wrapper">
                                            <img class="profile-pic" src="./images-2/profil1.jpg" alt="profile-pic">
                                        </div>
                                        <div class="profile-info">
                                            <h3 class="profile-name">John Doe</h3>
                                        </div>
                                    </div>
                                    <div class="notice">
                                        <blockquote class="blockquote">
                                            <p class="art-rtn">Très bon service, je recommande</p>
                                        </blockquote>
                                        <div class="content-rating text-center text-dark">
                                            <div class="blockquote-footer mt-2">Il y a 20 minutes</div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  -->
                    <!-- Autres slides -->  <!--
                </div>
                <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            $('.carousel').carousel({
                interval: 2000,
                pause: false
            });
        });
    </script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("JavaScript Loaded");
            $('.carousel').carousel({
                interval: 2000,
                pause: false
            });
        });
    </script>

</body>
</html> -->

<!--------------------------------------------------------------------------------------------------------------------->



