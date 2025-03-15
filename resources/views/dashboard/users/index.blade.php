@extends('layouts.admin')
@section('title_admin', 'Rôles')

@section('admin_layout')
    <div class="container">
        <div class="action-roles d-flex justify-content-end">
            <a href="{{route('user.create')}}" type="button" class="btn btn-primary">Add new user</a>
        </div>
        <div class="content-users">
                
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>
                        {{session('success')}}
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <table class="table ">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Role</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td> {{$user->name}} </td>
                            <td> {{$user->email}} </td>
                            <td> {{$user->phone}} </td>
                            <td> {{$user->role->name}} </td>
                            <td class="d-flex align-items-center gap-1">
                                <a href="{{route('user.edit', ['user' => $user->id])}}" class="btn btn-info">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <form action="{{route('user.destroy', ['user' => $user->id])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button  class="btn btn-danger">
                                        <i class="ti ti-trash"></i>
                                    </a>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection