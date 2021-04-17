<?php
if (!function_exists('clean')) {
    function clean($data)
    {
        $data = htmlspecialchars($data);
        $data = stripslashes($data);
        $data = trim($data);
        return $data;
    }
}


if (!function_exists('getInsertId')) {
    function getInsertId(mysqli &$instance, $enforceQuery = false)
    {
        if (!$enforceQuery) {
            return $instance->insert_id;
        }
        $result = $instance->query('SELECT LAST_INSERT_ID();');
        if ($instance->errno) {
            return false;
        }
        list($buffer) = $result->fetch_row();
        $result->free();
        unset($result);
        return $buffer;
    }
}


?>
