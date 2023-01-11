<?php

class Core {
    function checkEmpty($data) {
        if (!empty($data['hostname']) && !empty($data['username']) && !empty($data['database'])) {
            return true;
        } else {
            return false;
        }
    }

    function show_message($type, $message) {
        return $message;
    }

    function getAllData($data) {
        return $data;
    }

    function write_db_config($data) {
        $template_path = '../assets/app/db/database.php';
        $output_path = '../application/config/database.php';

        $database_file = file_get_contents($template_path);

        $new = str_replace("%HOSTNAME%", $data['hostname'], $database_file);
        $new = str_replace("%USERNAME%", $data['username'], $new);
        $new = str_replace("%PASSWORD%", $data['password'], $new);
        $new = str_replace("%DATABASE%", $data['database'], $new);

        $handle = fopen($output_path, 'w+');
        @chmod($output_path, 0777);

        if (is_writable(dirname($output_path))) {

            if (fwrite($handle, $new)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    function checkFile() {
        $output_path = '../application/config/database.php';

        if (file_exists($output_path)) {
            return true;
        } else {
            return false;
        }
    }
}
