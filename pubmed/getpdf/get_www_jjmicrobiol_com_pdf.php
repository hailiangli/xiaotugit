<?php
class get_www_jjmicrobiol_com_pdf extends base
{
	function getPdf($url = '', $Domain = '', $docid = '')
	{
	    //echo $url;exit;
	    $cnt	= $this->pcurl($url);
	    echo $cnt;exit;
		preg_match_all('/name="citation_pdf_url".*content="(.*)"/siU',$cnt,$arr);
		$pdfUrl	= $this->chulistring2($arr[1][0]);
		echo $pdfUrl;exit;
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
