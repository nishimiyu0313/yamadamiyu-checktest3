@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/create.css')}}">
@endsection

@section('title', 'find.blade.php' )

@section('content')

<div class="create">
    <h2 class="create__heading">Weight Logを追加</h2>
    <div class="create__inner">
        <form class="create-form" action="/weight_logs/create" method="post">
            @csrf
            <div class="create-form__group">
                <label class="create-form__label" for="date">
                    日付<span class="create-form__required">必須</span>
                </label>
                <div class="create-form__date-inputs">
                    <input class="create-form__input contact-form__date-input" type="text" name="date" id="date">
                </div>
                <div class="register-form__error-message">


                </div>
            </div>


            <div class="create-form__group">
                <label class="create-form__label" for="date">
                    体重<span class="create-form__required">必須</span>
                </label>
                <div class="create-form__date-inputs">
                    <input class="create-form__input contact-form__date-input" type="text" name="weight" id="weight">
                </div>
                <div class="register-form__error-message">


                </div>
            </div>


            <div class="create-form__group">
                <label class="create-form__label" for="calories">
                    摂取カロリー<span class="create-form__required">必須</span>
                </label>
                <div class="create-form__calories-inputs">
                    <input class="create-form__input contact-form__calories-input" type="text" name="calories" id="calories">
                </div>
                <div class="register-form__error-message">


                </div>
            </div>


            <div class="create-form__group">
                <label class="create-form__label" for="exercise_time">
                    運動時間<span class="create-form__required">必須</span>
                </label>
                <div class="create-form__exercise_time-inputs">
                    <input class="create-form__input contact-form__exercise_time-input" type="text" name="exercise_time" id="exercise_time">
                </div>
                <div class="register-form__error-message">


                </div>
            </div>


            <div class="create-form__group">
                <label class="create-form__label" for="exercise_content">
                    運動内容<span class="create-form__required">必須</span>
                </label>
                <div class="create-form__exercise_content-inputs">
                    <textarea class="register-form__textarea" name="exercise_content" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="create-form__error-message">


                </div>
            </div>

            <input class="create-form__btn btn" type="submit" value="登録">
        </form>

    </div>
</div>
@endsection