﻿<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>Tilly的原型</title>
    <link href="css/base.css" rel="stylesheet" type="text/css" />
</head>
<body>

<p>原型目录：</p>
<?php

    require_once "common_function.php";
/**************config************/
    error_reporting(E_ALL^E_NOTICE);//关闭notice提示
    $filter_array=getFilterArray();
/**************config************/


    $dir = dirname(__FILE__).'/'.getApplicationDir();
    $files = getFileList($dir);
    $projectDir = array();

    foreach($files as $key => $value) {
        if(in_array($value,$filter_array))
            continue;
        list($project) = explode(getSplit(),$value);
        $projectDir[$project][$value] = $value;
    }

    $sortConfig = include_once "sort_config.php";
    $projectSort = $sortConfig['projectSort'];  //项目排序
    $proFileSort = $sortConfig['proFileSort'];  //项目文件排序


    $lessProjectDir = array();
    foreach($projectSort as $skey =>$svalue){
        if(isset($projectDir[$svalue])){
            echoProject($projectDir[$svalue],$svalue,$filter_array,$proFileSort[$svalue]);
            $lessProjectDir[$svalue] = $svalue;
        }
    }

    foreach($projectDir as $k => $v){
        if(!isset($lessProjectDir[$k]))
            echoProject($v,$k,$filter_array,$proFileSort[$k]);
    }


    function echoProject($file,$proName,$filter_array,$proFileSort){
        echo '<span class="xmname">'.$proName.'项目:</span></br>';   //项目分类名称

        echo '<div style="">';
            if(isset($proFileSort)){
                $lessFileDir = array();
                foreach($proFileSort as $key=>$value){
                    if(isset($file[$value])){
                        printATag($value,$filter_array);
                        $lessFileDir[$value] = $value;
                    }
                }
                foreach($file as $fileName){
                    if(!isset($lessFileDir[$fileName])){
                        printATag($fileName,$filter_array);
                    }
                }
            }
            else{
                foreach($file as $fileName){
                    printATag($fileName,$filter_array);
                }
            }

        echo '</div>';
    }

    function printATag($fileName,$filter_array){
        if(in_array($fileName,$filter_array))
            return;

        echo "<a href='".'myproject.php?proName='.$fileName."'>".$fileName.'</a><br/>';  //项目名
    }
?>

</body>
</html>

