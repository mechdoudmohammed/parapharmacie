
<div class="container">
            <div class="date_statistique" style="margin-bottom: 83px;">
            <form  action="{{route('home.affiche')}}" method="post" enctype="multipart/form-data"> 
            @csrf
            <div class="form-group row">
            <label for="example-datetime-local-input" class="col-2 col-form-label">Date de début</label>
            <div class="col-10">
                <input class="form-control" type="datetime-local" name="start" id="example-datetime-local-input" value="{{$start}}" required>
            </div>
            </div>
            <div class="form-group row">
            <label for="example-datetime-local-input" class="col-2 col-form-label">Date de fin</label>
            <div class="col-10">
                <input class="form-control" type="datetime-local" name="fin" id="example-datetime-local-input"  value="{{$fin}}"  required>
            </div>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 121px;
                font-size: 17px;
                float: right;">Rechercher</button>
            </form>
            </div>
            
    <div class="row justify-content-center">
        <div class="col-sm">
        <div class="card-header">Commandes</div>

        <div class="card-body" style="background: white;">

                    <h1>{{ $chart1->options['chart_title'] }}</h1>
                    {!! $chart1->renderHtml() !!}
        </div>

        </div>

        <div class="col-sm">
        <div class="card-header">Client</div>

        <div class="card-body" style="background: white;">
                            <h1>{{ $chart2->options['chart_title'] }}</h1>
                            {!! $chart2->renderHtml() !!}
                </div>
                
                </div>

        
    </div>

    <div class="row justify-content-center">
        <div class="col-sm">
        <div class="card-header">Charge</div>

        <div class="card-body" style="background: white;">

                    <h1>{{ $chart3->options['chart_title'] }}</h1>
                    {!! $chart3->renderHtml() !!}
        </div>

        </div>

        <div class="col-sm">
        <div class="card-header">Credit</div>

        <div class="card-body" style="background: white;">

                    <h1>{{ $chart4->options['chart_title'] }}</h1>
                    {!! $chart4->renderHtml() !!}
        </div>

        </div>
        
    </div>
    <div class="row justify-content-center">
        <div class="col-sm">
        <div class="card-header">Payé</div>

        <div class="card-body" style="background: white;">

                    <h1>{{ $chart5->options['chart_title'] }}</h1>
                    {!! $chart5->renderHtml() !!}
        </div>

        </div>

   
        
    </div>

{!! $chart1->renderChartJsLibrary() !!}
{!! $chart1->renderJs() !!}

{!! $chart2->renderChartJsLibrary() !!}
{!! $chart2->renderJs() !!}

{!! $chart3->renderChartJsLibrary() !!}
{!! $chart3->renderJs() !!}

{!! $chart4->renderChartJsLibrary() !!}
{!! $chart4->renderJs() !!}

{!! $chart5->renderChartJsLibrary() !!}
{!! $chart5->renderJs() !!}
</div>


