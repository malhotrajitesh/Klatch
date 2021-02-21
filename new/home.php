<div class="main clearfix">
  <div class="container">
    <div class="row">
      <div class="space-div-40"></div>
      <div style="box-shadow: 0 0 4px #ccc; padding-top:15px;" class="col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12 clearfix">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <h1 class="pull-left">My Trips</h1>
        <?php echo anchor('home','Add New Trip',array('class'=>'btn outer pull-right'));?>
      </div>
       <div class="space-div-10"></div>
       <?php
$ip1=$_SERVER['REMOTE_ADDR'];

       $ip='122.160.46.61';
$a=geoCheckIP($ip);
$aa=$a['country'];
$ab=$a['state'];
$ac=$aa.', '.$ab;
      // print_r(geoCheckIP($ip));
       //Array ( [domain] => dslb-094-219-040-096.pools.arcor-ip.net [country] => DE - Germany [state] => Hessen [town] => Erzhausen )

       //Get an array with geoip-infodata
       function geoCheckIP($ip)
       {
               //check, if the provided ip is valid
               if(!filter_var($ip, FILTER_VALIDATE_IP))
               {
                       throw new InvalidArgumentException("IP is not valid");
               }

               //contact ip-server
               $response=@file_get_contents('http://www.netip.de/search?query='.$ip);
               if (empty($response))
               {
                       throw new InvalidArgumentException("Error contacting Geo-IP-Server");
               }

               //Array containing all regex-patterns necessary to extract ip-geoinfo from page
               $patterns=array();
               $patterns["domain"] = '#Domain: (.*?)&nbsp;#i';
               $patterns["country"] = '#Country: (.*?)&nbsp;#i';
               $patterns["state"] = '#State/Region: (.*?)<br#i';
               $patterns["town"] = '#City: (.*?)<br#i';

               //Array where results will be stored
               $ipInfo=array();

               //check response from ipserver for above patterns
               foreach ($patterns as $key => $pattern)
               {
                       //store the result in array
                       $ipInfo[$key] = preg_match($pattern,$response,$value) && !empty($value[1]) ? $value[1] : 'not found';
               }

               return $ipInfo;
       }

?>
        <div class="panel-group clearfix" id="accordion">
