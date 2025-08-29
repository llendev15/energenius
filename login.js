document.addEventListener('DOMContentLoaded', () => {
    const signInForm = document.getElementById('sign-in-form');
    const signUpForm = document.getElementById('sign-up-form');
    const showSignUpButton = document.getElementById('show-sign-up');
    const showSignInButton = document.getElementById('show-sign-in');

    // Show Sign Up Form
    showSignUpButton.addEventListener('click', () => {
        signInForm.classList.add('hidden');
        signUpForm.classList.remove('hidden');
    });

    // Show Sign In Form
    showSignInButton.addEventListener('click', () => {
        signUpForm.classList.add('hidden');
        signInForm.classList.remove('hidden');
    });
    
    // Handle Sign In Form Submission
    signInForm.querySelector('form').addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(signInForm.querySelector('form'));

        // Show a loading state while fetching
        Swal.fire({
            title: 'Logging you in...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Use Fetch API to send data asynchronously
        fetch('login.php', {
            method: 'POST',
            body: formData
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Successful!',
                        text: data.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Redirect to dashboard or another page after success
                        window.location.href = 'index.php';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                        confirmButtonText: 'Try Again'
                    });
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Network Error',
                    text: 'Could not connect to the server. Please try again later.',
                    confirmButtonText: 'OK'
                });
            });
    });

    // Handle Sign Up Form Submission
    signUpForm.querySelector('form').addEventListener('submit', (e) => {
        e.preventDefault();

        const formData = new FormData(signUpForm.querySelector('form'));

        // Show a loading state while fetching
        Swal.fire({
            title: 'Creating your account...',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });

        // Use Fetch API to send data asynchronously
        fetch('signup.php', {
            method: 'POST',
            body: formData
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.status === 'success') {
                    Swal.fire({
                        icon: 'success',
                        title: 'Account Created!',
                        text: data.message,
                        confirmButtonText: 'OK'
                    }).then(() => {
                        // Reset the form after success
                        signUpForm.querySelector('form').reset();
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: data.message,
                        confirmButtonText: 'Try Again'
                    });
                }
            })
            .catch((error) => {
                console.error('Error:', error);
                Swal.fire({
                    icon: 'error',
                    title: 'Network Error',
                    text: 'Could not connect to the server. Please try again later.',
                    confirmButtonText: 'OK'
                });
            });
    });


});