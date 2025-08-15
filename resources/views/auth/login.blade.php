<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login - ORIGIN Tourism</title>
    <link rel="logo" href="{{ asset('logo/logo.png') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    colors: {
                        'dark-orange': '#FF6B35',
                        'dark-blue': '#1E3A8A',
                        'light-gray': '#F3F4F6',
                        'dark-gray': '#374151',
                    }
                }
            }
        }
    </script>
    
    <style>
        body { 
            font-family: 'Inter', sans-serif; 
        }
        
        .auth-container {
            background: linear-gradient(135deg, #1E3A8A 0%, #3B82F6 50%, #FF6B35 100%);
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        
        .auth-card {
            backdrop-filter: blur(20px);
            box-shadow: 
                0 25px 50px -12px rgba(0, 0, 0, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.1);
        }
        
        .fade-in {
            animation: fadeInUp 0.8s ease-out;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .input-group {
            position: relative;
        }
        
        .input-group .form-control {
            padding-left: 3rem;
        }
        
        .input-group .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            color: #9CA3AF;
        }

        .slide-up {
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .btn-hover:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 15px 35px rgba(255, 107, 53, 0.3);
        }
        
        .social-hover:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        .input-focus:focus {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(30, 58, 138, 0.15);
        }
    </style>

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/custom.css','resources/css/app.css', 'resources/js/app.js'])
    @else
    
    @endif
</head>
<body class="font-inter antialiased">
    <div class="auth-container flex items-center justify-center min-h-screen p-4 relative">
        <div class="w-full max-w-md relative z-10">
            <div class="auth-card bg-white/95 backdrop-blur-xl rounded-3xl p-8 shadow-2xl border border-white/20 fade-in">
                <!-- Logo and Header -->
                <div class="text-center mb-8 slide-up">
                    <div class="mb-6">
                        <picture class="block mx-auto">
                            <source media="(max-width: 768px)" srcset="{{ asset('logo/logo.png') }}">
                            <img src="{{ asset('logo/logo.png') }}" alt="ORIGIN Travels Logo" class="h-16 mx-auto">
                        </picture>
                    </div>
                    <h2 class="text-3xl font-bold text-dark-blue mb-2">Welcome Back!</h2>
                    <p class="text-gray-600">Continue your travel journey with us</p>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-6">
                    @csrf

                    <!-- Email Field -->
                    <div class="space-y-2 slide-up" style="animation-delay: 0.2s;">
                        <label for="email" class="block text-sm font-semibold text-dark-gray">
                            <i class="fas fa-envelope text-dark-orange mr-2"></i>Email Address
                        </label>
                        <div class="input-group relative">
                            <div class="input-icon">
                                <i class="fas fa-envelope text-gray-400"></i>
                            </div>
                            <input 
                                id="email" 
                                type="email" 
                                name="email" 
                                value="{{ old('email') }}"
                                required 
                                autofocus 
                                autocomplete="username"
                                placeholder="Enter your email address"
                                class="input-focus w-full pl-12 pr-4 py-3 bg-light-gray/80 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dark-orange focus:border-transparent transition-all duration-200 placeholder-gray-400"
                            >
                        </div>
                        @if($errors->get('email'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2 slide-up" style="animation-delay: 0.3s;">
                        <label for="password" class="block text-sm font-semibold text-dark-gray">
                            <i class="fas fa-lock text-dark-orange mr-2"></i>Password
                        </label>
                        <div class="input-group relative">
                            <div class="input-icon">
                                <i class="fas fa-lock text-gray-400"></i>
                            </div>
                            <input 
                                id="password" 
                                type="password" 
                                name="password"
                                required 
                                autocomplete="current-password"
                                placeholder="Enter your password"
                                class="input-focus w-full pl-12 pr-4 py-3 bg-light-gray/80 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dark-orange focus:border-transparent transition-all duration-200 placeholder-gray-400"
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword('password')"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-dark-orange transition-colors duration-200"
                            >
                            </button>
                        </div>
                        @if($errors->get('password'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between slide-up" style="animation-delay: 0.4s;">
                        <label class="flex items-center">
                            <input 
                                id="remember_me" 
                                type="checkbox" 
                                name="remember" 
                                class="w-4 h-4 text-dark-orange bg-gray-100 border-gray-300 rounded focus:ring-dark-orange focus:ring-2"
                            />
                            <span class="ml-2 text-sm text-gray-600">Remember me</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a 
                                href="{{ route('password.request') }}" 
                                class="text-sm text-dark-orange hover:text-orange-600 transition-colors duration-200 font-medium underline"
                            >
                                Forgot password?
                            </a>
                        @endif
                    </div>

                    <!-- Login Button -->
                    <div class="slide-up" style="animation-delay: 0.5s;">
                        <button 
                            type="submit" 
                            class="btn-hover w-full bg-gradient-to-r from-dark-orange to-orange-600 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 shadow-lg focus:outline-none focus:ring-2 focus:ring-dark-orange focus:ring-offset-2"
                        >
                            <i class="fas fa-sign-in-alt mr-2"></i>
                            Sign In
                        </button>
                    </div>

                    <!-- Sign Up Link -->
                    <div class="text-center pt-4 slide-up" style="animation-delay: 0.8s;">
                        <p class="text-gray-600">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-dark-orange hover:text-orange-600 font-semibold underline transition-colors duration-200">
                                Sign up here
                            </a>
                        </p>
                    </div>
                </form>
            </div>
        </div>

        <div class="absolute top-6 left-6">
            <a href="{{ route('welcome') }}" 
            class="flex items-center space-x-2 bg-white/10 backdrop-blur-sm rounded-xl px-4 py-2 text-white text-sm hover:bg-white/20 transition-all duration-200 group">
                <i class="fas fa-arrow-left text-dark-orange group-hover:transform group-hover:-translate-x-1 transition-transform duration-200"></i>
                <span>Back to Home</span>
            </a>
        </div>
    </div>

    <script>
        // Toggle password visibility
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eye = document.getElementById(fieldId + '-eye');
            
            if (field.type === 'password') {
                field.type = 'text';
                eye.classList.remove('fa-eye');
                eye.classList.add('fa-eye-slash');
            } else {
                field.type = 'password';
                eye.classList.remove('fa-eye-slash');
                eye.classList.add('fa-eye');
            }
        }

        // Enhanced form validation
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = document.querySelector('button[type="submit"]');
            const inputs = form.querySelectorAll('input[type="email"], input[type="password"]');

            // Real-time validation
            inputs.forEach(input => {
                input.addEventListener('blur', function() {
                    validateField(this);
                });

                input.addEventListener('input', function() {
                    if (this.classList.contains('is-invalid')) {
                        validateField(this);
                    }
                });
            });

            function validateField(field) {
                const value = field.value.trim();
                const fieldName = field.name;
                let isValid = true;
                let message = '';

                // Remove existing validation classes
                field.classList.remove('is-invalid', 'is-valid');

                if (fieldName === 'email') {
                    if (!value) {
                        isValid = false;
                        message = 'Email is required';
                    } else if (!isValidEmail(value)) {
                        isValid = false;
                        message = 'Please enter a valid email address';
                    }
                } else if (fieldName === 'password' && value.length < 1) {
                    isValid = false;
                    message = 'Password is required';
                }

                if (isValid && value) {
                    field.classList.add('is-valid');
                    field.style.borderColor = '#10B981';
                } else if (!isValid) {
                    field.classList.add('is-invalid');
                    field.style.borderColor = '#EF4444';
                }

                // Show/hide error message
                let errorDiv = field.parentNode.parentNode.querySelector('.error-message');
                if (errorDiv) {
                    errorDiv.remove();
                }

                if (!isValid && message) {
                    errorDiv = document.createElement('p');
                    errorDiv.className = 'error-message text-red-500 text-sm mt-1';
                    errorDiv.textContent = message;
                    field.parentNode.parentNode.appendChild(errorDiv);
                }
            }

            function isValidEmail(email) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return emailRegex.test(email);
            }

            // Form submission with loading state
            form.addEventListener('submit', function(e) {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Signing In...';
                submitBtn.disabled = true;

                // Re-enable button after 5 seconds as fallback
                setTimeout(() => {
                    submitBtn.innerHTML = originalText;
                    submitBtn.disabled = false;
                }, 5000);
            });

            // Add floating label effect
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentNode.parentNode.classList.add('focused');
                });

                input.addEventListener('blur', function() {
                    if (!this.value) {
                        this.parentNode.parentNode.classList.remove('focused');
                    }
                });

                // Initialize state
                if (input.value) {
                    input.parentNode.parentNode.classList.add('focused');
                }
            });
        });

        // Add particle effect on form focus
        const inputs = document.querySelectorAll('input');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                createFocusEffect(this);
            });
        });

        function createFocusEffect(element) {
            const rect = element.getBoundingClientRect();
            for (let i = 0; i < 6; i++) {
                const particle = document.createElement('div');
                particle.className = 'absolute w-1 h-1 bg-dark-orange rounded-full pointer-events-none';
                particle.style.left = rect.left + Math.random() * rect.width + 'px';
                particle.style.top = rect.top + Math.random() * rect.height + 'px';
                particle.style.animation = 'particleFade 1s ease-out forwards';
                document.body.appendChild(particle);

                setTimeout(() => {
                    particle.remove();
                }, 1000);
            }
        }

        // Add particle animation keyframes
        const style = document.createElement('style');
        style.textContent = `
            @keyframes particleFade {
                0% { opacity: 1; transform: scale(1) translateY(0); }
                100% { opacity: 0; transform: scale(0) translateY(-20px); }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>