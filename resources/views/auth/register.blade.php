<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Register - ORIGIN Travels</title>
    <link rel="logo" href="{{ asset('logo/logo.png') }}">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js for x-data functionality -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
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
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .input-group { position: relative; }
        .input-group .form-control { padding-left: 3rem; }
        .input-group .input-icon {
            position: absolute; left: 1rem; top: 50%;
            transform: translateY(-50%); z-index: 10; color: #9CA3AF;
        }

        .slide-up { animation: slideUp 0.6s ease-out; }
        @keyframes slideUp { from { opacity:0; transform: translateY(20px);} to { opacity:1; transform: translateY(0);} }
        
        .btn-hover:hover {
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 15px 35px rgba(255, 107, 53, 0.3);
        }

        .input-focus:focus {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px rgba(30, 58, 138, 0.15);
        }

        /* Radio button custom styling */
        input[type="radio"] {
            width: 20px; height: 20px; border: 2px solid #E5E7EB; background-color: white;
            appearance: none; border-radius: 50%; position: relative; cursor: pointer; transition: all 0.3s ease;
        }
        input[type="radio"]:checked { border-color: #FF6B35; background-color: #FF6B35; }
        input[type="radio"]:checked::after {
            content: ''; width: 8px; height: 8px; background-color: white; border-radius: 50%;
            position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);
        }
        .radio-label:hover input[type="radio"] { border-color: #FF6B35; }
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
                    <h2 class="text-3xl font-bold text-dark-blue mb-2">Create Account</h2>
                    <p class="text-gray-600">Start your amazing travel journey with us</p>
                </div>

                <!-- Registration Form -->
                <form method="POST" action="{{ route('register') }}" x-data="{ role: '{{ old('role', 'Customer') }}' }" class="space-y-6">
                    @csrf

                    <!-- Name Field -->
                    <div class="space-y-2 slide-up" style="animation-delay: 0.1s;">
                        <label for="name" class="block text-sm font-semibold text-dark-gray">
                            <i class="fas fa-user text-dark-orange mr-2"></i>Full Name
                        </label>
                        <div class="input-group relative">
                            <div class="input-icon">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                            <input 
                                id="name" 
                                type="text" 
                                name="name" 
                                value="{{ old('name') }}"
                                required 
                                autofocus 
                                autocomplete="name"
                                placeholder="Enter your full name"
                                class="input-focus w-full pl-12 pr-4 py-3 bg-light-gray/80 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dark-orange focus:border-transparent transition-all duration-200 placeholder-gray-400"
                            >
                        </div>
                        @if($errors->get('name'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('name') }}</p>
                        @endif
                    </div>

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
                                autocomplete="username"
                                placeholder="Enter your email address"
                                class="input-focus w-full pl-12 pr-4 py-3 bg-light-gray/80 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dark-orange focus:border-transparent transition-all duration-200 placeholder-gray-400"
                            >
                        </div>
                        @if($errors->get('email'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('email') }}</p>
                        @endif
                    </div>

                    <!-- Phone Field -->
                    <div class="space-y-2 slide-up" style="animation-delay: 0.25s;">
                        <label for="phone" class="block text-sm font-semibold text-dark-gray">
                            <i class="fas fa-phone text-dark-orange mr-2"></i>Phone Number
                        </label>
                        <div class="input-group relative">
                            <div class="input-icon">
                                <i class="fas fa-phone text-gray-400"></i>
                            </div>
                            <input
                                id="phone"
                                type="tel"
                                name="phone"
                                value="{{ old('phone') }}"
                                required
                                inputmode="tel"
                                pattern="^\+?[1-9]\d{1,14}$"
                                placeholder="+94771234567"
                                class="input-focus w-full pl-12 pr-4 py-3 bg-light-gray/80 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dark-orange focus:border-transparent transition-all duration-200 placeholder-gray-400"
                            >
                        </div>
                        @if($errors->get('phone'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('phone') }}</p>
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
                                autocomplete="new-password"
                                placeholder="Create a strong password"
                                class="input-focus w-full pl-12 pr-4 py-3 bg-light-gray/80 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dark-orange focus:border-transparent transition-all duration-200 placeholder-gray-400"
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword('password')"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-dark-orange transition-colors duration-200"
                            >
                                <i id="password-eye" class="fas fa-eye"></i>
                            </button>
                        </div>
                        @if($errors->get('password'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('password') }}</p>
                        @endif
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="space-y-2 slide-up" style="animation-delay: 0.4s;">
                        <label for="password_confirmation" class="block text-sm font-semibold text-dark-gray">
                            <i class="fas fa-lock-open text-dark-orange mr-2"></i>Confirm Password
                        </label>
                        <div class="input-group relative">
                            <div class="input-icon">
                                <i class="fas fa-lock-open text-gray-400"></i>
                            </div>
                            <input 
                                id="password_confirmation" 
                                type="password" 
                                name="password_confirmation"
                                required 
                                autocomplete="new-password"
                                placeholder="Confirm your password"
                                class="w-full pl-12 pr-4 py-3 bg-gray-100/80 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-all duration-200 placeholder-gray-400"
                            >
                            <button 
                                type="button" 
                                onclick="togglePassword('password_confirmation')"
                                class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-dark-orange transition-colors duration-200"
                            >
                                <i id="password_confirmation-eye" class="fas fa-eye"></i>
                            </button>
                        </div>
                        @if($errors->get('password_confirmation'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('password_confirmation') }}</p>
                        @endif
                    </div>

                    <!-- Role Selection -->
                    <div class="space-y-2 slide-up" style="animation-delay: 0.5s;">
                        <label class="block text-sm font-semibold text-dark-gray">
                            <i class="fas fa-user-tag text-dark-orange mr-2"></i>Register as
                        </label>
                        <div class="flex items-center gap-4 mt-3">
                            <label class="radio-label flex items-center cursor-pointer hover:bg-gray-50 px-4 py-2 rounded-lg transition-colors duration-200">
                                <input type="radio" name="role" value="Customer"
                                    x-model="role"
                                    class="mr-3" {{ old('role', 'Customer') === 'Customer' ? 'checked' : '' }} required>
                                <span class="text-gray-700 font-medium">Customer</span>
                            </label>

                            <label class="radio-label flex items-center cursor-pointer hover:bg-gray-50 px-4 py-2 rounded-lg transition-colors duration-200">
                                <input type="radio" name="role" value="Travel Agent"
                                    x-model="role"
                                    class="mr-3" {{ old('role') === 'Travel Agent' ? 'checked' : '' }}>
                                <span class="text-gray-700 font-medium">Travel Agent</span>
                            </label>
                        </div>
                        @if($errors->get('role'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('role') }}</p>
                        @endif
                    </div>

                    <!-- IATA Number (conditional) -->
                    <div class="space-y-2 slide-up" style="animation-delay: 0.6s;" x-show="role === 'Travel Agent'" x-transition>
                        <label for="iataNum" class="block text-sm font-semibold text-dark-gray">
                            <i class="fas fa-id-badge text-dark-orange mr-2"></i>IATA Number
                        </label>
                        <div class="input-group relative">
                            <div class="input-icon">
                                <i class="fas fa-id-badge text-gray-400"></i>
                            </div>
                            <input 
                                id="iataNum" 
                                type="text" 
                                name="iataNum"
                                value="{{ old('iataNum') }}"
                                x-bind:required="role === 'Travel Agent'"
                                placeholder="Enter your IATA or agency code"
                                class="input-focus w-full pl-12 pr-4 py-3 bg-light-gray/80 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-dark-orange focus:border-transparent transition-all duration-200 placeholder-gray-400"
                            >
                        </div>
                        @if($errors->get('iataNum'))
                            <p class="text-red-500 text-sm mt-1">{{ $errors->first('iataNum') }}</p>
                        @endif
                    </div>

                    <div class="flex items-start space-x-3">
                        <div class="flex items-center h-5">
                            <input 
                                id="terms" 
                                name="terms" 
                                type="checkbox" 
                                required
                                class="w-4 h-4 text-dark-orange bg-gray-100 border-gray-300 rounded focus:ring-dark-orange focus:ring-2"
                            >
                        </div>
                        <label for="terms" class="text-sm text-gray-600 leading-5">
                            I agree to the 
                            <a href="{{ route('terms.conditions') }}" class="text-dark-orange hover:text-orange-600 underline font-medium">Terms of Service</a> 
                            and 
                            <a href="{{ route('privacy.policy') }}" class="text-dark-orange hover:text-orange-600 underline font-medium">Privacy Policy</a>
                        </label>
                    </div>

                    <!-- Register Button -->
                    <div class="slide-up" style="animation-delay: 0.7s;">
                        <button 
                            type="submit" 
                            class="btn-hover w-full bg-gradient-to-r from-dark-orange to-orange-600 text-white font-bold py-3 px-6 rounded-xl transition-all duration-300 shadow-lg focus:outline-none focus:ring-2 focus:ring-dark-orange focus:ring-offset-2"
                        >
                            <i class="fas fa-user-plus mr-2"></i>
                            Create Account
                        </button>
                    </div>

                    <!-- Login Link -->
                    <div class="text-center pt-4 slide-up" style="animation-delay: 0.8s;">
                        <p class="text-gray-600">
                            Already have an account? 
                            <a href="{{ route('login') }}" class="text-dark-orange hover:text-orange-600 font-semibold underline transition-colors duration-200">
                                Sign in here
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
        // Toggle password visibility (with null-safety for the eye icon)
        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const eye = document.getElementById(fieldId + '-eye');
            if (!field) return;
            if (field.type === 'password') {
                field.type = 'text';
                if (eye) { eye.classList.remove('fa-eye'); eye.classList.add('fa-eye-slash'); }
            } else {
                field.type = 'password';
                if (eye) { eye.classList.remove('fa-eye-slash'); eye.classList.add('fa-eye'); }
            }
        }

        // Enhanced form validation
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const submitBtn = document.querySelector('button[type="submit"]');
            const inputs = form.querySelectorAll('input[type="text"], input[type="email"], input[type="password"], input[type="tel"]');

            // Real-time validation
            inputs.forEach(input => {
                input.addEventListener('blur', function() { validateField(this); });
                input.addEventListener('input', function() {
                    if (this.classList.contains('is-invalid')) validateField(this);
                });
            });

            function validateField(field) {
                const value = field.value.trim();
                const fieldName = field.name;
                let isValid = true;
                let message = '';

                // Remove existing validation classes
                field.classList.remove('is-invalid', 'is-valid');

                if (fieldName === 'name') {
                    if (!value) { isValid = false; message = 'Name is required'; }
                    else if (value.length < 2) { isValid = false; message = 'Name must be at least 2 characters'; }
                } else if (fieldName === 'email') {
                    if (!value) { isValid = false; message = 'Email is required'; }
                    else if (!isValidEmail(value)) { isValid = false; message = 'Please enter a valid email address'; }
                } else if (fieldName === 'phone') {
                    if (!value) { isValid = false; message = 'Phone is required'; }
                    else if (!isValidPhone(value)) { isValid = false; message = 'Use international format like +94771234567'; }
                } else if (fieldName === 'password') {
                    if (!value) { isValid = false; message = 'Password is required'; }
                    else if (value.length < 8) { isValid = false; message = 'Password must be at least 8 characters'; }
                } else if (fieldName === 'password_confirmation') {
                    const password = document.getElementById('password').value;
                    if (!value) { isValid = false; message = 'Please confirm your password'; }
                    else if (value !== password) { isValid = false; message = 'Passwords do not match'; }
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
                if (errorDiv) errorDiv.remove();

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

            function isValidPhone(phone) {
                return /^\+?[1-9]\d{1,14}$/.test(phone.trim());
            }

            // Form submission with loading state
            form.addEventListener('submit', function() {
                const originalText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Creating Account...';
                submitBtn.disabled = true;
                setTimeout(() => { submitBtn.innerHTML = originalText; submitBtn.disabled = false; }, 5000);
            });

            // Floating label-ish effect
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentNode.parentNode.classList.add('focused');
                });
                input.addEventListener('blur', function() {
                    if (!this.value) this.parentNode.parentNode.classList.remove('focused');
                });
                if (input.value) input.parentNode.parentNode.classList.add('focused');
            });

            // Password strength placeholder (no UI element wired yet)
            const passwordInput = document.getElementById('password');
            const passwordConfirmInput = document.getElementById('password_confirmation');

            passwordInput.addEventListener('input', function() { checkPasswordStrength(this.value); });
            passwordConfirmInput.addEventListener('input', function() { if (this.value) validateField(this); });

            function checkPasswordStrength(password) {
                let strength = 0;
                if (password.length >= 8) strength++;
                if (password.match(/[a-z]+/)) strength++;
                if (password.match(/[A-Z]+/)) strength++;
                if (password.match(/[0-9]+/)) strength++;
                if (password.match(/[$@#&!]+/)) strength++;
                // hook your UI if you add one
            }
        });

        // Add particle effect on form focus (renamed var to avoid shadowing)
        const focusInputs = document.querySelectorAll('input');
        focusInputs.forEach(input => {
            input.addEventListener('focus', function() { createFocusEffect(this); });
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
                setTimeout(() => { particle.remove(); }, 1000);
            }
        }

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
