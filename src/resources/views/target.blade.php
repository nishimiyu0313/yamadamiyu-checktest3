@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/target.css')}}">
@endsection

@section('title', 'find.blade.php' )

@section('content')

<div class="goal-content">
    <form class="target-form" action="/weight_logs/goal_setting" method="post">
        @csrf
        <h2 class="target-form_heading">目標体重設定</h2>
        <input class="target-form__keyword-input" type="text" name="target_weight" value="{{ $weight_target->target_weight }}">kg
        <input class="goal-setting__button-update" type="submit" value="更新">
        <div class="create-form__error-message">
            @error('target_weight')
            {{ $message }}
            @enderror
        </div>
    </form>
</div>
<form action=" /weight_logs" method="get">
    @csrf
    <input class="back-form__btn btn" type="submit" value="戻る">
</form>



@endsection