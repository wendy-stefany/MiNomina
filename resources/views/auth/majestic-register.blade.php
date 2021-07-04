
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mi Nomina</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="http://minomina.test/css/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="http://minomina.test/css/vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="http://minomina.test/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon"  href="http://minomina.test/images/logo-mini.svg" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
              <img src="http://minomina.test/images/logo.svg" alt="logo">
              </div>
              <h4>¿Nuevo aquí?</h4>
              <h6 class="font-weight-light">¡Únete a nosotros hoy! Solo toma unos pocos pasos</h6>
              @include('parciales.form-errors')
            <form method="POST" action="{{ route('register') }}">
            @csrf        
            <div class="form-group">
                  <label>Nombre completo</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0" for="name" value="Name" >
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" 
                    placeholder="Jose"  id="name" name="name" :value="old('name')" required>
                  </div>
                </div>
                <div class="form-group">
                  <label>Correo electrónico</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0" for="email" value="Email">
                        <i class="mdi mdi-email-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control form-control-lg border-left-0" 
                    placeholder="Jose@ejemplo.com" id="email" name="email" :value="old('email')" required>
                  </div>
                </div>
                <!-- <div class="form-group">
                  <label>Telefono</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0" for="name" value="Name" >
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="tel" class="form-control form-control-lg border-left-0" 
                    placeholder="3316942368"  id="telefono" name="telefono" :value="old('telefono')" required>
                  </div>
                </div>
                <div class="form-group">
                  <label>Numero de empleado</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0" for="name" value="Name" >
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="text" class="form-control form-control-lg border-left-0" 
                    placeholder="100536987"  id="empleado_id" name="empleado_id" :value="old('empleado_id')" required>
                  </div>
                </div> -->
                <div class="form-group">
                  <label>Contraseña</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0" for="password" value="Password" >
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0"  
                    id="password" name="password" placeholder="*******" required>                        
                  </div>
                </div>
                <div class="form-group">
                  <label>Confirma Contraseña</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0" for="password_confirmation"  value="Confirm Password">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0"  
                    id="password_confirmation" name="password_confirmation" placeholder="*******" required>                        
                  </div>
                </div>
                
                <div class="mt-3">
                <button
                   class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Register
                </button>
                </div>
              </form>
              <div class="text-center mt-4 font-weight-light">
                ¿Ya tienes una cuenta? <a href="/login" class="text-primary"> Iniciar secion</a>
                </div>
            </div>
          </div>
          <div class="col-lg-6 register-half-bg d-flex flex-row">
            <p class="text-white font-weight-medium text-center flex-grow align-self-end">Mi Nomina &copy; 2021.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="http://minomina.test/css/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="http://minomina.test/js/off-canvas.js"></script>
  <script src="http://minomina.test/js/hoverable-collapse.js"></script>
  <script src="http://minomina.test/js/template.js"></script>
  <!-- endinject -->
</body>

</html>
