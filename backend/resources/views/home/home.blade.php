@extends('layouts.app')

@section('content')
<h1 class="ft-3 text-center text-teal fw-bold my-4">Welcome {{ auth()->user()->name }} {{ auth()->user()->id }}</h1>
<div class="container table-responsive">
  <table class="table align-middle w-100 table-hover table-bordered shadow-sm caption-top">
    <caption>
      <h3 class="fs-4 fw-bold">
        Lista de ordenes
      </h3>
    </caption>
    <thead class="table-dark">
      <tr>
        <th scope="col">Código</th>
        <th scope="col">Creado en</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Precio total</th>
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
        <td>{{ isset($order->orderDetails->price) ? $order->orderDetails->price : 'No definido' }}</td>
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
@endsection