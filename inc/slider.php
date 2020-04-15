		<!------------MAIN SLIDER---------------->
		<div class="header_bottom_slider">  	  
			<div class="slider_main">
				<div class="slider effect">
					<img src="images/images/1.jpg"/>
				</div>
				
				<div class="slider effect">
					<img src="images/images/2.jpg"/>
				</div>
				
				<div class="slider effect">
					<img src="images/images/3.jpg"/>
				</div>
				
				<div class="slider effect">
					<img src="images/images/4.jpg"/>
				</div>
			</div>
			<script>
			var index=0;
			show();
			function show(){
				var i;
				var slides=document.getElementsByClassName("slider");
				for(i=0; i<slides.length; i++){
					slides[i].style.display=" none";
				}
				index=index+1
				if(index>slides.length){
					index=1;
				}	
				slides[index-1].style.display="block";
				setTimeout(show,1500);	
			}	
			
			</script>		   
		</div>

	<!------------MAIN SLIDER END---------------->
