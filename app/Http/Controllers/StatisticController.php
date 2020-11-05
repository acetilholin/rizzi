<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use DateTime;

class StatisticController extends Controller
{
    public $days = 30;

    public function index()
    {
        return view('auth.statistics');
    }

    function liveUsers()
    {
        $liveUsers = 0;
        $viewId = env('ANALYTICS_VIEW_ID');
        $metrics = 'rt:activeUsers';
        $dimensions = ['dimensions' => 'rt:country,rt:deviceCategory'];
        $userData = \Analytics::getAnalyticsService()->data_realtime->get('ga:'.$viewId, $metrics, $dimensions)->rows;

        if (!empty($userData)) {
            foreach ($userData as $key => $data) {
                $details[] = $data;
                $liveUsers += $data[2];
            }

            $data = [
                'liveUsers' => $liveUsers,
                'details' => $details
            ];
        } else {
            $data = [
                'liveUsers' => 0,
                'details' => []
            ];
        }
        return $data;
    }

    function interval(Request $request)
    {
        $dateFrom = $request->datefrom;
        $dateTo = $request->dateto;

        $substractDateTo = $request->dateto;
        $totalVisitors = 0;
        $days = round((strtotime($dateTo) - strtotime($dateFrom)) / (60 * 60 * 24));

        $dateFrom = date("d.m.Y", strtotime($dateFrom));
        $dateTo = date("d.m.Y", strtotime($dateTo));

        $dateFrom = DateTime::createFromFormat('d.m.Y', $dateFrom);
        $dateTo = DateTime::createFromFormat('d.m.Y', $dateTo);


        $substractDays = $days;
        $data = \Analytics::fetchTotalVisitorsAndPageViews(Period::create($dateFrom, $dateTo));

        foreach ($data as $dt) {
            $visitors[] = $dt['visitors'];
            $totalVisitors += $dt['visitors'];
            $dates[] = date('d.m', (strtotime("-$substractDays day", strtotime($substractDateTo))));
            $substractDays--;
        }

        $average = round(($totalVisitors / ($days + 1)), 1);

        return $data = [
            'visitors' => $visitors,
            'avg' => $average,
            'totalVisitors' => $totalVisitors,
            'dates' => $dates,
            'days' => $days + 1
        ];
    }
}
