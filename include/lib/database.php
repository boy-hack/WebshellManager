<?php
/**
 * 数据库操作路由
 *
 * @copyright (c) Emlog All Rights Reserved
 */

class Database {

    public static function getInstance() {
		return MySql::getInstance();
    }

}
