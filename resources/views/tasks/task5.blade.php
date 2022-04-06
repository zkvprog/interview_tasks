@extends('layouts.master')

@section('main')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Задание 5</h1>
        </div>

        <div class="row ">
            <div class="col-sm-6">
                <h4 class="mb-3">Форма регистрации</h4>
                <form method="POST" enctype="multipart/form-data" id="registerForm" novalidate="">
                    {{csrf_field()}}

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <label for="firstName" class="form-label">Имя</label>
                            <input type="text" name="first_name" class="form-control" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Имя обязательное поле
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label for="lastName" class="form-label">Фамилия</label>
                            <input type="text" name="last_name" class="form-control" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Фамилия обязательное поле
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required="" placeholder="you@example.com">
                            <div class="invalid-feedback">
                                Введите корректное значение email
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="inputPassword3" class="col-sm col-form-label">Пароль</label>
                            <input type="password" name="password" class="form-control" id="inputPassword3" required="">
                            <div class="invalid-feedback">
                                Пароль обязательное поле
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="inputConfirmPassword" class="col-sm col-form-label">Подтверждение пароля</label>
                            <input type="password" name="confirm_password" class="form-control" id="inputConfirmPassword" required="">
                            <div class="invalid-feedback">
                                Подтверждение пароля обязательное поле
                            </div>
                        </div>

                        <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!--<script>
        (function () {
            'use strict'

            var form = document.getElementById('registerForm');

            form.addEventListener('submit', (event) => {
                event.preventDefault();
                event.stopPropagation();
                form.checkValidity()

                form.classList.add('was-validated');

                fetch('/task5', {
                    method: 'post',
                    headers: {
                        "Content-Type": "application/json",
                        "Accept": "application/json",
                        "X-Requested-With": "XMLHttpRequest",
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    credentials: "same-origin",
                    body: new FormData(form)
                })
                .then(response => response.json());
            }, false)

        })()
    </script>-->
@endsection
