<!DOCTYPE html>
 <html>
 
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <title>ESYS admin panel</title>
   <!-- Favicon -->
   <link rel="icon" href="../../assets/img/brand/favicon.png" type="image/png">
   <!-- Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
   <!-- Icons -->
   <link rel="stylesheet" href="../../assets/vendor/nucleo/css/nucleo.css" type="text/css">
   <link rel="stylesheet" href="../../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
   <!-- Argon CSS -->
   <link rel="stylesheet" href="../../assets/css/argon.css?v=1.1.0" type="text/css">
 </head>
 
 <body class="bg-default">
   <!-- Main content -->
   <div class="main-content">
     <!-- Header -->
     <div class="header bg-gradient-primary py-7">
       <div class="container">
         <div class="header-body text-center mb-6">
           <div class="row justify-content-center">
               <h1 class="text-white">Evolution systems</h1>
             </div>
           </div>
         </div>
       </div>
       <div class="separator separator-bottom separator-skew zindex-100">
         <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
           <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
         </svg>
       </div>
     </div>
     <!-- Page content -->
     <div class="container mt--8">
       <div class="row justify-content-center">
         <div class="col-lg-5 col-md-7">
           <div class="card bg-secondary border-0">
             <div class="card-body px-lg-5 py-lg-5">
               <form method="POST" action="{{ route('post-login') }}" role="form">
                @csrf
                 <div class="form-group mb-3">
                   <div class="input-group input-group-merge input-group-alternative">
                     <div class="input-group-prepend">
                       <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                     </div>
                     <input class="form-control" placeholder="Электронная почта" type="email" name="email">
                     @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                   </div>
                 </div>
                 <div class="form-group">
                   <div class="input-group input-group-merge input-group-alternative">
                     <div class="input-group-prepend">
                       <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                     </div>
                     <input class="form-control" placeholder="Пароль" type="password" name="password">
                     @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                   </div>
                 </div>
                 <div class="text-center">
                   <button type="submit" class="btn btn-default my-4">Войти</button>
                 </div>
               </form>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </body>
 
 </html>
