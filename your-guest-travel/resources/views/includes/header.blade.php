<header>
    <nav class="navbar navbar-expand-lg navbar-light">

        <div class="collapse navbar-collapse" id="navbar">
            <a href="/" class="navbar-brand">
                <img src="/img/logo.png" alt="logomarca">
            </a>
            <div class="container">

                <div class="row height d-flex justify-content-center align-items-center">

                    <div class="col-md-8">

                        <div class="search">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control" placeholder="O que procuras?">
                            <button class="btn btn-primary">Search</button>
                        </div>

                    </div>

                </div>
            </div>



            <li class="nav-item dropdown">
                <a data-bs-toggle="dropdown" href="#"><img class="icone-perfil" src="img/icon-perfil.png" alt="perfil"
                                                           style="width: 45%"></a>

                <ul class="dropdown-menu">
                    <li><a class="dropdown" href="#">Config. Perfil</a></li>
                    <li><a class="dropdown" href="#">Link 2</a></li>
                    <li><a class="dropdown" href="#"><img class="icone-perfil" src="img/logout.png" alt="logout"
                                                          style="width: 35%">Logout</a></li>
                </ul>
            </li>

        </div>
    </nav>
</header>

<style>
    .botao_menu {
        background-color: transparent;
        border: none;
    }

    .nav-item img {
        width: 10px;
    }

    .dropdown-menu {
        text-align: right;
    }

    .dropdown-menu li a {
        text-decoration: none;
        padding: 20px;
    }

    /** Search*/

    .search{
        position: relative;
        box-shadow: 0 0 40px rgba(51, 51, 51, .1);
    }

    .search input{
        height: 50px;
        text-indent: 25px;
        border: 2px solid #d6d4d4;
    }

    .search input:focus{
        box-shadow: none;
        border: 2px solid blue;
    }

    .search .fa-search{
        position: absolute;
        top: 20px;
        left: 16px;
    }

    .search button{
        position: absolute;
        top: 5px;
        right: 5px;
        height: 40px;
        width: 110px;
        background: blue;
    }

</style>
