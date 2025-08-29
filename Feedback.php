<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Energy Dashboard</title>
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Inter Font CDN -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
    <div class="flex flex-col flex-1 overflow-hidden">
      <!-- Header -->
      <?php include 'header.php'; ?>

      <!-- Main Content Area -->
      <main class="flex-1 overflow-y-auto p-4 md:p-6 bg-gray-50">
        <div class="max-w-3xl mx-auto space-y-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Feedback</h2>
            <p class="text-gray-600">
                Tell something about your experience
            </p>
        </div>
          <!-- Main Feedback Container -->
          <div class="bg-white rounded-lg shadow">
            <div id="feedback-form-container">
              <!-- The form itself -->
              <form id="feedback-form" class="space-y-6">
                <div class="p-6 space-y-6">
                  
                  <!-- Rating Section -->
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      How would you rate your experience with Energenius?
                    </label>
                    <div id="star-rating-container" class="flex space-x-2">
                      <!-- Stars will be dynamically styled by JS -->
                      <button type="button" data-rating="1" class="focus:outline-none">
                        <svg class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                      </button>
                      <button type="button" data-rating="2" class="focus:outline-none">
                        <svg class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                      </button>
                      <button type="button" data-rating="3" class="focus:outline-none">
                        <svg class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                      </button>
                      <button type="button" data-rating="4" class="focus:outline-none">
                        <svg class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                      </button>
                      <button type="button" data-rating="5" class="focus:outline-none">
                        <svg class="h-8 w-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                        </svg>
                      </button>
                    </div>
                    <p id="rating-message" class="mt-2 text-sm text-gray-600 hidden"></p>
                  </div>

                  <!-- Feedback Type Section -->
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      What type of feedback would you like to provide?
                    </label>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                      <div data-type="general" class="border rounded-lg p-4 cursor-pointer flex items-center border-blue-500 bg-blue-50 text-blue-700">
                        <!-- MessageSquare Icon -->
                        <svg class="h-5 w-5 mr-2 text-blue-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V7a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
                        </svg>
                        <span class="text-sm font-medium">General Feedback</span>
                      </div>
                      <div data-type="bug" class="border rounded-lg p-4 cursor-pointer flex items-center border-gray-200 hover:bg-gray-50">
                        <!-- ThumbsDown Icon -->
                        <svg class="h-5 w-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M10 15v4a3 3 0 0 0 3 3l4-9V2H5.72a2 2 0 0 1-2-2 2 2 0 0 1 2 2v20"></path>
                          <path d="M18 10h-2.34l-2.58-3.92a3 3 0 0 0-4.04-1.39l-1.35.45a3 3 0 0 0-1.39 4.04L7 11.23V19"></path>
                        </svg>
                        <span class="text-sm font-medium">Report a Bug</span>
                      </div>
                      <div data-type="feature" class="border rounded-lg p-4 cursor-pointer flex items-center border-gray-200 hover:bg-gray-50">
                        <!-- ThumbsUp Icon -->
                        <svg class="h-5 w-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-2l1.45-5.35A2 2 0 0 0 18.28 9H14Z"></path>
                          <path d="M7 22v-9H3a2 2 0 0 0-2 2v2a2 2 0 0 0 2 2h4Z"></path>
                        </svg>
                        <span class="text-sm font-medium">Feature Request</span>
                      </div>
                    </div>
                  </div>

                  <!-- Feedback Textarea -->
                  <div>
                    <label for="feedback" class="block text-sm font-medium text-gray-700 mb-2">
                      Your Feedback
                    </label>
                    <textarea id="feedback-text" rows="5" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" placeholder="Please share your thoughts, suggestions, or report an issue..." required></textarea>
                  </div>

                  <!-- Screenshot Upload (Placeholder) -->
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">
                      Attach a screenshot (optional)
                    </label>
                    <div class="flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                      <div class="space-y-1 text-center">
                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                          <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <div class="flex text-sm text-gray-600">
                          <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none">
                            <span>Upload a file</span>
                            <input id="file-upload" name="file-upload" type="file" class="sr-only" />
                          </label>
                          <p class="pl-1">or drag and drop</p>
                        </div>
                        <p class="text-xs text-gray-500">
                          PNG, JPG, GIF up to 10MB
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Form Actions -->
                <div class="px-6 py-3 bg-gray-50 flex justify-end rounded-b-lg">
                  <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <!-- Send Icon -->
                    <svg class="h-4 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M22 2L11 13M22 2l-7 20-4-9-9-4 20-7z"></path>
                    </svg>
                    Submit Feedback
                  </button>
                </div>
              </form>

              <!-- Thank you message (initially hidden) -->
              <div id="thank-you-message" class="p-8 text-center hidden">
                <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                  <!-- Check Icon -->
                  <svg class="h-6 w-6 text-green-600" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="20 6 9 17 4 12"></polyline>
                  </svg>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">
                  Thank you for your feedback!
                </h3>
                <p class="text-gray-500 mb-6">
                  We appreciate you taking the time to share your thoughts with us.
                  Your feedback helps us improve Energenius.
                </p>
                <button id="reset-button" type="button" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-blue-700 bg-blue-100 hover:bg-blue-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                  Submit Another Feedback
                </button>
              </div>
            </div>
          </div>
          
          <!-- FAQ Section -->
          <div class="bg-white rounded-lg shadow">
            <div class="p-6 border-b border-gray-200">
              <h3 class="text-lg font-medium text-gray-800">
                Frequently Asked Questions
              </h3>
            </div>
            <div class="p-6 space-y-4">
              <div>
                <h4 class="text-base font-medium text-gray-800 mb-2">
                  How accurate is the energy consumption tracking?
                </h4>
                <p class="text-gray-600">
                  Our energy tracking is highly accurate, with readings directly
                  from your IoT devices. The system updates in real-time and
                  provides estimates with over 95% accuracy compared to your utility
                  meter.
                </p>
              </div>
              <div>
                <h4 class="text-base font-medium text-gray-800 mb-2">
                  Can I control multiple homes with one account?
                </h4>
                <p class="text-gray-600">
                  Yes! You can add multiple properties to your account and switch
                  between them easily. Each property can have its own devices,
                  budgets, and settings.
                </p>
              </div>
              <div>
                <h4 class="text-base font-medium text-gray-800 mb-2">
                  How do I add new devices to my system?
                </h4>
                <p class="text-gray-600">
                  You can add new compatible devices through the "Devices" section.
                  Click on "Add Device" and follow the pairing instructions. Most
                  devices connect via Wi-Fi or Bluetooth.
                </p>
              </div>
              <div>
                <h4 class="text-base font-medium text-gray-800 mb-2">
                  Is my data secure?
                </h4>
                <p class="text-gray-600">
                  We take data security very seriously. All your data is encrypted
                  both in transit and at rest. We never share your personal
                  information with third parties without your explicit consent.
                </p>
              </div>
            </div>
          </div>

          <!-- Need More Help Section -->
          <div class="bg-blue-50 rounded-lg p-6">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
              <div>
                <h3 class="text-lg font-medium text-blue-800 mb-2">
                  Need more help?
                </h3>
                <p class="text-blue-600">
                  Our support team is available 24/7 to assist you with any
                  questions.
                </p>
              </div>
              <div class="mt-4 md:mt-0">
                <button class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                  Contact Support
                </button>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // --- State Variables (mimicking React useState) ---
      let rating = 0;
      let hoveredRating = 0;
      let feedbackType = 'general';
      let feedbackText = '';
      let submitted = false;

      // --- DOM Element References ---
      const formContainer = document.getElementById('feedback-form-container');
      const form = document.getElementById('feedback-form');
      const thankYouMessage = document.getElementById('thank-you-message');
      const starRatingContainer = document.getElementById('star-rating-container');
      const starButtons = starRatingContainer.querySelectorAll('button');
      const ratingMessage = document.getElementById('rating-message');
      const feedbackTypeButtons = document.querySelectorAll('.grid > div[data-type]');
      const feedbackTextarea = document.getElementById('feedback-text');
      const resetButton = document.getElementById('reset-button');
      
      // --- Functions to update the UI based on state ---
      function updateStarRatingUI() {
        const currentRating = hoveredRating || rating;
        starButtons.forEach(button => {
          const starValue = parseInt(button.dataset.rating);
          const starIcon = button.querySelector('svg');
          if (starValue <= currentRating) {
            starIcon.classList.add('text-yellow-400', 'fill-yellow-400');
            starIcon.classList.remove('text-gray-300');
          } else {
            starIcon.classList.add('text-gray-300');
            starIcon.classList.remove('text-yellow-400', 'fill-yellow-400');
          }
        });
        
        if (rating > 0) {
          let message = '';
          switch (rating) {
            case 5: message = 'Excellent!'; break;
            case 4: message = 'Very good!'; break;
            case 3: message = 'Good'; break;
            case 2: message = 'Fair'; break;
            case 1: message = 'Poor'; break;
          }
          ratingMessage.textContent = message;
          ratingMessage.classList.remove('hidden');
        } else {
          ratingMessage.classList.add('hidden');
        }
      }

      function updateFeedbackTypeUI() {
        feedbackTypeButtons.forEach(button => {
          const type = button.dataset.type;
          const icon = button.querySelector('svg');
          if (type === feedbackType) {
            button.classList.add('border-blue-500', 'bg-blue-50', 'text-blue-700');
            button.classList.remove('border-gray-200', 'hover:bg-gray-50');
            icon.classList.add('text-blue-500');
            icon.classList.remove('text-gray-400');
          } else {
            button.classList.add('border-gray-200', 'hover:bg-gray-50');
            button.classList.remove('border-blue-500', 'bg-blue-50', 'text-blue-700');
            icon.classList.add('text-gray-400');
            icon.classList.remove('text-blue-500');
          }
        });
      }

      function toggleViews() {
        if (submitted) {
          form.classList.add('hidden');
          thankYouMessage.classList.remove('hidden');
        } else {
          form.classList.remove('hidden');
          thankYouMessage.classList.add('hidden');
        }
      }
      
      // --- Event Listeners ---
      
      // Star rating events
      starButtons.forEach(button => {
        button.addEventListener('click', () => {
          rating = parseInt(button.dataset.rating);
          updateStarRatingUI();
        });
        button.addEventListener('mouseenter', () => {
          hoveredRating = parseInt(button.dataset.rating);
          updateStarRatingUI();
        });
        button.addEventListener('mouseleave', () => {
          hoveredRating = 0;
          updateStarRatingUI();
        });
      });

      // Feedback type selection events
      feedbackTypeButtons.forEach(button => {
        button.addEventListener('click', () => {
          feedbackType = button.dataset.type;
          updateFeedbackTypeUI();
        });
      });

      // Textarea input event
      feedbackTextarea.addEventListener('input', (e) => {
        feedbackText = e.target.value;
      });

      // Form submission event
      form.addEventListener('submit', (e) => {
        e.preventDefault();
        // In a real application, you would send the data here
        console.log({
          rating,
          feedbackType,
          feedbackText
        });
        submitted = true;
        toggleViews();
      });

      // Reset button event
      resetButton.addEventListener('click', () => {
        // Reset all state variables
        rating = 0;
        hoveredRating = 0;
        feedbackType = 'general';
        feedbackText = '';
        submitted = false;
        
        // Reset form inputs and UI
        feedbackTextarea.value = '';
        updateStarRatingUI();
        updateFeedbackTypeUI();
        toggleViews();
      });

      // --- Initial UI setup on page load ---
      updateStarRatingUI();
      updateFeedbackTypeUI();
      toggleViews();
    });
  </script>
</body>
</html>
