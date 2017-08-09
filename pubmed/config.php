<?php

/*
一个抓取任务建一个数据库
数据库用域名命名
表前缀标明资源类型
表后缀标明页面类型(目次页面,详细页面)
*/
/**************数据库配置*****************/
date_default_timezone_set("Asia/Shanghai");
DEFINE("DB_HOST", "localhost");
DEFINE("DB_USER", "root");
DEFINE("DB_PWD", "mylib");
DEFINE("DB_NAME", "gatherdata");
DEFINE("DB_NAME2", "njlza_find_self_source");
DEFINE("DB_NAME3", "jcrxk");
DEFINE("DB_NAME4", "isiauto".date("Ym"));
DEFINE("DB_NAME5", "esibasedata");//esi总数据表(txt格式)
DEFINE("DB_NAME6", "toppaper".date("Ym"));//esi总数据表(txt格式)
DEFINE("DB_NAME7", "esi_co");
DEFINE("DB_NAME8", "esi_jour");
DEFINE("DB_NAME9", "esi_front");
DEFINE("DB_NAME10", "epub_sipo_gov");//中国专利公布公告


mysql_connect(DB_HOST,DB_USER,DB_PWD);
mysql_select_db(DB_NAME);
mysql_query("set names utf8");

/********链接配置********/
//cnki域名
DEFINE("LLINK", "http://epub.cnki.net/");
/**********表名配置**************/
DEFINE("GATHER1", "gather1");//cnki期刊原始数据表(定期更新表)
DEFINE("GATHER2", "cnki_kan_qi");//cnki期刊期总表
DEFINE("GATHER3", "cnki_kan");//我方cnki期刊总表
DEFINE("GATHER4", "cnkiKaninfo");//cnki字段表(给人看的)
DEFINE("GATHER8", "cnki_qibu");//生成缺失的期数表分给其他机器抓数据

DEFINE("GATHER5", "cnkibsxk");//cnki博士学科表
DEFINE("GATHER6", "gather6");//cnki博士机构目次表
DEFINE("GATHER7", "gather7");//cnki博士机构字段

DEFINE("GATHER9", "jcr_jsse_2013");//jsse期刊目次页面
DEFINE("GATHER10", "jcr_jsse_2013z");//jsse期刊字段表
DEFINE("GATHER11", "jcr_jsse_dcnt2013");//jsse期刊内容表和分区表


DEFINE("GATHER29", "jcr_jse_2013");//jse期刊目次页面
DEFINE("GATHER30", "jcr_jse_2013z");//jse期刊字段表
DEFINE("GATHER31", "jcr_jse_dcnt2013");//jse期刊内容表和分区表
DEFINE("GATHER32", "jsehz");//jse最终表
DEFINE("GATHER33", "jssehz");//jsse最终表

DEFINE("GATHER34", "highly_ym");//Highly目次表
DEFINE("GATHER35", "highly_cnt");//Highly文章详细页面表
DEFINE("GATHER36", "esibasedata");//总数据表(txt格式)

DEFINE("GATHER37", "hot_ym");//Hot目次表
DEFINE("GATHER38", "hot_cnt");//Hot文章详细页面表

DEFINE("GATHER39", "cnki_kan_qi");//生成某年的对比期数表

/*************大屏pad+***************/
DEFINE("GATHER40", "padqk_cnki");


/*************科学基金共享服务网*****************/
DEFINE("GATHER50", "gather50");//目次页面
DEFINE("GATHER51", "gather51");//详细页面
DEFINE("GATHER52", "gather52");//字段表
DEFINE("GATHER53", "gather53");
DEFINE("GATHER54", "gather54");
DEFINE("GATHER55", "gather55");
/****************pad+大屏********************/
DEFINE("GATHER60", "database_center_new");//电子书列表

/***************国家社科基金项目数据库****************/
DEFINE("GATHER80", "gather80");//目次页面
DEFINE("GATHER81", "gather81");//字段表


/************toppaper抓取**************/
DEFINE("GATHER100", "school_jg_ym");
DEFINE("GATHER101", "school_xk");
DEFINE("GATHER102", "school_viewcnt");
DEFINE("GATHER103", "websiencecnt");
DEFINE("GATHER104", "toppaperz");


/****************esi_countries,esi_journals,esi_fronts**********************/
DEFINE("GATHER150", "jg_ym");
DEFINE("GATHER151", "xktb");
DEFINE("GATHER152", "jg_ym");
DEFINE("GATHER153", "xktb");
DEFINE("GATHER154", "jg_ym");
DEFINE("GATHER155", "xktb");
DEFINE("GATHER156", "school_viewcnt");
DEFINE("GATHER157", "websiencecnt");
//`school_viewcnt`
/**************专利数据******************/
DEFINE("GATHER200", "zl_mc");


?>