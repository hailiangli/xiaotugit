<?php
class get_www_karger_com_pdf extends base
{
	function getPdf($url = '',$Domain = '')
	{
	    //echo $url;exit;
	    $data = (int)substr($url,-9);
	    $pdfUrl = 'http://'.$Domain.'/Article/pdf/'.$data;
		if(!empty($pdfUrl))
		{
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
