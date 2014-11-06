<?php include('array_ifstat.php');?>        <!--  為有start session 必須擺在最上面 -->        
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
      var value_t = new Array();
      var jasonstr;
      var jasonstr1;
      var jasonstr2;

      jasonstr=<?php echo "$str";?>;      //javascripe引入PHP正確用法
      jasonstr1=<?php echo "$str1";?>;    //transferred
      jasonstr2=<?php echo "$str2";?>;    //x軸time
      var num=0;
      var num1=0;
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
      for (var key2 in jasonstr2) {
          value_t[key2]=parseInt(jasonstr2[key2]);       //key有幾個  value_x[key]就有幾筆資料
          value_t[key2]=value_t[key2]+'時';
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
            text: 'ifstat_data',
            x: -20
        },
        xAxis: {
            categories: [value_t[0],value_t[1],value_t[2],value_t[3],value_t[4],value_t[5],value_t[6],value_t[7],value_t[8],value_t[9],value_t[10],value_t[11],
                         value_t[12],value_t[13],value_t[14],value_t[15],value_t[16],value_t[17],value_t[18],value_t[19],value_t[20],value_t[21],value_t[22],
                         value_t[23],value_t[24]]   //categories: [value_x[0]]  可以成功
        },
        yAxis: {
            title: {
                text: 'KB'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'MB'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'wan端流進資料量',
            data: (function() {
                    // generate an array of random data
                    var data = []
                    //alert(time);   
                    while(num<=key){                     
                      console.log(num);
                      data[num] = value_x[num];  
                      num++;   
                    }
                    return data;
            })()
        },
        {
            name: 'wan端流出資料量',
            data:  [value_y[0],value_y[1],value_y[2],value_y[3],value_y[4],value_y[5],value_y[6],value_y[7],value_y[8],value_y[9],value_y[10],value_y[11],value_y[12],value_y[13],value_y[14],value_y[15],value_y[16],
                    value_y[17],value_y[18],value_y[19],value_y[20],value_y[21],value_y[22],value_y[23],value_y[24]]
        }]
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