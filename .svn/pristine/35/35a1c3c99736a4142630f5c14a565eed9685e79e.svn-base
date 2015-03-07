<?php
/**
 * Created by PhpStorm.
 * User: ipqhjjybj
 * Date: 15/3/2
 * Time: 下午8:53
 */




if(isset($_GET["id"]) && strlen($_GET["id"]) > 0){
    $id=$_GET["id"];
    include_once("SAE_DB.php");
    include_once("function.php");
    $db = new SAE_DB();
    if($db->delete(array("id"=>$id),"user_solve_problem") && $db->delete(array("id"=>$id),"user_username") ){
        echo "删除成功";
    }else{
        echo "删除失败";
    }
}else{
    echo "删除失败";
}
?>