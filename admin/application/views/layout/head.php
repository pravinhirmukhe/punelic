<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <link rel="shortcut icon" href="<?php echo SITEURL; ?>assets/admin/favicon.png" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>LACACO | <?= $title ?> </title>

    <!-- Bootstrap core CSS -->

    <link href="<?= BASEURL ?>assets/admin/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?= BASEURL ?>assets/admin/fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>assets/admin/css/animate.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>assets/admin/css/fileinput.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?= BASEURL ?>assets/admin/css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= BASEURL ?>assets/admin/css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="<?= BASEURL ?>assets/admin/css/icheck/flat/green.css" rel="stylesheet" />
    <link href="<?= BASEURL ?>assets/admin/css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="<?= BASEURL ?>assets/admin/js/jquery.min.js"></script>
    <link href="<?= BASEURL ?>assets/admin/css/icheck/flat/green.css" rel="stylesheet">
    <link href="<?= BASEURL ?>assets/admin/css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
    <script>
        webshims.setOptions('forms-ext', {types: 'date'});
        webshims.polyfill('forms forms-ext');
        webshims.formcfg = {
            en: {
                dFormat: '-',
                dateSigns: '-',
                patterns: {
                    d: "yy-mm-dd"
                }
            }
        };
        webshims.activeLang('en');
    </script>
    <script type="text/javascript">
        var site_url = '<?= SITEURL ?>';
    </script>

<!--<script src="<?//=  BASEURL?>assets/admin/js/jquery.min.js"></script>-->
<!--    <script>
    NProgress.start();
</script>-->

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>