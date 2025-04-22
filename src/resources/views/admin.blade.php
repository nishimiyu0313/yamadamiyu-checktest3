@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection

@section('title', 'find.blade.php' )

@section('content')

<div class="heading">
    <div class="heading__group">
        <h5 class="heading__title">目標体重</h5>
        <div class="heading__number">
            {{$weight_target}}
            <span class="heading__kg">kg</span>
        </div>
    </div>
    <span class="line"></span>
    <div class="heading__group">
        <h5 class="heading__title">目標まで</h5>
        <div class="heading__number">
           
            <span class="heading__kg">kg</span>
        </div>
    </div>
    <span class="line"></span>
    <div class="heading__group">
        <h5 class="heading__title">最新体重</h5>
        <div class="heading__number">
            {{$latest_weight_log}}
            <span class="heading__kg">kg</span>
        </div>
    </div>
    <div class="inner">
        <form class="search-form" action="/weight_logs/search" method="get">
            @csrf
            <div class="weight-form__search">
                <input type="date" class="weight-form__search-input" name="start_date" value="{{old('start_date', request('start_date'))}}">
            </div>
            <span class="calender-between">～</span>
            <div class="weight-form__search">
                <input type="date" class="weight-form__search-input" name="end_date" value="{{old('end_date', request('end_date'))}}">
            </div>
            <button class="weight-form__search--button" type="submit">検索</button>
        </form>
        <button class="reset__button">リセット</button>
        @if($startDate || $endDate)
        <div class="weight-form__search-result">
            {{$startDate ? \Carbon\Carbon::parse($startDate)->format('Y年m月d日') : ''}}〜{{$endDate ? \Carbon\Carbon::parse($endDate)->format('Y年m月d日') : ''}}の検索結果
            <span class="weight-form__search-result--total">{{$weight_logs->total()}}件</span>
        </div>
        @endif
        <form class="create-form" action="/weight_logs/create" method="get">
            @csrf
            <input class="admin__create-btn " type="submit" value="データ追加">
        </form>

    </div>
    <table class="admin__table">
        <tr class="admin__row">
            <th class="admin__label">日付</th>
            <th class="admin__label">体重</th>
            <th class="admin__label">食事摂取カロリー</th>
            <th class="admin__label">運動時間</th>
        </tr>
        @foreach ($weight_logs as $weight_log)
        <tr class="admin__row">
            <td class="admin__date">
                {{ $weight_log->date }}
            </td>
            <td class="admin__weight">
                {{ $weight_log->weight }}
            </td>
            <td class="admin__calories">
                {{ $weight_log->calories }}
            </td>
            <td class="admin__exercise_time">
                {{ $weight_log->exercise_time }}
            </td>
            <td class="admin__exercise_content">
                {{ $weight_log->exercise_content }}
            </td>
            <td class="weight-logs__table--content">

                </form>
            </td>
        </tr>
        @endforeach

    </table>


    @endsection