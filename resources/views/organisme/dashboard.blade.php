<x-organisme-app-layout>
    @section('title', 'Dashboard')
    @section('titre-page')
    @if(session()->has('organisme_id'))
    {{ App\Models\Organisme::find(session('organisme_id'))->nom }}
    @endif
    @endsection
    @section('cardBox')
    <div class="card">
        <div>
            <div class="numbers">{{ $reservationsCount }}</div>
            <div class="cardName">Places Réservées</div>
        </div>
        <div class="iconBx">
            <ion-icon name="eye-outline"></ion-icon>
        </div>
    </div>

    <div class="card">
        <div>
            <div class="numbers">{{ $evenementsCount }}</div>
            <div class="cardName">Evenements</div>
        </div>
        <div class="iconBx">
            <ion-icon name="eye-outline"></ion-icon>
        </div>
    </div>
    </div>
    @endsection

    @section('content')
        <!-- Contenu des CRUDs ici -->
    @endsection
</x-organisme-app-layout>
