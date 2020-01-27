<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'includes/navbar.php'; ?>
<style type="text/css">
    .container2 {
        position: absolute;
        top: 36%;
        left: 10%;
    }

    .container3 {
        position: absolute;
        top: 36%;
        left: 10%;
    }
</style>

<body class="hold-transition skin-blue layout-top-nav">

    <div class="wrapper">

        <div class="content-wrapper">

            <div class="container-fluid">

                <div class="content">

                    <div class="text-center" style="margin-top: -20px">
                        <h1 class="mens" style="padding: 20px">Thank You So Much For Purchasing</h1>

                        <link href='https://fonts.googleapis.com/css?family=Lato|Roboto:400,900' rel='stylesheet' type='text/css'>
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="container3">
                                    <a href="index.php" class="btn">
                                        <svg width="277" height="62">
                                            <defs>
                                                <linearGradient id="grad1">
                                                    <stop offset="0%" stop-color="#FF8282" />
                                                    <stop offset="100%" stop-color="#E178ED" />
                                                </linearGradient>
                                            </defs>
                                            <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
                                        </svg>
                                        <!--<span>Voir mes réalisations</span>-->
                                        <span>Continue Shopping</span>
                                    </a>

                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="container2">
                                    <a href="orders.php" class="btn">
                                        <svg width="277" height="62">
                                            <defs>
                                                <linearGradient id="grad1">
                                                    <stop offset="0%" stop-color="#FF8282" />
                                                    <stop offset="100%" stop-color="#E178ED" />
                                                </linearGradient>
                                            </defs>
                                            <rect x="5" y="5" rx="25" fill="none" stroke="url(#grad1)" width="266" height="50"></rect>
                                        </svg>
                                        <!--<span>Voir mes réalisations</span>-->
                                        <span>View Orders</span>
                                    </a>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>

    <?php include 'includes/scripts.php'; ?>

</body>