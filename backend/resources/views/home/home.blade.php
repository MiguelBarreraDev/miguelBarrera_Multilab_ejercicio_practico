@extends('layouts.app')

@section('content')
<h1 class="ft-3 text-center text-teal fw-bold my-4">Welcome {{ auth()->user()->name }}</h1>
<?php $success = Session::get('success', false) ?>
@if($success)
<div id='alert-add-order-success' class="container alert alert-teal alert-dismissible fade show" role="alert">
  <strong><i class="fa-solid fa-circle-check"></i> {{ $success }}</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="container table-responsive">
  <div class="d-flex justify-content-between align-items-center mb-2 mt-2">
    <h3 class="fs-4 fw-bold text-secondary m-0">
      Lista de ordenes
    </h3>
    <button href="{{ url('/order')}}" class="btn btn-outline-teal fw-bold" data-bs-toggle="modal"
      data-bs-target="#staticBackdrop">
      <i class="fa fa-add"></i>
      Añadir orden
    </button>
  </div>
  <table class="table align-middle w-100 table-hover table-bordered shadow-sm">
    <thead class="table-dark">
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Creado en</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Precio S/.</th>
        <th scope="col">Doctor</th>
      </tr>
    </thead>
    <tbody>
      @if (count($orders) > 0)
      @foreach ($orders as $order)
      <tr>
        <th scope="row">{{ $order->code }}</th>
        <td>{{ $order->created_at }}</td>
        <td>{{ $order->patient->first_name }}</td>
        <td>{{ $order->patient->last_name }}</td>
        <td>{{ isset($order->price) ? $order->price : 'No definido' }}</td>
        <td>{{ isset($order->doctor_id) ? 'Sí' : 'No' }}</td>
      </tr>
      @endforeach
      @else
      <tr>
        <td colspan="100%" rowspan="100%" class="text-center">
          No hay ordenes registradas
        </td>
      </tr>
      @endif
    </tbody>
  </table>
</div>
<div class="container d-flex justify-content-center mb-4 align-items-center">
  {{ $orders->links() }}
</div>
@include('home.modal')
@endsection