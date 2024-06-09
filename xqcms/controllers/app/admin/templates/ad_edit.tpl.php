<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?" id="runcode_form" target="_blank">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="runcode"/>
<input type="hidden" name="codes" value=""/>
</form>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="aid" value="<?php echo $aid;?>"/>
<input type="hidden" name="forward" value="<?php echo $forward;?>"/>
<input type="hidden" name="pid" value="<?php echo $p['pid'];?>"/>
<input type="hidden" name="ad[typeid]" value="<?php echo $p['typeid'];?>"/>
<table class="tb">
<thead>
<th colspan="2">修改广告</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">广告位</td>
<td class="f_b">&nbsp;<?php echo $p['name'];?></td>
</tr>
<tr>
<td class="tl">广告类型</td>
<td class="f_gray">&nbsp;<?php echo $TYPE[$p['typeid']];?></td>
</tr>
<tr>
<td class="tl">广告名称 <span class="f_red">*</span></td>
<td><input name="ad[title]" id="title" type="text" size="30" value="<?php echo $title;?>"/> <span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">广告介绍</td>
<td><input name="ad[introduce]" type="text" size="60" value="<?php echo $introduce;?>"/></td>
</tr>
<?php if($p['typeid'] == 1) { ?>
<tr>
<td class="tl">广告代码 <span class="f_red">*</span></td>
<td><textarea name="ad[code]" id="code" style="width:98%;height:150px;overflow:visible;font-family:Fixedsys,verdana;"><?php echo $code;?></textarea><br/>
<input type="button" value=" 运行代码 " class="btn" onclick="runcode();"/> <span id="dcode" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl">上传文件</td>
<td class="f_gray"><input type="text" size="60" id="upload"/>&nbsp;&nbsp;<span onclick="Dfile(<?php echo $moduleid;?>, $('#upload').val(), 'upload');" class="jt">上传</span>&nbsp;&nbsp;<span onclick="if($('#upload').val()) window.open($('#upload').val());" class="jt">预览</span>&nbsp;&nbsp;<span onclick="$('#upload').val('');" class="jt">删除</span><?php tips('从这里上传文件后，把地址复制到代码里即可使用');?></td>
</tr>
<?php } ?>
<?php if($p['typeid'] == 2) { ?>
<tr>
<td class="tl">链接文字 <span class="f_red">*</span></td>
<td class="f_gray"><input type="text" size="60" name="ad[text_name]" id="text_name" value="<?php echo $text_name;?>"/> [支持HTML语法] <span id="dtext_name" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">链接地址 <span class="f_red">*</span></td>
<td><input type="text" size="60" name="ad[text_url]" id="text_url" value="<?php echo $text_url;?>"/> <span id="dtext_url" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">Title提示</td>
<td><input type="text" size="60" name="ad[text_title]" value="<?php echo $text_title;?>"/></td>
</tr>
<?php } ?>
<?php if($p['typeid'] == 3 || $p['typeid'] == 5) { ?>
<tr>
<td class="tl">图片地址 <span class="f_red">*</span></td>
<td class="f_gray"><input type="text" size="60" name="ad[image_src]" id="thumb" value="<?php echo $image_src;?>"/>&nbsp;&nbsp;<span onclick="Dthumb(<?php echo $moduleid;?>,<?php echo $p['width'];?>,<?php echo $p['height'];?>, $('#thumb').val());" class="jt">上传</span>&nbsp;&nbsp;<span onclick="_preview($('#thumb').val());" class="jt">预览</span>&nbsp;&nbsp;<span onclick="$('#thumb').val('');" class="jt">删除</span> <span id="dthumb" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">链接地址</td>
<td><input type="text" size="60" name="ad[image_url]" value="<?php echo $image_url;?>" id="image_url"/> <span id="dimage_url" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">标题</td>
<td><input type="text" size="60" name="ad[image_alt]" value="<?php echo $image_alt;?>"/></td>
</tr>
<?php } ?>
<?php if($p['typeid'] == 4) { ?>
<tr>
<td class="tl">Flash地址 <span class="f_red">*</span></td>
<td class="f_gray"><input type="text" size="60" name="ad[flash_src]" id="flash" value="<?php echo $flash_src;?>"/>&nbsp;&nbsp;<span onclick="Dfile(<?php echo $moduleid;?>, $('#flash').val(), 'flash');" class="jt">上传</span>&nbsp;&nbsp;<span onclick="if($('#flash').val()) window.open($('#flash').val());" class="jt">预览</span>&nbsp;&nbsp;<span onclick="$('#flash').val('');" class="jt">删除</span> <span id="dflash" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">链接地址</td>
<td><input type="text" size="60" name="ad[flash_url]" value="<?php echo $flash_url;?>"/></td>
</tr>
<?php } ?>
<tr>
<td class="tl">广告状态</td>
<td>
<input type="radio" name="ad[status]" value="3" <?php if($status==3) echo 'checked';?>/> 已通过
<input type="radio" name="ad[status]" value="2" <?php if($status==2) echo 'checked';?>/> 审核中
</td>
</tr>
</table>
</td>
</tr>
</table>
<div class="sbt"><input type="submit" name="submit" value=" 确 定 " class="btn"/>&nbsp;&nbsp;&nbsp;&nbsp;<input type="reset" name="reset" value=" 重 置 " class="btn"/></div>
</form>
<script type="text/javascript">
function check() {
	var l;
	var f;
	var t = <?php echo $p['typeid'];?>;
	f = 'title';
	l = $("#"+f).val().length;
	if(l < 1) {
		Dmsg('请填写广告名称', f);
		return false;
	}

	if(t == 1) {
		f = 'code';
		l = $("#"+f).val().length;
		if(l < 5) {
			Dmsg('请填写广告代码', f);
			return false;
		}
	} else if(t == 2) {
		f = 'text_name';
		l = $("#"+f).val().length;
		if(l < 2) {
			Dmsg('请填写链接文字', f);
			return false;
		}
		f = 'text_url';
		l = $("#"+f).val().length;
		if(l < 12) {
			Dmsg('请填写链接地址', f);
			return false;
		}
	} else if(t == 3 || t == 5) {
		f = 'thumb';
		l = $("#"+f).val().length;
		if(l < 2) {
			Dmsg('请填写图片地址', f);
			return false;
		}
		if(t == 5 && ext($("#"+f).val()) != 'jpg') {
			Dmsg('仅支持JPG格式图片', f);
			return false;
		}
	} else if(t == 4) {
		f = 'flash';
		l = $("#"+f).val().length;
		if(l < 5) {
			Dmsg('请填写Flash地址', f);
			return false;
		}
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(<?php echo $status == 2 ? 3 : 2;?>);</script>
</body>
</html>