@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
@stop

@section('content')

<div class="container col-12 pt-4">
        <div class="row card">
        <h5 class="card-header text-center">Precio promedio</h5>
            <div class="d-flex justify-content-around align-items-center">
                        <div class="col-2">
                            <div class="description-block ">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>
                            <h5 class="description-header">${{$house_average_price}}</h5>
                            <span class="description-text">CASA</span>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="description-block ">
                            <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 12%</span>
                            <h5 class="description-header">${{$terrain_average_price}}</h5>
                            <span class="description-text">TERRENO</span>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="description-block ">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                            <h5 class="description-header">${{$department_average_price}}</h5>
                            <span class="description-text">DEPARTAMENTO</span>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="description-block">
                            <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> +4</span>
                            <h5 class="description-header">{{$sales_count}}</h5>
                            <span class="description-text">VENTAS TOTALES</span>
                            </div>
                        </div>
                    </div>

        </div>
</div>

<div class="container col-12">
    <div class="row d-flex justify-content-around">
        
        <div class="col-8 p-2 card" 
            <figure class="highcharts-figure">
                <div id="property">

                </div>
            </figure>
            
        </div>

        <div class="col-4 pl-4">
            <div class="card">

                <div class="card-body table-responsive p-0">
                    <table class="table table-striped table-valign-middle">
                        <thead class="text-center">
                            <tr>
                                <th>Avatar</th>
                                <th>Usuario</th>
                                <th>Ventas</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($top_users as $user)
                            <tr>
                                <td><img src="{{$user->avatar()}}" alt="{{$user->name}}" class="img-circle img-size-32 mr-2"></td>
                                <td><a href="{{ route('users.show', $user) }}">{{ $user->name }}</a></td>
                                <td>{{$user->sales->count()}}</td>
                            </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<div class="container col-12">
    <div class="row d-flex justify-content-around">
        
      
        <div class="col-12 card p-2">
            <figure class="highcharts-figure">
                    <div id="sales"></div>
            </figure>
        </div>
    </div>
</div>



@stop

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script>Highcharts.chart('property', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Ventas por inmueble'
    },
    tooltip: {
        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
    },
    accessibility: {
        point: {
            valueSuffix: '%'
        }
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                enabled: true,
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    series: [{
        name: 'Ventas',
        colorByPoint: true,
        data: <?= $total_sales ?>
    }]
});
</script>
<script>
    var house_sales = <?php echo json_encode($house_sales)?>;
    var terrain_sales = <?php echo json_encode($terrain_sales)?>;
    var department_sales = <?php echo json_encode($department_sales)?>;
    var dates = <?php echo json_encode($dates)?>;

    Highcharts.chart('sales', {
    chart: {
        type: 'column'
    },
    title: {
    text: 'Volumen de venta semanal'
    },
    xAxis: {
        categories: [
            dates[0],
            dates[1],
            dates[2],
            dates[3],
            dates[4],
            dates[5],
            dates[6],
            
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Volumen de ventas'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: [{
        name: 'Casas',
        data: house_sales

    }, {
        name: 'Departamentos',
        data: department_sales

    }, {
        name: 'Terrenos',
        data: terrain_sales

    },]
});
</script>

@stop
