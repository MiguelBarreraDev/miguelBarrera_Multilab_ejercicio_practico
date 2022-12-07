@extends('layouts.app')

@section('content')
<h1 class="title is-3 has-text-primary has-text-centered">Welcome {{ auth()->user()->name }}</h1>
<table class="table full-width">
  <thead>
    <tr>
      <th>Código</th>
      <th>Creado en</th>
      <th>Nombre</th>
      <th>Apellido</th>
      <th>Precio total</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($orders as $order)
    <tr>
      <th>{{ $order->code }}</th>
      <td>{{ $order->created_at }}</td>
      <td>{{ $order->patient->first_name }}</td>
      <td>{{ $order->patient->last_name }}</td>
      <td>{{ isset($order->orderDetails->price) ? $order->orderDetails->price : 'No definido' }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection