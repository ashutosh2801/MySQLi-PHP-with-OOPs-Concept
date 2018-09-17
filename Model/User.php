
<?php
class User extends DBController
{
		public $table_name = 'tbl_users';
    function getAll( $params=array() )
    {
				$where = $order = $limit = "";
				if(!empty($params['where'])) $where = " WHERE ".$params['where'];
				if(!empty($params['order'])) $order = " ORDER BY ".$params['order'];
				if(!empty($params['limit'])) $limit = " LIMIT ".$params['limit'];
				
        $query = "SELECT * FROM ".$this->table_name." $where $order $limit";
        
				$postResult = $this->getDBResult($query);
        return $postResult;
    }

    function getById($id)
    {
        $query = "SELECT * FROM ".$this->table_name." WHERE ID = $id";
        $cartResult = $this->getDbOneResult($query);
        return $cartResult;
    }
		
		function getByAttributes($params=array())
    {
				if(empty($params))
        return "";
				
				$list = array();
        foreach($params as $k => $v)
            $list[] = "`". $k ."` = '". $v ."'";
						
        $list = implode(" AND ", $list);
				$query = "SELECT * FROM ".$this->table_name." WHERE ".$list;
        
        $cartResult = $this->getDbOneResult($query);
        return $cartResult;
    }

		function insert($params)
    {
        if(empty($params))
        return "";

        $list = array();
        foreach($params as $k => $v)
            $list[] = "`". $k ."` = '". $v ."'";

        $list = implode(",", $list);
        $query = "INSERT INTO `". $this->table_name ."` SET " . $list;
				
        $smt = $this->conn->prepare($query);
        $smt->execute();
				//$smt->close();
				//echo '<pre>'; print_r(array($smt,$this->conn)); exit;
				return $this->conn;
    }
		
		function update($params, $where) 
    {
        if(empty($params) || empty($where))
        return "";

        $list = array();
        foreach($params as $k => $v)
            $list[] = "`". $k ."` = '". $v ."'";

        $w = array();
        foreach($where as $k => $v)
            $condition[] = "`". $k ."` = '". $v ."'";

        $list = implode(",", $list);
        $condition = implode(",", $condition);
        $query = "UPDATE `". $this->table_name ."` SET " . $list . " WHERE ". $condition;
				
        $smt = $this->conn->prepare($query);
        $smt->execute();
				//$smt->close();
				return $this->conn;
    }
		
		function delete($where)
    {
        if(empty($where))
        return "";

        $w = array();
        foreach($where as $k => $v)
            $condition[] = "`". $k ."` = '". $v ."'";

        $list = implode(",", $list);
        $condition = implode(",", $condition);
				$query = "DELETE FROM `". $this->table_name ."` WHERE ".$condition;
				
        $smt = $this->conn->prepare($query);
        $smt->execute();
				$smt->close();
				return $this->conn;
    }
		
		function close()
		{
			$this->conn->close();
		}
}
