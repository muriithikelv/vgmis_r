<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice - #123</title>

    <style type="text/css">
        @page {
            margin: 0px;
        }/*
        body {
            margin: 0px;
        }
        * {
            font-family: Verdana, Arial, sans-serif;
        } */
        .information {
            background-color: #ae9ada;
            color: #FFF;
        }
        .information .logo {
            margin: 5px;
        }
        .information table {
            padding: 10px;
        }
        table {
		margin: 0 0 40px 0;
		width: 100%;/*
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2); */
		display: table;
		border-collapse: collapse;
	}

	.printHead {
		width: 35%;
		margin: 0 auto;
	}

	table,
	td,
	th {
		/* border: 1px solid black; */
	}

	td {
		padding: 5px;
	}

	th {
		padding: 5px;
	}
    </style>

</head>
<body>

<div class="information">
    <table width="100%">
        <tr>
            <td align="left" style="width: 40%;">
                <h3>Sold By:{{ucfirst($username)}}</h3>
                <h3>Bought By:{{ucfirst($bought_by)}}</h3>
                <h3>Invoice Number::{{ucfirst($invoice_number)}}</h3>
                <pre>
{{-- Street 15
123456 City
United Kingdom --}}
<br /><br />
Bought On Date: {{$date_bought}}
Status: Pay on delivery
</pre>


            </td>
           {{--  <td align="center">
                <img src="/path/to/logo.png" alt="Logo" width="64" class="logo"/>
            </td> --}}
            <td align="right" style="width: 40%;">

                <h3>VGMIS</h3>
                <pre>
                    {{-- https://company.com --}}
{{--
                    Street 26
                    123456 City
                    United Kingdom --}}
                </pre>
            </td>
        </tr>

    </table>
</div>


<br/>

<div class="table-responsive">
    <table id="" class="table table-bordered">
        <thead class="tr_header">
            <tr>
                <th style="border: 1px solid black;">Product</th>
                <th style="border: 1px solid black;">Description</th>
                <th style="border: 1px solid black;">Quantity</th>
                <th style="border: 1px solid black;">Delivery Cost</th>
                <th style="border: 1px solid black;">Price</th>
                <td style="border: 1px solid black;">Total</td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="border: 1px solid black;">{{$product}}</td>
                <td style="border: 1px solid black;">{{$description}}</td>
                <td style="border: 1px solid black;">1</td>
                <td style="border: 1px solid black;">{{$delivery_cost}}</td>
                <td style="border: 1px solid black;">KSH.{{$price}}</td>
                <td style="border: 1px solid black;">KSH.{{$price + $delivery_cost}}</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="information" style="position: absolute; bottom: 0;">
    <table width="100%">
        <tr>
            <td align="left" style="width: 50%;">
                &copy; {{ date('Y') }} {{ config('app.url') }} - All rights reserved.
            </td>
            <td align="right" style="width: 50%;">
                VGMIS
            </td>
        </tr>

    </table>
</div>
</body>
</html>