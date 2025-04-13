@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection

@section('title', 'find.blade.php' )

@section('content')

<table class="gorl__table">
    <tr class="gorl__row">
        <th class="gorl__label">目標体重</th>
        <th class="gorl__label">目標まで</th>
        <th class="gorl__label">最新体重</th>
    </tr>
</table>
<div class="inner">
    <form class="search-form" action="/search" method="get">
        @csrf
        <input class="search-form__date-input" type="date" name="date">~
        <input class="search-form__date-input" type="date" name="date">
        <input class="search-form__search-btn" type="submit" value="検索">
    </form>
    <button class="reset__button">リセット</button>
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

    <tr class="admin__row">
        <td class="admin__date">

        </td>
    </tr>
</table>


@endsection