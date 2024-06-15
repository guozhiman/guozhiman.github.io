<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<form method="post" action="?" id="dform" onsubmit="return check();">
<input type="hidden" name="moduleid" value="<?php echo $moduleid;?>"/>
<input type="hidden" name="file" value="<?php echo $file;?>"/>
<input type="hidden" name="action" value="<?php echo $action;?>"/>
<input type="hidden" name="id" value="<?php echo $id;?>"/>
<input type="hidden" name="cid" value="<?php echo $cid;?>"/>
<table class="tb">
<thead>
<th colspan="2"><?php echo $action=='add'? '添加':'修改';?>单页</th>
</thead>
<tr>
<td class="tdbr">
<table class="c_tb">
<tr>
<td class="tl">单页标题 <span class="f_red">*</span></td>
<td><input name="post[title]" type="text" id="title" size="50" value="<?php echo $title;?>"/> <?php echo color('post[color]', $color);?>&nbsp; &nbsp;<input type="checkbox" name="post[islink]" value="1" id="islink" onclick="_islink();"  <?php if($islink) echo 'checked';?>/> 外部链接 <br/><span id="dtitle" class="f_red"></span></td>
</tr>
<tr>
<td class="tl">显示</td>
<td>
<input type="radio" name="post[status]" value="3" <?php if($status) echo 'checked';?> id="status_1"/><label for="status_1"> 是</label>
<input type="radio" name="post[status]" value="0" <?php if(!$status) echo 'checked';?> id="status_0"/><label for="status_0">  否</label>
</td>
</tr>
<tr id="link" style="display:<?php echo $islink ? '' : 'none';?>;">
<td class="tl">链接地址 <span class="f_red">*</span></td>
<td><input name="post[url]" type="text" id="url" size="50" value="<?php echo $url;?>"/> <span id="durl" class="f_red"></span></td>
</tr>
<tbody id="basic" style="display:<?php echo $islink ? 'none' : '';?>;">
<tr>
<td class="tl">单页内容</td>
<td><textarea name="post[content]" id="content" class="dsn"><?php echo $content;?></textarea>
<?php echo deditor($moduleid, 'content', 'Default', '98%', 350);?><span id="dcontent" class="f_red"></span>
</td>
</tr>
<tr>
<td class="tl" height="30">内容选项</td>
<td><input type="checkbox" name="post[save_remotepic]" value="1"/> 下载内容远程图片
<input type="checkbox" name="post[clear_link]" value="1"/> 清除内容链接
</td>
</tr>
<tr>
<td class="tl">保存路径</td>
<td><input name="post[filepath]" type="text" size="20" value="<?php echo $filepath;?>"/> <span class="f_gray">如不填写则生成在网站根目录，否则请以‘/’结尾，例如‘us/’</span></td>
</tr>
<tr>
<td class="tl">文件名称</td>
<td><input name="post[filename]" type="text" size="20" value="<?php echo $filename;?>"/> <span class="f_gray">如不填写则自动按ID生成文件名，例如‘page-1.html’</span></td>
</tr>
<tr>
<td class="tl">SEO标题</td>
<td><input name="post[seo_title]" type="text" size="60" value="<?php echo $seo_title;?>"/></td>
</tr>
<tr>
<td class="tl">SEO关键词</td>
<td><input name="post[seo_keywords]" type="text" size="60" value="<?php echo $seo_keywords;?>"/></td>
</tr>
<tr>
<td class="tl">SEO描述</td>
<td><input name="post[seo_description]" type="text" size="60" value="<?php echo $seo_description;?>"/></td>
</tr>
</tbody>
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
	f = 'title';
	l = $("#"+f).val().length;
	if(l < 2) {
		Dmsg('标题最少2字，当前已输入'+l+'字', f);
		return false;
	}
	if($('#islink').attr("checked")) {
		f = 'url';
		l = $("#"+f).val().length;
		if(l < 12) {
			Dmsg('请输入正确的链接地址', f);
			return false;
		}
	}
	return true;
}
</script>
<script type="text/javascript">posmenu(<?php echo $menuid;?>);</script>
</body>
</html>