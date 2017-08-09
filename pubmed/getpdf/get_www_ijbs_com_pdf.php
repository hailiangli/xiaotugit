<?php
class get_www_ijbs_com_pdf extends base
{
	function getPdf($url = '', $Domain = '', $docid = '')
	{
	    //echo $url;exit;
	    $cnt	= $this->pcurl($url);
		preg_match_all('/alt=\'Attachment.*href="(.*)"/siU',$cnt,$arr);
		$pdfUrl	= $this->chulistring2($arr[1][0]);
		//echo $pdfUrl;exit;
		if(!empty($pdfUrl))
		{
		    $pdfUrl	= 'http://www.ijbs.com/'.$pdfUrl;
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