<?php
  $i=0;
  if($records !='')
  {
        foreach($records as $row)
  {
      $expoTo=explode(',',$row->to_);
      $i++;
    ?>
  <div class="panel panel-info">
     <div class="panel-heading clearfix" data-toggle="collapse" data-parent="#accordion" data-target="#collapse<?php echo $i ?>">
      <h4 class="panel-title accordion-toggle">
         <?php echo $i;?>.&nbsp;&nbsp;<?php echo $expoTo[0]  ?>&nbsp;<?php echo'Trip';  ?>
         <span class="pull-right"><?php 
  $this->db->where('lead_id',$row->user_id);
                  $this->db->from('orders');
                  $query = $this->db->get(); 
                  
                  //$b=$query->result();
                  //print_r($b);
                  if($query->num_rows() > 0){
                  echo 'Booked';
                } else{ echo 'Pending'; }
                  ?> &nbsp;&nbsp;<?=$row->date_created?></span>
      </h4>
    </div>
    <div id="collapse<?php echo $i ?>" class="panel-collapse collapse">
      <div class="panel-body">
        <?php echo form_open('home/update_lead') ;?>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label>Leaving From*</label>
                <div class="form-group">
                  <input type="text" name="from_" id="id" class="form-control input-sm" value="<?=$row->from_?>" />
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label for="going-to-input">Going To*</label>
                <div class="form-group">
                  <input type="text" class="form-control input-sm" name="to_" id="id1" value="<?=$row->to_?>" />                
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label for="departure-date">Departure Date*</label>
                <div class="form-group">
                  <input type="text" name="date" id="datepicker" class="form-control input-sm" value="<?=$row->date?>" />
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label for="trip-duration">Trip Duration*</label>
                <div class="form-group">
                  <select class="cust-select selectpicker form-control input-sm" required name="trip_duration" id="trip-duration">
     <option value="<?=$row->trip_duration?>"><?=$row->trip_duration?></option>              
              <option  value="1 - 3">1 - 3 Nights</option>
              <option  value="4 - 5">4 - 5 Nights</option>
              <option  value="6 - 7">6 - 7 Nights</option>
              <option  value="8 - 10">8 - 10 Nights</option>
              <option  value="11 - 13">11 - 13 Nights</option>
              <option  value="14+">14+ Nights</option>
            </select>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label for="adults">No. of Adults*</label>
                <div class="form-group">
                  <select class="cust-select selectpicker form-control input-sm" required name="no_of_person" id="adults">
              <option value="<?=$row->no_of_person?>"><?=$row->no_of_person?></option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
             <option value="11+">11 +</option>
            </select>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label for="minors">No. of Minors*</label>
                <div class="form-group">
                  <select class="cust-select selectpicker form-control input-sm" name="no_of_minors" id="minors">
    <option value="<?=$row->no_of_minors?>"><?=$row->no_of_minors?></option>          
    <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
              
            </select>
                </div>
              </div> 
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label for="trip-type">Trip Type*</label>
                <div class="form-group">
                  <select class="cust-select selectpicker form-control input-sm" required name="trip_type" id="trip-type">
              <option value="<?=$row->trip_type?>"><?=$row->trip_type?></option>
              <option  value="Family Vacation">Family Vacation</option>
              <option  value="Casual Vacation">Casual Vacation</option>
              <option  value="Honeymoon">Honeymoon</option>
              <option  value="Romantic Getaway">Romantic Getaway</option>
              <option  value="Weekend Break">Weekend Break</option>
              <option  value="Backpacking">Backpacking</option>
              <option  value="Destination Wedding">Destination Wedding</option>
              <option  value="Business Trip">Business Trip</option>
              <option  value="Religious Purpose / Pilgrimage">Religious Purpose / Pilgrimage</option>
              <option  value="Medical Treatment">Medical Treatment</option>
            </select>
                </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                <label for="budget">Budget*</label>
                <div class="form-group">
                  <select class="cust-select selectpicker form-control input-sm" required name="budget" id="budget">
              <option value="<?=$row->budget?>"><?=$row->budget?></option>
             <option  value="Budget">Budget</option>
              <option  value="2 Star">2 Star</option>
              <option  value="3 Star">3 Star</option>
    <option  value="4 Star">4 Star</option>
              <option  value="5 Star">5 Star</option>
              <option  value="Above">Above</option>
            </select>
                </div>
                </div>
            </div>
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="trip-service">Services You Need</label>
                <div class="form-group service">
                  <ul>

                  <?php
    $newvalue='';
    $a=$row->flight;
    if($a=='flight'){
      $newvalue='checked';
     }
  ?>
              <li><input  type="checkbox"  name="flight"  value="flight"  <?php echo $newvalue; ?> id="flights" />
                  Flights</li>

                  <?php
    $newvalue='';
    $a=$row->hotel;
    if($a=='hotel'){
      $newvalue='checked';
     }
  ?>
                  <li>
                <input  type="checkbox" name="hotel" value="hotel" <?php echo $newvalue; ?>  id="hotelslodging"  />
                 Hotels/Lodging</li>

                 <?php
    $newvalue='';
    $a=$row->car_rent;
    if($a=='car_rent'){
      $newvalue='checked';
     }
  ?>
                  <li>
                <input  type="checkbox" name="car_rent" value="car_rent" <?php echo $newvalue; ?>  id="carrental" />
                  Car Rental</li>

                  <?php
    $newvalue='';
    $a=$row->bus;
    if($a=='bus'){
      $newvalue='checked';
     }
  ?><li>
    <input  type="checkbox" name="bus" value="bus" <?php echo $newvalue; ?>  id="bustrainferry" />
                  Bus/Train/Ferry
          </li>
          
       <?php
    $newvalue='';
    $a=$row->cruise;
    if($a=='cruise'){
      $newvalue='checked';
     }
  ?>
  <li>
    <input  type="checkbox" name="cruise" value="cruise" <?php echo $newvalue; ?>  id="cruise" />
                 Cruise
               </li>
  <?php
    $newvalue='';
    $a=$row->sightseeing;
    if($a=='sightseeing'){
      $newvalue='checked';
     }
  ?>
  <li>
    <input  type="checkbox" name="sightseeing" value="sightseeing" <?php echo $newvalue; ?>  id="sightseeingtour" />
                  Sightseeing Tour</li>
  <?php
    $newvalue='';
    $a=$row->travel_insurance;
    if($a=='travel_insurance'){
      $newvalue='checked';
     }
  ?><li>
    <input  type="checkbox" name="travel_insurance" value="travel_insurance" <?php echo $newvalue; ?>  id="travelinsurance"/>
                Travel Insurance</li>
              
  <?php
    $newvalue='';
    $a=$row->visa;
    if($a=='visa'){
      $newvalue='checked';
     }
  ?><li>
    <input  type="checkbox" name="visa" value="visa" <?php echo $newvalue; ?>  id="visa"/>
                 Visa</li>


          <li>
                  Other (Please Specify)
                  <input type="text" class="input-text" id="other-input" name="other" value="<?=$row->other;?>"   />
          </li>
          </ul>

                </div>
              </div>

              <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="last-name"></label>
                <div class="form-group service">
                  <ul>
                  <li><div id="abb">
        <?php
        $newvalue='';
        $a=$row->air_ticket;
        if($a==1){
          $newvalue='checked';
         }
        ?>
    <input  type="checkbox" name="air_ticket" value="1" <?php echo $newvalue; ?>/>
                 If Air Ticket Already Booked</div></li>
               <li><div id="acc"> <?php 
            $newvalue='';
            $a=$row->bus_ticket;
            if($a==1){
            $newvalue='checked';
          }
        ?>
                <input  type="checkbox" name="bus_ticket" value="1" <?php echo $newvalue; ?>/>
                 If Bus/Train/Ferry Already Booked</div></li>
    </ul>
                </div>
              </div>
            </div>  
           <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="details">Additional Details</label>
                <div class="form-group">
                  <textarea id="details" name="details" rows="3" class="form-control"><?=$row->details?></textarea>                
                  </div>
              </div>
</div>
          </div>

        <?php echo form_close(); ?>
      </div>
    </div>
  </div>
  <?php
    
  }
} else { echo 'No Trips Added'; }

  ?>
