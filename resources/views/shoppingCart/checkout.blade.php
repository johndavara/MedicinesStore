
@extends('layouts.app')

@section('content')

<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="/images/checkout.png" alt="" width="72" height="72">
        <h2>Formulario de pago</h2>
        <p class="lead">Facturacion.</p>
      </div>

      <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Su carrito</span>
            <span class="badge badge-secondary badge-pill">{{$products->count()}}</span>
          </h4>
          <ul class="list-group mb-3">
            @foreach ($products as $product)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$product->name}}</h6>
                <small class="text-muted">{{$product->description}}</small>
              </div>
              <span class="text-muted">₡{{$product->price}}</span>
            </li>
            @endforeach

          </ul>

          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <div class="input-group-append">
                <button type="submit" class="btn btn-secondary">Redimir</button>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-8 order-md-1">
          <h4 class="mb-3">Direccion de facturacion</h4>
          <form class="needs-validation" novalidate="">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nombre</label>
                <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Un nombre valido es obligatorio.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Apellido(s)</label>
                <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                <div class="invalid-feedback">
                  Un apellido válido es obligatorio.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="username">Nombre de usuario</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">@</span>
                </div>
                <input type="text" class="form-control" id="username" placeholder="Username" required="">
                <div class="invalid-feedback" style="width: 100%;">
                  Tu nombre de usuario es obligatorio.
                </div>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Correo <span class="text-muted">(Opcional)</span></label>
              <input type="email" class="form-control" id="email" placeholder="you@example.com">
              <div class="invalid-feedback">
                Por favor, introduzca una dirección de correo electrónico válida para las actualizaciones de envío.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Direccion</label>
              <input type="text" class="form-control" id="address" placeholder="1234 Main St" required="">
              <div class="invalid-feedback">
                Por favor ingrese la direccion de envio.
              </div>
            </div>

            <div class="mb-3">
              <label for="address2">Direccion 2 <span class="text-muted">(Opcional)</span></label>
              <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
            </div>

            <div class="row">
              <div class="col-md-5 mb-3">
                <label for="country">Pais</label>
                <select class="custom-select d-block w-100" id="country" required="">
                  <option value="">Elija...</option>
                  <option>Costa Rica</option>
                </select>
                <div class="invalid-feedback">
                  Por favor seleccione un pais.
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="state">Provincia</label>
                <select class="custom-select d-block w-100" id="state" required="">
                  <option value="">Elija...</option>
                  <option>San Jose</option>
                  <option>Alajuela</option>
                  <option>Cartago</option>
                  <option>Heredia</option>
                  <option>Puntarenas</option>
                  <option>Limon</option>
                  <option>Guanacaste</option>
                </select>
                <div class="invalid-feedback">
                  Por favor provea una provincia valida.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="zip">Codigo postal</label>
                <input type="text" class="form-control" id="zip" placeholder="" required="">
                <div class="invalid-feedback">
                  Codigo postal requerido.
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">La dirección de envío es la misma que mi dirección de facturación</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Guarde esta información para la próxima vez</label>
            </div>
            <hr class="mb-4">

            <h4 class="mb-3">Forma de pago</h4>

            <div class="d-block my-3">
              <div class="custom-control custom-radio">
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit">Tarjeta de credito</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit">Tarjeta de debito</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="paypal">Paypal</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name">Nombre en la tarjeta</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                <small class="text-muted">Nombre completo como en la tarjeta</small>
                <div class="invalid-feedback">
                  Nombre en la tarjeta de credito es requerido
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number">Numero de tarjeta de credito</label>
                <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                <div class="invalid-feedback">
                  Numero de tarjeta de credito es requerido
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">Expira</label>
                <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                <div class="invalid-feedback">
                  Fecha de expiracion es requerida
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                <div class="invalid-feedback">
                  Codigo de seguridad es requerido
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continuar al Pago</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">© 2017-2018 Medicine Health Store</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacidad</a></li>
          <li class="list-inline-item"><a href="#">Terminos</a></li>
          <li class="list-inline-item"><a href="#">Soporte</a></li>
        </ul>
      </footer>
    </div>

@endsection