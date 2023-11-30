@extends('layouts.app')

@section('content')
    <div class="ui container">
        <div class="ui stackable grid">
            <div class="twelve wide column">
                <h1 class="ui header">MI RESTAURANTE</h1>

                <div class="ui cards">
                    <!-- Restaurant Information -->
                    <div class="card">
                        <div class="content">
                            <div class="header">Información Restaurante</div>
                            <div class="description">
                                <p>Address: Centro, 99100 Sombrerete, Zac.</p>
                                <p>Phone: 455 134 6901</p>
                                <p>Manager: Salvador Garcia Dueñes</p>
                            </div>
                        </div>
                    </div>

                    <!-- Orders -->
                    <div class="card">
                        <div class="content">
                            <div class="header">Ordenes Recientes</div>
                            <div class="description">
                                <p>Order #01 - 1 albóndigas , 1 Refresco - $25.00</p>
                                <p>Order #02 - 1 sopa de crema, 1 ensalada de frutas, 1 Té helado - $15.00</p>
                                <p>Order #03 - 2 sopas de tortilla, 1 Limonada - $18.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
