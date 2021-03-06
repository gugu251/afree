<?php

class Sql
{

	protected $_dbHandle;
	protected $_result;
	private $filter = '';

	// 连接数据库
	public function connect($host, $user, $pass, $dbname)
	{
		try {
			$dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", $host, $dbname);
			$option = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
			$this->_dbHandle = new PDO($dsn, $user, $pass, $option);
		} catch (PDOException $e) {
			exit('错误: ' . $e->getMessage());
		}
	}

	// 查询条件
	public function where($where)
	{
		if (isset($where)) {
			$this->filter .= ' WHERE ';
			if (is_numeric($where)) {
				$this->filter .= $where;
			} elseif (is_string($where) && !empty($where) && !is_numeric($where)) {
				$wheres = explode(',', $where);
				$count = count($wheres);
				$this->filter .= implode(' and ', $wheres);
			} elseif (is_array($where) && !empty($where)) {
				$wheres = $where;
				$count = count($wheres);
				$arr = array();
				foreach ($where as $key => $value) {
					$tip = "$key='{$value}'";
					array_push($arr, $tip);
				}
				$this->filter .= implode(' and ', $arr);
			}
		}

		return $this;
	}
	//in查询
	public function wherein($keyname, $ids)
	{
		$ids = implode(',', $ids);
		$this->filter .= " WHERE {$keyname} in ({$ids}) ";
		return $this;
	}

	// 分页数据
	public function page($page = 1, $limit = 10)
	{
		$start = ($page - 1) * $page;
		if (isset($order)) {
			$this->filter .= ' limit ' . $start . ',' . $limit;
		}

		return $this;
	}

	// 排序条件
	public function order($order = array())
	{
		if (isset($order)) {
			$this->filter .= ' ORDER BY ';
			$this->filter .= implode(',', $order);
		}
		return $this;
	}

	// 查询单个
	public function find()
	{
		$sql = sprintf("select * from `%s` %s", $this->_table, $this->filter);
//		var_dump($sql);
		$sth = $this->_dbHandle->prepare($sql);
		$sth->execute();

		return $sth->fetch();
	}

	// 查询所有
	public function selectAll()
	{
		$sql = sprintf("select * from `%s` %s", $this->_table, $this->filter);

		$sth = $this->_dbHandle->prepare($sql);
		$sth->execute();

		return $sth->fetchAll();
	}

	// 根据条件 (id) 查询
	public function select($id)
	{
		$sql = sprintf("select * from `%s` where `id` = '%s'", $this->_table, $id);
		$sth = $this->_dbHandle->prepare($sql);
		$sth->execute();

		return $sth->fetch();
	}

	// 根据条件 (id) 删除
	public function delete($id)
	{
		$sql = sprintf("delete from `%s` where `id` = '%s'", $this->_table, $id);
		$sth = $this->_dbHandle->prepare($sql);
		$sth->execute();

		return $sth->rowCount();
	}

	// 自定义SQL查询，返回影响的行数
	public function query($sql)
	{
		$sth = $this->_dbHandle->prepare($sql);
		$sth->execute();
//		var_dump($sth);
		return $sth->rowCount();
	}

	// 新增数据
	public function add($data)
	{
		$sql = sprintf("insert into `%s` %s", $this->_table, $this->formatInsert($data));
		return $this->query($sql);
	}

	// 修改数据
	public function update($id, $data)
	{
		$sql = sprintf("update `%s` set %s where `id` = '%s'", $this->_table, $this->formatUpdate($data), $id);

		return $this->query($sql);
	}

	// 将数组转换成插入格式的sql语句
	private function formatInsert($data)
	{
		$fields = array();
		$values = array();
		foreach ($data as $key => $value) {
			$fields[] = sprintf("`%s`", $key);
			$values[] = sprintf("'%s'", $value);
		}

		$field = implode(',', $fields);
		$value = implode(',', $values);

		return sprintf("(%s) values (%s)", $field, $value);
	}

	// 将数组转换成更新格式的sql语句
	private function formatUpdate($data)
	{
		$fields = array();
		foreach ($data as $key => $value) {
			$fields[] = sprintf("`%s` = '%s'", $key, $value);
		}

		return implode(',', $fields);
	}

}
