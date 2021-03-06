<?php
    include_once './conexao.php';
    date_default_timezone_set('America/Recife');
    $datalog = date('d/m/Y H:i:s');
    $host = $_SERVER["REMOTE_ADDR"];
    $sql = "INSERT INTO contador () VALUES (NULL, '$host', '$datalog')";
		$statement = $conn->prepare($sql);
    $statement->execute();

    $sql = "SELECT Max(id) from boletim_sesap";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $id_max = $statement->fetchColumn();
 
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Acompanhe os números do novo coronavírus em Ceará-Mirim.">
  <meta name="author" content="Creative Tim">
  <title>Números do Coronavírus em Ceará-Mirim</title>
  <!-- Favicon -->
  <link rel="icon" href="" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<body>

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom" >
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Search form -->
          <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
          <h1 style="color:#212529;"><strong>CORONAVÍRUS</strong> <strong style="color:#da121a; font-weight: bold;">/</strong><strong style="color:#259e4b; font-weight: bold;">/</strong> CEARÁ-MIRIM</h1>
          </form>
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-sm-none">
            <h3 style="color:#212529;"><strong>CORONAVÍRUS</strong> <strong style="color:#da121a; font-weight: bold;">/</strong><strong style="color:#259e4b; font-weight: bold;">/</strong> CEARÁ-MIRIM</h1>

              </a>
            </li>

            
          </ul>

          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span>
                    <img alt="Image placeholder" src="assets/img/brasao.png" width=60 height=60>
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"></span>
                  </div>
                </div>
              </a>
           
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
              <h5 style="color:white; font-weight: normal;">Os números são oriundos dos boletins diários do SESAP. [Atualizado em <?php
                                                //SQL para selecionar os registros de parceiros
                                                $sql = "SELECT * FROM boletim_sesap WHERE id=$id_max";
                                                
                                                $result = $conn->prepare($sql);
                                                $result->execute();
                                                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                                                 
                                                  echo $fila['data'];
                                            }
                                                
                                            ?>]</h5>
            </div>
            <div class="col-lg-6 col-5 text-right">
              <a href="http://www.saude.rn.gov.br/Conteudo.asp?TRAN=ITEM&TARG=223456&ACT=&PAGE=&PARM=&LBL=MAT%C9RIA" target="_blank" class="btn btn-sm btn-neutral">Boletins SESAP</a>

            </div>
            
          </div>
          <!-- Card stats -->
          <div class="row">
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Confirmados</h5>
                      <span class="h1 font-weight-bold mb-0"><?php
                                                //SQL para selecionar os registros de parceiros
                                                $sql = "SELECT * FROM boletim_sesap WHERE id=$id_max";
                                                $confir = 0;
                                                $result = $conn->prepare($sql);
                                                $result->execute();
                                                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                                                  $confir = $fila['confirmados'];
                                                  echo $fila['confirmados'];
                                            }
                                                
                                            ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                        
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-danger mr-2"><i class="fa fa-arrow-up"></i> 0</span>
                    <span class="text-nowrap">Casos a mais que o boletim anterior.</span>
                    <span class="text-nowrap">Incidência por 100k hab:</span>
                    <span class="text-danger mr-2"> <?php
                                                //SQL para selecionar os registros de parceiros
                                                $sql = "SELECT * FROM boletim_sesap WHERE id=$id_max";
                                                $result = $conn->prepare($sql);
                                                $result->execute();
                                                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                                                  echo $fila['taxa_confirmados'];
                                            }
                                                
                                            ?></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Suspeitos</h5>
                      <span class="h1 font-weight-bold mb-0"><?php
                                                //SQL para selecionar os registros de parceiros
                                                $sql = "SELECT * FROM boletim_sesap WHERE id=$id_max";
                                                $suspeitos = 0;
                                                $result = $conn->prepare($sql);
                                                $result->execute();
                                                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                                                  $suspeitos = $fila['suspeitos'];
                                                  echo $fila['suspeitos'];
                                            }
                                                
                                            ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                        
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-danger mr-2"><i class="fa fa-arrow-up"></i> 0</span>
                    <span class="text-nowrap">Casos a mais que o boletim anterior.</span>
                    <span class="text-nowrap">Taxa de notificação por 100k hab:</span>
                    <span class="text-danger mr-2"><?php
                                                //SQL para selecionar os registros de parceiros
                                                $sql = "SELECT * FROM boletim_sesap WHERE id=$id_max";
                                                $result = $conn->prepare($sql);
                                                $result->execute();
                                                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                                                  echo $fila['taxa_suspeitos'];
                                            }
                                                
                                            ?></span>
                    
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Descartados</h5>
                      <span class="h1 font-weight-bold mb-0"><?php
                                                //SQL para selecionar os registros de parceiros
                                                $sql = "SELECT * FROM boletim_sesap WHERE id=$id_max";
                                               
                                                $result = $conn->prepare($sql);
                                                $result->execute();
                                                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                                                
                                                  echo $fila['descartados'];
                                            }
                                                
                                            ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                        </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 0</span>
                    <span class="text-nowrap">Casos a mais que o boletim anterior.</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Recuperados</h5>
                      <span class="h1 font-weight-bold mb-0"><?php
                                                //SQL para selecionar os registros de parceiros
                                                $sql = "SELECT * FROM boletim_sesap WHERE id=$id_max";
                                                
                                                $result = $conn->prepare($sql);
                                                $result->execute();
                                                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                                                 
                                                  echo $fila['recuperados'];
                                            }
                                                
                                            ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 0</span>
                    <span class="text-nowrap">Casos a mais que o boletim anterior.</span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Óbitos</h5>
                      <span class="h1 font-weight-bold mb-0"><?php
                                                //SQL para selecionar os registros de parceiros
                                                $sql = "SELECT * FROM boletim_sesap WHERE id=$id_max";
                                                $obitos = 0;
                                                $result = $conn->prepare($sql);
                                                $result->execute();
                                                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                                                  $obitos = $fila['obitos_confirmados'];
                                                  echo $fila['obitos_confirmados'];
                                            }
                                                
                                            ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-dark text-white rounded-circle shadow">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 0</span>
                    <span class="text-nowrap">Casos a mais que o boletim anterior.</span>
                    <span class="text-nowrap">Mortalidade por 100.000 hab:</span>
                    <span class="text-danger mr-2"><?php
                                                //SQL para selecionar os registros de parceiros
                                                $sql = "SELECT * FROM boletim_sesap WHERE id=$id_max";
                                                
                                                $result = $conn->prepare($sql);
                                                $result->execute();
                                                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                                                 
                                                  echo $fila['mortalidade'];
                                            }
                                                
                                            ?></span>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Óbitos em Investigação</h5>
                      <span class="h1 font-weight-bold mb-0"><?php
                                                //SQL para selecionar os registros de parceiros
                                                $sql = "SELECT * FROM boletim_sesap WHERE id=$id_max";
                                                
                                                $result = $conn->prepare($sql);
                                                $result->execute();
                                                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                                                 
                                                  echo $fila['obitos_investigacao'];
                                            }
                                                
                                            ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-gradient-gray text-white rounded-circle shadow">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-sm">
                    <span class="text-danger mr-2"><i class="fa fa-arrow-up"></i> 0</span>
                    <span class="text-nowrap">Casos a mais que o boletim anterior.</span>
                    
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-4">
          <div class="card bg-default" style="height:490px">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h5 class="h3 text-white mb-0">Evolução dos casos confirmados</h5>
                  <h6 class="text-light text-uppercase ls-1 mb-1">Fonte: SESAP/RN</h5>
                </div>
                <div class="col">
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart">
                <!-- Chart wrapper -->
                <canvas height="280%" class="line-chart"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card" style="background:#696969">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="h3 text-white mb-0">Evolução dos casos de óbitos</h6>
                  <h5 class="text-light text-uppercase ls-1 mb-1">Fonte: SESAP/RN</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart" style="background:#696969">
              <canvas height="290%" class="pizza"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card" style="background:#669999">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="h3 text-white mb-0">Evolução dos casos suspeitos</h6>
                  <h5 class="text-light text-uppercase ls-1 mb-1">Fonte: SESAP/RN</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart" style="background:#669999">
              <canvas height="290%" class="suspeito"></canvas>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4">
          <div class="card" style="background:#8B8989">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="h3 text-white mb-0">Faixa etária por sexo (Casos Confirmados)</h6>
                  <h5 class="text-light text-uppercase ls-1 mb-1">Fonte: SESAP/RN</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart" style="background:#8B8989">
              <canvas height="280%" class="faixa"></canvas>
              </div>
            </div>
          </div>
        </div>  
        <div class="col-xl-4">
          <div class="card" style="background:#607B8B">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="h3 text-white mb-0">Casos por bairros (Casos Confirmados)</h6>
                  <h5 class="text-light text-uppercase ls-1 mb-1">Fonte: SESAP/RN</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart" style="background:#607B8B">
              <canvas height="280%" class="bairro"></canvas>
              </div>
            </div>
          </div>
        </div> 
        <div class="col-xl-4">
          <div class="card" style="background:#006666">
            <div class="card-header bg-transparent">
              <div class="row align-items-center">
                <div class="col">
                  <h6 class="h3 text-light mb-0">Resultados de exames</h6>
                  <h5 class="text-light text-uppercase ls-1 mb-1">Fonte: SESAP/RN</h5>
                </div>
              </div>
            </div>
            <div class="card-body">
              <!-- Chart -->
              <div class="chart" style="background:#006666">
              <canvas height="280%" class="exame"></canvas>
              </div>
            </div>
          </div>
        </div> 
      </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Informe Epidemiológico Coronavírus Ceará-Mirim</h3>
                </div>
                <div class="col text-right">
                  <h5  class="">Boletins SESAP-RN</h5>
                </div>
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nº BOLETIM</th>
                    <th scope="col">SUSPEITOS</th>
                    <th scope="col">CONFIRMADOS</th>
                    <th scope="col">DESCARTADOS</th>
                    <th scope="col">IGNORADOS</th>
                    <th scope="col">ÓBITOS EM INVESTIGAÇÃO</th>
                    <th scope="col">ÓBITOS DESCARTADOS</th>
                    <th scope="col">ÓBITOS CONFIRMADOS</th>
                    <th scope="col">RECUPERADOS</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                                                //SQL para selecionar os registros de parceiros
                                                $sql = "SELECT * FROM boletim_sesap ORDER BY  num_boletim DESC LIMIT 10";
                                                
                                                $result = $conn->prepare($sql);
                                                $result->execute();
                                                while ($fila = $result->fetch(PDO::FETCH_ASSOC)) {
                                                 
                                                  
                                           
                                                
                                            ?>
                    <tr>
                    <th scope="row">
                      #<?php echo $fila['num_boletim']; ?>
                    </th>
                    <td>
                    <?php echo $fila['suspeitos']; ?>
                    </td>
                    <td>
                    <?php echo $fila['confirmados']; ?>
                    </td>
                    <td>
                    <?php echo $fila['descartados']; ?>
                    </td>
                    <td>
                    <?php echo $fila['ignorados']; ?>
                    </td>
                    <td>
                    <?php echo $fila['obitos_investigacao']; ?>
                    </td>
                    <td>
                    <?php echo $fila['obitos_descartados']; ?>
                    </td>
                    <td>
                    <?php echo $fila['obitos_confirmados']; ?>
                    </td>
                    <td>
                    <?php echo $fila['recuperados']; ?>
                    </td>
                  </tr>
                                          <?php } ?>    
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- Footer -->
      <footer class="footer pt-0">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-6">
            <div class="copyright text-center  text-lg-left  text-muted">
              &copy; 2020 Esta página não pussui vínculo com a Prefeitura Municipal ou Secreteria de Saúde de Ceará-Mirim. Os dados aqui contidos são acessíveis a todos no site do<a href="http://www.saude.rn.gov.br/Conteudo.asp?TRAN=ITEM&TARG=223456&ACT=&PAGE=&PARM=&LBL=MAT%C9RIA" class="font-weight-bold ml-1" target="_blank">SESAP RN</a>.
            </div>
          </div>
          <div class="col-lg-6">
            <ul class="nav nav-footer justify-content-center justify-content-lg-end">
            <li class="nav-item">
                <a href="https://docs.google.com/forms/d/e/1FAIpQLSfOeseY7jvclzaRK1AVHLrtPlBYS8Chx7GB1JV11IjpkvSHTg/viewform?usp=sf_link" class="nav-link" target="_blank">Entre em contato</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link" target="_blank">Sobre a página</a>
              </li>
              <li class="nav-item">
                <a href="https://github.com/vitorarj" class="nav-link" target="_blank">Devenvolvedor</a>
              </li>
            </ul>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->

  


  <!-- Core -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
  <script type="text/javascript">
   
   var ctx = document.getElementsByClassName("line-chart");
   Chart.defaults.global.defaultFontColor = 'white';
   var cahartGraph = new Chart(ctx, {
      type: 'line',
      options: {
        scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Número de casos'
          }
        }],
        xAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Data'
          }
        }],
      },
        tooltips: {
        callbacks: {
        label: (tooltipItem, data) => {
        return formatMoney(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
        }
    }
        }
    },
      data: {
          labels: ['01/04','15/04','30/04','05/05','16/05','05/06','11/06','13/06'],
          datasets: [{
              label: "Casos Confirmados",
              data: [1,5,12,14,23,94,155,182],
              borderWidth:3,
              borderColor: '#d92550',
              backgroundColor: 'transparent'
          }]
      }
   });

   function formatMoney(n, c, d, t) {
  c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  return ' ' + s + n + ' Casos';
}

