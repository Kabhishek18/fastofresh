<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="Distribution" content="Global" />
<meta name="language" content="en" />
<meta name="HandheldFriendly" content="True" />

<?php $parameters = \Request::segment(1);
  if($parameters ==null ) { ?>
    <!-- Homepage -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fastofresh is one stop destination if you are looking for Chicken, Mutton, Fish, or something else. We deliver fresh and quality meat at your doorstep." />
    <meta name="keywords" content="Fresh chicken, fresh mutton, fresh fish, online chicken, online mutton, online fish, non-veg delivery online" />
    <meta name="GOOGLEBOT" content="INDEX, FOLLOW" />
    <link rel="canonical" href="https://fastofresh.com"/>
    <title>Fastofresh – Buy Fresh Chicken, Mutton and Fish Online</title>
<?php }elseif($parameters =='about-us'){ ?>
  <!-- About Us -->
   <title>About Us | Fastofresh</title>
<meta name="description" content='Fast O Fresh is most effortless approach to arrange great crude meat and seafood.'/>
<meta name="keywords" content="chicken, mutton, seafoods, fish, seafood, momos" />

  <!-- About Us -->

<?php }elseif($parameters =='why'){ ?>
  <!--Why Us  -->
 <title>Why Fast O Fresh</title>
<meta name="description" content='Fast O Fresh provides fresh and quality chicken, mutton and fish at unmatched price.'/>
<meta name="keywords" content="chicken, mutton, seafoods, fish, seafood, momos" />

 <!-- Why us -->
<?php }elseif($parameters =='terms'){ ?>
  <!--terms  -->
<title>Terms & Condition | Fastofresh</title>
<meta name="description" content="" />
<meta name="keywords" content=" " />

 <!-- terms --> 
<?php }elseif($parameters =='faq'){ ?>
  <!--faq  -->
 <title>Faqs | Fastofresh</title>
<meta name="description" content="" />
<meta name="keywords" content=" " />

 <!-- faq --> 
 <?php }elseif($parameters =='privacyandpolicy'){ ?>
  <!--terms  -->
 <title>Privacy and Policy | Fastofresh</title>
<meta name="description" content="" />
<meta name="keywords" content=" " />

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
