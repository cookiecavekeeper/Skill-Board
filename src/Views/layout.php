<!doctype html>
<html lang="de">
<head>
    <title>Skill-Board</title>
    <base href="<?=App::getBaseUrl() ?>"/>

    <!-- Meta tags-->
    <meta charset="UTF-8">
    <meta name="author" content="Skill-Board AG"/>
    <meta name="distributor" content="Skill-Board AG"/>
    <meta name="description" content="Skill-Board Projekt"/>
    <meta name="keywords" content="Skills, IT, information engineer, skill-board, skill"/>
    <meta name="copyright" content="&copy;2014 Skill-Board"/>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo.png">
    <link rel="apple-touch-icon" href="assets/images/logo.png">

    <!-- Robots -->
    <meta name="googlebot" content="all"/>
    <meta name="robots" content="all"/>

    <!-- Icons -->
    <!--This is a duplicate
    <link rel="shortcut icon" href="img/icons/favicon/favicon.png">
    <link rel="apple-touch-icon" href="img/icons/appleTouch/apple-touch-icon.png">
    -->

    <!-- CSS -->
    <link rel="stylesheet" media="all" href="assets/css/style.css">
    <link rel="stylesheet" media="all" href="assets/css/bootstrap.min.css">

    <!-- JavaScript -->
    <script src="assets/javascript/jquery.min.js"></script>
    <script type="text/javascript" src="assets/javascript/bootstrap.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="navbar-brand" style="color:white;">Skill-Board</div>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="">Home</a></li>
                    <li><a href="profile">Mein Profil</a></li>
                    <li><a href="search">Suche</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div><!-- Flashes -->
            <?php if(!empty($flashes = $this->flashes('error'))): ?>
                <div class="alert alert-danger" role="alert" style="position: fixed;">
                    <?= implode('<br/>', $flashes); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&nbsp;&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if(!empty($flashes = $this->flashes('info'))): ?>
                <div class="alert alert-info" role="alert" style="position: fixed;">
                    <?= implode('<br/>', $flashes); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&nbsp;&times;</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php $this->yieldView(); // Render Page Content ?>

</body>
</html>
