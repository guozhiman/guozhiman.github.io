<?php defined('IN_XQCMS') or exit('Access Denied');?><div class="footer">

<p>

<a href="<?php echo XQ_PATH;?>">��վ��ҳ</a> | 

		<a href="<?php echo XQ_PATH;?>us/about.html">��˾���</a> | <a href="<?php echo $MODULE['8']['url'];?>">������Ѷ</a> | <a href="<?php echo $MODULE['9']['url'];?>">�ɹ�����</a> |   <a href="<?php echo $MODULE['5']['url'];?>">�ͻ��鳧</a> |  <a href="<?php echo $MODULE['10']['url'];?><?php echo $auth['11']['url'];?>">��ϵ��֤��ѯ</a> |  <a href="<?php echo $MODULE['10']['url'];?><?php echo $auth['12']['url'];?>">��֤������ѯ</a> | <a href="<?php echo XQ_PATH;?>guestbook/">��վ����</a> |  <a href="<?php echo XQ_PATH;?>us/conact.html">��ϵ����</a>   

       

     </p>

    <div class="footer_b">

        <p>

        <?php echo $XQ['copyright'];?> 

         <?php if($XQ['icpno']) { ?> ������<a href="http://www.miibeian.gov.cn" target="_blank"><?php echo $XQ['icpno'];?></a> <?php } ?>

         </p>

        <p>

		<SCRIPT language="javascript" type="text/javascript"  src="<?php echo XQ_PATH;?>app/count/count.php"></script>

        </p>

    </div>

</div>

<?php if($xqcms_task) { ?><script type="text/javascript" src="<?php echo XQ_PATH;?>app/app.php?<?php echo $xqcms_task;?>"></script><?php } ?>

<?php if($XQ['isfqq']) { ?>      

<?php include template('qq');?>

<?php } ?>

<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https://hm.baidu.com/hm.js?4e78d5c1e9c2317781abe2571b30876f";
  var s = document.getElementsByTagName("script")[0];
  s.parentNode.insertBefore(hm, s);
})();
</script>
<center><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1258504154'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/stat.php%3Fid%3D1258504154%26show%3Dpic2' type='text/javascript'%3E%3C/script%3E"));</script></center>


</body>

</html>