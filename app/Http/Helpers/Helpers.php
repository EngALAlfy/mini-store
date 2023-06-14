<?php


//
//
//if (!function_exists('get_token')) {
//    function get_token()
//    {
//        $prams = [
//            'grant_type' => 'client_credentials',
//            'client_id' => get_client_id(),
//            'client_secret' => get_client_secret(),
//            'scope' => 'InvoicingAPI'
//        ];
//
//        $res = Http::post('https://id.preprod.eta.gov.eg/connect/token', $prams);
//        if ($res->status() == 200) {
//            return $res->access_token;
//        } else {
//            return null;
//        }
//    }
//}

if (!function_exists('upload_image')) {
    function upload_image($image): string
    {
        $image_name = Time() . "-" . $image->getClientOriginalName();
        $dir_name = "photos";
        $image->storePubliclyAs($dir_name, $image_name, 'public');
        return $image_name;
    }
}

if (!function_exists('followers_count')) {
    function followers_count($count): string
    {
        $count_string = "5k";

        if ($count < 1000) {
            $count_string = floor($count);
        }

        if ($count >= 1000) {
            $count_string = floor($count / 1000) . "k";
        }

        if ($count >= 1000000000) {
            $count_string = floor($count / 1000000000) . "T";
        }

        if ($count >= 1000000) {
            $count_string = floor($count / 1000000) . "M";
        }

        return $count_string;
    }
}
