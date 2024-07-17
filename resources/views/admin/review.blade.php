<!doctype html>
<html class="h-full bg-gray-100">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <title>Review</title>
</head>
<body class="bg-custom-gradient shadow ">
<x-navbar></x-navbar>
<div class="container mx-auto px-4 py-8 size-2/2 ">
    <div class="bg-white shadow-md rounded-lg overflow-hidden mb-8">
        <div class="py-4 px-6 bg-gray-800 text-white text-lg font-semibold">Sentiment Analysis Reviews</div>
       
       <div class="flex">

     
        <div class="size-1/2 flex">
        <canvas id="predictionsChart" class="p-6 "></canvas>
        </div>
       
        
        <table class=" bg-white size-1/2 mt-20 me-20 text-black border-slate-900">
            <thead class="bg-gradient-to-r from-teal-300 to-green-300  border-slate-900">
                <tr class=" border-slate-900">
                    <th class="py-2 px-4 border-b uppercase tracking-wider">ID</th>
                    <th class="py-2 px-4 border-b uppercase tracking-wider">Review</th>
                    <th class="py-2 px-4 border-b uppercase tracking-wider">Prediksi</th>
                </tr>
            </thead>
            <tbody>
                @php $counter = 1; @endphp
                @foreach ($sentimen as $review)
                    <tr class=" border-slate-900">
                        <td class="py-2 px-4 border-b  border-slate-900">{{ $counter }}</td>
                        <td class="py-2 px-4 border-b  border-slate-900 text-center">{{ $review->review }}</td>
                        <td class="py-2 px-4 border-b  border-slate-900 text-center">{{ $review->prediksi }}</td>
                    </tr>
                    @php $counter++; @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-gray-800 mt-4">
    <div class="max-w-7xl mx-auto py-4 px-4 sm:px-6 lg:px-8">
        <p class="text-gray-300 text-center">&copy; 2024 My Website. All rights reserved.</p>
    </div>
</footer>

@vite('resources/js/app.js')

<script>
    document.addEventListener('DOMContentLoaded', function () {
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
                    backgroundColor: ['#4CAF50', '#F44336', '#FFEB3B'],
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
                            label: function (tooltipItem) {
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
