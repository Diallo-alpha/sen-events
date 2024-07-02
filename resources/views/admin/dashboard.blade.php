<x-admin-app-layout>
    @section('title', 'Dashboard')
    @section('titre-page', 'admin')
    @section('cardBox')
            <div class="card">
                <div>
                    <div class="numbers">{{ $eventCount }}</div>
                    <div class="cardName">Evenements</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">{{ $associationCount }}</div>
                    <div class="cardName">Associations</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>

            <div class="card">
                <div>
                    <div class="numbers">{{ $userCount }}</div>
                    <div class="cardName">Utilisateurs</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="eye-outline"></ion-icon>
                </div>
            </div>
    @endsection

    @section('content')
        <!-- Contenu des CRUDs ici -->
    @endsection
</x-admin-app-layout>
