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
load(CONFIG_PATH,true);
load(FUNCTION_PATH,false);

//导入目录中的全部文件
function load($path,$flag){
	set_include_path($path);
	if($flag){
		$handle=opendir($path);
		 while($file=readdir($handle))
		{
		   if($file =="." ||$file ==".." ){
			   continue;
		   }else{
			   include($file);
		   }
		} 
	}
}

$CONFIG=$system_config;  //配置属性

//定义项目目录结构
if(defined('APP_NAME')){
	if(!file_exists(APP_PATH)){
		@mkdir(APP_PATH,0777);
	}
}else{
	define('APP_NAME',$CONFIG['DEFAULT_APP_NAME']);
	define('APP_PATH','./apps/'.APP_NAME);
	if(!file_exists(APP_PATH)){
		@mkdir(APP_PATH,0777);
	}
}


defined("ACTION_PATH") or define("ACTION_PATH",APP_PATH."/controller");              //控制器目录
defined("CLASS_PATH") or define("CLASS_PATH",APP_PATH."/class");              //公共类目录
defined("PUBLIC_PATH") or define("PUBLIC_PATH",APP_PATH."/public");              //资源文件目录
defined("MODEL_PATH") or define("MODEL_PATH",APP_PATH."/model");              //模型类目录
defined("FUNCTION_PATH") or define("FUNCTION_PATH",APP_PATH."/functions");              //函数目录

if(!file_exists(ACTION_PATH)){
	@mkdir(ACTION_PATH,0666);
}

if(!file_exists(CLASS_PATH)){
	@mkdir(CLASS_PATH,0666);
}

if(!file_exists(PUBLIC_PATH)){
	@mkdir(PUBLIC_PATH,0666);
}

if(!file_exists(MODEL_PATH)){
	@mkdir(MODEL_PATH,0666);
}

if(!file_exists(FUNCTION_PATH)){
	@mkdir(FUNCTION_PATH,0666);
}

$actiondata=<<<code
<?
class IndexAction extends Action
{
	public function index(){
		echo "welcome use rxcphp !";
	}
}
?>
code;

// 创建默认控制器
if(!empty($CONFIG['DEFAULT_ACTION'])){
	$actionfile=ACTION_PATH.'/'.$CONFIG['DEFAULT_ACTION'].'Action.class.php';
	if(!file_exists($actionfile)){
		file_put_contents($actionfile,$actiondata);
	}
}

?>