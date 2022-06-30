@extends('layouts.app')

@section('title',"Личный кабинет")
@section('description','Личный кабинет')

@section('content')
    <style>
        table.iksweb{
            width: 100%;
            border-collapse:collapse;
            border-spacing:0;
            height: auto;
        }
        table.iksweb,table.iksweb td, table.iksweb th {
            border: 1px solid #595959;
        }
        table.iksweb td,table.iksweb th {
            padding: 3px;
            width: 30px;
            height: 35px;
        }
        table.iksweb th {
            background: orange;
            color: #fff;
            font-weight: normal;
        }
        td{
            color: grey;
        }
    </style>

    <div class="wrapper">
        <h1 style="color: grey">Ваши заказы</h1>
        <h4 style="color: grey">Номер заказа: 43242 Статус: Ожидается На сумму: 770р.</h4>
        <a href="">Отменить</a>
        <table class="iksweb">
            <thead>
            <tr>
                <th scope="col">Наименование</th>
                <th scope="col">Цена</th>
                <th scope="col">Количество</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Капучино</td>
                <td>100р.</td>
                <td>5шт.</td>
            </tr>
            <tr>
                <td>Американо</td>
                <td>70р.</td>
                <td>3шт.</td>
            </tr>
            <tr>
                <td>Сгущенка</td>
                <td>60р.</td>
                <td>1шт.</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection
