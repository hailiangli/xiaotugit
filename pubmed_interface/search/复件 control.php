<?php
/*
pubmed搜索接口
search_list($keywords,$action=array(),$sorttype,$page,$pagesize=20)
http://pubmed.cc/pubmed_interface/controller.php?control=search&action=search_list&keywords=life&sorttype=&act=&page=1
*/
class control extends base
{
	function search_list()
	{
		$this->page		= $_REQUEST['page'];
		$page	        = $this->page;
		$sorttype	    = $_REQUEST['sorttype'];
		$action			= $_REQUEST['act'];
		$this->pagesize	= 20;
		$keycom			= $_REQUEST['keywords'];//高级检索前台用户填写检索词
		
		/*******排序*******/
		switch($sorttype)
		{
			case 1:
				$px	= "";break;
			case 2:
				$px	= "[relevance]";break;
			case 3:
				$px	= "PublicationDate";break;
			case 4:
				$px	= "Author";break;
			case 5:
				$px	= "LastAuthor";break;
			case 6:
				$px	= "JournalName";break;
			case 7:
				$px	= "Title";break;
			default:
				$px	= "";break;
		}
	
		$px		= urlencode($px);
		$px2	= $px;

		if(!empty($action))
		{
			foreach($action as $key=>$value)
			{
				$jlstring	.= implode(';',$value).';';
			}
			$jlstring	= urlencode(preg_replace('/;$/siU','',$jlstring));
			
			if($page==1)
			{
				$tmp_url	= 'http://www.ncbi.nlm.nih.gov/pubmed';
				$tmp_param	= 'http://www.ncbi.nlm.nih.gov/pubmed?term='.$keycom.'+&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.PreviousPageName=results&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.SpecialPageName=&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetsUrlFrag=filters%3D%3B'.$jlstring.'&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetSubmitted=true&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.BMFacets=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort='.$px.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort=&email_format=docsum&email_sort=&email_count=20&email_start=1&email_address=&email_subj=life+-+PubMed&email_add_text=&EmailCheck1=&EmailCheck2=&coll_start=1&citman_count=20&citman_start=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Presentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Sort='.$px2.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Format=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevSort=&CollectionStartIndex=1&CitationManagerStartIndex=1&CitationManagerCustomRange=false&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.CurrPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.ResultCount=1049458&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.RunLastQuery=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize2=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort2='.$px.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort2=&email_format2=docsum&email_sort2=&email_count2=20&email_start2=1&email_address2=&email_subj2=life+-+PubMed&email_add_text2=&EmailCheck1=&EmailCheck2=&coll_start2=1&citman_count2=20&citman_start2=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailReport=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailCount=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailStart=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Email=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSubject=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailText=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailQueryKey=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailHID=1DQKMXIzOF_4GEPhCZOdONIeSmpj8qg3i5m9v8eti7vMpdgFxja5p_LjMMAgFEWJLNA5SAHzVbi3tk41Pwsn2XRo3_KV13OkN&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.QueryDescription=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Key=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Answer=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Holding=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingFft=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingNdiSet=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.OToolValue=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.SubjectList=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.CurrTimelineYear=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.BlobID=NCID_1_360318965_130.14.22.215_9001_1438753823_1418884895_0MetA0_S_MegaStore_F_1&EntrezSystem2.PEntrez.DbConnector.Db=pubmed&EntrezSystem2.PEntrez.DbConnector.LastDb=pubmed&EntrezSystem2.PEntrez.DbConnector.Term='.$keycom.'&EntrezSystem2.PEntrez.DbConnector.LastTabCmd=&EntrezSystem2.PEntrez.DbConnector.LastQueryKey='.$_SESSION['ncbi_pubmed_LastQueryKey'].'&EntrezSystem2.PEntrez.DbConnector.IdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LastIdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LinkName=&EntrezSystem2.PEntrez.DbConnector.LinkReadableName=&EntrezSystem2.PEntrez.DbConnector.LinkSrcDb=&EntrezSystem2.PEntrez.DbConnector.Cmd=search&EntrezSystem2.PEntrez.DbConnector.TabCmd=&EntrezSystem2.PEntrez.DbConnector.QueryKey=&p%24a=&p%24l=EntrezSystem2&p%24st=pubmed';

				$tmp_content=$this->vcurl($tmp_url,$tmp_param,'',$_SESSION['pubmedcookie'],'','80','','dd');
				$this->WebJx($tmp_content);
				$this->daochu($tmp_content);

				preg_match_all('/<input name="EntrezSystem2\.PEntrez\.DbConnector\.LastQueryKey".*value="(.*)" \/>/siU',$tmp_content,$key);
				$_SESSION['ncbi_pubmed_LastQueryKey']=$key[1][0];
			}
			else
			{
				$tmp_url='http://www.ncbi.nlm.nih.gov/pubmed';
				$tmp_param	= 'term='.$keycom.'&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.PreviousPageName=results&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.SpecialPageName=&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetsUrlFrag=filters%3D&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetSubmitted=false&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.BMFacets=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort='.$px.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort=&email_format=docsum&email_sort=&email_count=20&email_start=1&email_address=&email_subj=life+-+PubMed&email_add_text=&EmailCheck1=&EmailCheck2=&coll_start=1&citman_count=20&citman_start=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Presentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Sort='.$px2.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Format=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevSort=&CollectionStartIndex=1&CitationManagerStartIndex=1&CitationManagerCustomRange=false&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.CurrPage='.$page.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.ResultCount=1046428&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.RunLastQuery=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize2=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort2=none&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort2=&email_format2=docsum&email_sort2=&email_count2=20&email_start2=1&email_address2=&email_subj2=life+-+PubMed&email_add_text2=&EmailCheck1=&EmailCheck2=&coll_start2=1&citman_count2=20&citman_start2=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailReport=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailCount=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailStart=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Email=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSubject=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailText=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailQueryKey=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailHID=1Da7F382F_SXRpzNqrzfFRK8YXLlSCTTXLRmHTl5em5h7v0sOCDpIY0kYFGRZQLqA3I4xfj5zqj8uviX2UHp3JPy1T42vatQ6&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.QueryDescription=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Key=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Answer=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Holding=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingFft=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingNdiSet=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.OToolValue=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.SubjectList=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.CurrTimelineYear=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.BlobID=NCID_1_180291629_130.14.22.215_9001_1437700970_1541711030_0MetA0_S_MegaStore_F_1&EntrezSystem2.PEntrez.DbConnector.Db=pubmed&EntrezSystem2.PEntrez.DbConnector.LastDb=pubmed&EntrezSystem2.PEntrez.DbConnector.Term=life&EntrezSystem2.PEntrez.DbConnector.LastTabCmd=&EntrezSystem2.PEntrez.DbConnector.LastQueryKey='.$_SESSION['ncbi_pubmed_LastQueryKey'].'&EntrezSystem2.PEntrez.DbConnector.IdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LastIdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LinkName=&EntrezSystem2.PEntrez.DbConnector.LinkReadableName=&EntrezSystem2.PEntrez.DbConnector.LinkSrcDb=&EntrezSystem2.PEntrez.DbConnector.Cmd=PageChanged&EntrezSystem2.PEntrez.DbConnector.TabCmd=&EntrezSystem2.PEntrez.DbConnector.QueryKey=&p%24a=EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.Page&p%24l=EntrezSystem2&p%24st=pubmed';
				$tmp_content=$this->vcurl($tmp_url,$tmp_param,'',$_SESSION['pubmedcookie'],'','80','','dd');
				$this->WebJx($tmp_content);
				$this->daochu($tmp_content);
			}
		}
		else
		{	
			if($page==1)
			{	

				if(empty($px))
				{	

					
					$_SESSION['pubmedcookie']	= 'cache_file/pubcookie.'.rand(000000,999999).'.txt';
					$tmp_url		= 'http://www.ncbi.nlm.nih.gov/pubmed/?term='.$keycom;	
					
					
					$tmp_content	= $this->vcurl($tmp_url,'','',$_SESSION['pubmedcookie'],'','40','','dfds');
		
					preg_match_all('/<input name="EntrezSystem2\.PEntrez\.DbConnector\.LastQueryKey".*value="(.*)" \/>/siU',$tmp_content,$key);
					$_SESSION['ncbi_pubmed_LastQueryKey']=$key[1][0];
					$this->WebJx($tmp_content);
					$this->daochu($tmp_content);
				}
				else
				{
					$tmp_url	= 'http://www.ncbi.nlm.nih.gov/pubmed';
					$tmp_param	= 'term='.$keycom.'&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.PreviousPageName=results&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.SpecialPageName=&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetsUrlFrag=filters%3D&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetSubmitted=false&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.BMFacets=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort='.$px.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort=%5Brelevance%5D&email_format=docsum&email_sort=%5Brelevance%5D&email_count=20&email_start=1&email_address=&email_subj=life+-+PubMed&email_add_text=&EmailCheck1=&EmailCheck2=&coll_start=1&citman_count=20&citman_start=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Presentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Sort='.$px2.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastSort=%5Brelevance%5D&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileSort=%5Brelevance%5D&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Format=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevSort=%5Brelevance%5D&CollectionStartIndex=1&CitationManagerStartIndex=1&CitationManagerCustomRange=false&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.CurrPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.ResultCount=1050969&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.RunLastQuery=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize2=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort2=none&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort2=%5Brelevance%5D&email_format2=docsum&email_sort2=%5Brelevance%5D&email_count2=20&email_start2=1&email_address2=&email_subj2=life+-+PubMed&email_add_text2=&EmailCheck1=&EmailCheck2=&coll_start2=1&citman_count2=20&citman_start2=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailReport=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailCount=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailStart=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Email=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSubject=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailText=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailQueryKey=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailHID=1PQSMQPtQsizuz-o8vgchVrDrfnX9ciz88r51BDEVPZ41LNxH_PyY4LvOQ-7ueXDOvuJAR88r3IVNZ1mNCT7ILVavfq7mlH&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.QueryDescription=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Key=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Answer=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Holding=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingFft=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingNdiSet=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.OToolValue=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.SubjectList=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.CurrTimelineYear=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.BlobID=NCID_1_438897323_130.14.22.215_9001_1439256973_827875778_0MetA0_S_MegaStore_F_1&EntrezSystem2.PEntrez.DbConnector.Db=pubmed&EntrezSystem2.PEntrez.DbConnector.LastDb=pubmed&EntrezSystem2.PEntrez.DbConnector.Term='.$keycom.'&EntrezSystem2.PEntrez.DbConnector.LastTabCmd=&EntrezSystem2.PEntrez.DbConnector.LastQueryKey=1&EntrezSystem2.PEntrez.DbConnector.IdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LastIdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LinkName=&EntrezSystem2.PEntrez.DbConnector.LinkReadableName=&EntrezSystem2.PEntrez.DbConnector.LinkSrcDb=&EntrezSystem2.PEntrez.DbConnector.Cmd=displaychanged&EntrezSystem2.PEntrez.DbConnector.TabCmd=&EntrezSystem2.PEntrez.DbConnector.QueryKey=&p%24a=EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort&p%24l=EntrezSystem2&p%24st=pubmed';
		
					$tmp_content	= $this->vcurl($tmp_url,$tmp_param,'',$_SESSION['pubmedcookie'],'','80','','dd');

					//echo $tmp_content;exit;
					$this->WebJx($tmp_content);
					$this->daochu($tmp_content);
				}
			}
			else
			{	
				$tmp_url='http://www.ncbi.nlm.nih.gov/pubmed';
				$tmp_param	= 'term='.$keycom.'&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.PreviousPageName=results&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.SpecialPageName=&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetsUrlFrag=filters%3D&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetSubmitted=false&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.BMFacets=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort='.$px.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort=&email_format=docsum&email_sort=&email_count=20&email_start=1&email_address=&email_subj=life+-+PubMed&email_add_text=&EmailCheck1=&EmailCheck2=&coll_start=1&citman_count=20&citman_start=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Presentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Sort='.$px2.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Format=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevSort=&CollectionStartIndex=1&CitationManagerStartIndex=1&CitationManagerCustomRange=false&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.CurrPage='.$page.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.ResultCount=1046428&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.RunLastQuery=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize2=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort2=none&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort2=&email_format2=docsum&email_sort2=&email_count2=20&email_start2=1&email_address2=&email_subj2=life+-+PubMed&email_add_text2=&EmailCheck1=&EmailCheck2=&coll_start2=1&citman_count2=20&citman_start2=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailReport=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailCount=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailStart=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Email=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSubject=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailText=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailQueryKey=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailHID=1Da7F382F_SXRpzNqrzfFRK8YXLlSCTTXLRmHTl5em5h7v0sOCDpIY0kYFGRZQLqA3I4xfj5zqj8uviX2UHp3JPy1T42vatQ6&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.QueryDescription=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Key=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Answer=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Holding=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingFft=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingNdiSet=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.OToolValue=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.SubjectList=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.CurrTimelineYear=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.BlobID=NCID_1_180291629_130.14.22.215_9001_1437700970_1541711030_0MetA0_S_MegaStore_F_1&EntrezSystem2.PEntrez.DbConnector.Db=pubmed&EntrezSystem2.PEntrez.DbConnector.LastDb=pubmed&EntrezSystem2.PEntrez.DbConnector.Term=life&EntrezSystem2.PEntrez.DbConnector.LastTabCmd=&EntrezSystem2.PEntrez.DbConnector.LastQueryKey='.$_SESSION['ncbi_pubmed_LastQueryKey'].'&EntrezSystem2.PEntrez.DbConnector.IdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LastIdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LinkName=&EntrezSystem2.PEntrez.DbConnector.LinkReadableName=&EntrezSystem2.PEntrez.DbConnector.LinkSrcDb=&EntrezSystem2.PEntrez.DbConnector.Cmd=PageChanged&EntrezSystem2.PEntrez.DbConnector.TabCmd=&EntrezSystem2.PEntrez.DbConnector.QueryKey=&p%24a=EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.Page&p%24l=EntrezSystem2&p%24st=pubmed';
				$tmp_content=$this->vcurl($tmp_url,$tmp_param,'',$_SESSION['pubmedcookie'],'','80','','dd');
				$this->WebJx($tmp_content);
				$this->daochu($tmp_content);
			}
		}
	}

