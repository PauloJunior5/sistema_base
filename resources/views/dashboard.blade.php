@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">person</i>
                        </div>
                        <p class="card-category">Usuários</p>
                        <h3 class="card-title">{{$users}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">apartment</i>
                        </div>
                        <p class="card-category">Países</p>
                        <h3 class="card-title">{{ (isset($paises) ? $paises : 0) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">apartment</i>
                        </div>
                        <p class="card-category">Estados</p>
                        <h3 class="card-title">{{ (isset($estados) ? $estados : 0) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">apartment</i>
                        </div>
                        <p class="card-category">Cidades</p>
                        <h3 class="card-title">{{ (isset($cidades) ? $cidades : 0) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">business_center</i>
                        </div>
                        <p class="card-category">Clientes</p>
                        <h3 class="card-title">{{ (isset($clientes) ? $clientes : 0) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">local_hospital</i>
                        </div>
                        <p class="card-category">Médicos</p>
                        <h3 class="card-title">{{ (isset($medicos) ? $medicos : 0) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">assignment_ind</i>
                        </div>
                        <p class="card-category">Pacientes</p>
                        <h3 class="card-title">{{ (isset($pacientes) ? $pacientes : 0) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">apartment</i>
                        </div>
                        <p class="card-category">Laboratórios</p>
                        <h3 class="card-title">{{ (isset($laboratorios) ? $laboratorios : 0) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                            <i class="material-icons">apartment</i>
                        </div>
                        <p class="card-category">Exames</p>
                        <h3 class="card-title">{{ (isset($exames) ? $exames : 0) }}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            <div class="col s12 m6">
              <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                  <span class="card-title">Card Title</span>
                  <p></p>
                </div>
                <div class="card-action">
                  <a href="#">This is a link</a>
                  <a href="#">This is a link</a>
                </div>
              </div>
            </div>
          </div>
    </div>
</div>
@endsection
@push('js')
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        md.initDashboardPageCharts();
    });
</script>
@endpush
