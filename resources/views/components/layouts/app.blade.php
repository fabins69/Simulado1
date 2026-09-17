<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Almoxarifado') }} - Gestão de Ferramentas</title>

    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-light d-flex flex-column min-vh-100">

    <!-- Navbar do Sistema -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="bi bi-tools text-warning me-2"></i>Almoxarifado
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href=""><i class="bi bi-house-door me-1"></i> Início</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-box-seam me-1"></i> Ferramentas / Materiais</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="movimentacao/create"><i class="bi bi-arrow-left-right me-1"></i> Empréstimos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="bi bi-people me-1"></i> Colaboradores</a>
                    </li>
                </ul>

                <!-- Botões de Ação Rápida (Cadastros) -->
                <div class="d-flex flex-wrap gap-2 me-lg-3 my-2 my-lg-0">
                    <a href="produto/create" class="btn btn-warning btn-sm fw-bold">
                        <i class="bi bi-plus-lg me-1"></i> Cadastrar Material
                    </a>
                    <a href="#" class="btn btn-outline-light btn-sm fw-bold">
                        <i class="bi bi-person-plus-fill me-1"></i> Cadastrar Colaborador
                    </a>
                </div>

                <span class="navbar-text text-light border-start ps-lg-3">
                    <i class="bi bi-person-circle me-1"></i> Operador
                </span>
            </div>
        </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="container my-4 flex-grow-1">
        @if (session()->has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{ $slot }}
    </main>

    <!-- Rodapé -->
    <footer class="bg-white text-center text-muted py-3 border-top mt-auto">
        <div class="container">
            <small>&copy; {{ date('Y') }} Sistema de Almoxarifado de Ferramentas.</small>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>