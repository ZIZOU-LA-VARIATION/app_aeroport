@extends('layouts.admin')
@section('title_admin','Reservetions')


@section('admin_layout')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Liste des Réservations</h2>
            <a href="{{ route('reservation.create') }}" class="btn btn-primary">Ajouter une Réservation</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Passager</th>
                    <th>Vol</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ optional(optional($reservation->passenger)->user)->name ?? 'Non renseigné' }}</td>
                        <td>Vol #{{ $reservation->flight->number }}</td>
                        <td>
                            <span class="badge 
                                    @if($reservation->status == 'paid') bg-success 
                                        @else bg-warning 
                                    @endif">
                                {{ ucfirst($reservation->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('reservation.show', $reservation) }}" class="btn btn-info btn-sm">Voir</a>
                            <a href="{{ route('reservation.edit', $reservation) }}" class="btn btn-warning btn-sm"><i class="ti ti-pencil"></i></a>
                            <form action="{{ route('reservation.destroy', $reservation) }}" method="POST" class="d-inline"
                                onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="ti ti-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection