<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Review Sentimmen </title>
</head>

<body class="bg-gray-200 shadow text-black flex flex-col min-h-screen">
    <x-navbar></x-navbar>

    

    <div class="container mx-auto px-4 py-8 flex-grow">
        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
            <div class="py-4 px-6 bg-gray-800 text-white text-lg font-semibold">Sentiment Analysis Reviews</div>

            @if (session('success'))
            <div id="success-alert" class="alert alert-success flex items-center mb-4" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="ml-2">{{ session('success') }}</span>
            </div>
            <script>
                setTimeout(function() {
                    var alert = document.getElementById('success-alert');
                    alert.style.display = 'none';
                }, 3500);
            </script>
            @endif

            <div class="flex flex-col lg:flex-row items-center lg:items-start lg:space-x-6 p-6">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <canvas id="predictionsChart"></canvas>
                </div>

                <div class="lg:w-1/2 w-full overflow-x-auto">
                    <table class="bg-white w-full border-collapse border border-slate-900">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th class="py-2 border border-slate-900 uppercase tracking-wider">ID</th>
                                <th class="py-2 px-4 border border-slate-900 uppercase tracking-wider">Review</th>
                                <th class="py-2 px-1 border border-slate-900 uppercase tracking-wider">Prediksi</th>
                                <th class="py-2 border border-slate-900 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $counter = 1; @endphp
                            @foreach ($sentimen as $review)
                            <tr class="hover:bg-gray-100">
                                <td class="py-2 border border-slate-900 text-center text-black">{{ $counter }}</td>
                                <td class="py-2 px-4 border border-slate-900 text-center text-black">{{ $review->review }}</td>
                                <td class="py-2 px-2 border border-slate-900 text-center text-black">{{ $review->prediksi }}</td>
                                <td class="py-2 px-4 border-slate-900 border">
                                    <form action="{{ route('sentimen.destroy', $review->id) }}" method="POST" class="inline" onsubmit="return ">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm bg-transparent" type="submit">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 stroke-black fill-red-400">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @php $counter++; @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
    </div>



    <!-- Footer -->
    <footer class="bg-gray-800 mt-auto">
        <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
            <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
        </div>
    </footer>

    @vite('resources/js/app.js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Assuming you have your predictions data in the sentimen variable
            const sentimen = @json($sentimen);

            // Calculate the counts for each prediction category
            const predictionCounts = {
                positive: 0,
                negative: 0,
                neutral: 0,
            };

            sentimen.forEach(review => {
                if (review.prediksi === 'Positif') {
                    predictionCounts.positive++;
                } else if (review.prediksi === 'Negatif') {
                    predictionCounts.negative++;
                } else if (review.prediksi === 'Netral') {
                    predictionCounts.neutral++;
                }
            });

            // Create the pie chart
            const ctx = document.getElementById('predictionsChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: ['Positive', 'Negative', 'Netral'],
                    datasets: [{
                        data: [predictionCounts.positive, predictionCounts.negative, predictionCounts.neutral],
                        backgroundColor: ['#4BD0A0', '#EF97E1', '#9269F8'],
                    }],
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    const label = tooltipItem.label || '';
                                    const value = tooltipItem.raw;
                                    return `${label}: ${value}`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>