</script>
<script type="text/javascript">
   
   var ctx = document.getElementsByClassName("suspeito");
   Chart.defaults.global.defaultFontColor = 'white';
   var cahartGraph = new Chart(ctx, {
      type: 'line',
      options: {
        scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Número de casos'
          }
        }],
        xAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Data'
          }
        }],
      },
        tooltips: {
        callbacks: {
        label: (tooltipItem, data) => {
        return formatMoney(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
        }
    }
        }
    },
      data: {
          labels: ['01/04','15/04','30/04','05/05','16/05','05/06','11/06','13/06'],
          datasets: [{
              label: "Casos Suspeitos",
              data: [21,36,46,54,85,215,248,248],
              borderWidth:3,
              borderColor: '#d92550',
              backgroundColor: 'transparent'
          }]
      }
   });

   function formatMoney(n, c, d, t) {
  c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  return ' ' + s + n + ' Casos';
}

</script>

<script type="text/javascript">
   
   var ctx = document.getElementsByClassName("pizza");
   var cahartGraph = new Chart(ctx, {
      type: 'line',
      options: {
        scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Número de casos'
          }
        }],
        xAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Data'
          }
        }],
      },
        tooltips: {
        callbacks: {
        label: (tooltipItem, data) => {
        return formatMoney(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
        }
    }
        }
    },
      data: {
          labels: ['01/04','15/04','30/04','05/05','16/05','05/06','11/06','13/06'],
          datasets: [{
             label: "Óbitos",
              data: [0,0,2,2,2,13,15,15],
              borderWidth:3,
              borderColor: 'black',
              backgroundColor: 'transparent'
          }]
      }
   });

   function formatMoney(n, c, d, t) {
  c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  return ' ' + s + n + ' Casos';
}

