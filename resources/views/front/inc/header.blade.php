<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
   
    
    <meta name="Distribution" content="Global" />
<meta name="GOOGLEBOT" content="INDEX, FOLLOW" />
<meta name="language" content="en" />
<meta name="HandheldFriendly" content="True" />
<link rel="canonical" href="https://fastofresh.com"/>

<?php $parameters = \Request::segment(1);
  if($parameters ==null ) { ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fastofresh is one stop destination if you are looking for Chicken, Mutton, Fish, or something else. We deliver fresh and quality meat at your doorstep." />
    <meta name="keywords" content="Fresh chicken, fresh mutton, fresh fish, online chicken, online mutton, online fish, non-veg delivery online" />
    <title>Fastofresh – Buy Fresh Chicken, Mutton and Fish Online</title>
<?php }elseif($parameters =='about-us'){ ?>
  <!-- About Us -->
    <title>About -Us | Fastofresh – Buy Fresh Chicken, Mutton and Fish Online</title>
  <!-- About Us -->

<?php }elseif($parameters =='why'){ ?>
  <!--Why Us  -->
 <title>Why Us | Fastofresh – Buy Fresh Chicken, Mutton and Fish Online</title>
 <!-- Why us -->
<?php }elseif($parameters =='terms'){ ?>
  <!--terms  -->
 <title>Terms And Condition | Fastofresh – Buy Fresh Chicken, Mutton and Fish Online</title>
 <!-- terms --> 
<?php }elseif($parameters =='faq'){ ?>
  <!--faq  -->
 <title>Frequently Asked Questions | Fastofresh – Buy Fresh Chicken, Mutton and Fish Online</title>
 <!-- faq --> 
 <?php }elseif($parameters =='privacyandpolicy'){ ?>
  <!--terms  -->
 <title>Privacy And Policy | Fastofresh – Buy Fresh Chicken, Mutton and Fish Online</title>
 <!-- terms -->  
<?php }elseif($parameters =='category'){ ?>
  <!-- Category -->
      {!!$category->meta!!}
  <!-- Category -->
<?php } elseif($parameters =='product'){ ?>
  <!-- Prdouct -->
      {!!$product->meta!!}
  <!-- Prdouct -->
<?php } ?>  

    <link rel="stylesheet" href="{{ url('assets/css/icons.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/red-color.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/yellow-color.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-188367381-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-188367381-1');
  var SITEURL = '{{url('')}}';
</script>
</head>
<body itemscope>
    <main style="padding-top:108px; ">
