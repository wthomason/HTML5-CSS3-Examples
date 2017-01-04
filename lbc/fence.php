<!doctype html>
<html>
<head>
	<meta name="discription" content="We're a Handyman/Contruction company that takes on project big or small. We service the Des Moines, Iowa and surrounding area. We specialize in remodeling, fencing and decks. We offer free estimates and fully ensured.">
	
	<meta name="keywords" content="handyman, construction, free estimates, fully ensured">

	<meta charset="utf-8">
	
	<title>Fence Projects / Lil Brother Construction</title>
		
    <?php include 'includes.php'; ?>

</head>

<body>

<?php include 'header.php'; ?>
		

	
	<div id="content">
	
		<div id="main">
		<div class="imageSlider">
            
            <script language="JavaScript">
var i = 0;
var path = new Array();
 
// LIST OF IMAGES
path[0] = "Lil Brother Constuction pics/patterson fence 2.jpg";
path[1] = "Lil Brother Constuction pics/Patterson fence 3.jpg";
path[2] = "Lil Brother Constuction pics/Patterson fence.jpg";



function swapImage()
{
   document.slide.src = path[i];
   if(i < path.length - 1) i++; else i = 0;
   setTimeout("swapImage()",3000);
}
window.onload=swapImage;

// Can also be used with $(document).ready()


</script>
            <img width="100%" name="slide" class="img_respoinsive" src="slideshow/10322716_10203819447064871_2901323564835478633_n.jpg"  />
            
        <h1>Fence Project</h1>
            </div>
		</div>
		 
	</div>
	
	
	
	<?php include 'footer.php'; ?>
    
</body>
</html>