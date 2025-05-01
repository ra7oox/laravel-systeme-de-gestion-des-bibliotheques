
<nav class="bg-gray-800 shadow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo et titre -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ Auth::user()->account_type == 'admin' ? route('dashboard-admin') : route('dashboard-lecteur') }}" class="text-white font-bold text-xl uppercase tracking-wide">
                        Gestion des Bibliothèque
                    </a>
                </div>

                <!-- Menu de navigation -->
                <div class="hidden md:flex md:ml-10 space-x-4">
                    <a href="{{ Auth::user()->account_type == 'admin' ? route('dashboard-admin') : route('dashboard-lecteur') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Accueil</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">À propos</a>
                    <a href="#" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                </div>
            </div>

            <!-- Actions utilisateur -->
            <div class="hidden md:flex items-center space-x-4">
                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Déconnexion</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Connexion</a>
                    <a href="{{ route('register') }}" class="text-gray-300 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Inscription</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
