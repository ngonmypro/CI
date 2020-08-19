
    <div class="chart">
     <canvas id="userchart"></canvas>
    </div>
<script>
    var ctx = document.getElementById("userchart");
var userchart = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ["","สัญญา", "ส่งของ" , "เก็บเงิน"],
        datasets: [{
          labels: ["","สัญญา", "ส่งของ" , "เก็บเงิน"],
            label: 'ภาพรวมโครงการ',
            data: [ '0','100','80','60'
            <?php/* $sql2 = " SELECT * FROM tblactivity,tblcheck WHERE `act_id`= '".$_GET['actid']."'  AND chk_actid = act_id  AND chk_status >= act_check";
             $results2 = selectSql($sql2);
             echo $count_row2 = count($results2);
             echo ',';

              $sql3 = " SELECT * FROM tblactivity,tblcheck WHERE `act_id`= '".$_GET['actid']."'  AND chk_actid = act_id  AND chk_status < act_check";
              $results3 = selectSql($sql3);
              echo $count_row3 = count($results3); */?>
            ],
            backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
              'rgba(255,99,132,1)',
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: .4
        }]
    }
});
</script>
