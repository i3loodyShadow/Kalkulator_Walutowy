<!doctype html>
<html lang="pl">
<head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:"Deafult description"}">

    <title>{$page_title|default:"Deafult title"}</title>

	<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.4.2/pure.css">

    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/main-grid.css">
    <!--<![endif]-->
  
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/marketing-old-ie.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
        <link rel="stylesheet" href="{$conf->app_url}/css/layouts/marketing.css">
    <!--<![endif]-->

    <link rel="stylesheet" href="{$conf->app_url}/css/style.css">
    
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/grids-responsive-min.css" />
{if $hide_intro }
    <link rel="stylesheet" href="{$conf->app_url}/css/style_hide_intro.css">
{/if}
	
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">

	<script src="{$conf->app_url}/js/jquery.min.js"></script>
	<script src="{$conf->app_url}/js/softscroll.js"></script>
        <script src="{$conf->app_url}/js/functions.js"></script>
</head>
<body>

<div id="app_top" class="header">
    <div class="home-menu pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed">
        <a class="pure-menu-heading" href="">{$page_title|default:"Deafult page title"}</a>
        <ul>
            <li class="pure-menu-selected"><a href="#app_top">Top page</a></li>
            <li><a href="#app_content">Go to cellar calculator</a></li>
        </ul>
    </div>
</div>

<div class="splash-container">
    <div class="splash">
        <h1 class="splash-head">{$page_title|default:"Deafult page title"}</h1>
        <p class="splash-subhead">
             {$page_description|default:"Deafult description"}
        </p>
        <p>
            <a href="#app_content" class="pure-button pure-button-primary">Go to cellar calculator</a>
        </p>
    </div>
</div>

<div class="content-wrapper">
    <div id="app_content" class="content">

{block name=content} Default content  {/block}


{block name=resultTable} {/block}

    </div>

    <div class="footer l-box is-center">
		<p>
{block name=footer} Default content  {/block}
		</p>
        <p>Wiew based on style and template form <a href="http://purecss.io/" target="_blank">Pure CSS Yahoo!</a>. (Cellar author: Eryk Tyndel)</p>
    </div>

</div>


</body>
</html>