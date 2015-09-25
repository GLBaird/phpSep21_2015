</head>

<body>

    <header>
        <h1><?php echo $pageTitle; ?></h1>
        <p><?php echo $pageSubtitle; ?></p>
        <?php
        if (isset($_SESSION["userLoggedIn"]) && $_SESSION["userLoggedIn"] === true) {
            $filename = "uploads/".$_SESSION["username"];
            if ( file_exists($filename) ) {
                echo "<div class='avatar' style='background-image:url(\"$filename\");' >";
            } else {
                echo "<div class='avatar' style='background-image:url(\"images/User-100.png\");' >";
            }
        }
        ?>
    </header>
    
    <?php require("html-menu.php");  ?>
    
    <main>