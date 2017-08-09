<?php
class get_www_biolreprod_org_pdf extends base
{
	function getPdf($url = '', $Domain = '', $docid = '')
	{
	    $cnt	= $this->pcurl($url);
		preg_match_all('/name="citation_fulltext_html_url".*content="(.*)"/siU',$cnt,$arr);
		$pdfUrl	= $this->chulistring2($arr[1][0]);
		//echo $pdfUrl;exit;
		if(!empty($pdfUrl))
		{
		    //$pdfUrl	= 'http://www.jiaci.org'.$pdfUrl;
			$cnt	= $this->pcurl($pdfUrl);
			if(preg_match('/^(%PDF)/siU',$cnt))
			{
				return $cnt;
			}
			else
			{
				return 404;
			}
		}
		else
		{
			return 404;
		}
		
	}
}
