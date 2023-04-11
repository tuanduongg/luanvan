<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BasicResearch;
use App\Models\CreativeIdea;
use App\Models\StudentResearch;
use App\Repositories\Theses\ThesesRepository;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    use ResponseTrait;
    public function dataThesesChart(Request $request)
    {
        $fromSchoolYear = $request->get('fromSchoolYear');
        $toSchoolYear = $request->get('toSchoolYear');
        $arrThesesReq = [];
        for ($i = $fromSchoolYear; $i <= $toSchoolYear; $i++) {
            $arrThesesReq[] = $i . "";
        }
        $sumTheses = (new ThesesRepository())->staticFiveSchoolYears($arrThesesReq);
        $arrLables = [];
        for ($i = $fromSchoolYear; $i <= $toSchoolYear; $i++) {
            $arrLables["K" . $i] = 0;
        }
        // dd($arrLables);
        foreach ($sumTheses as $item) {
            $arrLables['K' . $item->school_year] = (int)$item->total_theses;
        }
        // dd($arrLables);
        return $this->responseSuccess($arrLables);
    }

    public function dataCreativeChart(Request $request)
    {
        $total_year_recent = $request->get('total_year_recent') ?? 5;
        $currentYear = date("Y");
        $yearStart = (int) $currentYear - (int) $total_year_recent;
        $arrData = [];
        for ($i = $yearStart; $i < $currentYear; $i++) {
            $arrData[$i . '-' . ($i + 1)] = 0;
        }
        // dd(array_keys($arrData));
        $data = CreativeIdea::query()
            ->select(DB::raw("COUNT(*) as total_creative"), 'creative_ideas.school_year')
            ->whereIn('creative_ideas.school_year', array_keys($arrData))
            ->groupBy('school_year')
            ->get();
        foreach ($data as $key => $value) {
            $arrData[$value->school_year] = $value->total_creative;
        }
        return $this->responseSuccess($arrData);
    }

    public function dataResearchChart(Request $request)
    {
        $total_year_recent = $request->get('total_year_recent') ?? 5;
        $currentYear = date("Y");
        $yearStart = (int) $currentYear - (int) $total_year_recent;
        $arrDataStudent = [];
        $arrDataBasic = [];
        for ($i = $yearStart; $i < $currentYear; $i++) {
            $arrDataBasic[$i . '-' . ($i + 1)] = 0;
            $arrDataStudent[$i . '-' . ($i + 1)] = 0;
        }
        // dd(array_keys($arrData));
        $dataBasic = BasicResearch::query()
            ->select(DB::raw("COUNT(*) as total_research"), 'basic_research.year')
            ->whereIn('basic_research.year', array_keys($arrDataBasic))
            ->groupBy('year')
            ->get();
        $dataStudent = StudentResearch::query()
            ->select(DB::raw("COUNT(*) as total_research"), 'student_research.year')
            ->whereIn('student_research.year', array_keys($arrDataStudent))
            ->groupBy('year')
            ->get();
        foreach ($dataBasic as $key => $value) {
            $arrDataBasic[$value->year] = $value->total_research;
        }
        foreach ($dataStudent as $key => $value) {
            $arrDataStudent[$value->year] = $value->total_research;
        }
        // dd($arrDataStudent);
        return $this->responseSuccess(['basic' => $arrDataBasic, 'student' => $arrDataStudent]);
    }

    public function getAllRecordEachTable()
    {
        $data = DB::table('INFORMATION_SCHEMA.TABLES')
            ->select('TABLE_NAME', DB::raw("SUM(TABLE_ROWS) as total_record"))
            ->where('TABLE_SCHEMA', '=', 'dbluanvan')
            ->groupBy('TABLE_NAME')
            ->get();
        return $data;
    }
}
