<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        {{ $title ?? 'Controle de Estoque' }}
    </title>

    {{-- BOOTSTRAP --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- BOOTSTRAP ICONS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    @livewireStyles
</head>

<body class="bg-light">

    @if (!request()->routeIs('login') && !request()->routeIs('logout'))
    



    <nav class="navbar navbar-expand-lg navbar-dark bg-info shadow-sm">

        <div class="container">

            {{-- NOME DO SISTEMA --}}
            <a class="navbar-brand text-black fw-bold" href="{{ route('dashboard') }}">
                <i class="bi bi-box-seam me-2"></i>
                Controle de Estoque
            </a>


            {{-- BOTÃO MOBILE --}}
            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal">
                <span class="navbar-toggler-icon"></span>
            </button>


            <div class="collapse navbar-collapse" id="navbarPrincipal">

                {{-- MENU ESQUERDA --}}
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    {{-- DASHBOARD --}}
                    <li class="nav-item">

                        <a class="nav-link text-black {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-1"></i>
                            Dashboard
                        </a>

                    </li>


                    {{-- PRODUTOS --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-black {{ request()->routeIs('produto.*') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-box me-1"></i>
                            Produtos
                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item" href="{{ route('produto.index') }}">
                                    <i class="bi bi-list me-2"></i>
                                    Listar Produtos
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('produto.create') }}">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Novo Produto
                                </a>
                            </li>

                        </ul>

                    </li>


                    {{-- CARACTERÍSTICAS --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-black {{ request()->routeIs('caracteristica.*') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-tags me-1"></i>
                            Características
                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item" href="{{ route('caracteristica.create') }}">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Nova Característica
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('caracteristica.index') }}">
                                    <i class="bi bi-list me-2"></i>
                                    Listar Características
                                </a>
                            </li>

                        </ul>

                    </li>


                    {{-- MOVIMENTAÇÕES --}}
                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-black {{ request()->routeIs('movimentacao.*') ? 'active' : '' }}"
                            href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-arrow-left-right me-1"></i>
                            Movimentações
                        </a>

                        <ul class="dropdown-menu">

                            <li>
                                <a class="dropdown-item" href="{{ route('movimentacao.index') }}">
                                    <i class="bi bi-clock-history me-2"></i>
                                    Histórico
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="{{ route('movimentacao.create') }}">
                                    <i class="bi bi-plus-circle me-2"></i>
                                    Nova Movimentação
                                </a>
                            </li>

                        </ul>

                    </li>

                </ul>


                {{-- USUÁRIO --}}
                <ul class="navbar-nav ms-auto">

                    <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle text-black" href="#" role="button"
                            data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i>

                            @auth
                                {{ auth()->user()->name }}
                            @else
                                Usuário
                            @endauth
                        </a>

                        <ul class="dropdown-menu dropdown-menu-end">

                            @auth

                                <li>
                                    <span class="dropdown-item-text">
                                        <small class="text-muted">
                                            Logado como
                                        </small>

                                        <br>

                                        <strong>
                                            {{ auth()->user()->nome }}
                                        </strong>
                                    </span>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                {{-- LOGOUT --}}
                                <li>

                                    <form method="POST" action="{{ route('logout') }}">

                                        @csrf

                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i>
                                            Sair
                                        </button>

                                    </form>

                                </li>

                            @endauth

                        </ul>

                    </li>

                </ul>

            </div>

        </div>

    </nav>

    @endif


    {{-- CONTEÚDO DAS PÁGINAS --}}
    <main>

        @if (!request()->routeIs('login'))

            <div class="container py-4">

                {{ $slot }}

            </div>
        @else
            {{ $slot }}

        @endif

    </main>


    {{-- BOOTSTRAP --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @livewireScripts

</body>

</html>
