@include('portail.layouts.header')

    <div class="container mt-5">
        <div class="event-header">
            <img src="{{ asset('images/afbe9d6dfcb9da7c55ddfd60598c82b0 1.svg') }}" alt="" class="img-fluid">
        </div>
        <div class="event-details">
            <h2>Analyse de données</h2>
            <p>Analyse des données: KoboToolbox et Power BI pour la collecte, l'analyse et la visualisation de données</p>
            <div class="my-3">
                <h5>Date</h5> <br>
                <P>28 juin 2024</P><br>
                <a href="{{ route('reservations.create') }}" class="btn btn-primary">Reserver</a>

                {{-- <span class="btn btn-primary">
                <a http://'reservation/create'>Reserver</a>
                </span>
                @csrf
                @method('post')
                <button  type="submit" class="btn btn-primary">Reserver</button> --}}
                {{-- <button class="btn btn-primary">Reserver</button> --}}
            </div>
            <div class="mt-4">
                <h5>Description de l'événement :</h5>
                <p>Rejoignez-nous pour un atelier intensif sur l'analyse des données, conçu pour vous doter de compétences nécessaires pour collecter, analyser et visualiser des données de manière efficace. Lors de cet événement, nous explorerons les puissants outils KoboToolbox et Power BI, et comment ils peuvent être utilisés ensemble pour transformer des données brutes en insights précieux.</p>
            </div>
        </div>
    </div>
    @include('portail.layouts.footer')


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
