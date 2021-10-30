<!DOCTYPE html>
<html lang="en">

<head>
	<title>Savings Report</title>
	<meta charset="utf-8">
</head>
<style>
	table {
		margin: 0 0 40px 0;
		width: 100%;
		box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
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
		border: 1px solid black;
	}

	td {
		padding: 5px;
	}

	th {
		padding: 5px;
	}
</style>

<body>
	<div class="printHead">
		@if(isset($printHead))
		{!! $printHead->description !!}
		@endif
		<br>
		<br>
	</div>
	<div class="container">
		<table style="border: 0px;box-shadow: 0 0px 0px;margin:0 0 20px 0">
			<tr style="border: 0px">
				<td style="padding: 0px;border: 0px">
					<table style="border: 0px;box-shadow: 0 0px 0px;margin:0px">
						<tr style="border: 0px">
							<td style="border: 0px;width: 30%"><strong>Group Name:</strong></td>
							<td style="border: 0px">
								<strong>{{$sacco_name}}</strong>
							</td>
						</tr>
					</table>
				</td>
				<td style="padding: 0px;border: 0px">
					<table style="border: 0px;box-shadow: 0 0px 0px;margin:0px">
						<tr style="border: 0px">
							<td style="border: 0px;width: 40%"><strong>From Date:</strong></td>
							<td style="border: 0px">
								<strong>{{$from_date}}</strong>
							</td>
						</tr>
					</table>
				</td>
				<td style="padding: 0px;border: 0px">
					<table style="border: 0px;box-shadow: 0 0px 0px;margin:0px">
						<tr style="border: 0px">
							<td style="border: 0px;width: 40%"><strong>To Date:</strong></td>
							<td style="border: 0px"><strong>{{$to_date}}</strong></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div class="table-responsive">
            <table id="" class="table table-bordered">
                <thead class="tr_header">
                <tr>
                    <th>Sacco Name</th>
                    <th>Date started saving</th>
                    <th>Savings balance</th>
                    {{-- <th>County</th> --}}

                </tr>
                </thead>
                <tbody>
                    @if(count($results) > 0)
                        {{$sl=null}}
                        @foreach($results as $value)
                        <tr>
                            <td>{{$value->sacco_name}}</td>
                            <td>{{$value->date_started_saving}}</td>
                            <td>{{$value->value_of_savings}}</td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8">No data have found !</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

</body>

</html>