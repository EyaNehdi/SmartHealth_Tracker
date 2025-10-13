@extends('shared.layouts.backoffice')

@section('content')
<h3>Edit Meal</h3>
@include('backoffice.meals.meal-form', ['meal' => $meal])

@endsection