</script>

<script type="text/javascript">
   
   var ctx = document.getElementsByClassName("faixa");
   var cahartGraph = new Chart(ctx, {
      type: 'bar',
      options: {
        scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Número de casos',
            
          }
        }],
        xAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Faixa de idade'
          }
        }],
      },
        tooltips: {
        callbacks: {
        label: (tooltipItem, data) => {
        return formatMoney(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
        }
    }
        }
    },
      data: {
          labels: ['20 a 29','30 a 39','40 a 49','50 a 59', '60 a 69', '70 a 79'],
          datasets: [{
             label: "Masculino",
              data: [1,3,0,1,1,1],
              borderWidth:1,
              borderColor: '#000000',
              backgroundColor: '#000000'
          }, 
          {
             label: "Feminino",
              data: [1,2,2,0,1,0],
              borderWidth:1,
              borderColor: '#36648B',
              backgroundColor: '#36648B'
          }]
      }
   });

   function formatMoney(n, c, d, t) {
  c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  return ' ' + s + n + ' Casos';
}

</script>
<script type="text/javascript">
   
   var ctx = document.getElementsByClassName("exame");
   var cahartGraph = new Chart(ctx, {
      type: 'doughnut',
      options: {
        tooltips: {
        callbacks: {
        label: (tooltipItem, data) => {
        return formatMoney(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
        }
    }
        }
    },
      data: {
          labels: ['Positivo (10,78%)','Negativo (32,30%)','Ainda não divulgado (56,92%)'],
          datasets: [{
              data: [14,42,74],
              borderWidth:1,
              backgroundColor: ["#CC0000", "#339966", "#1171ef"]
          }]
      }
   });

   function formatMoney(n, c, d, t) {
  c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  return ' ' + s + n + ' Casos';
}

</script>
<script type="text/javascript">
   
   var ctx = document.getElementsByClassName("bairro");
   var cahartGraph = new Chart(ctx, {
      type: 'horizontalBar',
      options: {
        scales: {
        yAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Bairros'
          }
        }],
        xAxes: [{
          scaleLabel: {
            display: true,
            labelString: 'Número de casos'
          }
        }],
      },
        tooltips: {
        callbacks: {
        label: (tooltipItem, data) => {
        return formatMoney(data.datasets[tooltipItem.datasetIndex].data[tooltipItem.index]);
        }
    }
        }
    },
      data: {
          labels: ['Centro','Cohab','Conj Luiz Lopes','Conj Paraiba', 'Massaranduba', 'Muriú', 'Nova Descoberta', 'Novos Tempos', 'Planalto', 'Primeira Lagoa', 'Santa Águeda', 'São Geraldo', 'Passa e Fica', 'Zona Rural','Outros'],
          datasets: [{
             label: "Bairros",
              data: [4,0,0,1,0,0,0,0,4,0,0,1,0,1,3],
              borderWidth:1,
              borderColor: '#fbb140',
              backgroundColor: '#fbb140'
          }]
      }
   });

   function formatMoney(n, c, d, t) {
  c = isNaN(c = Math.abs(c)) ? 2 : c, d = d == undefined ? "," : d, t = t == undefined ? "." : t, s = n < 0 ? "-" : "", i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  return ' ' + s + n + ' Casos';
}

</script>
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
</body>

</html>
