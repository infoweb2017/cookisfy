@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1 class="text-center mt-4 text-bg-info">Panel Administración</h1>

        <h3 class="text-center mt-4">Resumen de Estadísticas</h3>
        <div class="row">{{-- Resumen --}}
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body bg-body-secondary">
                        <h5 class="card-title">Usuarios Registrados</h5>
                        <p class="card-text">
                            Cantidad: {{ $totalUsuarios }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-secondary">
                        <h5 class="card-title">Recetas Publicadas</h5>
                        <p class="card-text">
                            Cantidad: {{ $totalRecetas }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-secondary">
                        <h5 class="card-title">Comentarios Realizados</h5>
                        <p class="card-text">
                            Cantidad: {{ $totalComentarios }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body bg-body-secondary">
                        <h5 class="card-title">Articulos Realizados</h5>
                        <p class="card-text">
                            Cantidad: {{ $totalArticulos }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-secondary">
                        <h5 class="card-title">Ofertas Realizados</h5>
                        <p class="card-text">
                            Cantidad: {{ $totalOfertas }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-secondary">
                        <h5 class="card-title">Eventos Realizados</h5>
                        <p class="card-text">
                            Cantidad: {{ $totalEventos }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-secondary">
                        <h5 class="card-title">Categorias</h5>
                        <p class="card-text">
                            Cantidad: {{ $totalCategoria }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-secondary">
                        <h5 class="card-title">Ingredientes</h5>
                        <p class="card-text">
                            Cantidad: {{ $totalIngrediente }}</p>
                    </div>
                </div>
            </div>
        </div>{{-- Fin Resumen --}}

        {{-- Enlaces directos --}}
        <div class="row mt-5">
            <h3 class="text-center">Enlaces directos</h3>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-tertiary">
                        <h5 class="card-title">Usuarios</h5>
                        <p class="card-text">Administrar usuarios registrados.</p>
                        <a href="{{ route('admin.usuarios') }}" class="btn btn-primary">Gestionar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body bg-body-tertiary">
                        <h5 class="card-title">Recetas</h5>
                        <p class="card-text">Administrar recetas publicadas.</p>
                        <a href="{{ route('admin.recetas') }}" class="btn btn-primary">Gestionar Recetas</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-tertiary">
                        <h5 class="card-title">Categorías</h5>
                        <p class="card-text">Administrar categorías de recetas.</p>
                        <a href="{{ route('admin.categorias') }}" class="btn btn-primary">Gestionar Categorías</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-tertiary">
                        <h5 class="card-title">Ingredientes</h5>
                        <p class="card-text">Administrar ingredientes de recetas.</p>
                        <a href="{{ route('admin.ingredientes') }}" class="btn btn-primary">Gestionar Ingredientes</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-tertiary">
                        <h5 class="card-title">Ofertas</h5>
                        <p class="card-text">Administrar Ofertas.</p>
                        <a href="{{ route('admin.ofertas') }}" class="btn btn-primary">Gestionar Ofertas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-tertiary">
                        <h5 class="card-title">Eventos</h5>
                        <p class="card-text">Administrar Eventos.</p>
                        <a href="{{ route('admin.eventos') }}" class="btn btn-primary">Gestionar Eventos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-tertiary">
                        <h5 class="card-title">Articulos</h5>
                        <p class="card-text">Administrar Articulos.</p>
                        <a href="{{ route('admin.articulos') }}" class="btn btn-primary">Gestionar Articulos</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body bg-body-tertiary">
                        <h5 class="card-title">Comentarios</h5>
                        <p class="card-text">Administrar Comentarios.</p>
                        <a href="{{ route('admin.usuarios') }}" class="btn btn-primary">Gestionar Comentarios</a>
                    </div>
                </div>
            </div>
        </div>{{-- Fin Enlaces directos --}}

        <!-- Gráfico de barras para mostrar recetas por mes -->        
        <div class="card mt-4">
            <div class="card-body">
                <h3>Recetas por Mes</h3>
                <canvas id="recetasPorMes"></canvas>
            </div>
        </div>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script>
        // Datos para el gráfico de recetas por mes (debes proporcionar estos datos)
        let meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
            "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
        ];
        let recetasPorMesData = [1, 4, 1, 15, 13, 3, 2, 5, 2, 15, 10, 5, 6, 6];

        // Configuración del gráfico
        const ctx = document.getElementById('recetasPorMes').getContext('2d');
        let recetasPorMes = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: meses,
                datasets: [{
                    label: 'Recetas por Mes',
                    data: recetasPorMesData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
