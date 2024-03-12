<?php

namespace App\Http\Controllers\Admin\WaterMeter;

use App\Http\Controllers\Controller;
use App\Models\WaterMeterValue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WaterMeterReportController extends Controller
{
    protected $monthRequired;
    protected $monthRequiredString;
    protected $monthPreviousString;

    public function create()
    {
        $months = $this->getAllMonthsFromValuesTable();
        return view('admin.water_meter.water_meter_report.create', compact('months'));
    }

    public function store(Request $request)
    {
        return view('admin.water_meter.water_meter_report.create');
    }

    public function getAllMonthsFromValuesTable()
    {
        return DB::table('water_meter_values')
            ->distinct()
            ->orderBy('date', 'desc')
            ->pluck('date');
    }
/*
    public function getValuesFromMonth($month)
    {
        $this->monthRequired = Carbon::parse($month);
        $this->monthRequired->locale('ru');
        $this->monthRequiredString = $this->monthRequired->isoFormat('YYYY-MM');
        $this->monthPreviousString = $this->monthRequired->subMonth()->isoFormat('YYYY-MM');


        $monthPreviousReport =  WaterMeterValue::all()
            ->where('date', 'like', $this->monthPreviousString)
            ->sortBy('water_meter_id')
            ->sortBy('created_at');
        return WaterMeterValue::all()
            ->where('date', 'like', $this->monthRequiredString)
            ->union($monthPreviousReport)
            ->sortBy('water_meter_id')
            ->sortBy('created_at')
            ->groupBy('water_meter_id');
    }

    public function fillReportTable($month)
    {
        $array = [];
        $data = $this->getValuesFromMonth($month);
        foreach ($data as $key => $value){
            foreach ($value as $item){
                if(empty($item->water_meter)) {
                    continue;
                }
                if($item->water_meter->condition == 2 || $item->water_meter->condition == 3){
                    continue;
                }
                $array[$key]['water_meter_id'] = $item->water_meter_id;
                $array[$key]['address'] = $item->water_meter->source->address;
                $array[$key]['title'] = $item->water_meter->title . " №" . $item->water_meter->serial_number;
                $array[$key]['check_date'] = $item->water_meter->check_date;
                if(empty($item->water_meter->note)){
                    if (isset($item->note)){
                        $array[$key]['note'] = $item->note;
                    } else {
                        $array[$key]['note'] = '-';
                    }
                } else {
                    $array[$key]['note'] = $item->water_meter->note;
                }

                if ($this->monthRequiredString == $item->month) {
                    $array[$key]['present_value'] = $item->value;
                    $array[$key]['is_present_value_after_check'] = $item->after_check;
                }

                if ($this->monthPreviousString == $item->month) {
                    $array[$key]['previous_value'] = $item->value;
                    $array[$key]['is_previous_value_after_check'] = $item->after_check;
                    if (!isset($array[$key]['present_value'])) {
                        $array[$key]['present_value'] = $array[$key]['previous_value'];
                    }
                }
            }
            $array[$key]['values_after_check'] = false;

            if(isset($array[$key]['is_present_value_after_check']) &&
                boolval($array[$key]['is_present_value_after_check']) == true){
                $array[$key]['previous_value'] = $array[$key]['present_value'];
                $array[$key]['difference'] = 0;
                $array[$key]['values_after_check'] = true;
            } else {
                if(isset($array[$key]['previous_value']) && isset($array[$key]['present_value'])) {
                    $array[$key]['difference'] = strval(
                        intval($array[$key]['present_value']) -
                        intval($array[$key]['previous_value']));
                } else {
                    $array[$key]['difference'] = 0;
                }
            }
            unset($array[$key]['is_present_value_after_check']);
            unset($array[$key]['is_previous_value_after_check']);
        }

        foreach($array as $key => $item){
            if(count($item) == 2){
                unset($array[$key]);
            }
        }
        return $array;
//        DB::table('water_meter_reports')->truncate();
//        $water_meter_report = new WaterMeterReport();
//        $water_meter_report->insert($array);
    }

    public function getReport()
    {
        $this->fillReportTable();
        $report['data'] = WaterMeterReport::all('id', 'address', 'title', 'check_date',
            'previous_value', 'present_value', 'difference', 'note', 'values_after_check')
            ->sortBy('address');
        $report['month'] = $this->monthRequired->addMonth()->isoFormat('MMMM YYYY');
        return $report;
    }
*/
}
