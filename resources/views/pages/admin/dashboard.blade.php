<div class="font-poppins-regular pt-3 px-2">
    <h3 class="text-black-dark-flat">Dashboard</h3>
    <div class="row row-col-4 d-flex justify-content-around mt-4 px-sm-3">
        <div class="callout callout-primary col-md-5 col-lg-auto mb-md-3 mb-sm-3">
            <h4>New Students
                <i class="bi bi-info-circle-fill fs-6" data-bs-toggle="tooltip" data-bs-placement="top" title="Within 30 days"></i>
            </h4>
            {{ $data[0]->new_student }}
        </div>
        <div class="callout callout-success col-md-5  col-lg-auto  mb-md-3  mb-sm-3">
            <h4>Total Students</h4>
            {{ $data[0]->total_student }}
        </div>
        <div class="callout callout-warning col-md-5  col-lg-auto  mb-md-3  mb-sm-3">
            <h4>Total Male</h4>
            {{ $data[0]->total_male }}
        </div>

        <div class="callout callout-danger col-md-5  col-lg-auto  mb-md-3  mb-sm-3">
            <h4>Total Female</h4>
            {{ $data[0]->total_female }}
        </div>
    </div>

    <div class="row px-3 d-flex justify-content-around mt-4">
        <div class="card col-lg-8 col-md-12 p-0  mb-sm-3">
            <div class="card-header">
                Trend
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>

        <div class="card col-lg-3 col-md-12 p-0  mb-sm-3">
            <div class="card-header">
                Gender Pie
            </div>
            <div class="card-body">
                <canvas id="genderPie"></canvas>
            </div>
        </div>

    </div>
</div>

@push('scripts')
    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                datasets: [{
                    label: '# of Enrolled Student',
                    data: {!! json_encode($data['trend']) !!} ,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 3,
                    tension: 0.4
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });

        const genderpie = document.getElementById('genderPie').getContext('2d');
        const gPie = new Chart(genderpie, {
            type: 'doughnut',
            data: {
                labels: [
                    'Male',
                    'Female'
                ],
                datasets: [{
                    label: 'Gender Pie',
                    data: [{{ $data[0]->total_male }}, {{ $data[0]->total_female }}],
                    backgroundColor: [
                        'rgb(255, 205, 86)',
                        'rgb(255, 99, 132)'
                    ],
                    hoverOffset: 4
                }]
            }
        });
    </script>
@endpush
