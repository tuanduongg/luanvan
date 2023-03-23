<?php

namespace App\Helpers;

/**
 * hàm lấy các id sinh viên từ chuỗi json request lên server
 * @param string $ids
 * @return array id
 */
class StringHepler {

    public static function changeFormatStudentId($ids)
    {
        if (!empty($ids)) {
            $matches = [];
            //ex:[{"value":"1412734137(Thạc Khổng)"},{"value":"1660143788(Thảo Bình)"}]
            //after regex:['1412734137','1660143788']
            preg_match_all('/"value":"([0-9]+)\(/', trim($ids), $matches); //lấy các mã sinh viên trong request 
            return $matches[1];
        }
        return $ids;
    }
}
