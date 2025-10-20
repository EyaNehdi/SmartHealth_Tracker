{{-- resources/views/frontoffice/activities/statistics.blade.php --}}

@extends('shared.layouts.frontoffice')

@section('page-title', 'Statistiques des Réservations - SmartHealth Tracker')

@push('styles')
    <style>
        .chart-container {
            position: relative;
            height: 400px;
            margin: 0 auto;
            max-width: 600px;
        }
        .chart-wrapper {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .stats-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .stats-header h3 {
            color: #333;
            font-weight: bold;
        }
        .table th {
            background-color: #f8f9fa;
            font-weight: 600;
        }
        .table td:first-child {
            font-weight: 500;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
        }
    </style>
@endpush

@section('content')
    <!-- main-area -->
    <main class="main-area fix">

        <!-- breadcrumb-area -->
        <section class="breadcrumb__area breadcrumb__bg" data-background="{{ Vite::asset('resources/assets/img/bg/sd_bg.jpg') }}">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="breadcrumb__content">
                            <h2 class="title">Statistiques des Activités les Plus Acheters</h2>
                            <nav class="breadcrumb">
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="{{ route('home') }}">Home</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">
                                    <a href="{{ route('activities.front') }}">Liste des Activités</a>
                                </span>
                                <span class="breadcrumb-separator">|</span>
                                <span property="itemListElement" typeof="ListItem">Statistiques</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section__bg-shape">
                <span class="bottom-shape" data-background="{{ Vite::asset('resources/assets/img/bg/section_bg_shape02.svg') }}"></span>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- statistics-area -->
        <section class="shop__area section-py-150">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <div class="card p-4 shadow-sm bg-white">
                            <div class="stats-header">
                                <h3>Top 10 Activités les Plus Acheters</h3>
                                <small class="text-muted">Visualisation graphique des Achats</small>
                            </div>

                            <div class="chart-wrapper">
                                <div class="chart-container">
                                    <canvas id="reservationsChart"></canvas>
                                </div>
                            </div>

                            <div class="table-responsive mt-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Activité</th>
                                            <th>Nombre d'achat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($labels as $index => $label)
                                            <tr>
                                                <td>{{ $label }}</td>
                                                <td><span class="badge bg-primary">{{ $data[$index] }}</span></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="text-center">
                                <a href="{{ route('activities.front') }}" class="btn btn-secondary back-link">
                                    <i class="fas fa-arrow-left me-2"></i>Retour à la Liste des Activités
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- statistics-area-end -->

    </main>
    <!-- main-area-end -->
@endsection

@push('frontoffice-scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('reservationsChart');
            if (!ctx) {
                console.error('Canvas element not found!');
                return;
            }
            const canvasCtx = ctx.getContext('2d');
            
            const colors = [
                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF',
                '#FF9F40', '#C9CBCF', '#4BC0C0', '#FF6384', '#36A2EB'
            ];

            new Chart(canvasCtx, {
                type: 'line', // Changé en courbe (line chart)
                data: {
                    labels: @json($labels),
                    datasets: [{
                        label: 'Nombre de Réservations',
                        data: @json($data),
                        borderColor: colors[0], // Couleur de la ligne principale
                        backgroundColor: colors[0] + '33', // Fond semi-transparent pour la zone sous la courbe
                        borderWidth: 3,
                        fill: true, // Remplit la zone sous la courbe
                        tension: 0.4, // Courbure des lignes (0 = droit, 1 = très courbé)
                        pointBackgroundColor: colors[0],
                        pointBorderColor: '#fff',
                        pointBorderWidth: 2,
                        pointRadius: 6,
                        pointHoverRadius: 8,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        title: {
                            display: true,
                            text: 'Répartition des Achats par Activité (Courbe)',
                            font: {
                                size: 16,
                                weight: 'bold'
                            },
                            color: '#333'
                        },
                        legend: {
                            display: false
                        },
                        tooltip: {
                            backgroundColor: 'rgba(0,0,0,0.8)',
                            titleColor: 'white',
                            bodyColor: 'white',
                            callbacks: {
                                label: function(context) {
                                    return 'Réservations: ' + context.parsed.y;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1,
                                color: '#666'
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: '#666',
                                maxRotation: 45,
                                minRotation: 0
                            },
                            grid: {
                                color: 'rgba(0,0,0,0.1)'
                            }
                        }
                    },
                    animation: {
                        duration: 1500,
                        easing: 'easeInOutQuart'
                    }
                }
            });
        });
    </script>
@endpush