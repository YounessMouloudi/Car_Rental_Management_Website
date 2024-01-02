<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Contrat Location: {{$reservation->id."_".$client->name."_".$client->prenom}}</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        .view {
            padding-top: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            padding: 100px auto;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }
        .d-flex {
            display: flex;
        }
        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }
        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .fw-bold {
            font-weight: bold;
        }
        .text-danger {
            color: red;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #0074d9;
            color: #fff;
        }
        .title-img{
            margin-bottom: -16px;
        }
    </style>
</head>
<body>
    <div class="view">
        <h3 class="text-center">Contrat de Location d'une Voiture</h3>
        <br>
        <table class="order-details">
            <thead>
                <tr>
                    <th width="50%" colspan="2">
                        <div class="title-img">
                            <h2 class="text-start">Fsk Location</h2>
                        </div>
                    </th>
                    <th width="50%" colspan="2" class="text-end company-data">
                        <?php $date = (new DateTime('Africa/Casablanca'))->format('d/m/Y à H:i:s') ?>
                        <span>Date: {{ $date }}</span> <br>
                        <span>Address: Res said groupe el safae hay salam salé</span> <br>
                    </th>
                </tr>
                <tr class="bg-blue">
                    <th width="50%" colspan="2">Voiture Details</th>
                    <th width="50%" colspan="2">Locataire Details</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Marque & Model:</td>
                    <td>{{$voiture->marque." ".$voiture->model}}</td>
    
                    <td>Full Name:</td>
                    <td>{{$client->nom." ".$client->prenom}}</td>
                </tr>
                <tr>
                    <td>Immatriculation:</td>
                    <td>{{$voiture->immatriculation}}</td>
    
                    <td>Email:</td>
                    <td>{{$client->email}}</td>
                </tr>
                <tr>
                    <td>Type Carburant:</td>
                    <td>{{$voiture->type_carburant}}</td>
    
                    <td>Phone:</td>
                    <td>{{$client->telephone}}</td>
                </tr>
                <tr>
                    <td>Transmission:</td>
                    <td>{{$voiture->transmission}}</td>
    
                    <td>Address:</td>
                    <td>{{$client->adresse." ".$client->ville}}</td>
                </tr>
                <tr>
                    <td>Assurance:</td>
                    <td>{{$voiture->assurance}}</td>

                    <td>CIN:</td>
                    <td>{{$client->cin}}</td>
                </tr>
                <tr>
                    <td>Prix par jour:</td>
                    <td>{{$voiture->prix_par_jour}} DH</td>

                    <td>N° de Permis:</td>
                    <td>{{$client->permis}}</td>
                </tr>
            </tbody>
        </table>
        <br>

        <table>
            <thead>
                <tr>
                    <th class="no-border text-start heading" colspan="7">
                        Réservation Détails :
                    </th>
                </tr>
                <tr class="bg-blue">
                    <th>ID</th>
                    <th>Date Début</th>
                    <th>Date Fin</th>
                    <th>Nb des Jours</th>
                    <th>Accessoires</th>
                    <th>état de payement</th>
                    <th>Payement</th>
                    <th>Prix Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td width="10%">{{$reservation->id}}</td>
                    <td width="10%">{{$reservation->date_debut}}</td>
                    <td width="10%">{{$reservation->date_fin}}</td>
                    <td width="10%">{{$duration}}</td>
                    <td width="10%">
                        @if(!$accessoires->isEmpty())
                            @foreach($accessoires as $accessoire)
                                {{$accessoire->name."  (".$accessoire->quantité.")"}}
                            @endforeach
                        @else
                            aucun accessoire
                        @endif                                      
                    </td>
                    <td width="10%">{{$reservation->état}}</td>
                    <td width="10%">{{$reservation->payement}}</td>
                    <td width="10%" class="fw-bold">{{$reservation->total}} DH</td>
                </tr>
            </tbody>
        </table>
        
        <br>
        <p class="text-end">
            <span class="fw-bold">Signature :  &nbsp;</span>
            ....................................
        </p>

        <br>
        <p class="text-center">
            Thank you for your trust in <span class="text-danger fw-bold">Fsk Car Rental Agency</span>, 
            We hope you have an enjoyable time.
        </p>
    </div>
</body>
</html>