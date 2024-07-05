{{-- <!DOCTYPE html>
<html>
<head>
    <title>Statut de votre résérvation</title>
</head>
<body>
    <h1>Bonjour, {{ $reservation->user->nom}}</h1>
    <p>suite a votre postulation ,</p>
    <p>Votre résérvation intitulée "{{ $reservation->evenement->nom }}" a été {{ $reservation->statut}}.</p>
</body>
</html>
 --}}
 
 
 
 <!DOCTYPE html>
 <html lang="fr">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Statut de votre réservation</title>
     <style>
         body {
             font-family: Arial, sans-serif;
             background-color: #f8f8f8;
             margin: 0;
             padding: 0;
         }
         .container {
             background-color: #ffffff;
             margin: 50px auto;
             padding: 20px;
             border-radius: 8px;
             box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
             max-width: 600px;
         }
         h1 {
             color: #333333;
         }
         p {
             color: #666666;
         }
         .footer {
             margin-top: 20px;
             text-align: center;
             font-size: 12px;
             color: #999999;
         }
     </style>
 </head>
 <body>
     <div class="container">
         <h1>Bonjour, {{ $reservation->user->nom }}</h1>
         <p>Nous tenons à vous informer que votre réservation pour l'événement intitulé <strong>"{{ $reservation->evenement->nom }}"</strong> a été <strong>{{ $reservation->statut }}</strong>.</p>
         <p>Nous vous remercions de votre intérêt pour nos événements. Si vous avez des questions ou besoin de plus d'informations, n'hésitez pas à nous contacter.</p>
         <p>Cordialement,</p>
         <p>L'équipe de gestion des réservations</p>
     </div>
     <div class="footer">
         &copy; {{ date('Y') }} Votre Entreprise. Tous droits réservés.
     </div>
 </body>
 </html>
 