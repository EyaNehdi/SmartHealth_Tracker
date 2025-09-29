@extends('layouts.adminLayout')

@section('content')
<h3>Edit Meal</h3>
@include('admin.meals.meal-form', ['meal' => $meal])

@endsection