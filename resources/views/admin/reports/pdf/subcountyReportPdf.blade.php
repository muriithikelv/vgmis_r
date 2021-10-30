<!DOCTYPE html>
<html lang="en">

<head>
	<title>SubCounty Report</title>
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
							<td style="border: 0px;width: 30%"><strong>Sub-County Name:</strong></td>
							<td style="border: 0px">
								<strong>{{$sub_county_name}}</strong>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
        <div class="table-responsive">
            <table id="" class="table table-bordered">
                <thead class="tr_header">
                <tr>
                    <th style="width:100px;">S/L</th>
                    <th>Sacco Name</th>
                    <th>Description</th>
                    <th>Number of male members</th>
                    <th>Number of female members</th>

                </tr>
                </thead>
                <tbody>
                    @if(count($results) > 0)
                        {{$sl=null}}
                        @foreach($results as $value)
                        <tr>
                            <td>{{++$sl}}</td>
                            <td>{{$value->sacco_name}}</td>
                            <td>{{$value->description}}</td>
                            <td>{{$value->male_members}}</td>
                            <td>{{$value->female_members}}</td>
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