<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings Page</title>
    <!-- Inter font -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }
    </style>
</head><body class="bg-gray-50">
    <div class="flex h-screen">

        <!-- Sidebar (formerly Sidebar component) -->
        <!-- The 'translate-x-0' class is hardcoded here to show the sidebar by default. -->
        <!-- For mobile, you would dynamically toggle '-translate-x-full' to hide it. -->
<?php include 'nav.php';?>
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Header (formerly Header component) -->
        <?php include 'header.php';?>

<main class="flex-1 overflow-y-auto p-4 sm:p-6 lg:p-8">
    <div class="max-w-4xl mx-auto space-y-6">

        <!-- Page header -->
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Settings</h2>
            <p class="text-gray-600">
                Manage your account settings and preferences
            </p>
        </div>

        <div class="bg-white rounded-lg shadow-lg">
            <!-- Tab navigation -->
            <div class="sm:hidden">
                <select id="tabs-select" class="block w-full focus:ring-blue-500 focus:border-blue-500 border-gray-300 rounded-md">
                    <option value="profile">Profile</option>
                    <option value="notifications">Notifications</option>
                    <option value="appearance">Appearance</option>
                    <option value="security">Security</option>
                </select>
            </div>
            <div class="hidden sm:block">
                <div class="border-b border-gray-200">
                    <nav class="flex -mb-px" id="tabs-nav">
                        <!-- Tab buttons are dynamically updated by JavaScript -->
                        <button id="profile-tab" data-tab="profile" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm flex items-center border-blue-500 text-blue-600">
                            <!-- User icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-500 mr-2"><path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                            Profile
                        </button>
                        <button id="notifications-tab" data-tab="notifications" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm flex items-center border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            <!-- Bell icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-gray-400 mr-2"><path d="M6 8a6 6 0 0 1 12 0c0 7 3 9 3 9H3s3-2 3-9"/><path d="M10.334 14.864a2 2 0 1 1-2.668-2.728"/></svg>
                            Notifications
                        </button>
                        <button id="appearance-tab" data-tab="appearance" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm flex items-center border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            <!-- Palette icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-gray-400 mr-2"><path d="M12.22 2h-.44C9.77 2 8 3.77 8 6a4 4 0 0 0 4 4a4 4 0 0 0 4-4c0-2.23-1.77-4-3.78-4zm1.56 12.39a8 8 0 0 1-3.56 0M2 19v3h3a2 2 0 0 0 2-2v-1.5a2.5 2.5 0 0 1 5 0V19c0 1.66-1.34 3-3 3H21v-3"/></svg>
                            Appearance
                        </button>
                        <button id="security-tab" data-tab="security" class="tab-button whitespace-nowrap py-4 px-6 border-b-2 font-medium text-sm flex items-center border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300">
                            <!-- Lock icon SVG -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-gray-400 mr-2"><rect width="18" height="11" x="3" y="11" rx="2" ry="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            Security
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Tab content -->
            <div class="p-6">
                <!-- Profile tab content -->
                <div id="profile-content" class="tab-content space-y-8">
                    <div>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">
                            Personal Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="first-name" class="block text-sm font-medium text-gray-700 mb-1">
                                    First name
                                </label>
                                <input type="text" id="first-name" value="Alex" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="last-name" class="block text-sm font-medium text-gray-700 mb-1">
                                    Last name
                                </label>
                                <input type="text" id="last-name" value="Johnson" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                                    Email address
                                </label>
                                <input type="email" id="email" value="alex.johnson@example.com" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">
                                    Phone number
                                </label>
                                <input type="tel" id="phone" value="+1 (555) 123-4567" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">
                            Address
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="md:col-span-2">
                                <label for="street-address" class="block text-sm font-medium text-gray-700 mb-1">
                                    Street address
                                </label>
                                <input type="text" id="street-address" value="123 Main Street" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="city" class="block text-sm font-medium text-gray-700 mb-1">
                                    City
                                </label>
                                <input type="text" id="city" value="San Francisco" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="state" class="block text-sm font-medium text-gray-700 mb-1">
                                    State / Province
                                </label>
                                <input type="text" id="state" value="California" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="zip" class="block text-sm font-medium text-gray-700 mb-1">
                                    ZIP / Postal code
                                </label>
                                <input type="text" id="zip" value="94103" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="country" class="block text-sm font-medium text-gray-700 mb-1">
                                    Country
                                </label>
                                <select id="country" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                                    <option value="US">United States</option>
                                    <option value="CA">Canada</option>
                                    <option value="UK">United Kingdom</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save Changes
                        </button>
                    </div>
                </div>

                <!-- Notifications tab content -->
                <div id="notifications-content" class="tab-content space-y-8 hidden">
                    <div>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">
                            Email Notifications
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-800">
                                        Email Notifications
                                    </h4>
                                    <p class="text-sm text-gray-500">
                                        Receive notifications via email
                                    </p>
                                </div>
                                <button type="button" id="emailNotifications" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none bg-blue-600">
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-6"></span>
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-800">
                                        Daily Energy Reports
                                    </h4>
                                    <p class="text-sm text-gray-500">
                                        Receive daily summaries of your energy usage
                                    </p>
                                </div>
                                <button type="button" id="dailyReports" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none bg-gray-200">
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-1"></span>
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-800">
                                        Weekly Energy Reports
                                    </h4>
                                    <p class="text-sm text-gray-500">
                                        Receive weekly summaries of your energy usage
                                    </p>
                                </div>
                                <button type="button" id="weeklyReports" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none bg-blue-600">
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-6"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">
                            Alert Preferences
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-800">
                                        Budget Alerts
                                    </h4>
                                    <p class="text-sm text-gray-500">
                                        Notify when approaching budget limits
                                    </p>
                                </div>
                                <button type="button" id="budgetAlerts" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none bg-blue-600">
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-6"></span>
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="text-sm font-medium text-gray-800">
                                        Abnormal Usage Detection
                                    </h4>
                                    <p class="text-sm text-gray-500">
                                        Notify about unusual energy consumption patterns
                                    </p>
                                </div>
                                <button type="button" id="abnormalUsage" class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors focus:outline-none bg-blue-600">
                                    <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform translate-x-6"></span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save Preferences
                        </button>
                    </div>
                </div>

                <!-- Appearance tab content -->
                <div id="appearance-content" class="tab-content space-y-8 hidden">
                    <div>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">
                            Theme Preferences
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div id="light-theme" class="border rounded-lg p-4 cursor-pointer border-blue-500 ring-2 ring-blue-500">
                                <div class="h-20 bg-white border border-gray-200 rounded-md mb-2"></div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium">Light</span>
                                    <!-- Check icon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-500"><path d="M20 6 9 17l-5-5"/></svg>
                                </div>
                            </div>
                            <div id="dark-theme" class="border rounded-lg p-4 cursor-pointer border-gray-200">
                                <div class="h-20 bg-gray-900 rounded-md mb-2"></div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium">Dark</span>
                                    <div class="hidden-icon">
                                        <!-- Check icon SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-500"><path d="M20 6 9 17l-5-5"/></svg>
                                    </div>
                                </div>
                            </div>
                            <div id="system-theme" class="border rounded-lg p-4 cursor-pointer border-gray-200">
                                <div class="h-20 bg-gradient-to-r from-white to-gray-900 rounded-md mb-2"></div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium">System</span>
                                    <div class="hidden-icon">
                                        <!-- Check icon SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-500"><path d="M20 6 9 17l-5-5"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">
                            Dashboard Layout
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="border rounded-lg p-4 cursor-pointer border-blue-500 ring-2 ring-blue-500">
                                <div class="h-32 border border-gray-200 rounded-md mb-2 p-2">
                                    <div class="h-4 w-3/4 bg-gray-200 rounded mb-2"></div>
                                    <div class="grid grid-cols-2 gap-2 mb-2">
                                        <div class="h-8 bg-gray-200 rounded"></div>
                                        <div class="h-8 bg-gray-200 rounded"></div>
                                    </div>
                                    <div class="h-10 bg-gray-200 rounded"></div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium">Default</span>
                                    <!-- Check icon SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-500"><path d="M20 6 9 17l-5-5"/></svg>
                                </div>
                            </div>
                            <div class="border rounded-lg p-4 cursor-pointer border-gray-200">
                                <div class="h-32 border border-gray-200 rounded-md mb-2 p-2">
                                    <div class="h-4 w-3/4 bg-gray-200 rounded mb-2"></div>
                                    <div class="h-10 bg-gray-200 rounded mb-2"></div>
                                    <div class="grid grid-cols-2 gap-2">
                                        <div class="h-8 bg-gray-200 rounded"></div>
                                        <div class="h-8 bg-gray-200 rounded"></div>
                                    </div>
                                </div>
                                <div class="flex items-center justify-between">
                                    <span class="text-sm font-medium">Compact</span>
                                    <div class="hidden-icon">
                                        <!-- Check icon SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-blue-500"><path d="M20 6 9 17l-5-5"/></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-end">
                        <button type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Save Preferences
                        </button>
                    </div>
                </div>

                <!-- Security tab content -->
                <div id="security-content" class="tab-content space-y-8 hidden">
                    <div>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">
                            Change Password
                        </h3>
                        <div class="space-y-4">
                            <div>
                                <label for="current-password" class="block text-sm font-medium text-gray-700 mb-1">
                                    Current Password
                                </label>
                                <input type="password" id="current-password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="new-password" class="block text-sm font-medium text-gray-700 mb-1">
                                    New Password
                                </label>
                                <input type="password" id="new-password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <div>
                                <label for="confirm-password" class="block text-sm font-medium text-gray-700 mb-1">
                                    Confirm New Password
                                </label>
                                <input type="password" id="confirm-password" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
                            </div>
                            <div>
                                <button type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Update Password
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">
                            Two-Factor Authentication
                        </h3>
                        <div class="flex items-center justify-between bg-gray-50 p-4 rounded-lg">
                            <div>
                                <h4 class="text-sm font-medium text-gray-800">
                                    Enable Two-Factor Authentication
                                </h4>
                                <p class="text-sm text-gray-500">
                                    Add an extra layer of security to your account
                                </p>
                            </div>
                            <button class="inline-flex justify-center px-4 py-2 text-sm font-medium text-blue-600 border border-blue-600 rounded-md hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Enable
                            </button>
                        </div>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-800 mb-4">
                            Sessions
                        </h3>
                        <div class="space-y-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <h4 class="text-sm font-medium text-gray-800">
                                            Current Session
                                        </h4>
                                        <p class="text-sm text-gray-500">
                                            San Francisco, CA • Chrome on macOS
                                        </p>
                                        <p class="text-xs text-gray-400 mt-1">
                                            Started 2 hours ago
                                        </p>
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                </div>
                            </div>
                            <button type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-red-600 border border-red-600 rounded-md hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                Sign Out of All Devices
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // State variables to mimic React's useState
        let activeTab = 'profile';
        let theme = 'light';
        let emailNotifications = true;
        let dailyReports = false;
        let weeklyReports = true;
        let budgetAlerts = true;
        let abnormalUsage = true;

        // Function to update the UI based on the current state
        function updateUI() {
            // Hide all tab content sections
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.add('hidden');
            });
            // Show the active tab's content
            document.getElementById(`${activeTab}-content`).classList.remove('hidden');

            // Deactivate all tab buttons
            document.querySelectorAll('.tab-button').forEach(button => {
                button.classList.remove('border-blue-500', 'text-blue-600');
                button.classList.add('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                // Deactivate the icons
                const icon = button.querySelector('svg');
                if (icon) {
                    icon.classList.remove('text-blue-500');
                    icon.classList.add('text-gray-400');
                }
            });
            // Activate the current tab button
            const activeTabButton = document.getElementById(`${activeTab}-tab`);
            if (activeTabButton) {
                activeTabButton.classList.add('border-blue-500', 'text-blue-600');
                activeTabButton.classList.remove('border-transparent', 'text-gray-500', 'hover:text-gray-700', 'hover:border-gray-300');
                // Activate the icon
                const icon = activeTabButton.querySelector('svg');
                if (icon) {
                    icon.classList.add('text-blue-500');
                    icon.classList.remove('text-gray-400');
                }
            }
            
            // Update mobile dropdown value
            document.getElementById('tabs-select').value = activeTab;

            // Update theme selection UI
            const themeOptions = {
                light: document.getElementById('light-theme'),
                dark: document.getElementById('dark-theme'),
                system: document.getElementById('system-theme')
            };
            for (const key in themeOptions) {
                if (key === theme) {
                    themeOptions[key].classList.add('border-blue-500', 'ring-2', 'ring-blue-500');
                    themeOptions[key].querySelector('.hidden-icon').classList.remove('hidden');
                } else {
                    themeOptions[key].classList.remove('border-blue-500', 'ring-2', 'ring-blue-500');
                    themeOptions[key].classList.add('border-gray-200');
                    themeOptions[key].querySelector('.hidden-icon').classList.add('hidden');
                }
            }

            // Update toggle switches
            updateToggle('emailNotifications', emailNotifications);
            updateToggle('dailyReports', dailyReports);
            updateToggle('weeklyReports', weeklyReports);
            updateToggle('budgetAlerts', budgetAlerts);
            updateToggle('abnormalUsage', abnormalUsage);
        }

        // Helper function for toggles
        function updateToggle(id, state) {
            const button = document.getElementById(id);
            const span = button.querySelector('span');
            if (state) {
                button.classList.remove('bg-gray-200');
                button.classList.add('bg-blue-600');
                span.classList.remove('translate-x-1');
                span.classList.add('translate-x-6');
            } else {
                button.classList.remove('bg-blue-600');
                button.classList.add('bg-gray-200');
                span.classList.remove('translate-x-6');
                span.classList.add('translate-x-1');
            }
        }

        // Add event listeners once the DOM is loaded
        document.addEventListener('DOMContentLoaded', () => {
            // Tab switching for desktop
            document.querySelectorAll('.tab-button').forEach(button => {
                button.addEventListener('click', () => {
                    activeTab = button.dataset.tab;
                    updateUI();
                });
            });

            // Tab switching for mobile dropdown
            document.getElementById('tabs-select').addEventListener('change', (e) => {
                activeTab = e.target.value;
                updateUI();
            });

            // Toggle switches
            document.getElementById('emailNotifications').addEventListener('click', () => {
                emailNotifications = !emailNotifications;
                updateUI();
            });
            document.getElementById('dailyReports').addEventListener('click', () => {
                dailyReports = !dailyReports;
                updateUI();
            });
            document.getElementById('weeklyReports').addEventListener('click', () => {
                weeklyReports = !weeklyReports;
                updateUI();
            });
            document.getElementById('budgetAlerts').addEventListener('click', () => {
                budgetAlerts = !budgetAlerts;
                updateUI();
            });
            document.getElementById('abnormalUsage').addEventListener('click', () => {
                abnormalUsage = !abnormalUsage;
                updateUI();
            });

            // Theme selection
            document.getElementById('light-theme').addEventListener('click', () => {
                theme = 'light';
                updateUI();
            });
            document.getElementById('dark-theme').addEventListener('click', () => {
                theme = 'dark';
                updateUI();
            });
            document.getElementById('system-theme').addEventListener('click', () => {
                theme = 'system';
                updateUI();
            });

            // Initial UI render
            updateUI();
        });
    </script>
    </main>
</body>
</html>
