<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<!--[if lt IE 7 ]> <html class="no-js ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]>    <html class="no-js ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]>    <html class="no-js ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><! <html class="no-js" lang="en">--> <!--<![endif]-->
	<link rel='stylesheet' href='css/style.css'>
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
		
    <script src='js/jquery-1.5.2.js'></script>
    <script src='js/jquery.color-RGBa-patch.js'></script>
    <script src='js/example.js'></script>
    <script src='js/example2.js'></script>
<script type="text/javascript" src="js/jquery.featureList-1.0.0.js"></script>
<script language="javascript">
		$(document).ready(function() {

			$.featureList(
				$("#tabs li a"),
				$("#output li"), {
					start_item	:	0
				}
			);

			/*
			
			// Alternative

			
			$('#tabs li a').featureList({
				output			:	'#output li',
				start_item		:	1
			});

			*/

		});
	</script>

</head>

<body>
<!-- header -->

<ul class="group" id="example-two">
          <li class="current_page_item_two"><a rel="#FFF" href="#"></a></li>
  
      </ul>

<div id="contenedor"> 
<div style="float:left; width:400px; ">
  <div style="margin:0 0 40px 0;"><img src="images/tit_productos.png" width="325" height="65" /></div>

</div>

<ul class="group" id="menu-productos">
          <li class="current_page_menu-productos"><a rel="#ec272c" href="#"></a></li>
  
  

      </ul>
      


<!--/header-->
    
</div>
<div style="clear:both"></div>
<div id="feature_list">
			<ul id="tabs">
				<li style="margin: 0 0 16px 0;">
				  <a href="javascript:;"><p>macedonia</p>
			      Ensalada de frutas, helado de fruta (a elección) y crema fresca batida.</a>
				</li>
               	<li style="margin: 0 0 16px 0;"><a href="javascript:;"><p>porteña</p>
               	  Helado dulce de leche, banana natural en rodajas, charlotte, licor de chocolate y crema fresca batida.</a></li>
				<li style="margin: 0 0 16px 0;"><a href="javascript:;"><p>caramel</p>
				  Helado de crema americana, dulce de leche casero, fino crocante de nueces, almendras acarameladas y crema fresca batida.</a></li>
                <li style="margin: 0 0 16px 0;"><a href="javascript:;"><p>suiza</p>
                  Helado de chocolate con almendras, dulce de leche casero, charlotte y crema fresca batida.</a></li>
                <li style="margin: 0 0 16px 0;"><a href="javascript:;"><p>americana</p>
                  Ensalada de frutas, helado de rema americana y 
                crema fresca batida.</a></li>
                <li style="margin: 0 0 16px 0;"><a href="javascript:;"><p>banana split</p>
                  Helado artesanal de chocolate, frutilla, vainilla, banana natural, crema fresca batida y charlotte.</a></li>
  </ul>
          <!--<div style="clear:both"></div>-->
          
<ul id="output">
				<li><img src="images/img_prod_macedonia.jpg" /></li>
				<li><img src="images/img_prod_portenia.jpg" /></li>
				<li><img src="images/img_prod_caramel.jpg" /></li>
                <li><img src="images/img_prod_suiza.jpg" /></li>
                <li><img src="images/img_prod_americana.jpg" /></li>
                <li><img src="images/img_prod_banana_split.jpg" /></li>
</ul>
          
	        
</div>


<!-- footer -->

<div id="contenedor">

  <div style="float:left"></div>
  <br><br><br><br><br>

</div><!--/footer-->



<div id="fb-root"></div>
<script>    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=1505347526430547";
        fjs.parentNode.insertBefore(js, fjs);
    } (document, 'script', 'facebook-jssdk'));</script>

</body>

</html>
