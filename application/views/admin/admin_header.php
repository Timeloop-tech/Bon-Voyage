<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bon Voyage - Admin Panel</title>
    <?=link_tag('assets/css/bootstrap.min.css'); ?>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,400italic' rel='stylesheet' type='text/css'>
    <style>
        html,body{
            font-family: Lato,sans-serif;
            font-size: large !important;
            background-color: #FDF3E7;
        }
        a{
            font-size: large !important;
        }
        p{
            font-size: 18px;
            color: #3B3738;
            font-weight: 400;
        }
        .pagination li a {
            color: #FDF3E7;!important;
            background-color: #3B3738;!important;
        }
        .pagination li a:hover{
            background-color: #7E8F7C;!important;
            color: #FDF3E7;!important;
        }
        .pagination .active a{
            color: #FDF3E7;!important;
            background-color: #7E8F7C;!important;
            border-color: #3B3738;!important;
        }
        .pagination .active a:hover{
            background-color: #d6dcd6;!important;
            border-color: #d6dcd6;!important;
        }
        .jumbotron p{
            font-weight: 300;
        }
        .btn-default{
            background-color: #3B3738; !important;
            color: #FDF3E7; !important;
        }
        .btn-default:hover{
            background-color: #91888a;!important;
            color: #ffffff;!important;
        }
        .btn-primary{
            background-color: #3B3738; !important;
            color: #FDF3E7; !important;
        }
        .btn-primary:hover{
            background-color: #91888a;!important;
            color: #ffffff;!important;
        }
        .form-horizontal .control-label{
            font-weight: 400;
        }
        .navbar-brand{
            font-size: 40px !important;
            margin: 10px;
        }
        .navbar-default{
            background-color: #C63D0F;
        }
        .navbar-default .navbar-brand {
            color: #FDF3E7;
        }
        .navbar-default .navbar-nav li a{
            color: #FDF3E7;
        }
        .navbar-default .navbar-nav ul{
            background-color: #C63D0F;!important;
        }
        .dropdown-toggle.btn-default{
            background-color: #FDF3E7;
            color: #3B3738;
        }
        .open .dropdown-toggle.btn-default {
            color: #FDF3E7;
            background-color: #3B3738;
            border-color: rgba(0,0,0,0);
        }
        .open .dropdown-toggle.btn-default:hover{
            background-color: #3B3738;!important;
            color: #FDF3E7;!important;
        }
        /*.navbar-default .navbar-nav li a:hover{
            color: #FDF3E7;
        }*/
        .form-control::-webkit-input-placeholder{
            color: #FDF3E7;
        }
        .form-control::-moz-placeholder{
            color: #FDF3E7;
        }
        .form-control:-ms-input-placeholder{
            color: #FDF3E7;
        }
        .form-control:-moz-placeholder{
            color: #FDF3E7;
        }
        textarea:focus, input:focus {
            box-shadow: 0 2px 0 #3B3738 !important;
            outline: 0 none !important;
        }
    </style>
</head>
<body style="font-family: Lato,sans-serif;font-size: large !important;">
<div class="row">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="col-lg-6">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand text-uppercase" style="font-size: 50px; !important;" href="<?= base_url('user');?>">Bon Voyage</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="collapse navbar-collapse pull-right" id="bs-example-navbar-collapse-1" style="float:right;margin-right: 30px;padding-top: 30px;">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <div class="btn-group">
                                <img src="<?= base_url('profile_photos').'/'.$user->profile_photo; ?>" style="height: 35px;width: 50px;margin: 0px;padding: 0px;" class="btn btn-default">
                                <div class="btn-group">
                                    <p id="user_menu" class="dropdown-toggle btn btn-default" data-toggle="dropdown" aria-expanded="true"><?= $user->fname.' '.$user->lname.' '?><span class="caret"></span></p>
                                    <ul class="nav navbar-nav navbar-right dropdown-menu" role="menu">
                                        <li><?= anchor('admin/profile_edit','Profile'); ?></li>
                                        <li><?= anchor('admin/change_password','Change Password');?></li>
                                        <li><?= anchor('login/logout','Logout');?></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>