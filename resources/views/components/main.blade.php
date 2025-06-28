<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>DutchGroceries</title>

    {{-- Compiled assets --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
{{-- Navigation bar --}}
<nav class="navbar is-primary has-text-white" >
    <div class="container">
        <div class="navbar-brand">
            <a href="/" class="navbar-item">
                <strong>DutchGroceries</strong>
            </a>
            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navMenu">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>
        <div class="navbar-menu" id="navMenu">
            <div class="navbar-start">
                <a href="{{ route('home') }}"
                   class="navbar-item {{ request()->route()->getName() === 'home' ? 'is-active' : '' }}">
                    Home
                </a>
                <a href="{{ route('articles.index') }}"
                   class="navbar-item {{ request()->route()->getName() === 'articles.index' ? 'is-active' : '' }}">
                    News
                </a>
                <a href="{{ route('products.index') }}"
                   class="navbar-item {{ request()->route()->getName() === 'products.index' ? 'is-active' : '' }}">
                    Products
                </a>
                <a href="{{ route('orders.index') }}"
                   class="navbar-item {{ request()->route()->getName() === 'orders.index' ? 'is-active' : '' }}">
                    Orders
                </a>
                <a href="{{ route('suppliers.index') }}"
                   class="navbar-item {{ request()->route()->getName() === 'suppliers.index' ? 'is-active' : '' }}">
                    Suppliers
                </a>
            </div>

            {{-- Right side: login/register or user dropdown --}}
            <div class="navbar-end">
                @guest
                    <a href="{{ route('login') }}" class="navbar-item">
                        Login
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="navbar-item">
                            Register
                        </a>
                    @endif
                @else
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="navbar-dropdown is-right">
                            <a href="{{ route('logout') }}"
                               class="navbar-item"
                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="is-hidden">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </div>

        </div>
    </div>
</nav>

{{-- Main content --}}
{{ $slot }}

{{-- Footer --}}
<footer class="footer">
    <div class="container">
        <div class="columns is-multiline">

            <div class="column has-text-centered">
                <div>
                    <a href="/" class="link">Home</a>
                </div>
            </div>

            <div class="column has-text-centered">
                <div>
                    <a href="https://opensource.org/licenses/MIT" class="link">
                        <i class="fa fa-balance-scale" aria-hidden="true"></i> License: MIT
                    </a>
                </div>
            </div>

        </div>

        <div class="content is-small has-text-centered">
            <p>Theme built by <a href="https://www.csrhymes.com">C.S. Rhymes</a> | adapted by <a href="https://github.com/dwaard">BugSlayer</a></p>
            <p>PROJECT FOOTER HERE</p>
        </div>
    </div>
</footer>

<script>
    // Burger menu toggle for mobile
    document.addEventListener('DOMContentLoaded', () => {
        const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

        if ($navbarBurgers.length > 0) {
            $navbarBurgers.forEach( el => {
                el.addEventListener('click', () => {
                    const target = el.dataset.target;
                    const $target = document.getElementById(target);

                    el.classList.toggle('is-active');
                    $target.classList.toggle('is-active');
                });
            });
        }
    });
</script>
</body>
</html>
