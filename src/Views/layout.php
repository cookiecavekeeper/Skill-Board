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
    <link rel="shortcut icon" href="img/icons/favicon/favicon.png">
    <link rel="apple-touch-icon" href="img/icons/appleTouch/apple-touch-icon.png">

    <!-- CSS -->
    <link rel="stylesheet" media="all" href="assets/css/style.css">
    <link rel="stylesheet" media="all" href="assets/css/bootstrap.min.css">

    <!-- JavaScript -->
    <script src="assets/javascript/jquery.min.js"></script>
    <script type="text/javascript" src="assets/javascript/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/javascript/bluring.js"></script>
</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href=""><span class="glyphicon glyphicon-"></span>Skill-Board</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="">Home</a></li>
                    <li><a href="search">Suche</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="profile">Profil</a></li>
                            <li class="divider"></li>
                            <li><a href="logout">Abmelden</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container">
        <div><!-- Flashes -->
            <?php if(!empty($flashes = $this->flashes('error'))): ?>
                <div class="alert alert-danger" role="alert">
                    <?php foreach($flashes as $flash): ?>
                        <?=$flash ?><br/>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <?php if(!empty($flashes = $this->flashes('info'))): ?>
                <div class="alert alert-info" role="alert">
                    <?php foreach($flashes as $flash): ?>
                        <?=$flash ?><br/>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
        <?php $this->yieldView(); // Render Page Content ?>
    </div>

</body>
</html>
