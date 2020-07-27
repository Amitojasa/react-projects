
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Form</title>
    <style>.pac-container{background-color:#ggf;position:absolute!important;z-index:1000;border-radius:2px;border-top:1px solid #d9d9d9;font-family:Arial,sans-serif;box-shadow:0 2px 6px rgba(0,0,0,0.3);-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box;overflow:hidden}.pac-logo:after{content:"";padding:1px 1px 1px 0;height:18px;box-sizing:border-box;text-align:right;display:block;background-image:url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3.png);background-position:right;background-repeat:no-repeat;background-size:120px 14px}.hdpi.pac-logo:after{background-image:url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3_hdpi.png)}.pac-item{cursor:default;padding:0 4px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;line-height:30px;text-align:left;border-top:1px solid #e6e6e6;font-size:11px;color:#999}.pac-item:hover{background-color:#fafafa}.pac-item-selected,.pac-item-selected:hover{background-color:#ebf2fe}.pac-matched{font-weight:700}.pac-item-query{font-size:13px;padding-right:3px;color:#000}.pac-icon{width:15px;height:20px;margin-right:7px;margin-top:6px;display:inline-block;vertical-align:top;background-image:url(https://maps.gstatic.com/mapfiles/api-3/images/autocomplete-icons.png);background-size:34px}.hdpi .pac-icon{background-image:url(https://maps.gstatic.com/mapfiles/api-3/images/autocomplete-icons_hdpi.png)}.pac-icon-search{background-position:-1px -1px}.pac-item-selected .pac-icon-search{background-position:-18px -1px}.pac-icon-marker{background-position:-1px -161px}.pac-item-selected .pac-icon-marker{background-position:-18px -161px}.pac-placeholder{color:gray}
</style><style>.pac-container{background-color:#fff;position:absolute!important;z-index:1000;border-radius:2px;border-top:1px solid #d9d9d9;font-family:Arial,sans-serif;box-shadow:0 2px 6px rgba(0,0,0,0.3);-moz-box-sizing:border-box;-webkit-box-sizing:border-box;box-sizing:border-box;overflow:hidden}.pac-logo:after{content:"";padding:1px 1px 1px 0;height:18px;box-sizing:border-box;text-align:right;display:block;background-image:url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3.png);background-position:right;background-repeat:no-repeat;background-size:120px 14px}.hdpi.pac-logo:after{background-image:url(https://maps.gstatic.com/mapfiles/api-3/images/powered-by-google-on-white3_hdpi.png)}.pac-item{cursor:default;padding:0 4px;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;line-height:30px;text-align:left;border-top:1px solid #e6e6e6;font-size:11px;color:#999}.pac-item:hover{background-color:#fafafa}.pac-item-selected,.pac-item-selected:hover{background-color:#ebf2fe}.pac-matched{font-weight:700}.pac-item-query{font-size:13px;padding-right:3px;color:#000}.pac-icon{width:15px;height:20px;margin-right:7px;margin-top:6px;display:inline-block;vertical-align:top;background-image:url(https://maps.gstatic.com/mapfiles/api-3/images/autocomplete-icons.png);background-size:34px}.hdpi .pac-icon{background-image:url(https://maps.gstatic.com/mapfiles/api-3/images/autocomplete-icons_hdpi.png)}.pac-icon-search{background-position:-1px -1px}.pac-item-selected .pac-icon-search{background-position:-18px -1px}.pac-icon-marker{background-position:-1px -161px}.pac-item-selected .pac-icon-marker{background-position:-18px -161px}.pac-placeholder{color:gray}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Merienda&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="predictcss.css">  
</head>
<body class="container-fluid">

<?php require 'ntse/conn.inc.php';?>
<h1>PREDICTION</h1>
    <div id="back">
    <div id="div1" class="container">
    <form method="post">
    <div id="form" class="formGroup">
    <div class="form-group">
    <label>From</label>
    <input type="text" id="from" name="from" class="form-control" placeholder="Enter a location" autocomplete="off">
    </div>
    <div class="form-group">
    <label>To</label>
    <input type="text" id="to" name="to" class="form-control" placeholder="Enter a location" autocomplete="off">
    </div>
    <button id="fetch" name="submit" type="submit" class="btn btn-primary">Fetch</button>
    </div>
    </form>
    </div>


<?php
if(isset($_POST['submit'])){
    $source=($_POST['from']);
    $destination=$_POST['to'];
    
    $url="http://tis.nhai.gov.in/UploadHandler.ashx?Up=3&Source=".$source.",&Destination=".$destination."&waypoints=";
    $url = str_replace(" ", "%20", $url);
    echo $url;
    echo "<br>";
    // $homepage = file_get_contents($url);
    // print_r($homepage);
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US) AppleWebKit/525.13 (KHTML, like Gecko) Chrome/0.A.B.C Safari/525.13");
    $data = curl_exec($ch);
    curl_close($ch);

//echo $data;

    $ar=(explode("$$",$data));
    print_r($ar);
    $aar=(explode("!",$ar[1]));
    $kmStr=$aar[0];
    // echo $kmStr;
    $km=(explode(" ",$kmStr));
    $km=$km[0];
    $km=str_replace(",","",$km);
    $km=(int)$km;
    
    echo $km;
    $time=$aar[1];
    $s=$ar[0];
    $sar=(explode("$",$s));
?>
<table class="table">

<tr>
    <td>['TollName']</td>
    <td>['CarRate_single']</td>
    <td>['FourToSixExel_Single']</td>
    <td>['HCM_EME_Single']</td>
    <td>['LCVRate_single']</td>
    <td>['Location']</td>
    <td>['latitude']</td>
    <td>['longitude']</td>
    <td>['MultiAxleRate_single']</td>
    <td>['SearchLoc']</td>

</tr>
<?php
    $cost=0;
    for($i=0;$i<count($sar);$i++){
        $dar=explode(',',$sar[$i]);
        
        $lat=(double)$dar[0];
        // echo $lat;
        // echo gettype($lat);
        $long=(double)$dar[1];
        $q=mysqli_query($conn,"select * from TollData where latitude=$lat and longitude=$long") or die(mysqli_error($conn));
        $q=mysqli_fetch_assoc($q);
        
        $cost+=$q['FourToSixExel_Single'];
        echo "<tr>
        <td>".$q['TollName']."</td>
        <td>".$q['CarRate_single']."</td>
        <td>".$q['FourToSixExel_Single']."</td>
        <td>".$q['HCM_EME_Single']."</td>
        <td>".$q['LCVRate_single']."</td>
        <td>".$q['Location']."</td>
        <td>".$q['latitude']."</td>
        <td>".$q['longitude']."</td>
        <td>".$q['MultiAxleRate_single']."</td>
        <td>".$q['SearchLoc']."</td>
    
    </tr>";
        
    }

?>
</table>




<div id="result">
<table>
    <tr>
<td> Total Toll Cost for 4 to 6 axel Vehicle :</td><td> <?php echo $cost;?></td></tr>
<tr><td> Total Kms to be travelled:</td><td><?php echo $km;?></td></tr>
<tr><td> Time of Travelling :</td><td><?php echo $time;?></td></tr>
</table>
</div>

<ul>
<h2>Assuming Some Fixed Costs:</h2>
<li>Tyre : Rs. 2.00 per KM</li>
<li>EMI : Rs. 6.00 per KM</li>
<li>Maintenance : Rs.1.00 per KM</li>
<li>Double Drivers : Rs.4.00 per KM</li>
<li>National permit, Insurance, Fitness, Road Tax, goods Tax : Rs.1.00 per KM</li>
<li>Police / RTO / Border / Accidents : Rs. 1.00 per KM</li>
<li>Company Management Expenses : Rs. 1.00 per KM</li>
<li>Mielage of truck : 3 Km/L </li>
</ul>


<?php $fuelpkm= (1/3)*81.94 ; ?>
<div class="container">
<table class="table">
<tr>
    <th>Factor</th><th>Cost/KM</th><th>Total Cost</th>
</tr>
<tr>
    <td>Fuel Price</td> <td><?php echo $fuelpkm;?></td> <td><?php echo $fuelpkm*$km ?></td>
</tr>
<tr>
    <td>Toll Price</td><td><?php echo $cost/$km;?></td><td><?php echo $cost;?></td>
</tr>
<tr>
    <td>EMI</td><td><?php echo "Rs. 6.00"?></td><td><?php echo 6*$km;?></td>
</tr>


<tr>
    <td>Tyre & maintenance</td><td><?php echo "Rs. 3.00";?></td><td><?php echo (float)$km*(3.00);?></td>
</tr>
<tr>
    <td>Double Drivers</td><td><?php echo "Rs. 4.00";?></td><td><?php echo $km*4.00;?></td>
</tr>
    
<tr>
    <td>National permit, Insurance, Fitness, Road Tax, goods Tax :</td><td><?php echo "Rs. 1.00";?></td><td><?php echo $km*1.00;?></td>
</tr>
<tr>
    <td>Police / RTO / Border / Accidents:</td><td><?php echo "Rs. 1.00";?></td><td><?php echo $km*1.00;?></td>
</tr>
<tr>
    <td>Company Management Expenses:</td><td><?php echo "Rs. 1.00";?></td><td><?php echo $km*1.00;?></td>
</tr>

<tr>
    <td>Total cost:</td><td><?php echo "Rs.".($cost/$km)+1+1+1+4+3+6+$fuelpkm; ?></td><td><?php echo $cost+(1+1+6+1+4+3+$fuelpkm)*$km; ?></td>
</tr>
    


</table>
</div>
<?php  }?>
 <script>

//       function fetchdata() {
//           var source=document.getElementById('from').value;
//           console.log(source);
//           var destination=document.getElementById('to').value;
//           console.log(destination);
//           $.ajax({
//             url:"http://tis.nhai.gov.in/UploadHandler.ashx?Up=3&Source="+source+",&Destination="+destination+"&waypoints=",
//             type: "GET", //request type
//             success:function(result){
//                 console.log(result);
//            }
//          });
//      }

// </script>




<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL0bTEXOobj6xWRpITEG1or3VYUe4fWDc&libraries=places"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        let from='from'
        let to='to'
        let fromcomplete=new google.maps.places.Autocomplete(document.getElementById(from),{
            types:["geocode"],
            componentRestrictions: {country: 'IN'}
        })
        let tocomplete=new google.maps.places.Autocomplete(document.getElementById(to),{
            types:["geocode"],
            componentRestrictions: {country: 'IN'}
        })
       
    });
    </script>
</body>

</html>

    