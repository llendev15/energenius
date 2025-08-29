<?php 
$current_page = basename($_SERVER['SCRIPT_NAME']); 
?>

<div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:z-auto translate-x-0">
    <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200">
        <div class="flex items-center">
            <div class="bg-blue-600 p-1.5 rounded mr-2">
                <!-- LightbulbIcon SVG -->
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-5 w-5 text-white">
                    <path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1.3.5 2.6 1.5 3.5.8.8 1.3 1.5 1.5 2.5"></path>
                    <path d="M9 18h6"></path>
                    <path d="M10 22h4"></path>
                </svg>
            </div>
            <span class="text-xl font-semibold text-gray-800">Energenius</span>
        </div>
        <button class="md:hidden text-gray-500 hover:text-gray-700 focus:outline-none">
            <!-- XIcon SVG -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="h-6 w-6">
                <line x1="18" y1="6" x2="6" y2="18"></line>
                <line x1="6" y1="6" x2="18" y2="18"></line>
            </svg>
        </button>
    </div>

    <div class="px-2 py-4">
        <nav class="space-y-1">

            <?php
            $navItems = [
                "Index.php" => ["Dashboard", "M6 3h7v9H3v-5h7V3z", ""],
                "Devices.php" => ["Devices", "", ""],
                "Analytics.php" => ["Analytics", "", ""],
                "Budget.php" => ["Budget", "", ""],
                "Settings.php" => ["Settings", "", ""],
                "Feedback.php" => ["Feedback", "", ""],
            ];

            foreach ($navItems as $file => $item) {
                $isActive = ($current_page == $file) ? "bg-blue-50 text-blue-700" : "text-gray-700 hover:bg-gray-100";
                $iconColor = ($current_page == $file) ? "text-blue-600" : "text-gray-400";
                echo '<a href="'.$file.'" class="flex items-center px-3 py-2.5 text-sm font-medium rounded-lg '.$isActive.'">
                        <svg xmlns="http://www.w3.org/2000/svg" class="mr-3 h-5 w-5 '.$iconColor.'" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        </svg>
                        '.$item[0].'
                      </a>';
            }
            ?>

        </nav>
    </div>
</div>
