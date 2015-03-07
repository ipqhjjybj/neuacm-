<?php
/**
 * Created by PhpStorm.
 * User: ipqhjjybj
 * Date: 14/12/14
 * Time: 下午2:22
 */

define(DEBUG,false);

class SAE_DB {
    private $db;
    /*
     * @init
     */
    public function __construct(){
        $this->db = new SaeMysql();
        return $this;
    }
    /**
     * 执行sql,但不获得数据
     * @param $sql 你要执行的sql
     * @return mixed 返回sql的执行结果
     */
    public function exec($sql){
        return $this->db->runSql($sql);
    }
    /**
     * @param $sql
     * @return mixed
     */
    public function getData($sql){
        return $this->db->getData($sql);
    }
    /**
     * 返回错误的信息
     * @return mixed error message;
     */
    public function errno()
    {
        return $this->db->errmsg();
    }
    /**
     * 插入函数的最基础实现
     * @param array $data 数据的键值对
     * @param $table 要初入的表格
     * @return bool  插入成功与否
     */
    public function insert(array $data,$table)
    {

        $sql="INSERT INTO `$table`(";
        $pre_key=""; $pre_value="";
        $flag=false;
        foreach($data as $key=>$value)
        {
            if($flag){
                $pre_key.=",`$key`";
                $pre_value.=",'$value'";
            }else{
                $flag = true;
                $pre_key.="`$key`";
                $pre_value.="'$value'";
            }
        }
        $sql.=$pre_key.") VALUES(".$pre_value.")";
        if(DEBUG){
            echo "sql : ".$sql;
        }
        $this->exec($sql);
        if($this->db->errno() != 0){
            return false;
        }else return true;
    }
    /**
     * 终极版！ 解决一切select的问题
     * @param $table 表的名字
     * @param array $rets  返回需要的键值的
     * @param array $where  返回where需要的东西
     * @return mixed
     */
    public function select($table,array $rets,array $where)
    {
        $sql = "SELECT ";
        if(count($rets)==0){
            $sql .= " * ";
        }else{
            $flag = false;
            foreach($rets  as $val)
            {
                if($flag){
                    $sql .= ",`".$val."`";
                }else{
                    $flag = true;
                    $sql .= "`".$val."`";
                }
            }
        }

        $sql .= " from `$table` ";

        $len = count($where);
        if(0 < $len){
            $sql.=" WHERE ";
            $i = 0;
            foreach($where as $key => $val)
            {
                $i = $i + 1;
                if($i == 1){
                    $sql .= "`$key`='$val' ";
                }else{
                    $sql .= " AND `$key`='$val' ";
                }
            }
        }
        if(DEBUG){
            echo $sql;
        }
        $data = $this->getData($sql);
        return $data;
    }
    public function exist($table, array $rets,array $where){
        $sql = "SELECT ";
        if(count($rets)==0){
            $sql .= " * ";
        }else{
            $flag = false;
            foreach($rets  as $val)
            {
                if($flag){
                    $sql .= ",`".$val."`";
                }else{
                    $flag = true;
                    $sql .= "`".$val."`";
                }
            }
        }
        $sql .= " from `$table` ";
        if($flag == false)return false;
        $len = count($where);
        if(0 < $len){
            $sql.=" WHERE ";
            $i = 0;
            foreach($where as $key => $val)
            {
                $i = $i + 1;
                if($i == 1){
                    $sql .= "`$key`='$val' ";
                }else{
                    $sql .= " AND `$key`='$val' ";
                }
            }
        }
        if(DEBUG){
            echo $sql;
        }
        return $this->exec($sql);
    }
    /**
     * @param $table 表的名字
     * @param array $data
     * @param array $where
     * @return bool
     */
    public function update($table,array $data,array $where){
        $sql = "UPDATE `$table` SET ";
        $flag = false;
        foreach($data as $key => $value)
        {
            if($flag){
                $sql .= ",`$key`='$value'";
            }else{
                $flag = true;
                $sql .= "`$key`='$value'";
            }
        }
        if($flag == false)return false;
        $len = count($where);
        if(0 < $len){
            $sql.=" WHERE ";
            $i = 0;
            foreach($where as $key => $val)
            {
                $i = $i + 1;
                if($i == 1){
                    $sql .= "`$key`='$val' ";
                }else{
                    $sql .= " AND `$key`='$val' ";
                }
            }
        }
        if(DEBUG){
            echo $sql;
        }
        $this->exec($sql);
        if($this->db->errno() != 0){
            return false;
        }else return true;
    }

    /**
     * @param array $data
     * @param $table
     * @return bool
     */
    public function delete(array $data,$table)
    {
        $len = count($data);
        if($len < 1) return false;
        $sql = "DELETE FROM `$table` WHERE ";
        $i = 0;
        foreach($data as $key => $value)
        {
            $i = $i + 1;
            if($i != 1  && $i != $len){
                $sql = $sql.", `$key`='$value' ";
            }else if($i == 1){
                $sql = $sql." `$key`='$value' ";
            }else{
                $sql = $sql ." AND `$key`='$value'";
            }
        }
        if(debug){
            echo "delete : ".$sql."\n";
        }
        $this->exec($sql);
        if($this->db->errno()!=0){
            return false;
        }else return true;
    }

    /**
     * 关闭数据库
     */
    public function __destruct()
    {
        $this->db->closeDb();
    }

} 