@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
<div class="profile-form__content">
    <div class="profile-form__heading">
        <h2>新規会員登録</h2>
    </div>
    <form class="form" action="/register/step2" method="post">
        @csrf
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">現在の体重</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="weight" value='' />
                </div>
                <div class="form__error">
                    @error('')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">目標の体重</span>
            </div>
            <div class="form__group-content">
                <div class="form__input--text">
                    <input type="text" name="weight" value='' />
                </div>
                <div class="form__error">
                    @error('')
                    {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        @endsection