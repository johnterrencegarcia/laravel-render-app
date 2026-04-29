<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;600;700&family=Archivo:wght@300;400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #000000;
            --surface: #0a0a0a;
            --surface-elevated: #141414;
            --border: #1f1f1f;
            --text-primary: #ffffff;
            --text-secondary: #888888;
            --text-muted: #555555;
            --accent: #ffffff;
            --accent-dim: #333333;
            --error: #ef4444;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Archivo', -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--bg);
            color: var(--text-primary);
            line-height: 1.5;
            min-height: 100vh;
            padding: 1.5rem;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
        }

        /* Header */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
            transition: color 0.2s;
        }

        .back-link:hover {
            color: var(--text-primary);
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 600;
            letter-spacing: -0.02em;
            margin-bottom: 0.5rem;
        }

        .subtitle {
            color: var(--text-secondary);
            font-size: 0.9375rem;
            margin-bottom: 2rem;
        }

        /* Form */
        .form-container {
            background: var(--surface);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group:last-of-type {
            margin-bottom: 2rem;
        }

        label {
            display: block;
            font-weight: 600;
            font-size: 0.8125rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: var(--text-secondary);
            margin-bottom: 0.625rem;
        }

        .required {
            color: var(--error);
        }

        input {
            width: 100%;
            padding: 0.875rem 1rem;
            font-family: 'Archivo', sans-serif;
            font-size: 0.9375rem;
            background: var(--surface-elevated);
            border: 1px solid var(--border);
            border-radius: 6px;
            color: var(--text-primary);
            transition: all 0.2s;
            outline: none;
        }

        input::placeholder {
            color: var(--text-muted);
        }

        input:focus {
            border-color: var(--text-primary);
            background: var(--bg);
        }

        input:hover:not(:focus) {
            border-color: var(--accent-dim);
        }

        input[type="number"] {
            font-family: 'JetBrains Mono', monospace;
        }

        /* Error State */
        .has-error input {
            border-color: var(--error);
        }

        .error-message {
            color: var(--error);
            font-size: 0.8125rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.375rem;
        }

        .helper-text {
            font-size: 0.8125rem;
            color: var(--text-muted);
            margin-top: 0.5rem;
        }

        /* Buttons */
        .form-actions {
            display: flex;
            gap: 0.75rem;
        }

        .btn {
            flex: 1;
            padding: 0.875rem 1.5rem;
            font-family: 'Archivo', sans-serif;
            font-size: 0.9375rem;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: var(--text-primary);
            color: var(--bg);
            border: 1px solid var(--text-primary);
        }

        .btn-primary:hover {
            background: transparent;
            color: var(--text-primary);
        }

        .btn-secondary {
            background: transparent;
            color: var(--text-secondary);
            border: 1px solid var(--border);
        }

        .btn-secondary:hover {
            background: var(--surface-elevated);
            color: var(--text-primary);
            border-color: var(--accent-dim);
        }

        .btn:active {
            transform: scale(0.98);
        }

        .btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .btn:disabled:hover {
            background: var(--text-primary);
            color: var(--bg);
            transform: none;
        }

        /* Responsive */
        @media (max-width: 640px) {
            body {
                padding: 1rem;
            }

            .form-container {
                padding: 1.5rem;
            }

            .form-actions {
                flex-direction: column-reverse;
            }

            h1 {
                font-size: 1.5rem;
            }
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--surface);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-dim);
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="/students" class="back-link">
            <span>←</span>
            Back to Students
        </a>

        <h1>Add Student</h1>
        <p class="subtitle">Enter student information below</p>

        <div class="form-container">
            <form method="POST" action="/students">
                @csrf

                <div class="form-group @error('name') has-error @enderror">
                    <label for="name">
                        Name<span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        placeholder="Enter full name"
                        value="{{ old('name') }}"
                        required
                    >
                    @error('name')
                        <div class="error-message">
                            <span>⚠</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="form-group @error('course') has-error @enderror">
                    <label for="course">
                        Course<span class="required">*</span>
                    </label>
                    <input
                        type="text"
                        id="course"
                        name="course"
                        placeholder="e.g., Computer Science"
                        value="{{ old('course') }}"
                        required
                    >
                    @error('course')
                        <div class="error-message">
                            <span>⚠</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="form-group @error('year') has-error @enderror">
                    <label for="year">
                        Year<span class="required">*</span>
                    </label>
                    <input
                        type="number"
                        id="year"
                        name="year"
                        placeholder="1-6"
                        value="{{ old('year') }}"
                        min="1"
                        max="6"
                        required
                    >
                    @error('year')
                        <div class="error-message">
                            <span>⚠</span>
                            <span>{{ $message }}</span>
                        </div>
                    @else
                        <p class="helper-text">Enter year level (1-6)</p>
                    @enderror
                </div>

                <div class="form-actions">
                    <a href="/students" class="btn btn-secondary">Cancel</a>
                    <button type="submit" class="btn btn-primary">Save Student</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Form validation
        document.querySelectorAll('input[required]').forEach(input => {
            input.addEventListener('invalid', function() {
                this.style.borderColor = 'var(--error)';
            });

            input.addEventListener('input', function() {
                this.style.borderColor = '';
            });
        });

        // Prevent double submission
        document.querySelector('form').addEventListener('submit', function() {
            const submitBtn = this.querySelector('.btn-primary');
            submitBtn.disabled = true;
            submitBtn.textContent = 'Saving...';
        });
    </script>
</body>
</html>
