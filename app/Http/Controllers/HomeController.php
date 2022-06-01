<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Commande;
use App\Models\Client;
use App\Models\Charge;
use Illuminate\Support\Facades\DB;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
Use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = [
            'chart_title' => 'Chiffre d affaire',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Commande',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'totale',


        ];

        $chart1 = new LaravelChart($options);


        $options1 = [
            'chart_title' => 'Les clients',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Client',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        $chart2 = new LaravelChart($options1);
        $options2 = [
            'chart_title' => 'Les charge',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Charge',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'montant',


        ];
        $chart3 = new LaravelChart($options2);
        $options = [
            'chart_title' => 'Les credits',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Commande',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'credit',

       
        ];
        $chart4 = new LaravelChart($options);
        $options = [
            'chart_title' => 'Paye',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Commande',
            'group_by_field' => 'created_at',
            'group_by_period' => 'month',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'paye',


        ];
        $chart5 = new LaravelChart($options);
        


$start=null;
$fin=null;
        return view('home', compact('chart1','chart2','chart3','chart4','chart5'))->with('start',$start)->with('fin',$fin);
    }




    public function affiche(Request $request)
    {
        $type='day';
        $date = $request->start;
        $datework1 = Carbon::parse($date);
        $date = $request->fin;
        $datework2 = Carbon::parse($date);

        $diff = $datework2->diffInDays($datework1);
        if($diff>31){
            $type='month';
        }
       // $start=$request->start;
        
       // return $request;
        $options = [
            'chart_title' => 'Chiffre d affaire',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Commande',
           
            'group_by_field' => 'transaction_date',
            'filter_field'=>'created_at',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'totale',
            'range_date_start'=>$request->start,
            'range_date_end'=>$request->fin,
            'group_by_field' => 'created_at',
            'group_by_period' => $type,

        ];
        $chart1 = new LaravelChart($options);
        $options = [
            'chart_title' => 'Les clients',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Client',
            'group_by_field' => 'transaction_date',
            'filter_field'=>'created_at',
            'chart_type' => 'line',
            'range_date_start'=>$request->start,
            'range_date_end'=>$request->fin,
            'group_by_field' => 'created_at',
            'group_by_period' => $type,

        ];
        $chart2 = new LaravelChart($options);
        $options = [
            'chart_title' => 'Les charge',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Charge',
            'group_by_field' => 'transaction_date',
            'filter_field'=>'created_at',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'montant',
            'range_date_start'=>$request->start,
            'range_date_end'=>$request->fin,
            'group_by_field' => 'created_at',
            'group_by_period' => $type,

        ];
        $chart3 = new LaravelChart($options);
        $options = [
            'chart_title' => 'Les Credits',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Commande',
           
            'group_by_field' => 'transaction_date',
            'filter_field'=>'created_at',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'credit',
            'range_date_start'=>$request->start,
            'range_date_end'=>$request->fin,
            'group_by_field' => 'created_at',
            'group_by_period' => $type,

        ];
        $chart4 = new LaravelChart($options);
        $options = [
            'chart_title' => 'paye',
            'report_type' => 'group_by_date',
            'model' => 'App\Models\Commande',
           
            'group_by_field' => 'transaction_date',
            'filter_field'=>'created_at',
            'chart_type' => 'line',
            'aggregate_function' => 'sum',
            'aggregate_field' => 'paye',
            'range_date_start'=>$request->start,
            'range_date_end'=>$request->fin,
            'group_by_field' => 'created_at',
            'group_by_period' => $type,

        ];
        $chart5 = new LaravelChart($options);


        return view('home', compact('chart1','chart2','chart3','chart4','chart5'))->with('start',$request->start)->with('fin',$request->fin);
    }



}
