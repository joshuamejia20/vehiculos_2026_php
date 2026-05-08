<div class="login-box">
    <div class="login-logo">
        <a href="javascript:void(0)"><b>
            UCAD 3000</b>
        </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Iniciar Sesión</p>

            <form id="frm_login" name="frm_login" onsubmit="return false" autocomplete="off">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Usuario" id="user" name="user">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Clave" id="pass" name="pass">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block" id="btn_login" name="btn_login">
                           <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>

<script src="app/controllers/login.js"></script>