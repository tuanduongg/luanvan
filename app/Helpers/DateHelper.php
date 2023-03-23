<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
    /**
     * hàm so sánh 2 giá trị ngày tháng với nhau
     * @param string $date1
     * @param string $date2
     * @param string $format
     * @return bool date1 >= date2
     */
    public static function compareTwoDate($dateOne, $dateTwo, $format = 'Y-m-d')
    {
        // $date1 = strtotime(date($format,$dateOne));
        // $date2 = strtotime(date($format,$dateTwo));

        // if ($date2 >= $date1) {
        //     return true;
        // } 
        // return false;

        $date1 = Carbon::createFromFormat($format, $dateOne);
        $date2 = Carbon::createFromFormat($format, $dateTwo);
        return $date1->gte($date2);
    }
    
    public static function conVertDateTime($date) {
        return $date;
    }
    
}
