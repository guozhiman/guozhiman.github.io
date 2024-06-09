<?php
defined('IN_XQCMS') or exit('Access Denied');
include tpl('header');
posmenu($menus);
?>
<table class="tb">
<thead>
<th colspan="10">生成网页</th>
</thead>
<tr>
<td height="30">&nbsp;
<form method="post">
<input type="submit" value=" 一键生成 " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=all';" title="生成该模块所有网页"/>&nbsp;&nbsp;
<input type="submit" value=" 生成列表 " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=list';" title="生成该模块所有分类"/>&nbsp;&nbsp;
<input type="submit" value=" 生成内容 " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=show';" title="生成该模块所有内容页"/>&nbsp;&nbsp;
<input type="submit" value=" 更新信息 " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=show&update=1';" title="更新该模块所有信息地址等项目"/><br /><br />
</form>
<form method="post">
<b>按照ID生成：</b>
起始ID: <input type="text" size="6" name="fid" value="<?php echo $fid;?>"/>&nbsp;&nbsp;结束ID：<input type="text" size="6" name="tid" value="<?php echo $tid;?>"/>&nbsp;&nbsp;每次生成数量： <input type="text" size="5" name="num" value="100"/>&nbsp;<input type="submit" value=" 生成内容 " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=show';"/>&nbsp;
<input type="submit" value=" 更新信息 " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=show&update=1';"/>
</form><br />
<form method="post">
<b>按照分类生成：</b>
<?php echo category_select('catid', '选择分类', 0, $mid);?>&nbsp;&nbsp;第 <input type="text" size="3" name="fpage" value="1"/> 页 至 <input type="text" size="3" name="tpage" value=""/> 页&nbsp;&nbsp;每次生成数量： <input type="text" size="5" name="num" value="100"/>&nbsp;<input type="submit" value=" 生成列表 " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=cate';"/>&nbsp;
<input type="submit" value=" 生成内容 " class="btn" onclick="this.form.action='?mid=<?php echo $mid;?>&file=<?php echo $file;?>&action=item';"/>
</form>
<br />
</td>
</tr>
</table>
<script type="text/javascript">posmenu(0);</script>
</body>
</html>