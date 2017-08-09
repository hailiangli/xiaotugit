<?php

class control extends base
{

    function downLoadPdf()
    {
        $this->webPath = dirname(dirname(__FILE__));
        $doi = $_REQUEST['doi'];
        $docid = $_REQUEST['docid'];
        // echo DB_HOST;exit;
        if (! empty($doi)) {
            $this->docid($doi, $docid);
            // echo $doi;exit;
        }
    }
    // http://web.a.ebscohost.com/ehost/results?sid=dce98f2e-1871-4436-a241-3bd23caa6557%40sessionmgr4008&vid=6&hid=4106&bquery=10.1037%2fdev0000186&bdata=JmRiPWE5aCZkYj1idGgmbGFuZz16aC1jbiZ0eXBlPTAmc2l0ZT1laG9zdC1saXZl
    function docid($doi = '', $docid = '')
    {
        // echo $docid;exit;
        $tmp_url = 'http://dx.doi.org/' . $doi;
        $res = $this->vcurl($tmp_url);
        // echo $res;exit;
        if (preg_match_all('/href="(.*)">(.*)<\/a>/siU', $res, $arr))
            $durl = $arr[1][0];
        $durls = substr($durl, 0, 5);
        if ($durls === 'https') {
            $Domain = $this->getDomains($durl);
        } else {
            $Domain = $this->getDomain($durl);
        }
        //echo $Domain;exit;
        switch ($Domain) {
            case strstr($Domain, "bmj."):
                include_once ($this->webPath . '/getpdf/get_bmj_com_pdf.php');
                $obj = new get_bmj_com_pdf();
                break;
            case 'www.biolreprod.org':
                include_once ($this->webPath . '/getpdf/get_www_biolreprod_org_pdf.php');
                $obj = new get_www_biolreprod_org_pdf();
                break;
            case 'erj.ersjournals.com':
                include_once ($this->webPath . '/getpdf/get_erj_ersjournals_com_pdf.php');
                $obj = new get_erj_ersjournals_com_pdf();
                break;
            case 'jpet.aspetjournals.org':
                include_once ($this->webPath . '/getpdf/get_jpet_aspetjournals_org_pdf.php');
                $obj = new get_jpet_aspetjournals_org_pdf();
                break;
            case 'www.karger.com':
                include_once ($this->webPath . '/getpdf/get_www_karger_com_pdf.php');
                $obj = new get_www_karger_com_pdf();
                break;
            case 'content.wkhealth.com':
                include_once ($this->webPath . '/getpdf/get_content_wkhealth_com_pdf.php');
                $obj = new get_content_wkhealth_com_pdf();
                break;
            
            case 'www.sciencemag.org':
                include_once ($this->webPath . '/getpdf/get_www_sciencemag_org_pdf.php');
                $obj = new get_www_sciencemag_org_pdf();
                break;
            case 'archotol.jamanetwork.com':
                include_once ($this->webPath . '/getpdf/get_archotol_jamanetwork_com_pdf.php');
                $obj = new get_archotol_jamanetwork_com_pdf();
                break;
            case 'www.osapublishing.org':
                include_once ($this->webPath . '/getpdf/get_www_osapublishing_org_pdf.php');
                $obj = new get_www_osapublishing_org_pdf();
                break;
            
            case 'www.jjmicrobiol.com':
                include_once ($this->webPath . '/getpdf/get_www_jjmicrobiol_com_pdf.php');
                $obj = new get_www_jjmicrobiol_com_pdf();
                break;
            case 'www.ijbs.com':
                include_once ($this->webPath . '/getpdf/get_www_ijbs_com_pdf.php');
                $obj = new get_www_ijbs_com_pdf();
                break;
            case 'www.aulamedica.es':
                include_once ($this->webPath . '/getpdf/get_www_aulamedica_es_pdf.php');
                $obj = new get_www_aulamedica_es_pdf();
                break;
            
            case 'doi.apa.org':
                include_once ($this->webPath . '/getpdf/get_doi_apa_org_pdf.php');$obj = new get_doi_apa_org_pdf();break;
        
        }
        
        $result = $obj->getPdf($durl, $Domain, $docid, $doi);
        // echo $result;exit;
        if (preg_match('/^(%PDF)/siU', $result)) {
            $filenames = $this->webPath . '/pdfdownload/' . $docid . '.pdf';
            file_put_contents($filenames, $result);
            echo $filenames;
            exit();
        } else {
            echo $result;
        }
    }
}

