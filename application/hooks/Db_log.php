<?php

class Db_log
{
    function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
    }

    // Nama dari method yang disebutkan di file hooks.php
    function logQueries()
    {
        $CI = & get_instance();
        $filepath = APPPATH . 'logs/hook-' . $CI->session->userdata('garudacbt_log') . "-". date('d-M-Y') . '.txt';  // Buat file query log dengan tgl hari ini di folder application/logs
        $handle = fopen($filepath, "a+"); // buka file dg mode Read/write
        $times = $CI->db->query_times;    // ambil waktu eksekusi dari semua query yg di eksekusi oleh controller

        $dir = "----------" . $CI->router->directory . $CI->router->class . "/" . $CI->router->method . "----------";
        fwrite($handle, $dir . "\n");
        foreach ($CI->db->queries as $key => $query) {
            if($query){
                $sql =  $CI->session->userdata('garudacbt_log') . " - " .date("d-M-Y/H:i:s A") . " => " . trim(preg_replace('/\s+/', ' ', $query)) . " Execution Time:" . $times[$key]; // Generate hasil query
                fwrite($handle, $sql . "\n");              // tulis di file log
            }
        }
        fclose($handle);      // Close the file
    }
}