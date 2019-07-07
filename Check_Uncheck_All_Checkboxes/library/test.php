<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>
        <script src="https://code.jquery.com/jquery-3.1.1.js"></script>
        
        <style>
            .jqbox_innerhtml {
    display:inline-block;
    
    background-color:grey;
    color:white;
    text-align:center;
    cursor:pointer;
}


.jqbox_innerhtml {
    position: fixed;
    left: 60px;
    top: 50%;
    -ms-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 130px;
    height: 30px;
    
    color:green;
   
   
}

.jqbox_innerhtml2 {
    display:inline-block;
    
    background-color:grey;
    color:white;
    text-align:center;
    cursor:pointer;
}


.jqbox_innerhtml2 {
    position: fixed;
    left: 60px;
    top: 50%;
    -ms-transform: translate(-50%, -50%);
    -moz-transform: translate(-50%, -50%);
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    width: 130px;
    height: 30px;
    
    color:green;
   
   
}
        </style>
        
        <script>
            $(function() {
	$(".jqbox_innerhtml").click(function(){
	    
	    $(".jqbox_innerhtml").animate({width:'600px', height:'100%'},1000);
	    $(".jqbox_innerhtml2").hide({width:'600px', height:'100%'},1000);
	});
}); 
        </script>
    </head>
    <body>
        <div>Click me</div>
        
        <div class='jqbox_overlay'></div>

<div> 
    <p class='jqbox_innerhtml'>Popup content</p>
    <p class='jqbox_innerhtml2'>Popup content</p>
</div>

<!-- Test background content text -->
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque auctor tortor in magna varius sit amet tempus neque eleifend. Duis convallis pretium consequat. Ut vel mauris nec odio dictum ullamcorper nec luctus massa. Aenean diam ligula, tempor sed viverra in, accumsan nec lacus. Duis interdum orci ac nisi imperdiet imperdiet. Pellentesque vestibulum, massa a cursus pharetra, purus ipsum imperdiet ipsum, ac ultricies justo ipsum ac nisi. Phasellus ac sem eu nisi pellentesque porttitor sed eu felis. Ut in nisi orci, eu sagittis neque. Donec pellentesque mollis augue in tempor. Sed eget orci arcu. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
<p>Nullam nunc lectus, posuere quis laoreet eu, volutpat et quam. Nunc lectus mauris, tincidunt in porta sed, ultrices et elit. Nunc vestibulum eros ut mi volutpat laoreet. In eu purus justo. Quisque ornare dictum luctus. Phasellus eros ante, condimentum non sodales nec, vestibulum et felis. Mauris faucibus sapien non nulla tempor ultricies sollicitudin augue tempus. Donec nisl enim, posuere ut iaculis a, lobortis eget purus. Donec et enim ullamcorper justo molestie semper.</p>
<p>Nullam vestibulum, ligula quis pellentesque ultricies, est mi vehicula sem, vel vulputate sapien mi eu odio. Donec blandit, odio eu aliquam viverra, orci arcu iaculis ipsum, at elementum urna orci a sem. Cras a mollis urna. Ut in leo id justo elementum auctor. Nullam non libero ac sapien iaculis dapibus. Aenean aliquet elementum nunc a laoreet. Proin laoreet commodo fermentum. Nullam non mi quis odio semper interdum a id felis. In hac habitasse platea dictumst. Praesent egestas blandit pulvinar.</p>
<p>Suspendisse lobortis nulla ut justo fermentum auctor. Sed vitae mauris in dui pellentesque aliquam a nec elit. Morbi sit amet lectus augue. In iaculis tempus tellus, eget aliquam dui porta a. Proin vitae ante sapien. Duis feugiat luctus diam eu hendrerit. Pellentesque congue, sapien eget facilisis fermentum, augue felis luctus eros, semper viverra magna arcu eu quam.</p>
   
    </body>
</html>