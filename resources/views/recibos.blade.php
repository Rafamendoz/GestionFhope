<!DOCTYPE html>
<html>
<head>
  <title>Factura térmica</title>
    <style>
      body {
        font-family: "Courier New", monospace;
        font-size: 12px;
        margin: 0;
        padding: 0;
      }


      .header {
        text-align: center;
        margin-bottom: 20px;
      }


      .title {
        font-weight: bold;
        font-size: 16px;
      }


      .address, .contact {
        margin-bottom: 5px;
      }


      .content {
        margin-bottom: 10px;
      }


      .customer-info, .invoice-info {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
      }


      .info-label {
        font-weight: bold;
      }


      .item-table {
        width: 100%;
        border-collapse: collapse;
      }


      .item-table th, .item-table td {
        border: 1px solid #000;
        padding: 5px;
      }


      .item-table th {
        background-color: #f0f0f0;
        text-align: left;
      }


      .item-table td {
        text-align: right;
      }


      .total-row {
        font-weight: bold;
      }
      

    </style>
</head>
<body>
  <div class="header">
    <div class="title">Recibo de Compra</div>
    <hr>
    <div class="address">Fhope Company</div>
    <hr>
    <div class="contact">Teléfono: +504 8920-3439</div>
    <div class="contact">Correo Electrónico: info@fhope.online</div>
    <div class="contact">Pago: Contado</div>

  </div>
    <hr>
  <div class="content">
    @foreach ($cabecera as $valor)
      <div class="customer-info">
        <div class="info-label">Cliente:</div>
        <div class="info-value">{{$valor->cliente_nom}}</div>
      </div>
      <div class="customer-info">
        <div class="info-label">Codigo Cliente:</div>
        <div class="info-value">{{$valor->cliente_id}}</div>
      </div>
      <div class="invoice-info">
        <div class="info-label">Nº de Orden:</div>
        <div class="info-value">{{$valor->id}}</div>
      </div>
      <div class="customer-info">
        <div class="info-label">Usuario generador:</div>
        <div class="info-value">{{$valor->user}}</div>
      </div>
      <div class="customer-info">
        <div class="info-label">Fecha de Impresion:</div>
        <div class="info-value">{{$valor->date}}</div>
      </div>
      <div class="customer-info">
        <div class="info-label">Hora de Impresion:</div>
        <div class="info-value">{{$valor->hour}}</div>
      </div>
      <div class="customer-info">
        <div class="info-label">Direccion de Envio:</div>
        <div class="info-value">{{$valor->direccionEnvio}}</div>
      </div>
    @endforeach
  </div>
  

  <table class="item-table">
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Precio</th>
        <th>descuento</th>
        <th>Subtotal</th>
      </tr>
    </thead>
    <tbody>
        @foreach($data as $valor)
      <tr>
        <td>{{$valor->producto_nom}}</td>
        <td>{{$valor->cantidad}}</td>
        <td>L {{$valor->precio}}</td>
        <td>L {{$valor->descuento}}</td>
        <td>L {{$valor->subtotal}}</td>
      </tr>
      @endforeach
 
    </tbody>
    <tfoot>
      @foreach ($cabecera as $valor)
      <tr class="total-row">
        <td colspan="3">Total:</td>
        <td>L.{{$valor->total}}</td>
      </tr>
      @endforeach
    </tfoot>
  </table>
</body>
</html>




