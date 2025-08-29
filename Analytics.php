<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Energy Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Font: Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Chart.js CDN for charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.2/dist/chart.umd.min.js"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">

        <!-- Sidebar -->
<?php include 'nav.php'; ?>

        <!-- Main Content Area -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <?php include 'header.php'; ?>

            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-50">
                <div class="space-y-6">
                    <!-- Page header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Analytics</h2>
                            <p class="text-gray-600">Track and analyze your energy consumption patterns</p>
                        </div>
                        <div class="flex space-x-2 mt-4 md:mt-0">
                            <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                <!-- CalendarIcon SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-2">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg>
                                Last 12 months
                            </button>
                            <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                                <!-- DownloadIcon SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-2">
                                    <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                    <polyline points="7 10 12 15 17 10"></polyline>
                                    <line x1="12" x2="12" y1="15" y2="3"></line>
                                </svg>
                                Export Data
                            </button>
                        </div>
                    </div>

                    <!-- Time range tabs -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <div class="border-b border-gray-200">
                            <nav class="flex -mb-px overflow-x-auto" id="time-range-tabs">
                                <button data-range="day" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm transition-colors border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Day</button>
                                <button data-range="week" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm transition-colors border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Week</button>
                                <button data-range="month" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm transition-colors border-blue-500 text-blue-600">Month</button>
                                <button data-range="year" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm transition-colors border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">Year</button>
                            </nav>
                        </div>
                    </div>

                    <!-- Monthly consumption and cost -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <div class="p-5 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-medium text-gray-800">Monthly Energy Consumption & Cost</h3>
                                <button class="inline-flex items-center px-3 py-1.5 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                    <!-- FilterIcon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-2">
                                        <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                    </svg>
                                    Filter
                                </button>
                            </div>
                        </div>
                        <div class="p-5 h-80">
                            <canvas id="monthly-chart"></canvas>
                        </div>
                    </div>

                    <!-- Energy distribution and peak usage -->
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        <!-- Energy distribution by device -->
                        <div class="bg-white rounded-lg shadow-sm">
                            <div class="p-5 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-800">Energy Distribution by Device</h3>
                            </div>
                            <div class="p-5">
                                <div class="h-64 flex justify-center items-center">
                                    <canvas id="device-pie-chart"></canvas>
                                </div>
                                <div id="pie-legend" class="mt-4 grid grid-cols-2 gap-2">
                                    <!-- Legend items will be dynamically inserted here -->
                                </div>
                            </div>
                        </div>
                        <!-- Peak usage hours -->
                        <div class="bg-white rounded-lg shadow-sm">
                            <div class="p-5 border-b border-gray-200">
                                <h3 class="text-lg font-medium text-gray-800">Peak Usage Hours</h3>
                            </div>
                            <div class="p-5 h-64">
                                <canvas id="peak-usage-chart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Insights -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <div class="p-5 border-b border-gray-200">
                            <h3 class="text-lg font-medium text-gray-800">Energy Insights</h3>
                        </div>
                        <div class="p-5">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <div class="bg-blue-50 p-4 rounded-lg">
                                    <h4 class="font-medium text-blue-800 mb-2">Consumption Trend</h4>
                                    <p class="text-blue-600 text-sm mb-2">Your consumption has increased by 8% compared to last month.</p>
                                    <a href="#" class="text-blue-700 text-sm font-medium">View details →</a>
                                </div>
                                <div class="bg-green-50 p-4 rounded-lg">
                                    <h4 class="font-medium text-green-800 mb-2">Saving Opportunity</h4>
                                    <p class="text-green-600 text-sm mb-2">You could save up to $25 by optimizing your AC usage during peak hours.</p>
                                    <a href="#" class="text-green-700 text-sm font-medium">Learn how →</a>
                                </div>
                                <div class="bg-purple-50 p-4 rounded-lg">
                                    <h4 class="font-medium text-purple-800 mb-2">Usage Comparison</h4>
                                    <p class="text-purple-600 text-sm mb-2">Your usage is 12% higher than similar households in your area.</p>
                                    <a href="#" class="text-purple-700 text-sm font-medium">Compare details →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- DATA ---
            const monthlyData = [{
                name: 'Jan',
                consumption: 230,
                cost: 69
            }, {
                name: 'Feb',
                consumption: 220,
                cost: 66
            }, {
                name: 'Mar',
                consumption: 240,
                cost: 72
            }, {
                name: 'Apr',
                consumption: 210,
                cost: 63
            }, {
                name: 'May',
                consumption: 230,
                cost: 69
            }, {
                name: 'Jun',
                consumption: 250,
                cost: 75
            }, {
                name: 'Jul',
                consumption: 280,
                cost: 84
            }, {
                name: 'Aug',
                consumption: 290,
                cost: 87
            }, {
                name: 'Sep',
                consumption: 260,
                cost: 78
            }, {
                name: 'Oct',
                consumption: 240,
                cost: 72
            }, {
                name: 'Nov',
                consumption: 245,
                cost: 73.5
            }, {
                name: 'Dec',
                consumption: 255,
                cost: 76.5
            }];

            const deviceData = [{
                name: 'AC',
                value: 35
            }, {
                name: 'Refrigerator',
                value: 25
            }, {
                name: 'Lights',
                value: 15
            }, {
                name: 'TV',
                value: 10
            }, {
                name: 'Others',
                value: 15
            }];

            const peakUsageData = [{
                hour: '00:00',
                usage: 2.1
            }, {
                hour: '02:00',
                usage: 1.8
            }, {
                hour: '04:00',
                usage: 1.5
            }, {
                hour: '06:00',
                usage: 2.3
            }, {
                hour: '08:00',
                usage: 3.2
            }, {
                hour: '10:00',
                usage: 3.8
            }, {
                hour: '12:00',
                usage: 3.5
            }, {
                hour: '14:00',
                usage: 3.2
            }, {
                hour: '16:00',
                usage: 3.0
            }, {
                hour: '18:00',
                usage: 3.8
            }, {
                hour: '20:00',
                usage: 4.2
            }, {
                hour: '22:00',
                usage: 3.1
            }];

            const COLORS = ['#3B82F6', '#8B5CF6', '#10B981', '#F59E0B', '#6B7280'];

            // --- STATE & DOM ELEMENTS ---
            let activeTimeRange = 'month';
            const tabButtons = document.querySelectorAll('.tab-button');
            const monthlyChartCanvas = document.getElementById('monthly-chart');
            const devicePieChartCanvas = document.getElementById('device-pie-chart');
            const peakUsageChartCanvas = document.getElementById('peak-usage-chart');
            const pieLegendContainer = document.getElementById('pie-legend');
            
            // Chart.js instances
            let monthlyChart;
            let devicePieChart;
            let peakUsageChart;

            // --- RENDER FUNCTIONS ---
            
            /**
             * Initializes and renders the charts using Chart.js.
             */
            const renderCharts = () => {
                // Destroy previous instances to prevent memory leaks and redraw issues
                if (monthlyChart) monthlyChart.destroy();
                if (devicePieChart) devicePieChart.destroy();
                if (peakUsageChart) peakUsageChart.destroy();

                // Monthly Energy Consumption & Cost (Bar Chart)
                monthlyChart = new Chart(monthlyChartCanvas, {
                    type: 'bar',
                    data: {
                        labels: monthlyData.map(d => d.name),
                        datasets: [{
                            label: 'Consumption (kWh)',
                            data: monthlyData.map(d => d.consumption),
                            backgroundColor: '#3B82F6',
                            yAxisID: 'consumption'
                        }, {
                            label: 'Cost ($)',
                            data: monthlyData.map(d => d.cost),
                            backgroundColor: '#10B981',
                            yAxisID: 'cost'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            tooltip: {
                                mode: 'index',
                                intersect: false,
                            }
                        },
                        scales: {
                            consumption: {
                                type: 'linear',
                                position: 'left',
                                title: { display: false, text: 'Consumption (kWh)' },
                                grid: { drawOnChartArea: false }
                            },
                            cost: {
                                type: 'linear',
                                position: 'right',
                                title: { display: false, text: 'Cost ($)' },
                                grid: { drawOnChartArea: false }
                            },
                            x: {
                                grid: { drawOnChartArea: false }
                            }
                        }
                    }
                });

                // Energy Distribution by Device (Pie Chart)
                devicePieChart = new Chart(devicePieChartCanvas, {
                    type: 'doughnut',
                    data: {
                        labels: deviceData.map(d => d.name),
                        datasets: [{
                            data: deviceData.map(d => d.value),
                            backgroundColor: COLORS
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false // We will create a custom legend below
                            },
                            tooltip: {
                                callbacks: {
                                    label: (context) => {
                                        let label = context.label || '';
                                        if (label) {
                                            label += ': ';
                                        }
                                        label += context.raw + '%';
                                        return label;
                                    }
                                }
                            }
                        }
                    }
                });

                // Peak Usage Hours (Line Chart)
                peakUsageChart = new Chart(peakUsageChartCanvas, {
                    type: 'line',
                    data: {
                        labels: peakUsageData.map(d => d.hour),
                        datasets: [{
                            label: 'Energy Usage',
                            data: peakUsageData.map(d => d.usage),
                            borderColor: '#3B82F6',
                            tension: 0.3,
                            fill: false
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false },
                            tooltip: {
                                callbacks: {
                                    label: (context) => {
                                        return `Energy Usage: ${context.raw} kW`;
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                title: { display: false, text: 'Hour' },
                                grid: { drawOnChartArea: false }
                            },
                            y: {
                                title: { display: false, text: 'Usage (kW)' },
                                ticks: { callback: (value) => `${value} kW` }
                            }
                        }
                    }
                });

                // Render custom pie chart legend
                renderPieLegend();
            };

            // --- HANDLERS ---
            /**
             * Handles the click event for the time range tabs.
             * @param {Event} event The click event object.
             */
            const handleTabClick = (event) => {
                const newTimeRange = event.currentTarget.dataset.range;
                if (activeTimeRange !== newTimeRange) {
                    // Update active state
                    tabButtons.forEach(btn => {
                        btn.classList.remove('border-blue-500', 'text-blue-600');
                        btn.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                    });
                    event.currentTarget.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                    event.currentTarget.classList.add('border-blue-500', 'text-blue-600');
                    
                    activeTimeRange = newTimeRange;
                    // In a real app, you would fetch new data here.
                    // For this demo, we just update the active state.
                }
            };

            // --- INITIALIZATION ---
            tabButtons.forEach(button => {
                button.addEventListener('click', handleTabClick);
            });

            // Initial render of the charts
            renderCharts();
        });
    </script>
</body>
</html>
