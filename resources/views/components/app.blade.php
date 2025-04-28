<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ config('app.name', 'Atlas Volunteer') }}</title>
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/icon.png') }}">
        <!-- Pour une meilleure compatibilité entre navigateurs -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/icon.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/icon.png') }}">
        {{-- <link rel="manifest" href="{{ asset('site.webmanifest') }}"> --}}
        {{ $head ?? '' }}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        @vite('resources/css/app.css')
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50 min-h-screen flex flex-col">
        <div class="relative z-20">
            <x-navbar />
        </div>
        <main class="flex-grow">
            {{ $slot }}
        </main>
    </body>

    {{-- fonction update de l'image  --}}
    <script>
        function previewImage(input) {
            const previewContainer = document.getElementById('image-preview-container');
            const preview = document.getElementById('image-preview');
            
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                };
                
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    {{-- fonction de search pour location --}}
    <script>
        document.getElementById('searchLocations').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
            
            tableRows.forEach(row => {
                const locationId = row.querySelector('td:first-child').textContent.toLowerCase();
                const locationName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
        
                if (locationId.includes(searchValue) || locationName.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
    {{-- fonction pour search des categories --}}
    <script>
        document.getElementById('searchCategories').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
            
            tableRows.forEach(row => {
                const CategoryId = row.querySelector('td:first-child').textContent.toLowerCase();
                const CategoryName = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                
                if (CategoryId.includes(searchValue) || CategoryName.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

    {{-- fonction de recherche des donations pour l'admin --}}
    <script>
        document.getElementById('searchDonations').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
            
            tableRows.forEach(row => {
                // Récupérer toutes les cellules de texte de la ligne
                const cells = row.querySelectorAll('td');
                let rowContainsSearchValue = false;
                
                // Vérifier chaque cellule pour le texte recherché
                cells.forEach(cell => {
                    const cellText = cell.textContent.toLowerCase();
                    if (cellText.includes(searchValue)) {
                        rowContainsSearchValue = true;
                    }
                });
                
                // Afficher ou masquer la ligne selon le résultat de la recherche
                if (rowContainsSearchValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
    {{-- fonction pour rechercher des opportunites pour l'admin --}}
    <script>
        document.getElementById('searchOpportunities').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
            
            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let rowContainsSearchValue = false;
                cells.forEach(cell => {
                    const cellText = cell.textContent.toLowerCase();
                    if (cellText.includes(searchValue)) {
                        rowContainsSearchValue = true;
                    }
                });
                if (rowContainsSearchValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>
    {{-- fonction pour rechercher des utilisateur pour l'admin --}}
    <script>
        document.getElementById('searchUsers').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const tableRows = document.querySelectorAll('tbody tr');
            
            tableRows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let rowContainsSearchValue = false;
                cells.forEach(cell => {
                    const cellText = cell.textContent.toLowerCase();
                    if (cellText.includes(searchValue)) {
                        rowContainsSearchValue = true;
                    }
                });
                if (rowContainsSearchValue) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    </script>

    {{-- fonction de recherche pour home page (opportunités) --}}
    <script>
        document.getElementById('homeSearch').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const opportunityItems = document.querySelectorAll('ul.divide-y > li');
            
            opportunityItems.forEach(item => {
                const itemText = item.textContent.toLowerCase();
                if (itemText.includes(searchValue)) {
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    </script>
{{-- fonction de recherche pour page donation (visiteur) --}}
    <script>
        document.getElementById('donationSearch').addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const donationCards = document.querySelectorAll('.grid > div.bg-white');
            
            donationCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p.text-gray-600').textContent.toLowerCase();
                const location = card.querySelector('div.flex.items-center.text-gray-500 span')?.textContent.toLowerCase() || '';
                
                if (title.includes(searchValue) || description.includes(searchValue) || location.includes(searchValue)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>
</html>