@extends('layouts.admin')
@section('title_admin', 'Rôles')

@section('admin_layout')
    <div class="container">
        <div class="action-roles d-flex justify-content-end">
            <a href="{{route('role_create')}}" type="button" class="btn btn-primary">Add new Role</a>
        </div>
        <div class="content-roles">
                
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
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($roles as $role)
                        <tr>
                            <td> {{$role->name}} </td>
                            <td> {{$role->description}} </td>
                            <td class="d-flex align-items-center gap-1">
                                <a href="{{route('role_edit', ['role' => $role->id])}}" class="btn btn-info">
                                    <i class="ti ti-pencil"></i>
                                </a>
                                <form action="{{route('role_destroy', ['role' => $role->id])}}" action="post">
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