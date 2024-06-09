<?php
require '../global.php';
XQcms::load_xq_func('admin');
XQcms::load_xq_func('post');
get_cookie('userid') or exit(errmsg);
isset($dir) or $dir = '';
$Foldir='upfiles';
$Folder=$dir ? 'upfiles'.'/'.trim($dir) : 'upfiles';
$from = isset($from) ? trim($from) : 'ck';
switch($action) {
      case 'ajax':
	    $filels= array();
		$files=get_file(XQ_ROOT.'/'.$Folder);
		foreach($files as $f) {
		  if(is_image($f)){
		    $filels[] = array (
						'path' => XQ_PATH.str_replace(XQ_ROOT.'/', '',$f),
						'name' => basename($f),
						'size' => dround(filesize($f)/1024).'Kb ',
						'ext' => file_ext($f),
						'time' => timetodate(filemtime($f))
				      );
		  }
		}
		$filelist='';
		foreach($filels as $k) {
		$filelist.='<li class="name bg"><a href="'.$k['path'].'" class="icon" target="_blank" title="点击查看">';
		$filelist.='<img border="0" src="../data/ext/'.$k['ext'].'.gif" align="middle" id="icon" onmouseover="SAlbum(\''.$k['path'].'\');" onmouseout="HAlbum();"></a>';
	    $filelist.='<a href="javascript:void(0)" onclick="Select(\''.$k['path'].'\');" title="点击选择">'.$k['name'].'</a></li>';
	    $filelist.='<li class="size">'.$k['size'].'</li>';
	    $filelist.='<li class="date">'.$k['time'].'</li>';
		}	 
		echo $filelist;
	  break;
	  default:
	    $dirs= array();
	    $fdir=glob(XQ_ROOT.'/'.$Foldir.'/*');
		if(is_array($fdir)) {
			foreach($fdir as $v) {
				if(is_file($v)) continue;
				$v = basename($v);
					$fdirs=glob(XQ_ROOT.'/'.$Foldir.'/'.$v.'/*');
					if(is_array($fdirs)) {
						foreach($fdirs as $vs) {
							if(is_file($vs)) continue;
							$vs = basename($vs);
							$dirs[$v][] = $vs;
						}
					}
			}
		}	
	  include tpl('select');
	  break;
}
?>