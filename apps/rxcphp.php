<?php
//error_reporting(0);

define("BASE_PATH","./apps/");   //项目基础目录

//定义框架路径常量
defined("FRAME_PATH") or define("FRAME_PATH",BASE_PATH."rxcphp/"); //框架根目录

defined("CORE_PATH") or define("CORE_PATH",FRAME_PATH."core/");              //核心类目录
defined("DBEXT_PATH") or define("DBEXT_PATH",FRAME_PATH."dbext/");            //数据库扩展类目录
defined("CACHE_PATH") or define("CACHE_PATH",FRAME_PATH."cache/");            //数据库扩展类目录
defined("TOOLS_PATH") or define("TOOLS_PATH",FRAME_PATH."tools/");            //工具扩展类目录
defined("CONFIG_PATH") or define("CONFIG_PATH",FRAME_PATH."config/");            //配置文件目录
defined("FUNCTION_PATH") or define("FUNCTION_PATH",FRAME_PATH."function/");            //函数文件目录


//导入框架类文件
load(CORE_PATH,true);  //引入文件
load(DBEXT_PATH,false); //不引人文件
load(CACHE_PATH,false);
load(TOOLS_PATH,false);
load(CONFIG_PATH,false);
load(FUNCTION_PATH,false);

//导入目录中的全部文件
function load($path,$flag){
	set_include_path($path);
	if($flag){
		$handle=opendir($path);
		 while($file =readdir($handle ))
		{
		   if($file =="." ||$file ==".." ){
			   continue;
		   }else{
			   require_once($file);
		   }
		} 
	}
}




?>