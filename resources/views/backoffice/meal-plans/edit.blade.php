@extends('shared.layouts.backoffice')

@section('content')
@include('backoffice.meal-plans.meal-plan-form', ['mealPlan' => $mealPlan])
@endsection
