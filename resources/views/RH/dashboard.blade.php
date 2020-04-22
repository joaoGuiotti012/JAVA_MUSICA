@extends('layouts.appRh')

@section('content')
    <br>
    <div class="container">
      <div class="card-columns ">
        <div class="card  text-center p-3 shadow p-3 mb-5 bg-white rounded">
          <h5 class="card-header"> Funcionários </h5>
          <div class="card-body">
            <span class="card-title text-danger"> <p style="font-size:50px"> 130<b style="font-size:14px">UN</b> </p>  </span>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <blockquote class="blockquote mb-0">
            <footer class="blockquote-footer text-muted">
              <small>
                Last updated <cite title="Source Title">3 mins</cite> ago
              </small>
            </footer>
          </blockquote>
        </div>
        <div class="card p-3 shadow p-3 mb-5 bg-white rounded" >
          <blockquote class="blockquote mb-0 card-body">
            <canvas id="GraficDeficiencia"></canvas>
            <footer class="blockquote-footer">
              <small class="text-muted">
                Someone famous in <cite title="Source Title">Source Title</cite>
              </small>
            </footer>
          </blockquote>
        </div>
        <div class="card shadow p-3 mb-5 bg-white rounded">
          <!--img src="{{asset('img/topo.png')}}" width="80" height="250" class="card-img-top" alt="Casi di Conti RH"-->
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
          </div>
        </div>
        <div class="card  text-center p-3 shadow p-3 mb-5 bg-white rounded">
          <h5 class="card-header"> Deficientes </h5>
          <div class="card-body">
            <span class="card-title text-danger"> <p> <b id="qtdDef" style="font-size:50px"></b>  Un</p> </span>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <blockquote class="blockquote mb-0">
            <footer class="blockquote-footer text-muted">
              <small>
                Last updated <cite title="Source Title">3 mins</cite> ago
              </small>
            </footer>
          </blockquote>
        </div>
        <div class="card  text-center p-3 shadow p-3 mb-5 bg-white rounded">
          <h5 class="card-header"> TESTE </h5>
          <div class="card-body">
            <span class="card-title text-danger"> <p style="font-size:50px"> 130<b style="font-size:14px">UN</b> </p>  </span>
            <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
          </div>
          <blockquote class="blockquote mb-0">
            <footer class="blockquote-footer text-muted">
              <small>
                Last updated <cite title="Source Title">3 mins</cite> ago
              </small>
            </footer>
          </blockquote>
        </div>
        <div class="card p-3 shadow p-3 mb-5 bg-white rounded">
          <blockquote class="blockquote mb-0">
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat.</p>
            <footer class="blockquote-footer ">
              <small>
                Someone famous in <cite title="TESTE"> Cândido Mota</cite>
              </small>
            </footer>
          </blockquote>
        </div>
        <div class="card p-3 text-right shadow p-3 mb-5 bg-white rounded">
          <blockquote class="blockquote mb-0">
            <footer class="blockquote-footer">
              <small class="text-muted">
                Someone famous in <cite title="Source Title">Source Title</cite>
              </small>
            </footer>
          </blockquote>
        </div>
      </div>
  </div>
@endsection

@section('scripts')

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
  <script>
  $('document').ready(function (){

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
      url: '/rh/grafics',
      type: 'POST',
      data: {_token: CSRF_TOKEN  },
      dataType: 'JSON',
      success: function (data){
        var cmen = 0;
        var cvis = 0;
        var caud = 0;
        var cfis = 0;
        var cnorm = 0;
        for (var i = 0  ; i < data.length; i++ ){
          if( data[i].deficiencia == 'MENTAL' )
            cmen += 1;
          if( data[i].deficiencia == 'VISUAL' )
            cvis += 1;
          if( data[i].deficiencia == 'AUDITIVA' )
            caud += 1;
          if( data[i].deficiencia == 'FISICA' )
            cfis += 1;
          if( data[i].deficiencia == '' )
            cnorm += 1;
        }
        $('#qtdDef').append(data.length - cnorm);
        graficoDef( cvis, cmen , caud , cfis , cnorm , data.length );

      }

    });
  });
  function graficoFuncionarios(){
    alert('funcionarios');
  }

  function graficoDef(cvis, cmen , caud , cfis , cnorm , total ){

    var ctx = document.getElementById('GraficDeficiencia').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Visual', 'Mental'  , 'Auditiva' , 'Fisica' , 'Normal'],
            datasets: [{
                label: 'Total de Pessoas: ' + total,
                data: [ cvis, cmen , caud , cfis , cnorm ],
                backgroundColor: [
                    'rgb(220, 53, 69 , 0.7)',
                    'rgba(54, 162, 235)',
                    'rgba(255, 206, 86)',
                    'rgba(75, 192, 192)',
                    'rgba(153, 102, 255)',
                    //'rgba(255, 159, 64)'
                ],
                borderColor: [
                    'rgba(255, 99, 132)',
                    'rgba(54, 162, 235)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    //'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });

  }


  </script>

@endsection
