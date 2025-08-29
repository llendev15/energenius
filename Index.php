<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    // Redirect if not logged in
    header("Location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Energy Dashboard</title>
    
    <!-- Include the Tailwind CSS Play CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
          body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom styles for demonstration, though not strictly required. */
        .chart-placeholder {
            height: 300px;
            background: linear-gradient(to right, #e2e8f0 0%, #cbd5e1 100%);
            border-radius: 0.5rem;
            animation: pulse 2s infinite ease-in-out;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.8; }
            50% { transform: scale(1.02); opacity: 1; }
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <?php include 'nav.php'; ?>
        <!-- Sidebar (formerly Sidebar component) -->
        <!-- The 'translate-x-0' class is hardcoded here to show the sidebar by default. -->
      

        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Header (formerly Header component) -->
            <?php include 'header.php'; ?>

            <!-- Main Content (formerly 'children' prop) -->
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-50">
                <div class="space-y-6">

                    <!-- Page header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">
                                Welcome back, <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                            </h2>
                            <p class="text-gray-600">
                                Here's what's happening with your energy today
                            </p>
                        </div>
                        <div class="flex space-x-2 mt-4 md:mt-0">
                            <button class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                                <!-- CalendarIcon SVG -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-2">
                                    <path d="M8 2v4"></path>
                                    <path d="M16 2v4"></path>
                                    <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                    <path d="M3 10h18"></path>
                                </svg>
                                Last 7 days
                            </button>
                            <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                                Download Report
                            </button>
                        </div>
                    </div>

                    <!-- Stats cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <!-- Current Usage Card -->
                        <div class="bg-white rounded-lg shadow p-5">
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Current Usage</p>
                                    <div class="flex items-end">
                                        <h3 class="text-2xl font-bold text-gray-800 mr-2">
                                            3.5 kWh
                                        </h3>
                                        <span class="text-green-500 text-sm flex items-center">
                                            <!-- TrendingDownIcon SVG -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-1">
                                                <polyline points="22 17 13.5 8.5 8.5 13.5 2 7"></polyline>
                                                <polyline points="16 17 22 17 22 11"></polyline>
                                            </svg>
                                            12%
                                        </span>
                                    </div>
                                </div>
                                <div class="bg-blue-100 rounded-full p-2">
                                    <!-- ZapIcon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-blue-600">
                                        <polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Usage Card -->
                        <div class="bg-white rounded-lg shadow p-5">
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Monthly Usage</p>
                                    <div class="flex items-end">
                                        <h3 class="text-2xl font-bold text-gray-800 mr-2">
                                            245 kWh
                                        </h3>
                                        <span class="text-green-500 text-sm flex items-center">
                                            <!-- TrendingDownIcon SVG -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-1">
                                                <polyline points="22 17 13.5 8.5 8.5 13.5 2 7"></polyline>
                                                <polyline points="16 17 22 17 22 11"></polyline>
                                            </svg>
                                            8%
                                        </span>
                                    </div>
                                </div>
                                <div class="bg-purple-100 rounded-full p-2">
                                    <!-- CalendarIcon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-purple-600">
                                        <path d="M8 2v4"></path>
                                        <path d="M16 2v4"></path>
                                        <rect width="18" height="18" x="3" y="4" rx="2"></rect>
                                        <path d="M3 10h18"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Estimated Bill Card -->
                        <div class="bg-white rounded-lg shadow p-5">
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Estimated Bill</p>
                                    <div class="flex items-end">
                                        <h3 class="text-2xl font-bold text-gray-800 mr-2">
                                            $78.35
                                        </h3>
                                        <span class="text-green-500 text-sm flex items-center">
                                            <!-- TrendingDownIcon SVG -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-1">
                                                <polyline points="22 17 13.5 8.5 8.5 13.5 2 7"></polyline>
                                                <polyline points="16 17 22 17 22 11"></polyline>
                                            </svg>
                                            5%
                                        </span>
                                    </div>
                                </div>
                                <div class="bg-green-100 rounded-full p-2">
                                    <!-- DollarSignIcon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600">
                                        <line x1="12" x2="12" y1="2" y2="22"></line>
                                        <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7H15a3.5 3.5 0 0 1 0 7H6"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Active Devices Card -->
                        <div class="bg-white rounded-lg shadow p-5">
                            <div class="flex justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Active Devices</p>
                                    <div class="flex items-end">
                                        <h3 class="text-2xl font-bold text-gray-800 mr-2">8/12</h3>
                                    </div>
                                </div>
                                <div class="bg-yellow-100 rounded-full p-2">
                                    <!-- Custom icon placeholder since no specific icon was defined -->
                                    <div class="h-6 w-6 text-yellow-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                                            <path d="M12 2v20"></path>
                                            <path d="M17 5H7"></path>
                                            <path d="M17 19H7"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Energy usage chart -->
                    <div class="bg-white rounded-lg shadow">
                        <div class="p-5 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-medium text-gray-800">
                                    Energy Consumption
                                </h3>
                                <div class="flex space-x-2">
                                    <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded-md">
                                        Day
                                    </button>
                                    <button class="px-3 py-1 text-sm text-gray-600 hover:bg-gray-100 rounded-md">
                                        Week
                                    </button>
                                    <button class="px-3 py-1 text-sm text-gray-600 hover:bg-gray-100 rounded-md">
                                        Month
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="p-5">
                            <!-- Placeholder for the EnergyUsageChart component -->
                            <canvas id="energyUsageChart"></canvas>
                        </div>
                    </div>

                    <!-- Active devices and budget section -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                        <!-- Active devices list -->
                        <div class="lg:col-span-2 bg-white rounded-lg shadow">
                            <div class="p-5 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-medium text-gray-800">
                                        Active Devices
                                    </h3>
                                   <a href="Devices.php" class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        View all
                                    </a>


                                </div>
                            </div>
                            <div class="p-5 divide-y divide-gray-200">
                                <!-- DeviceStatusCard components manually replicated -->
                                <!-- Living Room AC -->
                                <div class="flex items-center justify-between py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-600">
                                                <path d="M2 13h10v8H2z"></path>
                                                <path d="M12 2h10v10H12z"></path>
                                                <path d="M12 13v-1"></path>
                                                <path d="M17 13v-1"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Living Room AC</h4>
                                            <span class="text-sm text-gray-500">
                                                1.2 kWh
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm text-green-500">On</span>
                                        <span class="relative h-6 w-11 cursor-pointer rounded-full bg-blue-600 transition-colors">
                                            <span class="absolute left-1 top-1 h-4 w-4 transform rounded-full bg-white transition-transform translate-x-5"></span>
                                        </span>
                                    </div>
                                </div>

                                <!-- Kitchen Refrigerator -->
                                <div class="flex items-center justify-between py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-600">
                                                <path d="M2 13h10v8H2z"></path>
                                                <path d="M12 2h10v10H12z"></path>
                                                <path d="M12 13v-1"></path>
                                                <path d="M17 13v-1"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Kitchen Refrigerator</h4>
                                            <span class="text-sm text-gray-500">
                                                0.8 kWh
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm text-green-500">On</span>
                                        <span class="relative h-6 w-11 cursor-pointer rounded-full bg-blue-600 transition-colors">
                                            <span class="absolute left-1 top-1 h-4 w-4 transform rounded-full bg-white transition-transform translate-x-5"></span>
                                        </span>
                                    </div>
                                </div>

                                <!-- Bedroom Light -->
                                <div class="flex items-center justify-between py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-600">
                                                <path d="M12 18a6 6 0 1 0 0-12 6 6 0 0 0 0 12z"></path>
                                                <path d="M12 2v4"></path>
                                                <path d="M12 18v4"></path>
                                                <path d="M4.22 4.22l2.83 2.83"></path>
                                                <path d="M16.95 16.95l2.83 2.83"></path>
                                                <path d="M4.22 19.78l2.83-2.83"></path>
                                                <path d="M16.95 7.05l2.83-2.83"></path>
                                                <path d="M2 12h4"></path>
                                                <path d="M18 12h4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Bedroom Light</h4>
                                            <span class="text-sm text-gray-500">
                                                0.0 kWh
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm text-red-500">Off</span>
                                        <span class="relative h-6 w-11 cursor-pointer rounded-full bg-gray-200 transition-colors">
                                            <span class="absolute left-1 top-1 h-4 w-4 transform rounded-full bg-white transition-transform translate-x-0"></span>
                                        </span>
                                    </div>
                                </div>

                                <!-- Water Heater -->
                                <div class="flex items-center justify-between py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-600">
                                                <path d="M12 2v4"></path>
                                                <path d="M17 5H7"></path>
                                                <path d="M17 19H7"></path>
                                                <path d="M12 18v4"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-800">Water Heater</h4>
                                            <span class="text-sm text-gray-500">
                                                1.5 kWh
                                            </span>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm text-green-500">On</span>
                                        <span class="relative h-6 w-11 cursor-pointer rounded-full bg-blue-600 transition-colors">
                                            <span class="absolute left-1 top-1 h-4 w-4 transform rounded-full bg-white transition-transform translate-x-5"></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Budget progress -->
                        <div class="bg-white rounded-lg shadow">
                            <div class="p-5 border-b border-gray-200">
                                <div class="flex justify-between items-center">
                                    <h3 class="text-lg font-medium text-gray-800">
                                        Budget Tracking
                                    </h3>
                                    <button>
                                        <!-- MoreHorizontalIcon SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-gray-400">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="19" cy="12" r="1"></circle>
                                            <circle cx="5" cy="12" r="1"></circle>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="p-5 space-y-5">
                                <!-- BudgetProgressBar manually replicated -->
                                <div>
                                    <div class="flex justify-between text-sm font-medium mb-1">
                                        <span class="text-gray-700">Monthly Budget</span>
                                        <span class="text-blue-600">$78.35 of $100</span>
                                    </div>
                                    <div class="w-full h-2 bg-gray-200 rounded-full">
                                        <div class="h-full bg-blue-600 rounded-full" style="width: 78.35%"></div>
                                    </div>
                                </div>

                                <!-- Alert message -->
                                <div class="bg-yellow-50 border border-yellow-100 rounded-lg p-4 flex items-start">
                                    <!-- AlertTriangleIcon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-yellow-500 mr-3 mt-0.5">
                                        <path d="M10.29 2.06l10.95 19.95A2 2 0 0 1 19.29 22H4.71a2 2 0 0 1-1.95-2.99L13.71 2.06a2 2 0 0 1 3.94 0z"></path>
                                        <line x1="12" x2="12" y1="9" y2="13"></line>
                                        <line x1="12" x2="12" y1="17" y2="17"></line>
                                    </svg>
                                    <div>
                                        <h4 class="font-medium text-yellow-800">
                                            Approaching budget limit
                                        </h4>
                                        <p class="text-yellow-600 text-sm">
                                            You've used 78% of your monthly budget
                                        </p>
                                    </div>
                                </div>

                                <!-- Energy Saving Tips -->
                                <div class="border-t border-gray-200 pt-5">
                                    <h4 class="font-medium text-gray-800 mb-3">
                                        Energy Saving Tips
                                    </h4>
                                    <ul class="space-y-2 text-sm">
                                        <li class="flex items-start">
                                            <!-- MinusIcon SVG -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-blue-500 mr-2 mt-0.5">
                                                <line x1="5" x2="19" y1="12" y2="12"></line>
                                            </svg>
                                            <span class="text-gray-600">
                                                Turn off your AC when not in use
                                            </span>
                                        </li>
                                        <li class="flex items-start">
                                            <!-- MinusIcon SVG -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-blue-500 mr-2 mt-0.5">
                                                <line x1="5" x2="19" y1="12" y2="12"></line>
                                            </svg>
                                            <span class="text-gray-600">
                                                Switch to energy-efficient LED bulbs
                                            </span>
                                        </li>
                                        <li class="flex items-start">
                                            <!-- PlusIcon SVG -->
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 text-blue-500 mr-2 mt-0.5">
                                                <line x1="12" x2="12" y1="5" y2="19"></line>
                                                <line x1="5" x2="19" y1="12" y2="12"></line>
                                            </svg>
                                            <span class="text-blue-600 font-medium">
                                                See more tips
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        const ctx = document.getElementById('energyUsageChart').getContext('2d');
        const energyUsageChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
                datasets: [{
                    label: 'Energy Usage (kWh)',
                    data: [3.5, 4.2, 3.8, 4.0, 3.9, 4.1, 3.7],
                    borderColor: 'rgba(37, 99, 235, 1)',
                    backgroundColor: 'rgba(37, 99, 235, 0.2)',
                    borderWidth: 2,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top'
                    }
                },
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Days of the Week'
                        }
                    },
                    y: {
                        title: {
                            display: true,
                            text: 'Energy Usage (kWh)'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
</body>
</html>
