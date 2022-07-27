@extends('layouts.app')
@section('content')
<form>
  <div class="form-group col-md-4">
    <label for="description">Description</label>
    <input type="text" class="form-control" id="description" placeholder="Description">
  </div>
  <div class="form-group col-md-4">
    <label for="total">Total</label>
    <input type="number" class="form-control" id="total" placeholder="total">
  </div>
  <div class="form-group col-md-4">
      <label for="inputState">Tipo</label>
      <select id="inputState" class="form-control">
        <option selected>Ahorros</option>
        <option selected>Ingreso</option>
        <option selected>Egreso</option>
      </select>
  </div>
  <div class="form-group col-md-4">
      <label for="inputState">Tipo de Moneda</label>
      <select id="inputState" class="form-control">
        <option selected>Soles</option>
        <option selected>Dolares</option>
      </select>
  </div>
  <div class="form-group col-md-4">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
@endsection