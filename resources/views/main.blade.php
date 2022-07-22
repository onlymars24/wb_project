<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
    <header class="header">        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
            <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Список таблиц</a>
                </li>
                </ul>
            </div>
            </div>
        </div>
        </nav>        
    </header>

    <div class="notes">
        <div class="container">
            @if(!empty($flash))
            <div class="alert alert-success" role="alert">
                {{$flash}}
            </div>   
            @endif
            <div class="row">
                
                <div class="col-8">
                    <div class="note">                         
                        <div class="note__link"><a href="/show-incomes">Показать данные</a></div>
                        <h2 class="note__title">Поставки(incomes)</h2>
                        <p class="note__right">
                           <p>Описание таблицы</p>
                        </p>
                        <form action="/create-incomes" method="POST" class="note__form">
                            @csrf
                            <label for="">Укажите дату в данном формате:</label>
                            <input type="text" value="2022-05-01T00:00:00.000Z" name="dateFrom">
                            <button onclick="javascript:return confirm('СТАРЫЕ ДАННЫЕ БУДУТ ОБНОВЛЕНЫ!!! Вы уверены?');">ВЫГРУЗИТЬ ДАННЫЕ</button>
                        </form>
                    </div>	
                </div>

                <div class="col-8">
                    <div class="note">                         
                        <div class="note__link"><a href="/show-stocks">Показать данные</a></div>
                        <h2 class="note__title">Склад(stocks)</h2>
                        <p class="note__right">
                           <p>Описание таблицы</p>
                        </p>
                        <form action="/create-stocks" method="POST" class="note__form">
                            @csrf
                            <label for="">Укажите дату в данном формате:</label>
                            <input type="text" value="2022-05-01T00:00:00.000Z" name="dateFrom">
                            <button onclick="javascript:return confirm('СТАРЫЕ ДАННЫЕ БУДУТ ОБНОВЛЕНЫ!!! Вы уверены?');">ВЫГРУЗИТЬ ДАННЫЕ</button>
                        </form>
                    </div>	
                </div>

                <div class="col-8">
                    <div class="note">                         
                        <div class="note__link"><a href="/show-orders">Показать данные</a></div>
                        <h2 class="note__title">Заказы(orders)</h2>
                        <p class="note__right">
                           <p>Описание таблицы</p>
                        </p>
                        <form action="/create-orders" method="POST" class="note__form">
                            @csrf
                            <label for="">Укажите дату в данном формате:</label>
                            <input type="text" value="2022-05-01T00:00:00.000Z" name="dateFrom">
                            <input type="text" value="1" placeholder="0 или 1" name="flag">
                            <button onclick="javascript:return confirm('СТАРЫЕ ДАННЫЕ БУДУТ ОБНОВЛЕНЫ!!! Вы уверены?');">ВЫГРУЗИТЬ ДАННЫЕ</button>
                        </form>
                    </div>	
                </div>

                <div class="col-8">
                    <div class="note">                         
                        <div class="note__link"><a href="/show-sales">Показать данные</a></div>
                        <h2 class="note__title">Распродажи(sales)</h2>
                        <p class="note__right">
                           <p>Описание таблицы</p>
                        </p>
                        <form action="/create-sales" method="POST" class="note__form">
                            @csrf
                            <label for="">Укажите дату в данном формате:</label>
                            <input type="text" value="2022-05-01T00:00:00.000Z" name="dateFrom">
                            <input type="text" placeholder="0 или 1" name="flag">
                            <button onclick="javascript:return confirm('СТАРЫЕ ДАННЫЕ БУДУТ ОБНОВЛЕНЫ!!! Вы уверены?');">ВЫГРУЗИТЬ ДАННЫЕ</button>
                        </form>
                    </div>	
                </div>

                <div class="col-8">
                    <div class="note">                         
                        <div class="note__link"><a href="/show-sales-reports">Показать данные</a></div>
                        <h2 class="note__title">Отчёты о продажах</h2>
                        <p class="note__right">
                           <p>Описание таблицы</p>
                        </p>
                        <form action="/create-sales-reports" method="POST" class="note__form">
                            @csrf
                            <label for="">Укажите границы временного интервала в данном формате:</label>
                            <input type="text" value="2022-05-01T00:00" name="dateFrom">
                            <input type="text" value="2022-07-14T00:00" name="dateTo">
                            <input type="text" name="limit" placeholder="Максимальное число строк">
                            <input type="text" placeholder="Уникальный идентификатор" name="rrdid">
                            <button onclick="javascript:return confirm('СТАРЫЕ ДАННЫЕ БУДУТ ОБНОВЛЕНЫ!!! Вы уверены?');">ВЫГРУЗИТЬ ДАННЫЕ</button>
                        </form>
                    </div>	
                </div>

                <div class="col-8">
                    <div class="note">                         
                        <div class="note__link"><a href="/show-excises-reports">Показать данные</a></div>
                        <h2 class="note__title">Отчёт по кизам</h2>
                        <p class="note__right">
                           <p>Описание таблицы</p>
                        </p>
                        <form action="/create-excises-reports" method="POST" class="note__form">
                            @csrf
                            <label for="">Укажите дату в данном формате:</label>
                            <input type="text" value="2022-05-01T00:00" name="dateFrom">
                            <button onclick="javascript:return confirm('СТАРЫЕ ДАННЫЕ БУДУТ ОБНОВЛЕНЫ!!! Вы уверены?');">ВЫГРУЗИТЬ ДАННЫЕ</button>
                        </form>
                    </div>	
                </div>

            </div>
        </div>
    </div>

    
    <script src="js/bootstrap.js"></script>
</body>
</html>