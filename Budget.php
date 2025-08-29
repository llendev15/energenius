<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Budget Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
        /* Custom styles for the progress bar */
        .progress-container {
            height: 8px;
            background-color: #e5e7eb;
            border-radius: 9999px;
            overflow: hidden;
        }
        .progress-bar {
            height: 100%;
            border-radius: 9999px;
            transition: width 0.3s ease-in-out, background-color 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">

        <!-- Sidebar -->
<?php include 'nav.php'; ?>
        <div class="flex flex-col flex-1 overflow-hidden">
        <?php include 'header.php'; ?>

            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-50">
                <div class="space-y-6">
    <div class="space-y-6 max-w-7xl mx-auto">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Budget Management
                </h2>
                <p class="text-gray-600">
                    Set and track your energy spending limits
                </p>
            </div>
            <div class="flex mt-4 md:mt-0">
                <button id="set-budget-btn" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-2">
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    Set New Budget
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-lg shadow p-5">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Monthly Budget</p>
                        <div class="flex items-end">
                            <h3 id="budget-amount" class="text-2xl font-bold text-gray-800 mr-2">
                                $100
                            </h3>
                        </div>
                    </div>
                    <div class="bg-blue-100 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-blue-600">
                            <line x1="12" y1="1" x2="12" y2="23"></line>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                        </svg>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-sm font-medium text-gray-600 mb-2">Current Usage: <span id="current-usage-label">$0.00</span> / <span id="max-budget-label">$0.00</span></p>
                    <div class="progress-container">
                        <div id="progress-bar" class="progress-bar" style="width: 0%;"></div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow p-5">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Current Bill</p>
                        <div class="flex items-end">
                            <h3 id="current-bill-amount" class="text-2xl font-bold text-gray-800 mr-2">
                                $78.35
                            </h3>
                            <span class="text-green-500 text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-1">
                                    <polyline points="22 17 13.5 8.5 8.5 13.5 2 7"></polyline>
                                    <polyline points="16 17 22 17 22 11"></polyline>
                                </svg>
                                5%
                            </span>
                        </div>
                    </div>
                    <div class="bg-green-100 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-green-600">
                            <line x1="18" y1="20" x2="18" y2="10"></line>
                            <line x1="12" y1="20" x2="12" y2="4"></line>
                            <line x1="6" y1="20" x2="6" y2="14"></line>
                        </svg>
                    </div>
                </div>
                <p id="current-bill-percent" class="mt-4 text-sm text-gray-600">
                    78% of your monthly budget
                </p>
                <p id="remaining-budget" class="text-sm text-gray-600">
                    $21.65 remaining
                </p>
            </div>

            <div class="bg-white rounded-lg shadow p-5">
                <div class="flex justify-between items-start">
                    <div>
                        <p class="text-gray-500 text-sm">Projected Bill</p>
                        <div class="flex items-end">
                            <h3 id="projected-bill-amount" class="text-2xl font-bold text-gray-800 mr-2">
                                $95.20
                            </h3>
                            <span class="text-red-500 text-sm flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-1">
                                    <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                    <polyline points="16 7 22 7 22 13"></polyline>
                                </svg>
                                8%
                            </span>
                        </div>
                    </div>
                    <div class="bg-yellow-100 rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-yellow-600">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                            <line x1="16" y1="2" x2="16" y2="6"></line>
                            <line x1="8" y1="2" x2="8" y2="6"></line>
                            <line x1="3" y1="10" x2="21" y2="10"></line>
                        </svg>
                    </div>
                </div>
                <p id="projected-bill-percent" class="mt-4 text-sm text-gray-600">
                    Projected to be 95% of your budget
                </p>
                <p id="projected-over-budget" class="text-sm text-red-600 font-medium mt-1 flex items-center hidden">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-1">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="12" y1="8" x2="12" y2="12"></line>
                        <line x1="12" y1="16" x2="12.01" y2="16"></line>
                    </svg>
                    $5.20 over budget
                </p>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="p-5 border-b border-gray-200">
                <div class="flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-800">
                        Daily Energy Costs
                    </h3>
                    <div class="flex space-x-2">
                        <button class="px-3 py-1 text-sm bg-blue-50 text-blue-600 rounded-md">
                            Week
                        </button>
                        <button class="px-3 py-1 text-sm text-gray-600 hover:bg-gray-100 rounded-md">
                            Month
                        </button>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="h-64">
                    <canvas id="daily-consumption-chart"></canvas>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <div class="bg-white rounded-lg shadow">
                <div class="p-5 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-800">Budget Alerts</h3>
                </div>
                <div class="p-5 divide-y divide-gray-200">
                    <div class="py-4 first:pt-0">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-yellow-500">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <line x1="12" y1="8" x2="12" y2="12"></line>
                                    <line x1="12" y1="16" x2="12.01" y2="16"></line>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-gray-800">
                                    Approaching budget limit
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    You've used <span id="alert-usage-percent">78%</span> of your monthly budget with 9 days remaining.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="py-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-red-500">
                                    <polyline points="22 7 13.5 15.5 8.5 10.5 2 17"></polyline>
                                    <polyline points="16 7 22 7 22 13"></polyline>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-gray-800">
                                    Higher than usual consumption
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    Your AC usage is 15% higher than your usual pattern.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="py-4 last:pb-0">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-500">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-gray-800">
                                    Monthly budget review
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    Your budget report for last month is ready to view.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-lg shadow">
                <div class="p-5 border-b border-gray-200">
                    <h3 class="text-lg font-medium text-gray-800">Saving Tips</h3>
                </div>
                <div class="p-5">
                    <ul class="space-y-4">
                        <li class="flex">
                            <div class="flex-shrink-0">
                                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-600 text-white text-sm">
                                    1
                                </span>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-gray-800">
                                    Adjust your AC temperature
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    Increasing your AC temperature by just 1°C can save up to 10% on your cooling costs.
                                </p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="flex-shrink-0">
                                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-600 text-white text-sm">
                                    2
                                </span>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-gray-800">
                                    Schedule your devices
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    Use the scheduler to automatically turn off devices during non-peak hours.
                                </p>
                            </div>
                        </li>
                        <li class="flex">
                            <div class="flex-shrink-0">
                                <span class="flex h-6 w-6 items-center justify-center rounded-full bg-blue-600 text-white text-sm">
                                    3
                                </span>
                            </div>
                            <div class="ml-3">
                                <h4 class="text-sm font-medium text-gray-800">
                                    Unplug unused devices
                                </h4>
                                <p class="text-sm text-gray-500 mt-1">
                                    Devices on standby can consume up to 10% of your total energy usage.
                                </p>
                            </div>
                        </li>
                    </ul>
                    <button class="mt-4 w-full text-center py-2 text-blue-600 hover:text-blue-800 text-sm font-medium">
                        View all saving tips
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="budget-modal" class="fixed inset-0 z-50 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 transition-opacity" onclick="closeModal()">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-blue-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6 text-blue-600">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900">
                                Set Monthly Budget
                            </h3>
                            <div class="mt-2">
                                <p class="text-sm text-gray-500">
                                    Set your monthly energy budget. You will receive notifications when you approach or exceed this limit.
                                </p>
                                <div class="mt-4">
                                    <label for="budget" class="block text-sm font-medium text-gray-700">
                                        Budget Amount ($)
                                    </label>
                                    <input type="number" id="budget-input" value="100" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button id="save-budget-btn" type="button" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Save Budget
                    </button>
                    <button type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm" onclick="closeModal()">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Initial state variables
        let budget = 100;
        const currentBill = 78.35;
        const projectedBill = 95.20;
        const dailyConsumptionData = [
            { day: 'Mon', cost: 2.5 },
            { day: 'Tue', cost: 2.8 },
            { day: 'Wed', cost: 3.2 },
            { day: 'Thu', cost: 2.9 },
            { day: 'Fri', cost: 3.5 },
            { day: 'Sat', cost: 3.8 },
            { day: 'Sun', cost: 3.1 }
        ];

        // Get DOM elements
        const budgetAmountEl = document.getElementById('budget-amount');
        const budgetInputEl = document.getElementById('budget-input');
        const currentBillAmountEl = document.getElementById('current-bill-amount');
        const projectedBillAmountEl = document.getElementById('projected-bill-amount');
        const progressBarEl = document.getElementById('progress-bar');
        const currentUsageLabelEl = document.getElementById('current-usage-label');
        const maxBudgetLabelEl = document.getElementById('max-budget-label');
        const currentBillPercentEl = document.getElementById('current-bill-percent');
        const remainingBudgetEl = document.getElementById('remaining-budget');
        const projectedBillPercentEl = document.getElementById('projected-bill-percent');
        const projectedOverBudgetEl = document.getElementById('projected-over-budget');
        const alertUsagePercentEl = document.getElementById('alert-usage-percent');
        const modalEl = document.getElementById('budget-modal');
        const setBudgetBtn = document.getElementById('set-budget-btn');
        const saveBudgetBtn = document.getElementById('save-budget-btn');

        // Function to update all UI elements based on the current budget
        function updateUI() {
            // Update budget amount and labels
            budgetAmountEl.textContent = `$${budget}`;
            currentUsageLabelEl.textContent = `$${currentBill.toFixed(2)}`;
            maxBudgetLabelEl.textContent = `$${budget.toFixed(2)}`;

            // Calculate percentages and remaining budget
            const currentPercentage = (currentBill / budget) * 100;
            const projectedPercentage = (projectedBill / budget) * 100;
            const remaining = budget - currentBill;

            // Update progress bar
            progressBarEl.style.width = `${Math.min(currentPercentage, 100)}%`;
            if (currentPercentage > 100) {
                progressBarEl.style.backgroundColor = 'red';
            } else if (currentPercentage > 80) {
                progressBarEl.style.backgroundColor = '#f59e0b'; // Tailwind yellow-500
            } else {
                progressBarEl.style.backgroundColor = '#2563eb'; // Tailwind blue-600
            }

            // Update text displays
            currentBillPercentEl.textContent = `${currentPercentage.toFixed(0)}% of your monthly budget`;
            remainingBudgetEl.textContent = `$${remaining.toFixed(2)} remaining`;

            projectedBillPercentEl.textContent = `Projected to be ${projectedPercentage.toFixed(0)}% of your budget`;

            // Show/hide over-budget alert
            if (projectedBill > budget) {
                const overBudgetAmount = projectedBill - budget;
                projectedOverBudgetEl.textContent = `$${overBudgetAmount.toFixed(2)} over budget`;
                projectedOverBudgetEl.classList.remove('hidden');
            } else {
                projectedOverBudgetEl.classList.add('hidden');
            }

            // Update budget alert text
            alertUsagePercentEl.textContent = `${currentPercentage.toFixed(0)}%`;
        }

        // Initialize the chart
        let dailyChart;
        function initializeChart() {
            const ctx = document.getElementById('daily-consumption-chart').getContext('2d');
            dailyChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: dailyConsumptionData.map(d => d.day),
                    datasets: [{
                        label: 'Cost ($)',
                        data: dailyConsumptionData.map(d => d.cost),
                        backgroundColor: '#60a5fa', // blue-400
                        borderRadius: 4,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            grid: {
                                display: false
                            }
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        // Functions for the modal
        function openModal() {
            budgetInputEl.value = budget;
            modalEl.classList.remove('hidden');
        }

        function closeModal() {
            modalEl.classList.add('hidden');
        }

        // Event listeners
        setBudgetBtn.addEventListener('click', openModal);
        saveBudgetBtn.addEventListener('click', () => {
            const newBudget = parseFloat(budgetInputEl.value);
            if (!isNaN(newBudget) && newBudget > 0) {
                budget = newBudget;
                updateUI();
                closeModal();
            } else {
                alert('Please enter a valid budget amount.');
            }
        });

        // Initial calls to render the page
        updateUI();
        initializeChart();
    </script>
</body>
</html>