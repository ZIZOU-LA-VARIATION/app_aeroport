@extends('layouts.admin')
@section('title_admin','Role Edition')


@section('admin_layout')
    <div class="container">
        <div class="actions-btns d-flex mb-3">
            <a class=" btn btn-secondary" href="{{route('roles')}}">
                <i class="ti ti-arrow-back"></i>
                Back to roles list
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
            <form action="#" method="post">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name*</label>
                    <input type="text" value="{{ $role->name}}" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="5" name="description">
                        {{$role->description}}
                    </textarea>
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