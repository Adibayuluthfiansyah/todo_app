<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-gradient: linear-gradient(135deg, #333333 0%, #555555 100%);
            --secondary-gradient: linear-gradient(135deg, #666666 0%, #888888 100%);
            --success-gradient: linear-gradient(135deg, #4a4a4a 0%, #6a6a6a 100%);
            --danger-gradient: linear-gradient(135deg, #2a2a2a 0%, #4a4a4a 100%);
            --dark-gradient: linear-gradient(135deg, #1a1a1a 0%, #3a3a3a 100%);
            --glass-bg: rgba(255, 255, 255, 0.1);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            --text-primary: #2c2c2c;
            --text-secondary: #7a7a7a;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="50" cy="50" r="1" fill="rgba(0,0,0,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
            pointer-events: none;
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(255, 255, 255, 0.95) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #333 !important;
            text-shadow: none;
        }

        /* Main Title */
        .main-title {
            color: #333;
            font-weight: 700;
            font-size: 3rem;
            text-align: center;
            margin: 2rem 0;
            text-shadow: none;
            animation: fadeInDown 0.8s ease-out;
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Card Styles */
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
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

        .glass-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 45px rgba(0, 0, 0, 0.15);
        }

        .card-body {
            padding: 2rem;
        }

        /* Form Styles */
        .form-control {
            background: rgba(255, 255, 255, 0.9);
            border: 2px solid transparent;
            border-radius: 15px;
            padding: 0.75rem 1.25rem;
            font-size: 1rem;
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 1);
            border-color: #666;
            box-shadow: 0 0 0 0.2rem rgba(102, 102, 102, 0.25);
            transform: translateY(-2px);
        }

        .form-control::placeholder {
            color: #adb5bd;
            font-weight: 400;
        }

        /* Button Styles */
        .btn {
            border-radius: 15px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            border: none;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: var(--primary-gradient);
            color: white;
            box-shadow: 0 8px 25px rgba(51, 51, 51, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(51, 51, 51, 0.6);
        }

        .btn-secondary {
            background: var(--dark-gradient);
            color: white;
            box-shadow: 0 8px 25px rgba(26, 26, 26, 0.4);
        }

        .btn-secondary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(26, 26, 26, 0.6);
        }

        .btn-danger {
            background: var(--danger-gradient);
            color: white;
            box-shadow: 0 8px 25px rgba(42, 42, 42, 0.4);
        }

        .btn-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(42, 42, 42, 0.6);
        }

        .btn-outline-primary {
            background: rgba(255, 255, 255, 0.9);
            color: #333;
            border: 2px solid #666;
            box-shadow: 0 8px 25px rgba(102, 102, 102, 0.2);
        }

        .btn-outline-primary:hover {
            background: #666;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(102, 102, 102, 0.4);
        }

        /* List Styles */
        .list-group {
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .list-group-item {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            padding: 1.25rem 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .list-group-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background: var(--primary-gradient);
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .list-group-item:hover {
            background: rgba(255, 255, 255, 1);
            transform: translateX(10px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .list-group-item:hover::before {
            transform: scaleY(1);
        }

        .task-text {
            font-size: 1.1rem;
            color: var(--text-primary);
            font-weight: 500;
            flex: 1;
            margin-right: 1rem;
        }

        .task-text del {
            color: var(--text-secondary);
            text-decoration-color: #666;
            text-decoration-thickness: 2px;
        }

        /* Button Group */
        .btn-group .btn {
            border-radius: 10px;
            margin-left: 0.5rem;
            padding: 0.5rem 0.75rem;
            font-size: 0.9rem;
        }

        .btn-sm {
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
        }

        /* Collapse Section */
        .collapse.list-group-item {
            background: rgba(248, 249, 250, 0.95);
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        /* Radio Button Styles */
        .radio {
            display: flex;
            align-items: center;
            margin-right: 1rem;
        }

        .radio label {
            display: flex;
            align-items: center;
            font-weight: 500;
            color: var(--text-primary);
            cursor: pointer;
            margin: 0;
        }

        .radio input[type="radio"] {
            margin-right: 0.5rem;
            transform: scale(1.2);
            accent-color: #666;
        }

        /* Alert Styles */
        .alert {
            border-radius: 15px;
            border: none;
            font-weight: 500;
            animation: slideInDown 0.5s ease-out;
        }

        @keyframes slideInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-success {
            background: rgba(108, 117, 125, 0.1);
            border-left: 4px solid #6c757d;
            color: #495057;
        }

        .alert-danger {
            background: rgba(73, 80, 87, 0.1);
            border-left: 4px solid #495057;
            color: #343a40;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-title {
                font-size: 2rem;
            }

            .card-body {
                padding: 1.5rem;
            }

            .btn-group {
                flex-direction: column;
                align-items: stretch;
            }

            .btn-group .btn {
                margin: 0.25rem 0;
            }
        }

        /* Loading Animation */
        .loading {
            display: inline-block;
            width: 20px;
            height: 20px;
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: #fff;
            animation: spin 1s ease-in-out infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        /* Floating Animation */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }

        @keyframes floating {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-10px);
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid col-md-7">
            <div class="navbar-brand">
                <i class="fas fa-tasks me-2"></i>
                To-Do List
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Main Title -->
        <h1 class="main-title">
            <i class="fas fa-clipboard-list me-3"></i>
            My Tasks
        </h1>

        <div class="row justify-content-center">
            <div class="col-md-8">
                <!-- Input Form Card -->
                <div class="card glass-card mb-4 floating">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-2"></i>
                                {{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <i class="fas fa-exclamation-triangle me-2"></i>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Form input data -->
                        <form id="todo-form" action="{{ route('todo.post') }}" method="post">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" name="task" id="todo-input"
                                    placeholder="✨ Add a new awesome task..." required value="{{ old('task') }}">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-plus me-2"></i>
                                    Add Task
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Search and List Card -->
                <div class="card glass-card">
                    <div class="card-body">
                        <!-- Search Form -->
                        <form id="search-form" action="{{ route('todo') }}" method="get">
                            <div class="input-group mb-4">
                                <input type="text" class="form-control" name="search"
                                    value="{{ request('search') }}" placeholder="🔍 Search your tasks...">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fas fa-search me-2"></i>
                                    Search
                                </button>
                            </div>
                        </form>

                        <!-- Task List -->
                        <ul class="list-group mb-4" id="todo-list">
                            @foreach ($data as $item)
                                <!-- Display Data -->
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <span class="task-text">
                                        @if ($item->is_done == '1')
                                            <i class="fas fa-check-circle text-secondary me-2"></i>
                                        @else
                                            <i class="far fa-circle text-muted me-2"></i>
                                        @endif

                                        {!! $item->is_done == '1' ? '<del>' : '' !!}
                                        {{ $item->task }}
                                        {!! $item->is_done == '1' ? '</del>' : '' !!}
                                    </span>

                                    <div class="btn-group">
                                        <form action="{{ route('todo.destroy', ['id' => $item->id]) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this task?')">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm delete-btn" title="Delete Task">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="collapse"
                                            data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false"
                                            title="Edit Task">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </div>
                                </li>

                                <!-- Update Data -->
                                <li class="list-group-item collapse" id="collapse-{{ $loop->index }}">
                                    <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div>
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" name="task"
                                                    value="{{ $item->task }}" placeholder="Update your task...">
                                                <button class="btn btn-outline-primary" type="submit">
                                                    <i class="fas fa-save me-2"></i>
                                                    Update
                                                </button>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="radio px-2">
                                                <label>
                                                    <input type="radio" value="1" name="is_done"
                                                        {{ $item->is_done == '1' ? 'checked' : '' }}>
                                                    <i class="fas fa-check-circle text-secondary me-1"></i>
                                                    Completed
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" value="0" name="is_done"
                                                        {{ $item->is_done == '0' ? 'checked' : '' }}>
                                                    <i class="far fa-circle text-muted me-1"></i>
                                                    Pending
                                                </label>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Add some interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading effect to form submissions
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = this.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        const originalText = submitBtn.innerHTML;
                        submitBtn.innerHTML = '<span class="loading"></span>';
                        submitBtn.disabled = true;

                        // Re-enable button after 2 seconds (for demo purposes)
                        setTimeout(() => {
                            submitBtn.innerHTML = originalText;
                            submitBtn.disabled = false;
                        }, 2000);
                    }
                });
            });

            // Add ripple effect to buttons
            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    const x = e.clientX - rect.left - size / 2;
                    const y = e.clientY - rect.top - size / 2;

                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = x + 'px';
                    ripple.style.top = y + 'px';
                    ripple.classList.add('ripple');

                    this.appendChild(ripple);

                    setTimeout(() => {
                        ripple.remove();
                    }, 600);
                });
            });
        });
    </script>
</body>

</html>