	function WebJx($tmp_content='')
	{


		if(preg_match('/See 1 citation found b/siU',$tmp_content))
		{
			$fun_pagenum=1;
		}
		else
		{
			preg_match_all('/<meta name="ncbi_resultcount" content="(.*)" \/>/siU',$tmp_content,$p);
			$fun_pagenum=trim(strip_tags($p[1][0]));
		}
		
		$this->result_contents['totalnum']=$fun_pagenum;
		preg_match_all('/class="rslt">.*<p class="links nohighlight">/siU',$tmp_content,$arr);
		
		$tmp_link="http://www.ncbi.nlm.nih.gov/";				
		//获取聚类内容
		preg_match_all('/class="facet_cont".*>(.*)<ul class="facet facet_reset">/siU',$tmp_content,$table);
		
		preg_match_all('/<h3>(.*)<\/h3>.*<ul>(.*)<\/ul>/siU',$table[1][0],$arrr);
		
		if(!empty($arrr))
		{
			$this->result_contents['jlcnt']	= array();
			for($i=0;$i<count($arrr[0]);$i++)
			{
				$jlshuzu	= array();
				preg_match_all('/<li.*href="#" data-value_id="(.*)">(.*)<\/a>/siU',$arrr[0][$i],$arr100);
			
				for($c=0;$c<count($arr100[1]);$c++)
				{
					$jlshuzu[trim(strip_tags($arr100[2][$c]))]=trim(strip_tags($arr100[1][$c]));
				}
			
				$this->result_contents['jlcnt'][trim(strip_tags($arrr[1][$i]))][]	= $jlshuzu;
			}
		}
		else
		{
			$this->result_contents['jlcnt']	= array();
		}
		
		$this->result_contents['page_message'] = array
		(
				'pages'			=>	ceil($this->result_contents['totalnum']/$this->pagesize),//总页数
				'page_now'		=>	$this->page,//当前页数
				'total_nums'	=>	$this->result_contents['totalnum'],//总记录数
				'page_size'		=>	$this->pagesize,//每页记录数
		);

		//print_R($this->result_contents);exit;
	}
	

