<?php
/**
 * Created by PhpStorm.
 * User: ipqhjjybj
 * Date: 15/3/2
 * Time: 下午8:10
 */

include_once("SAE_DB.php");
include_once("function.php");
$key = $_GET["id"];

$db = new SAE_DB();
$data = $db->select("user_username",array(),array("id"=>$key));
if(count($data) > 0){
    $a = $data[0];

    $arr=array(
        "neuoj"=>get_rating_and_solve_problem("neu",$a["neuoj"]),
        "poj"=>get_rating_and_solve_problem("poj",$a["poj"]),
        "hdoj"=>get_rating_and_solve_problem("hdoj",$a["hdoj"]),
        "zoj"=>get_rating_and_solve_problem("zoj",$a["zoj"]),
        "uva"=>get_rating_and_solve_problem("uva",$a["uva"]),
        "codeforces"=>get_rating_and_solve_problem("codeforces",$a["codeforces"]),
        "topcoder"=>get_rating_and_solve_problem("topcoder",$a["topcoder"]),
        "bestcoder"=>get_rating_and_solve_problem("bestcoder",$a["bestcoder"])
    );

    if($db->update("user_solve_problem",$arr,array("id"=>$key))){
        echo "<th>".$a["school_num"]."</th>";
        echo "<th>".$a["real_name"]."</th>";
        echo "<th>".$arr["neuoj"]."</th>";
        echo "<th>".$arr["poj"]."</th>";
        echo "<th>".$arr["hdoj"]."</th>";
        echo "<th>".$arr["zoj"]."</th>";
        echo "<th>".$arr["uva"]."</th>";
        echo "<th>".$arr["codeforces"]."</th>";
        echo "<th>".$arr["topcoder"]."</th>";
        echo "<th>".$arr["bestcoder"]."</th>";
        echo "<th><button type=\"button\" onclick=\"updateText(".$key.")\">一键更新</button></th>";

    }else{
       echo "failed!";
    }
}
?>