</div>

<hr>

<div class="col-md-12 col-sm-12 col-xs-12">
<h1 class="pull-left">My Package Trips</h1>
</div>
<div class="space-div-10"></div>
<div class="panel-group clearfix" id="accordion1">
<?php
	$i=1;
	if($package !='')
	{
        foreach($package as $rows)
		{
			
		?>
  <div class="panel panel-info">
     <div class="panel-heading clearfix" data-toggle="collapse" data-parent="#accordion1" data-target="#collapseone<?php echo $i ?>">
      <h4 class="panel-title accordion-toggle">
          <?php echo $i;?>.&nbsp;&nbsp;<?php echo $rows->package_name  ?>&nbsp;<?php echo'Package';  ?>
          <span class="pull-right"><?=$rows->created_date?></span>
      </h4>
    </div>
    <div id="collapseone<?php echo $i ?>" class="panel-collapse collapse">
      <div class="panel-body">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label>Package Name</label>
                <div class="form-group">
                  <?=$rows->package_name?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label for="going-to-input">Traveller Name</label>
                <div class="form-group">
                  <?=$rows->name?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label>Air Ticket</label>
                <div class="form-group">
                  <?php if($rows->air_ticket ==1 ) { echo 'Booked'; } else { echo 'Not Booked'; }?>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-6">
                <label for="going-to-input">Train Ticket</label>
                <div class="form-group">
                  <?php if($rows->bus_ticket ==1 ) { echo 'Booked'; } else { echo 'Not Booked'; }?>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="going-to-input">Additional Information</label>
                <div class="form-group">
                  <?=$rows->additional_details?>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-xs-12 col-sm-12 text-right"><a href="<?php echo base_url();?>package/<?php echo implode('-',explode(' ',$rows->package_name)); ?>/<?php echo $rows->package_id; ?>" class="btn outer">View Package</a></div>
        </div>  
      </div>
    </div>
  </div>
  <?php
	$i++;	
	} 
}	else { echo 'No Trips Added'; }

	?>
</div>


      </div>
      <div class="space-div-40"></div>
    </div>
  </div>
</div>
