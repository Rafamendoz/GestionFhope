<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 20px;
      margin: 0;
    }
    
    .container {
      max-width: 400px;
      margin: 0 auto;
      border: 1px solid #ccc;
      padding: 20px;
    }
    
    h1 {
      text-align: center;
      margin-top: 0;
    }
    
    .receipt-info {
      margin-top: 20px;
      display: flex;
      justify-content: space-between;
      font-size: 14px;
    }
    
    .receipt-info span {
      display: block;
    }
    
    .receipt-table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }
    
    .receipt-table th,
    .receipt-table td {
      padding: 10px;
      border-bottom: 1px solid #ccc;
    }
    
    .receipt-table th {
      background-color: #f2f2f2;
      font-weight: bold;
    }
    
    .receipt-table td:last-child {
      text-align: right;
    }
    
    .total-row {
      font-weight: bold;
    }
    
    .footer {
      margin-top: 20px;
      text-align: center;
      font-size: 12px;
      color: #777;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Recibo</h1>
    
    <div class="receipt-info">
      <span>Fecha: 29 de mayo de 2023</span>
      <span>No. de recibo: 00123</span>
    </div>
    
    <table class="receipt-table">
      <thead>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
          <th>Precio</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Producto 1</td>
          <td>2</td>
          <td>$10.00</td>
          <td>$20.00</td>
        </tr>
        <tr>
          <td>Producto 2</td>
          <td>1</td>
          <td>$15.00</td>
          <td>$15.00</td>
        </tr>
        <tr class="total-row">
          <td colspan="3">Total:</td>
          <td>$35.00</td>
        </tr>
      </tbody>
    </table>
    
    <div class="footer">
      ¡Gracias por su compra!
    </div>
  </div>
</body>
</html>



