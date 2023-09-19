<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
  
    <table>
        <thead>
            <th>Invoice Date</th>
            <th>Tax Amount</th>
            <th>Invoice Amount</th>
        </thead>
        <tbody>
            <tr>
                <td>{{ $mailData['invoice_date'] }}</td>
                <td>{{ $mailData['tax_amount'] }}</td>
                <td>{{ $mailData['invoice_amount'] }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ asset($maildata['filename']) }}" download>Download File</a>

     
    <p>Thank you</p>
</body>
</html>