@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/detail.css')}}">
@endsection

@section('content')
<div class="detail-content">
    <div class="detail-group">
        <h2 class="detail-title">Weight Log</h2>
        <form class="detail-form" action="{{url('/weight_logs/' . $weight_Log['id'] . '/update')}}" method="post" novalidate>
            @csrf
            @method('patch')
            <div class="detail-form__group">
                <div class="detail-form__heading">
                    <span class="detail-form__heading-name">日付</span>
                </div>
                <div class="detail-form__content-date">
                    <input type="date" class="detail-form__input-date" name="date" value="{{old('date', \Carbon\Carbon::parse($weight_Log->date)->format('Y-m-d'))}}">
                </div>
                <div class="detail-error">
                    @error('date')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="detail-form__group">
                <div class="detail-form__heading">
                    <span class="detail-form__heading-name">体重</span>
                </div>
                <div class="detail-form__content-unit">
                    <input type="text" class="detail-form__input-weight" name="weight" value="{{old('weight', $weight_Log->weight)}}">
                    <span class="detail-form__input-unit">kg</span>
                </div>
                <div class="detail-error">
                    @error('weight')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="detail-form__group">
                <div class="detail-form__heading">
                    <span class="detail-form__heading-name">摂取カロリー</span>
                </div>
                <div class="detail-form__content-unit">
                    <input type="text" class="detail-form__input-calories" name="calories" value="{{old('calories', $weight_Log->calories)}}">
                    <span class="detail-form__input-unit">cal</span>
                </div>
                <div class="detail-error">
                    @error('calories')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="detail-form__group">
                <div class="detail-form__heading">
                    <span class="detail-form__heading-name">運動時間</span>
                </div>
                <div class="detail-form__content-time">
                    <input type="time" class="detail-form__input-time" name="exercise_time" value="{{old('exercise_time', $weight_Log->exercise_time)}}">
                </div>
                <div class="detail-error">
                    @error('exercise_time')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="detail-form__group">
                <div class="detail-form__heading">
                    <span class="detail-form__heading-name">運動内容</span>
                </div>
                <div class="detail-form__content">
                    <textarea name="exercise_content" class="detail-form__textarea" placeholder="運動内容を追加">{{old('exercise_content', $weight_Log->exercise_content)}}</textarea>
                </div>
                <div class="detail-error">
                    @error('exercise_content')
                    {{$message}}
                    @enderror
                </div>
            </div>
            <div class="detail-form__button">
                <div class="detail-form__button-back">
                    <a class="detail-form__button-back--link" href="/weight_logs">戻る</a>
                </div>
                <div class="detail-form__button-update">
                    <button class="detail-form__button-update--submit" type="submit">更新</button>
                </div>
            </div>
        </form>
        <form class="detail-form__button-delete" action="{{url('/weight_logs/' . $weight_Log['id'] . '/delete')}}" method="post">
            @method('delete')
            @csrf
            <button class="detail-form__button-delete--submit" type="submit">
                ゴミ箱
            </button>
        </form>
    </div>
</div>
@endsection