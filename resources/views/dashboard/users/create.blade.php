@extends('layouts.admin')
@section('title_admin','User creation')
@section('admin_layout')
    <div class="container">
        <div class="actions-btns d-flex mb-3">
            <a class=" btn btn-secondary" href="{{route('user.index')}}">
                <i class="ti ti-arrow-back"></i>
                Back to users list
            </a>
        </div>
        <div class="content">
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>
                        {{session('error')}}
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <form action="{{route('user.store')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name*</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <textarea class="form-control" id="email" rows="5" name="email"></textarea>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone">
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" id="role" name="role_id">
                        <option value="">Select a role</option>
                        @foreach($roles as $role)
                            <option value="{{$role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="d-flex">
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection