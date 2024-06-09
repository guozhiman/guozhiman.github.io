<?php defined('IN_XQCMS') or exit('Access Denied');class guestbook {public $id;private $db;private $table;public function guestbook() {global $db, $XQ_PRE;$this->table = $XQ_PRE.'guestbook';$this->db = &$db;}private function public_check($post) {global $MOD,$XQ_TIME, $L, $XQ_IP;if(!is_array($post)) msg();if(!$post['truename'] && !$this->id) msg($L['gbook_pass_name']);if(!$post['title']) msg($L['gbook_pass_title']);if(!$post['content']) msg($L['gbook_pass_content']);$post['title'] = trim($post['title']);$post['content'] = trim($post['content']);$post['hidden'] = isset($post['hidden']) ? 1 : 0;if($this->id) {$post['status'] = $post['status'] == 2 ? 2 : 3;$post['edittime'] = $XQ_TIME;$post['reply'] = trim($post['reply']);} else {$post['addtime'] =$XQ_TIME;$post['ip'] =$XQ_IP;$post['edittime'] = 0;$post['reply'] = '';$post['status'] = $MOD['guestbook_enstatus']?2:3;}$post = dhtmlspecialchars($post);return $post;}public function fone() {return $this->db->get_one("SELECT * FROM {$this->table} WHERE id='$this->id'");}public function flist($condition = 'status=3', $order = 'id DESC') {global $MOD, $pages, $page, $pagesize, $offset;$r = $this->db->get_one("SELECT COUNT(*) AS num FROM {$this->table} WHERE $condition");$pages = pages($r['num'], $page, $pagesize);$lists = array();$result = $this->db->query("SELECT * FROM {$this->table} WHERE $condition ORDER BY $order LIMIT $offset,$pagesize");while($r = $this->db->fetch_array($result)) {$r['adddate'] = timetodate($r['addtime'], 5);$r['content'] = nl2br($r['content']);$r['editdate'] = '<span class="f_red">δ�ظ�</span>';if($r['reply']) {$r['reply'] = nl2br($r['reply']);$r['editdate'] = timetodate($r['edittime'], 5);}$lists[] = $r;}return $lists;}public function add($post) {$post = $this->public_check($post);$sqln = $sqlv = '';foreach($post as $n=>$v) {$sqln .= ','.$n; $sqlv .= ",'$v'";}$sqln = substr($sqln, 1);$sqlv = substr($sqlv, 1);$this->db->query("INSERT INTO {$this->table} ($sqln) VALUES ($sqlv)");return $this->id;}public function edit($post) {$post = $this->public_check($post);$sql = '';foreach($post as $n=>$v) {$sql .= ",$n='$v'";}$sql = substr($sql, 1);$this->db->query("UPDATE {$this->table} SET $sql WHERE id=$this->id");return true;}public function delete($id) {if(is_array($id)) {foreach($id as $v) { $this->delete($v); }} else {$this->db->query("DELETE FROM {$this->table} WHERE id=$id");}}public function check($id, $status) {if(is_array($id)) {foreach($id as $v) { $this->check($v, $status); }} else {$this->db->query("UPDATE {$this->table} SET status=$status WHERE id=$id");}}}?>