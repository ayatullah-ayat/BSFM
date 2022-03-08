<?php

use Illuminate\Support\Facades\DB;

if (!function_exists('check_internet')) {

    function check_internet()
    {
        try {
            $host_name  = 'www.google.com';
            $port_no    = '80';

            $st = (bool)@fsockopen($host_name, $port_no, $err_no, $err_str, 10);
            if (!$st)
                throw new Exception("Please check Your Internet!", 403);

            return [
                'success'    => true,
                'msg'         => 'OK',
                'code'        => 200
            ];
        } catch (Exception $e) {
            return [
                'success'    => false,
                'msg'         => $e->getMessage(),
                'code'        => $e->getCode()
            ];
        }
    }
}



if (!function_exists('renderFileInput')) {

    function renderFileInput(array $array=[])
    {
        $id                 = $array['id'] ?? 'image'; // categoryImage
        $previewId          = $array['previewId'] ?? 'img-preview';
        $previewImageStyle  = $array['previewImageStyle'] ?? 'cursor:pointer;width:300px; height: 300px !important;';
        $defaultImageSrc    = $array['imageSrc'] ?? 'assets/img/blank-img.png';

        return "<div class=\"input-group\">
                <div class=\"input-group-append\">
                    <button title=\"Image Preview\" class=\"btn btn-primary collapsed\" type=\"button\" data-toggle=\"collapse\"
                        data-target=\"#collapseExample_{$id}\" aria-expanded=\"false\" aria-controls=\"collapseExample\"><i class=\"fa fa-image fa-lg\"></i></button>
                </div>
                <input type=\"file\" name=\"photo\" id=\"{$id}\" class=\"form-control\" accept=\"image/*\">
            </div>
        
            <div class=\"collapse pt-4\" id=\"collapseExample_{$id}\">
                <div class=\"d-flex justify-content-center\"
                    onclick=\" javascript: document.getElementById('$id').click() \">
                    <img title=\"Click to upload image\" src=\"$defaultImageSrc\" alt=\"Default Image\"
                        id=\"$previewId\" class=\"img-fluid img-responsive img-thumbnail\"
                        ondragstart=\"javascript: return false;\" style=\"$previewImageStyle\">
                </div>
            </div>";
    }
}