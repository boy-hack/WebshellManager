<?php
/**
 * WebShell的添加和删除
 *
 * @copyright (c) Emlog All Rights Reserved
 */

class Webshell_Model {

	private $db;

	function __construct() {
		$this->db = Database::getInstance();
	}

	/**
	 * 添加Webshell
	 *
	 * @param array $logData
	 * @return int
	 */
	function add($logData) {
		$kItem = array();
		$dItem = array();
		foreach ($logData as $key => $data) {
			$kItem[] = $key;
			$dItem[] = $data;
		}
		$field = implode(',', $kItem);
		$values = "'" . implode("','", $dItem) . "'";
		$this->db->query("INSERT INTO " . DB_PREFIX . "webshell ($field) VALUES ($values)");
		$logid = $this->db->insert_id();
		return $logid;
	}

	/**
	 * 更新文章内容
	 *
	 * @param array $logData
	 * @param int $blogId
	 */
	function update($logData, $blogId) {
		//$author = ROLE == ROLE_ADMIN ? '' : 'and author=' . UID;
		$Item = array();
		foreach ($logData as $key => $data) {
			$Item[] = "$key='$data'";
		}
		$upStr = implode(',', $Item);
		$this->db->query("UPDATE " . DB_PREFIX . "webshell SET $upStr WHERE id=$blogId and uid=".UID);
		//$this->db->query("UPDATE " . DB_PREFIX . "blog SET $upStr WHERE gid=$blogId $author");
	}

	/**
	 * 获取指定条件的文章条数
	 *
	 * @param int $spot 0:前台 1:后台
	 * @param string $hide
	 * @param string $condition
	 * @param string $type
	 * @return int
	 */
	function getLogNum($condition = '', $type = 'PHP', $spot = 0) {
		if ($spot == 0) {
			$author = '';
		}else {
			//$author = ROLE == ROLE_ADMIN ? '' : 'and author=' . UID;
		}

        $data = $this->db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "webshell $condition $author");//WHERE type='$type'
		return $data['total'];
	}

	/**
	 * 后台获取文章列表
	 *
	 * @param string $condition
	 * @param string $hide_state
	 * @param int $page
	 * @param string $type
	 * @return array
	 */
	function getLogsForAdmin($condition = '', $page = 1, $type = '') {
		$perpage_num = perpage_num;
		$start_limit = !empty($page) ? ($page - 1) * $perpage_num : 0;
		$author = '';
		//$author = ROLE == ROLE_ADMIN ? '' : 'and author=' . UID;
		$limit = "LIMIT $start_limit, " . $perpage_num;
		//$condition = "WHERE type='$type'";
		$sql = "SELECT * FROM " . DB_PREFIX . "webshell $condition $author $limit ";
		$res = $this->db->query($sql);
		$logs = array();
		while ($row = $this->db->fetch_array($res)) {
			$row["url"] = htmlspecialchars($row["url"]);
			$row["pass"] = htmlspecialchars($row["pass"]);
			$row["charset"] = htmlspecialchars($row["charset"]);
			$row["extra"] = htmlspecialchars($row["extra"]);
			$row["type"] = htmlspecialchars($row["type"]);
			$logs[] = $row;
		}
		return $logs;
	}

	/**
	 * 删除文章
	 *
	 * @param int $blogId
	 */
	function delete($blogId) {
		//$author = ROLE == ROLE_ADMIN ? '' : 'and author=' . UID;
		$author = "and uid=".UID;
		$this->db->query("DELETE FROM " . DB_PREFIX . "webshell where id=$blogId $author");
		if ($this->db->affected_rows() < 1) {
			wMsg('权限不足！', './');
		}
	}

	/**
	 * 得到webshell的信息
	 *
	 * @param int $blogId
	 */
	function getshell($blogId) {
		//$author = ROLE == ROLE_ADMIN ? '' : 'and author=' . UID;
		$author = "and uid=".UID;
		$res =$this->db->query("SELECT * FROM " . DB_PREFIX . "webshell where id = $blogId $author");
		$row = $this->db->fetch_array($res);
		return $row;
		
	}


}
