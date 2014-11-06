<?php include('array_ping.php');?>        <!--  為有start session 必須擺在最上面 -->        
<!doctype html>

<html lang="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
  <script type="text/javascript" src="http://cdn.hcharts.cn/jquery/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="http://cdn.hcharts.cn/highcharts/highcharts.js"></script>
  <script type="text/javascript" src="http://cdn.hcharts.cn/highcharts/exporting.js"></script>
  <script type="text/javascript" src="js.js"></script>
  <script type="text/javascript">

    $(function () {
      var value_x = new Array();
      var value_y = new Array();
      var value_z = new Array();
      var value_t = new Array();
      var jasonstr;
      var jasonstr1;
      var jasonstr2;
      var jasonstr3;

      jasonstr=<?php echo "$str";?>;      //javascripe引入PHP正確用法
      jasonstr1=<?php echo "$str1";?>;    //transferred
      jasonstr2=<?php echo "$str2";?>;    //x軸time
      jasonstr3=<?php echo "$str3";?>
      
      // document.write(jasonstr2);
      for (var key in jasonstr) {
          value_x[key]=parseInt(jasonstr[key]);       //key有幾個  value_x[key]就有幾筆資料
          value_x[key]=value_x[key];
      // document.write(key);
      //document.write(value_x[key]);
      }
      for (var key1 in jasonstr1) {
          value_y[key1]=parseInt(jasonstr1[key1]);       //key有幾個  value_x[key]就有幾筆資料
          value_y[key1]=value_y[key1];
      // document.write(key1);
      //document.write(value_y[key1]);
      }
      for (var key2 in jasonstr1) {
          value_z[key2]=parseInt(jasonstr2[key2]);       //key有幾個  value_x[key]就有幾筆資料
          value_z[key2]=value_z[key2];
      // document.write(key1);
      //document.write(value_y[key1]);
      }
      for (var key3 in jasonstr3) {
          value_t[key3]=parseInt(jasonstr3[key3]);       //key有幾個  value_x[key]就有幾筆資料
          value_t[key3]=value_t[key3]+'時';
      //document.write(key2);
      //document.write(value_t[key2]);
      }
      //document.write(key);
      //document.write(value_x[key]);
    $('#container').highcharts({
        title: {
            text: 'NFU student speed test',
            x: -20 //center
        },
        subtitle: {
            text: 'ping_data',
            x: -20
        },
        xAxis: {
            categories: [value_t[0],value_t[1],value_t[2],value_t[3],value_t[4],value_t[5],value_t[6],value_t[7],value_t[8],value_t[9],value_t[10],value_t[11],
                         value_t[12],value_t[13],value_t[14],value_t[15],value_t[16],value_t[17],value_t[18],value_t[19],value_t[20],value_t[21],value_t[22],
                         value_t[23],value_t[24]]   //categories: [value_x[0]]  可以成功
        },
        yAxis: {
            title: {
                text: 'ms'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'ms'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'rtt_min',
            data: [value_x[0],value_x[1],value_x[2],value_x[3],value_x[4],value_x[5],value_x[6],value_x[7],value_x[8],value_x[9],value_x[10],value_x[11],value_x[12],value_x[13],value_x[14],value_x[15],value_x[16],
                   value_x[17],value_x[18],value_x[19],value_x[20],value_x[21],value_x[22],value_x[23],value_x[24]]
        },
        {
            name: 'rtt_avg',
            data:  [value_y[0],value_y[1],value_y[2],value_y[3],value_y[4],value_y[5],value_y[6],value_y[7],value_y[8],value_y[9],value_y[10],value_y[11],value_y[12],value_y[13],value_y[14],value_y[15],value_y[16],
                    value_y[17],value_y[18],value_y[19],value_y[20],value_y[21],value_y[22],value_y[23],value_y[24]]
        },
        {
            name: 'rtt_max',
            data:  [value_z[0],value_z[1],value_z[2],value_z[3],value_z[4],value_z[5],value_z[6],value_z[7],value_z[8],value_z[9],value_z[10],value_z[11],value_z[12],value_z[13],value_z[14],value_z[15],value_z[16],
                    value_z[17],value_z[18],value_z[19],value_z[20],value_z[21],value_z[22],value_z[23],value_z[24]]
        }
        ]
    });
});

  </script>
</head>
<body style="background-image:url(back_nfu.jpg);background-size:contain">
  <div id="container" style="min-width:1000px;height:500px"></div></br>
  <div align="right">
  <!-- <a href="logout.php" STYLE="text-decoration:none">登出</a>  <br><br> -->
  <input type="button" value="上一頁" onclick="self.location.href='index new.php'"/>
  <input type="button" value="登出" onclick="self.location.href='logout.php'"/>
</div>
</body>
</html>