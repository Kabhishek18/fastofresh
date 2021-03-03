<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="Distribution" content="Global" />
<meta name="language" content="en" />
<meta name="HandheldFriendly" content="True" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link rel="apple-touch-icon" sizes="57x57" href="{{url('')}}/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="{{url('')}}/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="{{url('')}}/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="{{url('')}}/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="{{url('')}}/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="{{url('')}}/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="{{url('')}}/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="{{url('')}}/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="{{url('')}}/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="{{url('')}}//android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="{{url('')}}/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="{{url('')}}/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="{{url('')}}/favicon/favicon-16x16.png">
<link rel="manifest" href="{{url('')}}/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="{{url('')}}/favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">


<?php $parameters = \Request::segment(1);
  if($parameters ==null ) { ?>
    <!-- Homepage -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Fast O Fresh is one stop destination if you are looking for Chicken, Mutton, Fish, or something else. We deliver fresh and quality meat at your doorstep." />
    <meta name="keywords" content="Fresh chicken, fresh mutton, fresh fish, online chicken, online mutton, online fish, non-veg delivery online" />
    <meta name="GOOGLEBOT" content="INDEX, FOLLOW" />
    <link rel="canonical" href="https://fastofresh.com"/>
    <title>Fast O Fresh – Buy Fresh Chicken, Mutton and Fish Online</title>
    <meta name="p:domain_verify" content="d01ea80fe2ed4696baf58ae4a5c05eb5"/>
    <!-- Facebook Pixel Code -->
      <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '3429351090431555');
      fbq('track', 'PageView');
      </script>
      <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=3429351090431555&ev=PageView&noscript=1"
      /></noscript>
      <!-- End Facebook Pixel Code -->
    <!-- DO NOT MODIFY -->
    <!-- Quora Pixel Code (JS Helper) -->
    <script>
    !function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
    qp('init', '5303ce752b6a4d279a758a39e95d6bc8');
    qp('track', 'ViewContent');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://q.quora.com/_/ad/5303ce752b6a4d279a758a39e95d6bc8/pixel?tag=ViewContent&noscript=1"/></noscript>
    <!-- End of Quora Pixel Code -->
    <script>qp('track', 'Generic');</script>

<?php }elseif($parameters =='about-us'){ ?>
  <!-- About Us -->
   <title>About Us | Fast O Fresh</title>
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
<title>Terms & Condition | Fast O Fresh</title>
<meta name="description" content="" />
<meta name="keywords" content=" " />

 <!-- terms --> 
<?php }elseif($parameters =='faq'){ ?>
  <!--faq  -->
 <title>Faqs | Fast O Fresh</title>
<meta name="description" content="" />
<meta name="keywords" content=" " />

 <!-- faq --> 
 <?php }elseif($parameters =='privacyandpolicy'){ ?>
  <!--privacyandpolicy  -->
 <title>Privacy and Policy | Fast O Fresh</title>
<meta name="description" content="" />
<meta name="keywords" content=" " />

 <!-- privacyandpolicy --> 

<?php }elseif($parameters =='cart'){ ?>
 <title>Cart | Fast O Fresh</title>
<meta name="description" content="" />
<meta name="keywords" content=" " />
  <!-- Quora Pixel Code (JS Helper) -->
    <script>
    !function(q,e,v,n,t,s){if(q.qp) return; n=q.qp=function(){n.qp?n.qp.apply(n,arguments):n.queue.push(arguments);}; n.queue=[];t=document.createElement(e);t.async=!0;t.src=v; s=document.getElementsByTagName(e)[0]; s.parentNode.insertBefore(t,s);}(window, 'script', 'https://a.quora.com/qevents.js');
    qp('init', '5303ce752b6a4d279a758a39e95d6bc8');
    qp('track', 'ViewContent');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://q.quora.com/_/ad/5303ce752b6a4d279a758a39e95d6bc8/pixel?tag=ViewContent&noscript=1"/></noscript>
          <script>
      !function(f,b,e,v,n,t,s)
      {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
      n.callMethod.apply(n,arguments):n.queue.push(arguments)};
      if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
      n.queue=[];t=b.createElement(e);t.async=!0;
      t.src=v;s=b.getElementsByTagName(e)[0];
      s.parentNode.insertBefore(t,s)}(window, document,'script',
      'https://connect.facebook.net/en_US/fbevents.js');
      fbq('init', '3429351090431555');
      fbq('track', 'PageView');
      </script>
      <noscript><img height="1" width="1" style="display:none"
      src="https://www.facebook.com/tr?id=3429351090431555&ev=PageView&noscript=1"
      /></noscript>
    <!-- End of Quora Pixel Code -->
    <script>qp('track', 'Generic');</script>

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
