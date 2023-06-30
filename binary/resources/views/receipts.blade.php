<html>
	<head>
      <title>Challan</title>
      <style>
         .print_section td
		 {
			/*border: 1px solid #000;*/
			margin:7px 2px 5px 24px;
			font-size: 13px;
			height:auto;
			vertical-align: middle;
			border-collapse: collapse;
			font-family: arial, sans-serif;
			text-transform: ;
         }
         .print_section .head h4
		 {
			font-size: 15px;
         }
         table{
             border: 1px solid #000;
         }
      </style>
   </head>
	<body>
	    <button onclick="window.print()">Print</button>
		<div class="print_section">
			<div class="container">
			    <?php
			        $i=0;
			        $count=0;
			    ?>
			    @foreach($Payouts as $row)
			    <?php $i++;?>
			   @if($row->payout_amount != 0)
			    <?php
			    $count++;
			    if($count==4){
			        echo "<p style='page-break-after: always;'>&nbsp;</p>";
			        $count=1;
			    }
			    
			    ?>
				<table width="700px" height="300px" border="0" style="border-collapse:collapse;">
				    <tr><td colspan="2" style="padding-left: 25px;"><strong>14 Payout</strong></td></tr>
					<tr><td colspan="2"><center><b>JP PRODUCTION</b><br/>
					Barnali Enterprise, ATM Complex, Guwahati: 781003<br/>
					6901571821/6901571820<br/>
					<b><u>Receipt</u></b></center></td></tr>
					<?php
                    $date=date_create($row->payout_date);
                    $fd = date_format($date,"d/m/Y");
                    ?>
					<tr><td width="350px"></td><td width="350px;" style="padding-left:100px"><u>Date: 31/10/2019</u></td></tr>
					<tr>
					    <td style="padding-left:25px">No: {{$i}}<br/>
					    Member ID: <strong>{{$row->username}}</strong></br>
					    Name: <strong>{{$row->full_name}}</strong></br>
					    Phone: <strong>{{$row->phone}}</strong><br/>
					    Address: {{$row->address}}</td>
					    <td style="padding-left:100px">
					        Binary: L- {{$row->leftcount}} | R- {{$row->rightcount}} <br/>
					        Sponsor: {{Member::getTotalSponsored($row->id)}} <br/> 
					        Binary Income: Rs. <strong>{{$row->payout_amount-$row->sponsor_amount}}.00</strong></br>
					        Sponsor Income: Rs. <strong>{{$row->sponsor_amount}}</strong></br>
					        <hr/>
					        <b>Total: Rs. {{$row->payout_amount}}</b></br/>
					        
					    </td>
					</tr>
				</table>
				<br/><br/>
				@endif
				@endforeach
			</div>
		</div>
	</body>
</html>