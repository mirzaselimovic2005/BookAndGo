<?php
        session_start();
        include_once("../includes/connect.php")
        ?>
        <?php
        $msg = "";
        if (isset($_POST['submitBtnLogin'])) {
            $username = trim($_POST['username']);
            $password = trim($_POST['password']);
            if ($username != "" && $password != "") {
                try {
                    $query = "select * from `users` where `username`=:username and `password`=:password";
                    $stmt = $conn->prepare($query);
                    $stmt->bindParam('username', $username, PDO::PARAM_STR);
                    $stmt->bindValue('password', $password, PDO::PARAM_STR);
                    $stmt->execute();
                    $count = $stmt->rowCount();
                    $row   = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($count == 1 && !empty($row)) {

                        $_SESSION['sess_user_id']   = $row['id'];
                        $_SESSION['sess_user_name'] = $row['username'];
                        $_SESSION['sess_name'] = $row['name'];
                        header('location:dashboard.php');
                    } else {
                        header('location:account.php');
                    }
                } catch (PDOException $e) {
                    echo "Error : " . $e->getMessage();
                }
            } else{
                echo "
                    <script>alert('Alles invullen!')</script>
                    <script>window.location = 'account.php'</script>
                ";
            }
        }
        ?>
=======
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <title>Book And Go</title>
</head>

<body>
    <main>
        <div class="header-img" src="../media/oldbackground.jpg" alt="Snow" style="width:100%;">
            <div class="slideshow-container">
                <div class="mySlides fade">
                    <img src="../media/vacationpicture1.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="../media/vacationpicture2.jpg" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <img src="../media/vacationpicture3.jpg" style="width:100%">
                </div>
            </div>
            <div style="text-align:center">
                <span class="dot"></span>
                <span class="dot"></span>
                <span class="dot"></span>
            </div>
        </div>
        <br>
        <div class="top-center">


            <div class="header">
                
                <div class="dropdown">
                    <a href="../main/inloggen.php" class="dropbtn">Inloggen</a>
                    <div class="dropdown-content">
                        <a href="../main/mijnaccount.php">Mijn Account</a>
                    </div>
                </div>
                <a class="Header-links" href="../main/locaties.php">Locaties</a>
                <a href="index.php"><img class="Header-Logo" src="../media/BookAndGoLogo.jpg" alt="Logo bookandgo"></a>
                <a class="Header-links" href="../main/over_ons.php">Over ons</a>
                <a class="Header-links" href="../main/contact.php">Contact</a>
            </div>
</main>
<script src="../js/main.js"></script>
</html>