	function execDoi($string)
	{
		$string	= preg_replace('/\[.*$/siU','',$string);
		$string	= trim(str_replace('. eCollection 2015','',$string));
		$string	= preg_replace('/\. Epub.*$/siU','',$string);
		$string	= preg_replace('/\.$/siU','',$string);
		$string	= preg_replace('/\. .*$/siU','',$string);	
		return $string;
	}

	 function daochu($pcnt)
	 {

		
		$this->cnt	= $pcnt;
		preg_match_all('/id="UidCheckBox.*value="(.*)"/siU',$this->cnt,$arr);
		$dcstring	= '&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_RVDocSum.uid='.implode("&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_RVDocSum.uid=",$arr[1]);

		$dcstring2	= urlencode(implode(',',$arr[1]));

		$tmp_url	= 'http://www.ncbi.nlm.nih.gov/pubmed';
		$tmp_param	= 'term=nanjing+university+&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.PreviousPageName=results&EntrezSystem2.PEntrez.PubMed.Pubmed_PageController.SpecialPageName=&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetsUrlFrag=filters%3D&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.FacetSubmitted=false&EntrezSystem2.PEntrez.PubMed.Pubmed_Facets.BMFacets=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation=medline&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort=none&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort=&email_format=docsum&email_sort=&email_count=20&email_start=1&email_address=&email_subj=nanjing+university+-+PubMed&email_add_text=&EmailCheck1=&EmailCheck2=&coll_start=1&citman_count=20&citman_start=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileFormat=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Presentation=medline&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Sort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FileSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.Format=text&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.LastFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPageSize=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevPresentation=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.PrevSort=&CollectionStartIndex=1&CitationManagerStartIndex=1&CitationManagerCustomRange=false&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.CurrPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.ResultCount=42711&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_ResultsController.RunLastQuery='.$dcstring.'&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Entrez_Pager.cPage=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPageSize2=20&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sSort2=none&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FFormat2=docsum&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.FSort2=&email_format2=docsum&email_sort2=&email_count2=20&email_start2=1&email_address2=&email_subj2=nanjing+university+-+PubMed&email_add_text2=&EmailCheck1=&EmailCheck2=&coll_start2=1&citman_count2=20&citman_start2=1&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailReport=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailFormat=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailCount=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailStart=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSort=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Email=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailSubject=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailText=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailQueryKey=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.EmailHID=1xEmYyjTrUSXAIFW_MDCbodj5mRf4X8Uq2WxrgGeVDYQIKNtE0UJM3WBxlDRMEDaK027QJFmCSVwK0OcB_3jWER7YHTa2FE9Tx&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.QueryDescription=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Key=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Answer=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.Holding=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingFft=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.HoldingNdiSet=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.OToolValue=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.EmailTab.SubjectList=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.CurrTimelineYear=&EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.TimelineAdPlaceHolder.BlobID=NCID_1_478798523_130.14.18.34_9001_1439347648_2000734013_0MetA0_S_MegaStore_F_1&EntrezSystem2.PEntrez.DbConnector.Db=pubmed&EntrezSystem2.PEntrez.DbConnector.LastDb=pubmed&EntrezSystem2.PEntrez.DbConnector.Term=nanjing+university&EntrezSystem2.PEntrez.DbConnector.LastTabCmd=&EntrezSystem2.PEntrez.DbConnector.LastQueryKey='.$_SESSION['ncbi_pubmed_LastQueryKey'].'&EntrezSystem2.PEntrez.DbConnector.IdsFromResult='.$dcstring2.'&EntrezSystem2.PEntrez.DbConnector.LastIdsFromResult=&EntrezSystem2.PEntrez.DbConnector.LinkName=&EntrezSystem2.PEntrez.DbConnector.LinkReadableName=&EntrezSystem2.PEntrez.DbConnector.LinkSrcDb=&EntrezSystem2.PEntrez.DbConnector.Cmd=displaychanged&EntrezSystem2.PEntrez.DbConnector.TabCmd=&EntrezSystem2.PEntrez.DbConnector.QueryKey=&p%24a=EntrezSystem2.PEntrez.PubMed.Pubmed_ResultsPanel.Pubmed_DisplayBar.sPresentation&p%24l=EntrezSystem2&p%24st=pubmed';
		$cnt	= $this->vcurl($tmp_url,$tmp_param,'',$_SESSION['pubmedcookie'],'','','','0');

		$this->pubJx($cnt);
	}

