<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Monstrous Light Order Invoice # {{$data['order']['id']}}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>
<table  style="width:100%">
  <tr style="width:100%">
    <td style="width:70%">
      <img src="img/logo.png" style="width:180px">
    </td>
    <td style="width:15%">
    
   
    </td>
    <td style="width:15%;">
    <span style="font-size:24px; font-weight:bold;">INVOICE</span><br/>
    </td>
  </tr>
  <tr>
  <td style="width:70%">
      <p>
        www.monstrouslightgames.co.uk<br/>
        167 Stamford Street Central<br/> Ashton-under-Lyne<br/>
        OL6 6XW<br/>
        0161 330 7609<br/>
    </p>
    </td>
    <td style="width:15%">
    Invoice No: <br/>
    Date: <br/>
    Time: <br/>
    </td>
    <td style="width:15%;">
    
    {{$data['order']['id']}}<br/>
    {{$data['date']}}<br/>
    {{$data['time']}}<br/>
    
    </td>
  </tr>
  <tr>
  <td style="width:70%">
        anemailaddress@monstrouslightgames.co.uk<br/>
        VAT Registration # ????
  </td>
  </table>

  <table style="width:100%; margin-top:15px;">
  <tr style="width:100%; background-color:#b100cd; font-weight:bold; color:#FFF;">
    <td style="width:50%; padding:2px 5px 5px 10px;">
      Billing Address
    </td>
    <td style="width:50%; padding:2px 5px 5px 10px;">
      Shipping Address
    </td>
</tr>
<tr style="width:100%;">
    <td style="width:50%; padding:2px 5px 5px 10px;">
    {{$data['order']['billing_name']}}<br/>
    {{$data['order']['address_line_1']}}<br/>
    {{$data['order']['address_line_2']}}<br/>
    {{$data['order']['city']}}<br/>
    {{$data['order']['county']}}<br/>
    {{$data['order']['postcode']}}<br/>
    </td>
    <td style="width:50%; padding:2px 5px 5px 10px;">
    {{$data['order']['billing_name']}}<br/>
    {{$data['order']['address_line_1']}}<br/>
    {{$data['order']['address_line_2']}}<br/>
    {{$data['order']['city']}}<br/>
    {{$data['order']['county']}}<br/>
    {{$data['order']['postcode']}}<br/>
    </td>
</tr>
</table>
<table style="width:100%; margin-top:15px;">
  <tr style="width:100%; background-color:#b100cd; font-weight:bold; color:#FFF;">
    <td style="width:15%; padding:2px 5px 5px 10px;">
      Code
    </td>
    <td style="width:45%; padding:2px 5px 5px 10px;">
      Product Name
    </td>
    <td style="width:10%; padding:2px 5px 5px 10px;">
     Qty
    </td>
    <td style="width:18%; padding:2px 5px 5px 10px;">
     Unit Price
    </td>
    <td style="width:12%; padding:2px 5px 5px 10px;">
     Total
    </td>
  </tr>
  @foreach($data['order']['products'] as $product)
  <tr style="width:100%;">
    <td style="width:15%; padding:2px 5px 5px 10px;">
     {{$product['product_code']}}
    </td>
    <td style="width:45%; padding:2px 5px 5px 10px;">
    {{$product['title']}}
    </td>
    <td style="width:10%; padding:2px 5px 5px 10px;">
    {{$product['pivot']['quantity']}}
    </td>
    <td style="width:18%; padding:2px 5px 5px 10px;">
    &pound;{{number_format($product['sell_price'], 2)}}
    </td>
    <td style="width:12%; padding:2px 5px 5px 10px;">
    &pound;{{number_format($product['pivot']['quantity'] * $product['sell_price'],2)}}
    </td>
  </tr>
  @endforeach
  <tr style="width:100%;">
    <td style="width:15%; padding:2px 5px 5px 10px;">
    
    </td>
    <td style="width:45%; padding:2px 5px 5px 10px;">
  
    </td>
    <td style="width:10%; padding:2px 5px 5px 10px;">
  
    </td>
    <td style="width:18%; padding:2px 5px 5px 10px; font-weight:bold;">
    Sub Total
    </td>
    <td style="width:12%; padding:2px 5px 5px 10px; font-weight:bold;">
    &pound;{{number_format($data['order']['total'] - $data['order']['tax'],2)}}
    </td>
  </tr>
  <tr style="width:100%;">
    <td style="width:15%; padding:2px 5px 5px 10px;">
    
    </td>
    <td style="width:45%; padding:2px 5px 5px 10px;">
  
    </td>
    <td style="width:10%; padding:2px 5px 5px 10px;">
  
    </td>
    <td style="width:18%; padding:2px 5px 5px 10px; font-weight:bold;">
    Shipping
    </td>
    <td style="width:12%; padding:2px 5px 5px 10px; font-weight:bold;">
    &pound;0.00
    </td>
  </tr>
  <tr style="width:100%;">
    <td style="width:15%; padding:2px 5px 5px 10px;">
    
    </td>
    <td style="width:45%; padding:2px 5px 5px 10px;">
  
    </td>
    <td style="width:10%; padding:2px 5px 5px 10px;">
  
    </td>
    <td style="width:18%; padding:2px 5px 5px 10px; font-weight:bold;">
    VAT (20%)
    </td>
    <td style="width:12%; padding:2px 5px 5px 10px; font-weight:bold;">
    &pound;{{number_format($data['order']['tax'], 2)}}
    </td>
  </tr>
  <tr style="width:100%;">
    <td style="width:15%; padding:2px 5px 5px 10px;">
    
    </td>
    <td style="width:45%; padding:2px 5px 5px 10px;">
  
    </td>
    <td style="width:10%; padding:2px 5px 5px 10px;">
  
    </td>
    <td style="width:18%; padding:2px 5px 5px 10px; font-weight:bold;">
    Total
    </td>
    <td style="width:12%; padding:2px 5px 5px 10px; font-weight:bold;">
    &pound;{{number_format($data['order']['total'],2)}}
    </td>
  </tr>
</table>
<div style="height:5px; width:100%; background-color:#dadada; margin: 10px 0;"></div>



</div>
</div>
    <p>
   {{$data['order']}}
    </p>

</body>

</html>
