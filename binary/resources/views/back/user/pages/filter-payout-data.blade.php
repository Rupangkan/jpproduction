<table id="table-basic" class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Member ID</th>
            <th>Last Payout Date</th>
            <th>Last Payout Amount</th>
            <th>Total Payout</th>
        </tr>
    </thead>
    <tbody>
        <?php $i=1; ?>
        @foreach($payouts as $payout)
        <tr class="odd gradeX">
            <td>{{$i}}</td>
            <td>{{Member::getMember($payout->member_code)->mem_code}}</td>
            <td>{{$payout->last_payout_date}}</td>
            <td class="center">{{$payout->last_payout_amount}}</td>
            <td class="center">{{$payout->total_payout_amount}}</td>
        </tr>
        <?php $i++; ?>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <th>#</th>
            <th>Member ID</th>
            <th>Last Payout Date</th>
            <th>Last Payout Amount</th>
            <th>Total Payout</th>
        </tr>
    </tfoot>
</table>

<script type="text/javascript">
    $('#table-basic').dataTable({
        dom: 'Bfrtip',
        buttons: ['copy','csv','excel','pdf','print']
    });
</script>