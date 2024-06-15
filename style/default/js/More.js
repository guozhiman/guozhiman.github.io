var page = 1;
var i = 1; 
var slidint;
function down(){
		var $pictureShow = $('.mid li');
		var downwidth = $pictureShow.width()*i-i*73;
		//alert($pictureShow.width());
		var len = $('#ShowList1').find('li').length;
		var page_number = Math.ceil(len/i)-1;
		if( !$('#ShowList1').is(":animated") ){
			if( page == page_number){
				$('#ShowList1').animate({left:'0px'},"slow");
				page = 1;
				stopit();
				
			}else{
				$('#ShowList1').animate({left:'-='+downwidth},"slow");
				page++;
			}
		}
		//$('div#up span').eq((page-1)).addClass("current").siblings().removeClass("current");	
		
}
function up(){
		var $pictureShow = $('.mid li');
		var downwidth = $pictureShow.width()*i-i*73;
		var len = $('#ShowList1').find('li').length;
		var page_number = Math.ceil(len/i);
		if( !$('#ShowList1').is(":animated") ){
		 if(page == 1){
	        $('#ShowList1').animate({left: '-='+downwidth*(page_number-1)},"slow");
			page = page_number;
			}else{
			$('#ShowList1').animate({left:'+='+downwidth},"slow");	
			page--;	
				}
		}
		//$('div#up span').eq((page-1)).addClass("current").siblings().removeClass("current");	 
}

function playnext(){
	down();
	playit();
}
function playit(){
	slidint = setTimeout(playnext,4500);
}
function stopit(){
	clearTimeout(slidint);
}
