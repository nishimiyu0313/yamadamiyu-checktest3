@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/target.css')}}">
@endsection

@section('title', 'find.blade.php' )

@section('content')

<div class="target">
    <form class="target-form" action="/weight_logs/goal_setting" method="get">
        @csrf
        <h2 class="target-form_heading">目標体重設定</h2>
        <input class="target-form__keyword-input" type="text" name="keyword">kg
        <input class="update-form__btn btn" type="submit" value="更新">
    </form>
</div>

<input class="back-form__btn btn" type="submit" value="戻る">


@endsection