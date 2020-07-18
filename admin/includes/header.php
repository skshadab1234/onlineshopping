<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="../images/favicon.jpg" rel="icon">

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <style type="text/css">
        /* width */
        ::-webkit-scrollbar {
            width: 6px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px white;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: grey;
            border-radius: 10px;
        }

        .content-wrapper {
            background: #fafafa;
        }

        .skin-blue .sidebar-menu>li.header {
            background: #e1e1e1;
        }

        #modal-adding button {
            background: none;
            padding: 10px;
            color:#5909b3;
            border: 1px solid #5909b3;
            margin-left:30px;
        }

        #modal-adding button:hover{
            background: #5909b3;
            color: #fff;    
        }

        #modal-adding span,i{
            font-size: 16px;
            padding: 3px; 
        }

        .skin-blue .sidebar-menu>li:hover>a,
        .skin-blue .sidebar-menu>li.active>a,
        .skin-blue .sidebar-menu>li.menu-open>a {
            background: #6201ed;
        }

        .skin-blue .sidebar-menu .treeview-menu>li>a {
            background: #6201ed;
        }

        .skin-blue .sidebar-menu>li>.treeview-menu {
            background: #6201ed;
        }

        .close {
            color: white;
        }

        .box {
            box-shadow: 5px 11px 23px 3px #e5e5e5;
            border: none;
            border-radius: 5px;
        }

        .box:hover {
            transform: scale(1.01);
            transition: transform, 0.2s ease-out;
        }

        .breadcrumb {
            color: #010101
        }

        .skin-blue .main-header .navbar .sidebar-toggle:hover {
            background: none;
        }

        .btn {
            overflow: hidden;
            position: relative;
            -webkit-transition-duration: 0.4s;
            /* Safari */
            transition-duration: 0.4s;
            text-decoration: none;
            outline: none;
        }

        .btn:after {
            content: "";
            background: #90EE90;
            display: block;
            position: absolute;
            padding-top: 300%;
            padding-left: 350%;
            margin-left: -20px !important;
            margin-top: -120%;
            opacity: 0;
            transition: all 0.8s
        }

        .btn:active:after {
            padding: 0;
            margin: 0;
            opacity: 1;
            transition: 0s
        }

        th,
        td {
            text-align: center;
        }

        input[type=text],
        input[type=number],
        input[type=password],
        input[type=email] {
            background: none;
            border: none;
            color: white;
            letter-spacing: 1px;
            border-bottom: 1px solid #663355;
        }

        #address {
            background: red;
        }

        .input-group .form-control:last-child,
        .input-group-addon:last-child,
        .input-group-btn:first-child>.btn-group:not(:first-child)>.btn,
        .input-group-btn:first-child>.btn:not(:first-child),
        .input-group-btn:last-child>.btn,
        .input-group-btn:last-child>.btn-group>.btn,
        .input-group-btn:last-child>.dropdown-toggle {
            color: #323232;
        }

        .modal.fade {
            backdrop-filter: blur(5px);
        }

        .btn:hover {
            transform: scale(1.04);
            transition: 0.5s ease-in-out
        }

        .modal-content {
            background-image: linear-gradient(254deg, #5909b3, #7f0dff);
            border-radius: 5px;
        }

        .btn-default {
            background: none;
            color: white;
        }

        .modal-header {
            color: white;
        }

        .modal-body {
            color: white;
        }

        .mt20 {
            margin-top: 20px;
        }

        .bold {
            font-weight: bold;
        }

        /*chart style*/
        #legend ul {
            list-style: none;
        }

        #legend ul li {
            display: inline;
            padding-left: 30px;
            position: relative;
            border-radius: 5px;
            padding: 2px 8px 2px 28px;
            font-size: 14px;
            cursor: default;
            -webkit-transition: background-color 200ms ease-in-out;
            -moz-transition: background-color 200ms ease-in-out;
            -o-transition: background-color 200ms ease-in-out;
            transition: background-color 200ms ease-in-out;
        }

        #legend li span {
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 20px;
            height: 100%;
            border-radius: 5px;
        }

        #a-plus {
            position: fixed;
            bottom: 50px;
            right: 30px;
            background: #fff;
            padding: 20px;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            box-sizing: content-box;
            box-shadow: 5px 15px 10px 0px #eee;
        }

        #a-plus i {
            position: absolute;
            top: 30%;
            left: 33%;
            font-size: 29px;
            background: -webkit-linear-gradient(hotpink, steelblue);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .small-box:hover {
            transform: scale(1.03);
            transition: transform, 0.5s ease-in-out;
        }

        #dropdown-arrow:after {
            content: "";
            position: absolute;
            top: -14px;
            right: 3px;
            border-top: none;
            border-left: 15px solid transparent;
            border-right: 15px solid transparent;
            border-bottom: 15px solid #2a2440;
        }

        @media (max-width: 991px) {
            .content-header>.breadcrumb {
                background: none;
            }
        }

        html.modal-active, body.modal-active {
  overflow: hidden;
}

#modal-container {
  position: fixed;
  display: table;
  height: 100%;
  width: 100%;
  top: 0;
  left: 0;
  transform: scale(0);
  z-index: 1;
}
#modal-container.one {
  transform: scaleY(0.01) scaleX(0);
  animation: unfoldIn 1s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.one .modal-background .modal {
  transform: scale(0);
  animation: zoomIn 0.5s 0.8s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.one.out {
  transform: scale(1);
  animation: unfoldOut 1s 0.3s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.one.out .modal-background .modal {
  animation: zoomOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two {
  transform: scale(1);
}
#modal-container.two .modal-background {
  background: rgba(0, 0, 0, 0);
  animation: fadeIn 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two .modal-background .modal {
  opacity: 0;
  animation: scaleUp 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two + .content {
  animation: scaleBack 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two.out {
  animation: quickScaleDown 0s .5s linear forwards;
}
#modal-container.two.out .modal-background {
  animation: fadeOut 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two.out .modal-background .modal {
  animation: scaleDown 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
#modal-container.two.out + .content {
  animation: scaleForward 0.5s cubic-bezier(0.165, 0.84, 0.44, 1) forwards;
}
    </style>
</head>