<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  	<title>SHADABZONE</title>

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
  box-shadow: inset 0 0 5px white ;
}

/* Handle */
::-webkit-scrollbar-thumb {
  background: grey;
  border-radius: 10px;
}
  		.content-wrapper{
box-shadow: 0px 8px 60px -10px rgba(13, 28, 39, 0.6);   
  background:#150d2d;
  }
  .close{
    color: white;
  }

     .box{
      border-radius: 3px;
      color: white;
      border: 1px solid white;
      background: none;
     }
     th, td{
      text-align: center;
     }

     input[type=text], input[type=number],  input[type=password], input[type=email]{
      background: none;
      border: none;
       color: white;
       letter-spacing: 1px;
      border-bottom: 1px solid #663355;
     }

     #address{
      background: red;
     }

 
      .btn-success, #quickview, .btn-danger, .btn-primaary  {
      background: #7f0dff;
      background-image: linear-gradient(253deg, rgb(89, 9, 179), rgb(127, 13, 255));
      color: #ffffff;
    cursor: pointer;
    border: 0.25rem;
    padding: 0 18px;
    max-width: 150px;
    min-width: 136px;
    font-size: 14px;
    min-height: 40px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
    background: #7f0dff;
    font-weight: 500;
    font-family: "Rubik", sans-serif;
    margin-right: 10px;
    text-transform: capitalize;
    background-image: linear-gradient(254deg, #5909b3, #7f0dff);
    transition-property: background;
    transition-duration: 1s;
    transition-timing-function: linear;
     }

     .btn-danger{
          border: 0.25rem solid #7f0dff;
          background: none;
          color: #7f0dff;
          letter-spacing: 1px;
          box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);

     }

     .modal-content{
   background-image: linear-gradient(254deg, #5909b3, #7f0dff);
      border-radius: 5px;
     }

     .btn-default{
      background: none;
      color: white; 
     }

     .modal-header{
      color: white;
     }
     .modal-body{
      color: white;
     }
      .mt20{
  			margin-top:20px;
  		}
      .bold{
        font-weight:bold;
      }

      /*chart style*/
      #legend ul {
        list-style: none;
      }

      #legend ul li {
        display: inline;
        padding-left: 30px;
        position: relative;
        margin-bottom: 4px;
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

      
  	</style>
</head>