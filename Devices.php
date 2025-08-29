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
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom styling for the scrollable tab navigation */
        .tab-nav {
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* Internet Explorer 10+ */
        }
        .tab-nav::-webkit-scrollbar {
            display: none; /* Safari and Chrome */
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">

        <!-- Sidebar -->
<?php include 'nav.php'; ?>
        <!-- Main Content Area -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Top Header -->
<?php include 'header.php'; ?>
            <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-50">
                <!-- Device Dashboard Content Starts Here -->
                <div class="space-y-6">
                    <!-- Page header -->
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Devices</h2>
                            <p class="text-gray-600">
                                Manage and control your connected devices
                            </p>
                        </div>
                        <div class="flex mt-4 md:mt-0">
                            <button id="add-device-btn" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-2">
                                    <line x1="12" x2="12" y1="5" y2="19"></line>
                                    <line x1="5" x2="19" y1="12" y2="12"></line>
                                </svg>
                                Add Device
                            </button>
                        </div>
                    </div>
                
                    <!-- Search and filter -->
                    <div class="bg-white rounded-lg shadow-sm p-5 flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                        <div class="relative md:w-64">
                            <input type="text" placeholder="Search devices..." class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500 transition-colors" />
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-gray-400">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </div>
                        </div>
                        <div class="flex space-x-2 flex-wrap justify-end">
                            <button class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-2">
                                    <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3"></polygon>
                                </svg>
                                Filter
                            </button>
                            <button class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-2">
                                    <circle cx="12" cy="12" r="10"></circle>
                                    <polyline points="12 6 12 12 16 14"></polyline>
                                </svg>
                                Schedule
                            </button>
                            <button class="inline-flex items-center px-3 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-4 w-4 mr-2">
                                    <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                    <line x1="16" y1="2" x2="16" y2="6"></line>
                                    <line x1="8" y1="2" x2="8" y2="6"></line>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                </svg>
                                History
                            </button>
                        </div>
                    </div>
                
                    <!-- Tabs and device grid container -->
                    <div class="bg-white rounded-lg shadow-sm">
                        <div class="border-b border-gray-200">
                            <nav class="flex -mb-px overflow-x-auto tab-nav" id="tab-nav-container">
                                <!-- Tab buttons will be rendered here by JavaScript -->
                            </nav>
                        </div>
                        <!-- Device grid -->
                        <div class="p-5">
                            <div id="device-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                                <!-- Device cards will be rendered here by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Device Dashboard Content Ends Here -->
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {

            // --- DATA ---
            let devices = [
                { id: 1, name: 'Living Room AC', status: 'on', consumption: 1.2, type: 'climate', location: 'Living Room', lastActive: '2 mins ago' },
                { id: 2, name: 'Kitchen Refrigerator', status: 'on', consumption: 0.8, type: 'appliance', location: 'Kitchen', lastActive: 'Active' },
                { id: 3, name: 'Bedroom Light', status: 'off', consumption: 0, type: 'lighting', location: 'Bedroom', lastActive: '3 hours ago' },
                { id: 4, name: 'Water Heater', status: 'on', consumption: 1.5, type: 'appliance', location: 'Bathroom', lastActive: 'Active' },
                { id: 5, name: 'TV', status: 'off', consumption: 0, type: 'entertainment', location: 'Living Room', lastActive: 'Yesterday' },
                { id: 6, name: 'Washing Machine', status: 'off', consumption: 0, type: 'appliance', location: 'Laundry Room', lastActive: '3 days ago' },
                { id: 7, name: 'Office Computer', status: 'off', consumption: 0, type: 'office', location: 'Office', lastActive: '1 day ago' },
                { id: 8, name: 'Kitchen Lights', status: 'on', consumption: 0.2, type: 'lighting', location: 'Kitchen', lastActive: 'Active' }
            ];

            const tabs = [
                { id: 'all', label: 'All Devices' },
                { id: 'active', label: 'Active' },
                { id: 'inactive', label: 'Inactive' },
                { id: 'scheduled', label: 'Scheduled' }
            ];

            let activeTab = 'all';

            // --- DOM ELEMENTS ---
            const deviceGrid = document.getElementById('device-grid');
            const tabNavContainer = document.getElementById('tab-nav-container');

            // --- RENDER FUNCTIONS ---

            /**
             * Renders the tab buttons and attaches event listeners.
             */
            const renderTabs = () => {
                tabNavContainer.innerHTML = ''; // Clear existing tabs
                tabs.forEach(tab => {
                    const button = document.createElement('button');
                    button.dataset.tabId = tab.id;
                    button.className = `
                        whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm transition-colors
                        ${activeTab === tab.id ? 'border-blue-500 text-blue-600' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300'}
                    `;
                    button.textContent = tab.label;
                    tabNavContainer.appendChild(button);
                });

                // Attach event listener to the tab container
                tabNavContainer.addEventListener('click', (event) => {
                    const button = event.target.closest('button');
                    if (button) {
                        const newActiveTab = button.dataset.tabId;
                        if (activeTab !== newActiveTab) {
                            activeTab = newActiveTab;
                            renderTabs(); // Re-render tabs to update active state
                            renderDevices(); // Re-render devices based on new tab
                        }
                    }
                });
            };

            /**
             * Renders the device cards based on the active tab.
             */
            const renderDevices = () => {
                let filteredDevices = devices;
                if (activeTab === 'active') {
                    filteredDevices = devices.filter(device => device.status === 'on');
                } else if (activeTab === 'inactive') {
                    filteredDevices = devices.filter(device => device.status === 'off');
                }

                deviceGrid.innerHTML = ''; // Clear existing cards

                if (filteredDevices.length === 0) {
                    deviceGrid.innerHTML = `
                        <div class="col-span-full text-center py-10 text-gray-500">
                            No devices found in this category.
                        </div>
                    `;
                    return;
                }

                filteredDevices.forEach(device => {
                    const deviceCard = document.createElement('div');
                    const statusClass = device.status === 'on' ? 'bg-green-100 text-green-800' : 'bg-gray-100 text-gray-800';
                    const statusLabel = device.status === 'on' ? 'Active' : 'Inactive';
                    const consumptionValue = device.status === 'on' ? `${device.consumption} kW/h` : '0 kW/h';
                    const toggleBg = device.status === 'on' ? 'bg-blue-600' : 'bg-gray-200';
                    const toggleTransform = device.status === 'on' ? 'translate-x-6' : 'translate-x-1';
                    const footerBg = device.status === 'on' ? 'bg-blue-50' : 'bg-gray-50';

                    deviceCard.className = "bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden";
                    deviceCard.innerHTML = `
                        <div class="p-5">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h3 class="font-medium text-gray-800">${device.name}</h3>
                                    <p class="text-sm text-gray-500">${device.location}</p>
                                </div>
                                <div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium ${statusClass}">
                                        ${statusLabel}
                                    </span>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="flex justify-between text-sm">
                                    <span class="text-gray-500">Status</span>
                                    <span class="${device.status === 'on' ? 'text-green-600' : 'text-gray-500'}">
                                        ${device.status === 'on' ? 'ON' : 'OFF'}
                                    </span>
                                </div>
                                <div class="flex justify-between text-sm mt-1">
                                    <span class="text-gray-500">Consumption</span>
                                    <span class="text-gray-800">${consumptionValue}</span>
                                </div>
                                <div class="flex justify-between text-sm mt-1">
                                    <span class="text-gray-500">Last Active</span>
                                    <span class="text-gray-800">${device.lastActive}</span>
                                </div>
                            </div>
                            <div class="mt-5 flex items-center justify-between">
                                <button class="text-sm text-blue-600 hover:text-blue-800">
                                    View Details
                                </button>
                                <!-- Toggle Switch -->
                                <button data-device-id="${device.id}" class="toggle-switch relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none ${toggleBg}">
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform ${toggleTransform}"></span>
                                </button>
                            </div>
                        </div>
                        <div class="p-3 border-t border-gray-200 flex justify-between items-center ${footerBg}">
                            <button class="text-sm font-medium text-gray-600 hover:text-gray-800">Schedule</button>
                            <div class="h-4 border-r border-gray-300"></div>
                            <button class="text-sm font-medium text-gray-600 hover:text-gray-800">History</button>
                            <div class="h-4 border-r border-gray-300"></div>
                            <button class="text-sm font-medium text-gray-600 hover:text-gray-800">Settings</button>
                        </div>
                    `;
                    deviceGrid.appendChild(deviceCard);
                });

                // Attach event listeners to the new toggle switches
                document.querySelectorAll('.toggle-switch').forEach(switchBtn => {
                    switchBtn.addEventListener('click', (event) => {
                        const deviceId = parseInt(event.currentTarget.dataset.deviceId);
                        toggleDeviceStatus(deviceId);
                    });
                });
            };

            // --- HANDLERS ---
            /**
             * Toggles the on/off status of a device.
             * @param {number} deviceId The ID of the device to toggle.
             */
            const toggleDeviceStatus = (deviceId) => {
                const device = devices.find(d => d.id === deviceId);
                if (device) {
                    device.status = device.status === 'on' ? 'off' : 'on';
                    renderDevices(); // Re-render the grid to show the updated status
                }
            };

            // --- INITIALIZATION ---
            // Render initial state
            renderTabs();
            renderDevices();
        });
    </script>
</body>
</html>
