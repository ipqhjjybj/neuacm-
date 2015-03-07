<?php
/**
 * Created by PhpStorm.
 * User: ipqhjjybj
 * Date: 15/3/1
 * Time: 下午9:28
 */


function neu_oj_solve_problems($key){
    $url="http://acm.neu.edu.cn/hustoj/userinfo.php?user=".$key;
    $content=file_get_contents($url);
    $down=strstr($content,"<a href='status.php?user_id=".$key."&jresult=4'>");
    $down=strstr($down,"jresult=4'>");
    $down=substr($down,11);
    $num=strpos($down,"</a>");
    $down=substr($down,0,$num);
    if(strlen($down) == 0){
        return "0";
    }else return $down;
}

function poj_oj_solve_problem($key){
    $url="http://poj.org/searchuser?key=".$key."&B1=Search";
    //echo $url;
    $content=file_get_contents($url);
    $down=strstr($content,"<a href=userstatus?user_id=".$key.">");
    //echo $down;
    $down=strstr($down,"<td>");
    $down=substr($down,4);

    $down=strstr($down,"<td>");
    $down=substr($down,4);

    $down=strstr($down,"<td>");
    $down=substr($down,4);

    $down=strstr($down,"<td>");
    $down=substr($down,4);
    //echo $down;
    //echo $down;
    $num=strpos($down,"</td>");
    //echo $num;
    $down=substr($down,0,$num);
    //echo $down;
    if(strlen($down) == 0 || $down==" "){
        return "0";
    }else return $down;
}

function hdoj_oj_solve_problem($key){
    $url="http://acm.hdu.edu.cn/search.php?field=author&key=".$key;
    //echo $url;
    $content=file_get_contents($url);
    $down=strstr($content,"<a href='userstatus.php?user=".$key."'>");

    $down=strstr($down,"<td>");
    $down=substr($down,4);

    $down=strstr($down,"<td>");
    $down=substr($down,4);

    //echo $down;
    //echo $down;
    $num=strpos($down,"</td>");
    //echo $num;
    $down=substr($down,0,$num);
    //echo $down;
    if(strlen($down) == 0 || $down==" "){
        return "0";
    }else return $down;
}

function zoj_oj_solve_problem($key){
    $url="http://acm.zju.edu.cn/onlinejudge/showUserStatus.do?userId=".$key;
    //echo $url;
    $content=file_get_contents($url);
    $down=strstr($content,"<font color=\"red\" size=\"4\">");
    $down=substr($down,27);
    $num=strpos($down,"/");
    $down=substr($down,0,$num);

    if(strlen($down) == 0 || $down==" "){
        return "0";
    }else return $down;
}

function codeforces_rating($key){
    $url="http://codeforces.com/profile/".$key;
    $content=file_get_contents($url);
    $down=strstr($content,"<span style=\"font-weight:bold;\" class=\"user-");
    $down=substr($down,39);
    $down=strstr($down,"\">");
    $down=substr($down,2);
    $num=strpos($down,"</span>");
    $down=substr($down,0,$num);

    if(strlen($down) == 0 || $down==" "){
        return "0";
    }else return $down;
}

function bestcoder_rating($key){
    $url="http://bestcoder.hdu.edu.cn/rating.php?user=".$key;
    $content=file_get_contents($url);
    $down=strstr($content,"<p>Rating: </p>");
    $down=substr($down,3);
    $down=strstr($down,"<p>");
    $down=substr($down,3);
    $num=strpos($down,"</p>");

    $down=substr($down,0,$num);

    if(strlen($down) == 0 || $down==" "){
        return "0";
    }else return $down;
}
function uva_oj_solve_problem($key){
    $url="http://uva.onlinejudge.org/index.php?option=com_onlinejudge&Itemid=20&page=show_authorstats&userid=".$key;
    $content=file_get_contents($url);
    $down=strstr($content,"<td width=\"20%\" align=\"center\"><h1 style=\"margin-top:-20px;margin-bottom:-5px;\">");
    $down=substr($down,80);
    $down=strstr($down,"<td width=\"20%\" align=\"center\"><h1 style=\"margin-top:-20px;margin-bottom:-5px;\">");
    $down=substr($down,80);
    $down=strstr($down,"<td width=\"20%\" align=\"center\"><h1 style=\"margin-top:-20px;margin-bottom:-5px;\">");
    $down=substr($down,80);
    $num=strpos($down,"</h1></td>");
    $down=substr($down,0,$num);

    if(strlen($down) == 0 || $down==" "){
        return "0";
    }else return $down;
}
function get_rating_and_solve_problem($oj,$key){
    if($oj=="hdoj"){
        return hdoj_oj_solve_problem($key);
    }
    if($oj=="neu"){
        return neu_oj_solve_problems($key);
    }
    if($oj=="poj"){
        return poj_oj_solve_problem($key);
    }
    if($oj=="zoj"){
        return zoj_oj_solve_problem($key);
    }
    if($oj=="codeforces"){
        return codeforces_rating($key);
    }
    if($oj=="bestcoder"){
        return bestcoder_rating($key);
    }
    if($oj=="uva"){
        return uva_oj_solve_problem($key);
    }
    return "参数错误";
}
?>