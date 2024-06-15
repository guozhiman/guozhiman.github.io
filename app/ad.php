<?php
//广告方式
//XQCMS 2011-08-21
switch($typeid){
    case 1:
	    echo $code;
	break;  
	case 2:
	   echo '<a href="'.$url.'" class="a_adt" title="'.$text_title.'" target="_blank">'.$text_name.'</a>';
	break;
	case 3:  
	    if($url)  echo '<a href="'.$url.'" target="_blank">';
		echo '<img src="'.$image_src.'" width="'.$width.'" height="'.$height.'" alt="'.$image_alt.'"/>';
		if($url)  echo '</a>' ;
	break;
	case 4:
	    if($url) echo '<a href="'.$url.'" target="_blank"><img src="'.XQ_PATH.'"data/style/spacer.gif" width="'.$width.'" height="'.$height.'" alt="" style="position:absolute;z-index:2;"/></a>';
	    echo '<embed src="'.$flash_src.'" quality="high" loop="true" extendspage="http://get.adobe.com/flashplayer/" type="application/x-shockwave-flash" wmode="transparent" width="'.$width.'" height="'.$height.'"></embed>';
	break;
	default:
	  echo 'var xmlData="&lt;list&gt;&lt;';
	   foreach($tags as $i=>$row){
	     $i++;
		 if($i>6) continue;
	     echo 'item&gt;&lt;img&gt;'.$row['thumb'].'&lt;/img&gt;&lt;url&gt;'.$row['url'].'&lt;/url&gt;&lt;/item&gt;&lt;';
	   
	   }
	   echo '/list&gt;";';
	break;
	
}
?>