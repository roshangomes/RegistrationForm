<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Competition Registration</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #6366f1;
            --primary-dark: #4338ca;
            --gray-100: #f3f4f6;
            --gray-200: #e5e7eb;
            --gray-300: #d1d5db;
            --gray-400: #9ca3af;
            --gray-500: #6b7280;
            --gray-600: #4b5563;
            --gray-700: #374151;
            --gray-900: #111827;
            --red-500: #ef4444;
            --green-500: #10b981;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f9fafb;
            color: var(--gray-900);
            line-height: 1.5;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem 1rem;
        }

        .registration-card {
            background: white;
            border-radius: 0.75rem;
            padding: 2rem;
            box-shadow: var(--shadow-lg);
            border: 1px solid var(--gray-200);
        }

        .header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .header h1 {
            font-size: 1.875rem;
            font-weight: 700;
            color: var(--gray-900);
            margin-bottom: 0.5rem;
        }

        .header p {
            color: var(--gray-500);
            font-size: 1rem;
        }

        .progress-bar {
            width: 100%;
            height: 4px;
            background: var(--gray-200);
            border-radius: 2px;
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(to right, var(--primary), var(--primary-dark));
            width: 0%;
            transition: width 0.3s ease;
        }

        .alert {
            padding: 0.875rem 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-size: 0.875rem;
        }

        .alert-success {
            background-color: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.25rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
            position: relative;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: var(--gray-700);
            margin-bottom: 0.5rem;
            font-size: 0.875rem;
        }

        .form-control, .form-select {
            width: 100%;
            padding: 0.625rem 1rem;
            border: 1px solid var(--gray-300);
            border-radius: 0.5rem;
            font-size: 0.875rem;
            transition: all 0.2s ease;
            background-color: white;
        }

        .form-control:focus, .form-select:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
        }

        .form-control.is-invalid, .form-select.is-invalid {
            border-color: var(--red-500);
        }

        .invalid-feedback {
            color: var(--red-500);
            font-size: 0.75rem;
            margin-top: 0.25rem;
            display: block;
        }

        .input-icon {
            position: absolute;
            right: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-400);
            pointer-events: none;
        }

        .form-group.has-icon .form-control {
            padding-right: 2.5rem;
        }

        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
            justify-content: center;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0.625rem 1.25rem;
            border-radius: 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s ease;
            cursor: pointer;
            text-decoration: none;
            min-width: 160px;
            gap: 0.5rem;
        }

        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: 1px solid var(--primary);
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        .btn-secondary {
            background-color: white;
            color: var(--gray-700);
            border: 1px solid var(--gray-300);
        }

        .btn-secondary:hover {
            background-color: var(--gray-100);
            border-color: var(--gray-400);
        }

        .btn:disabled {
            opacity: 0.7;
            cursor: not-allowed;
        }

        .loading-spinner {
            width: 1rem;
            height: 1rem;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 1s ease-in-out infinite;
            display: none;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }
            
            .registration-card {
                padding: 1.5rem 1rem;
            }
            
            .header h1 {
                font-size: 1.5rem;
            }
            
            .form-grid {
                grid-template-columns: 1fr;
            }
            
            .button-group {
                flex-direction: column;
                align-items: stretch;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="registration-card">
            <div class="header">
                <h1><i class="fas fa-trophy mr-2"></i>Competition Registration</h1>
                <p>Join the ultimate academic challenge</p>
            </div>

            <div class="progress-bar">
                <div class="progress-fill" id="progressFill"></div>
            </div>

            @if(session('success'))
                <div class="alert alert-success" id="successAlert">
                    <i class="fas fa-check-circle"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @else
                <div class="alert alert-success" id="successAlert" style="display: none;">
                    <i class="fas fa-check-circle"></i>
                    <span>Registration successful! Welcome to the competition.</span>
                </div>
            @endif

            <form id="registrationForm" action="{{ route('registration.register') }}" method="POST">
                @csrf
                <div class="form-grid">
                    <div class="form-group">
                        <label for="country" class="form-label">
                            <i class="fas fa-globe mr-1"></i> Country
                        </label>
                        <select name="country" id="country" class="form-select @error('country') is-invalid @enderror" required onchange="updateColleges()">
                            <option value="">Select Country</option>
                            <option value="India" {{ old('country') == 'India' ? 'selected' : '' }}>India</option>
                            <option value="USA" {{ old('country') == 'USA' ? 'selected' : '' }}>USA</option>
                            <option value="UK" {{ old('country') == 'UK' ? 'selected' : '' }}>UK</option>
                            <option value="Canada" {{ old('country') == 'Canada' ? 'selected' : '' }}>Canada</option>
                            <option value="Australia" {{ old('country') == 'Australia' ? 'selected' : '' }}>Australia</option>
                        </select>
                        @error('country')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="college" class="form-label">
                            <i class="fas fa-university mr-1"></i> College
                        </label>
                        <input type="text" name="college" id="college" list="collegeOptions" class="form-control @error('college') is-invalid @enderror" placeholder="Search or select college" required>
                        <datalist id="collegeOptions">
                            <!-- Options will be populated dynamically via JavaScript -->
                        </datalist>
                        @error('college')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group has-icon">
                        <label for="name" class="form-label">
                            <i class="fas fa-user mr-1"></i> Full Name
                        </label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" 
                               placeholder="Enter your full name" value="{{ old('name') }}" required>
                        
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group has-icon">
                        <label for="contact_number" class="form-label">
                            <i class="fas fa-phone mr-1"></i> Contact Number
                        </label>
                        <input type="tel" name="contact_number" id="contact_number" class="form-control @error('contact_number') is-invalid @enderror" 
                               placeholder="Enter your phone number" value="{{ old('contact_number') }}" required>
                       
                        @error('contact_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gender" class="form-label">
                            <i class="fas fa-venus-mars mr-1"></i> Gender
                        </label>
                        <select name="gender" id="gender" class="form-select @error('gender') is-invalid @enderror" required>
                            <option value="">Select Gender</option>
                            <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group has-icon">
                        <label for="email" class="form-label">
                            <i class="fas fa-envelope mr-1"></i> Email Address
                        </label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" 
                               placeholder="Enter your email" value="{{ old('email') }}" required>
                        
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group has-icon">
                        <label for="year" class="form-label">
                            <i class="fas fa-calendar-alt mr-1"></i> Academic Year
                        </label>
                        <input type="number" name="year" id="year" class="form-control @error('year') is-invalid @enderror" 
                               placeholder="Enter your year (1-5)" min="1" max="5" value="{{ old('year') }}" required>
                        
                        @error('year')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group has-icon">
                        <label for="domain" class="form-label">
                            <i class="fas fa-code mr-1"></i> Domain/Department
                        </label>
                        <input type="text" name="domain" id="domain" class="form-control @error('domain') is-invalid @enderror" 
                               placeholder="e.g., Computer Science, Engineering" value="{{ old('domain') }}" required>
                       
                        @error('domain')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary" id="submitBtn">
                        <span class="btn-text">
                            <i class="fas fa-paper-plane mr-1"></i>
                            Register Now
                        </span>
                        <div class="loading-spinner"></div>
                    </button>
                    <a href="{{ route('registration.view') }}" class="btn btn-secondary" id="viewBtn">
                        <i class="fas fa-list mr-1"></i>
                        View Registrations
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Form progress tracking
        const form = document.getElementById('registrationForm');
        const progressFill = document.getElementById('progressFill');
        const submitBtn = document.getElementById('submitBtn');
        const spinner = submitBtn.querySelector('.loading-spinner');
        const btnText = submitBtn.querySelector('.btn-text');
        const inputs = form.querySelectorAll('input[required], select[required]');
        
        // College options for each country
        const colleges = {
            'India': [
                'Indian Institute of Technology Madras (IIT Madras), Chennai',
                'Indian Institute of Technology Delhi (IIT Delhi), Delhi',
                'Indian Institute of Technology Bombay (IIT Bombay), Mumbai',
                'Indian Institute of Technology Kanpur (IIT Kanpur), Kanpur',
                'Indian Institute of Technology Kharagpur (IIT Kharagpur), Kharagpur',
                'University of Delhi, Delhi',
                'Jawaharlal Nehru University (JNU), Delhi',
                'Anna University, Chennai',
                'Vellore Institute of Technology (VIT), Vellore',
                'Birla Institute of Technology and Science (BITS Pilani), Pilani'
            ],
            'USA': [
                'Massachusetts Institute of Technology (MIT), Cambridge',
                'Stanford University, Stanford',
                'Harvard University, Cambridge',
                'California Institute of Technology (Caltech), Pasadena',
                'University of California, Berkeley (UC Berkeley), Berkeley',
                'Princeton University, Princeton',
                'Yale University, New Haven',
                'University of Chicago, Chicago',
                'Columbia University, New York',
                'University of Pennsylvania, Philadelphia'
            ],
            'UK': [
                'University of Oxford, Oxford',
                'University of Cambridge, Cambridge',
                'Imperial College London, London',
                'University College London (UCL), London',
                'London School of Economics (LSE), London',
                'University of Edinburgh, Edinburgh',
                'King\'s College London, London',
                'University of Manchester, Manchester',
                'University of Bristol, Bristol',
                'University of Warwick, Coventry'
            ],
            'Canada': [
                'University of Toronto, Toronto',
                'University of British Columbia, Vancouver',
                'McGill University, Montreal',
                'University of Alberta, Edmonton',
                'University of Ottawa, Ottawa',
                'McMaster University, Hamilton',
                'University of Waterloo, Waterloo',
                'University of Calgary, Calgary',
                'Queen\'s University, Kingston',
                'Western University, London'
            ],
            'Australia': [
                'University of Melbourne, Melbourne',
                'Australian National University (ANU), Canberra',
                'University of Sydney, Sydney',
                'University of Queensland, Brisbane',
                'Monash University, Melbourne',
                'University of New South Wales (UNSW), Sydney',
                'University of Western Australia, Perth',
                'University of Adelaide, Adelaide',
                'Queensland University of Technology, Brisbane',
                'RMIT University, Melbourne'
            ]
        };

        // Update college options based on selected country
        function updateColleges() {
            const country = document.getElementById('country').value;
            const collegeInput = document.getElementById('college');
            const collegeOptions = document.getElementById('collegeOptions');
            collegeOptions.innerHTML = '';

            if (country && colleges[country]) {
                colleges[country].forEach(college => {
                    const option = document.createElement('option');
                    option.value = college;
                    collegeOptions.appendChild(option);
                });
                collegeInput.value = ''; // Clear previous selection
            }
        }

        // Update progress bar
        function updateProgress() {
            const filledInputs = Array.from(inputs).filter(input => input.value.trim() !== '');
            const progress = (filledInputs.length / inputs.length) * 100;
            progressFill.style.width = progress + '%';
        }

        // Add event listeners to all inputs
        inputs.forEach(input => {
            input.addEventListener('input', updateProgress);
            input.addEventListener('change', updateProgress);
        });

        // Form submission with loading animation
        form.addEventListener('submit', function(e) {
            btnText.style.display = 'none';
            spinner.style.display = 'block';
            submitBtn.disabled = true;
        });

        // If there's a success message, auto-hide it after 5 seconds
        const successAlert = document.getElementById('successAlert');
        if (successAlert && successAlert.style.display !== 'none') {
            setTimeout(() => {
                successAlert.style.display = 'none';
            }, 5000);
        }

        // Initial progress update and college setup
        updateProgress();
        updateColleges();
    </script>
</body>
</html>