	function pubJx($cnt='')
	{
		$path	= 'cache_file/pubjx.'.rand(00000000,99999999).'.txt';
		file_put_contents($path,$cnt."\r\n");

		//为journal px dyzd
		if($_REQUEST['sort']==6)
		{
			$field_message = array
			(		
				'BTI -'	=> array('link_tag'=>' ','title'=>'题名','insert_field'=>'title'),
				'AU  -'	=> array('link_tag'=>';','title'=>'作者','insert_field'=>'author'),
				'OT  -'	=> array('link_tag'=>' ','title'=>'英文关键词','insert_field'=>'keywords_en'),
				'AB  -'	=> array('link_tag'=>' ','title'=>'摘要','insert_field'=>'abs_en'),
				'DP  -'	=> array('link_tag'=>' ','title'=>'年','insert_field'=>'years'),
				'VI  -'	=> array('link_tag'=>' ','title'=>'卷','insert_field'=>'juan'),
				'IP  -'	=> array('link_tag'=>' ','title'=>'期','insert_field'=>'qi'),
				'PG  -'	=> array('link_tag'=>' ','title'=>'页码','insert_field'=>'pages'),
				'LA  -'	=> array('link_tag'=>' ','title'=>'语种','insert_field'=>'lan'),
				'PMID-'	=> array('link_tag'=>' ','title'=>'唯一号','insert_field'=>'url'),
				'comdoi'	=> array('link_tag'=>' ','title'=>'doi','insert_field'=>'doi'),
				'PT  -'	=> array('link_tag'=>' ','title'=>'文献类型','insert_field'=>'fl1'),
				'FAUAD'	=> array('link_tag'=>' ','title'=>'文献类型','insert_field'=>'author_company_en'),
			);
		}
		else
		{
			$field_message = array
			(		
				'TI  -'	=> array('link_tag'=>' ','title'=>'题名','insert_field'=>'title'),
				'AU  -'	=> array('link_tag'=>';','title'=>'作者','insert_field'=>'author'),
				'OT  -'	=> array('link_tag'=>' ','title'=>'英文关键词','insert_field'=>'keywords_en'),
				'AB  -'	=> array('link_tag'=>' ','title'=>'摘要','insert_field'=>'abs_en'),
				'DP  -'	=> array('link_tag'=>' ','title'=>'年','insert_field'=>'years'),
				'VI  -'	=> array('link_tag'=>' ','title'=>'卷','insert_field'=>'juan'),
				'IP  -'	=> array('link_tag'=>' ','title'=>'期','insert_field'=>'qi'),
				'PG  -'	=> array('link_tag'=>' ','title'=>'页码','insert_field'=>'pages'),
				'LA  -'	=> array('link_tag'=>' ','title'=>'语种','insert_field'=>'lan'),
				'PMID-'	=> array('link_tag'=>' ','title'=>'唯一号','insert_field'=>'url'),
				'comdoi'	=> array('link_tag'=>' ','title'=>'doi','insert_field'=>'doi'),
				'PT  -'	=> array('link_tag'=>' ','title'=>'文献类型','insert_field'=>'fl1'),
				'TA  -'	=> array('link_tag'=>' ','title'=>'文献类型','insert_field'=>'kanname'),
				'FAUAD'	=> array('link_tag'=>' ','title'=>'文献类型','insert_field'=>'author_company_en'),
			);
		}
		
		$tmp_array	= array();
		$file		= fopen($path,"r");
		$tmp_value	= '';
		$i=0;
		//每次读一行
		while(!feof($file))
		{
			$arrt		= array();
			$onestring	= fgets($file);
			//echo $onestring.'<br>';
			if(!preg_match('/[a-z]/siU',$onestring)){
				//"一条记录结束，组装语句";获取一条记录数组
				//将抽取后的数据转换到数据库表中!!!
	
				foreach($tmp_array	as $key=>$value)
				{
					$key	= trim($key);	
					$pptt2	= $this->Del_space($this->con_replace(implode($field_message[$key]['link_tag'],$value)));
					$pptt2  = str_replace(' ; ',';',$pptt2);	
					$pptt2	= preg_replace('/^(@@@)/siU','',$pptt2);
					$tmp_array2[$key]=$pptt2;
				}	
				
				foreach($tmp_array2 as $key => $item){
					if(!empty($field_message[$key]['insert_field']))
					{
						$tmp_array3[$field_message[$key]['insert_field']]=$item;
					}
				}
				$tmp_array3['doi']	= trim(preg_replace('/\[doi\].*$/siU','',$tmp_array3['doi']));
				$tmp_array3['kanname']	= !empty($tmp_array3['kanname'])?$tmp_array3['kanname'].'.':'';
				$tmp_array3['source']=$tmp_array3['kanname'].$tmp_array3['years'].';'.$tmp_array3['qi'].'('.$tmp_array3['juan'].'): '.$tmp_array3['pages'].' DOI: '.$tmp_array3['doi'];

				$tmp_array3['source']=preg_replace('/\(\):/siU','',$tmp_array3['source']);
				if(isset($tmp_array3['url'])){
					$this->result_contents['backdata'][$i]=$tmp_array3;
					
					$i++;
				}
				unset($tmp_array,$tmp_array2,$tmp_array3);
			}else{
				if(preg_match_all('/^([A-Z][A-Z]).*\-/sU',$onestring,$dd) || preg_match_all('/^([A-Z][0-9]).*\-/sU',$onestring,$dd) || preg_match_all('/^([A-Z][A-Z][A-Z]).*\-/sU',$onestring,$dd)){
					$tmp_value	= $dd[0][0];
					$pptt	= str_replace($tmp_value,'',$onestring);
					if(preg_match('/(\[doi\])$/siU',trim($pptt)))
					{
						$tmp_array['comdoi'][]=$pptt;
					}
					else
					{
						$tmp_array[$tmp_value][]=$pptt;
					}
				}
				else
				{
					$tmp_array[$tmp_value][]=$onestring;
				}
			}
		}
		$this->cnt='';
	}

	function Del_space($str){
		$str=preg_replace('/	/siU','',trim($str));
		for($i=0;$i<strlen($str);$i++){
			if($i==0){
				$b=substr($str,$i,1);
			}else{
				if($str[$i]==" "){
					if($str[$i-1]!=" ")
						$b.=substr($str,$i,1);
				}else
					$b.=substr($str,$i,1);
			}
		}
		return $b;	
	}
	function con_replace($str){
		$patterns[0] = '/	/'; 
		$patterns[1] = '/\n/';
		$patterns[2] = '/\r/';
		$patterns[3] = '/&nbsp;/';
		$replacements[0] = ' '; 
		$replacements[1] = ' ';
		$replacements[2] = ' ';
		$replacements[3] = ' ';
		$arr=preg_replace($patterns, $replacements,$str); 
		return $arr;
	}	
}