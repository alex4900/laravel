@extends('layouts.base')

@section('title', 'Todolist')

@section('content')
<form method="POST" action="/addtodo">
    @csrf
    <input type="text" name="texte">
    <button type="button">Entrez</button>
</form> 
<table>
  @foreach($ValeursBase as $unElement)
  <tr>
    <td>{{$unElement->texte}}</td>
    <td><a href="/todo/terminer/{{ $unElement->id}}">{{$unElement -> termine}}</a></td>
    <td><a href="/todo/supprimer/{{ $unElement->id}}"></a></td>
  </tr>
  @endforeach
</table>
@endsection