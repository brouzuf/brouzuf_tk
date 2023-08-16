<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Compte à rebour - brouzuf.tk</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"     rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <style>
	body, html {
	  width: 100%;
	  height: 100%;
	  margin: 0;
	}

	html {
	  display: table;
	}

	.card {
	  max-width: 900px;
	  width: 75%;
	  min-height: 25%;
	  display: block;
	  position: top;
	  background-color: black;
	  opacity: 0.6;
	  margin: 10px auto;
	  border: 1px black solid;
	  border-radius: 5px 5px 5px 5px;
	  padding: 10px;
	}

	canvas {
	  max-width: 95%;
	  max-height: 20%;
	  display: block;
	  position: relative;
	  background: black;
	  opacity: 0.6;
	  margin: 40px auto;
	  border: 1px black solid;
	  border-radius: 5px 5px 5px 5px;
	  padding: 10px;
	  text-align: center;
	}

	body {
	  background: #000000;
	  background-image: url("caribou-dans-neige-parc-jasper-canada-1.jpg");
	  background-position: top center;
	  background-size: cover;
	  color: #fff;
	  margin: 0;
	  padding: 0;
	  overflow: hidden;
	  display: table-cell;
	  vertical-align: middle;
	
	}
   </style>
   <script async src="https://umami-1-brouzuf.vercel.app/script.js" data-website-id="9d2cfb0f-b088-4333-b37b-1883b0de0c58"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js" type="text/javascript"></script>
  </head>
  <body>
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-body">
				<?php include 'api.php'; ?>

				</div>
			</div>
		</div>
	</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> 
<script>
var ringer = {
  countdown_to: "12/11/2022 01:20:00 PM",
  rings: {
    'JOURS': { 
      s: 86400000, // mseconds in a day,
      max: 365
    },
    'HEURES': {
      s: 3600000, // mseconds per hour,
      max: 24
    },
    'MINUTES': {
      s: 60000, // mseconds per minute
      max: 60
    },
    'SECONDES': {
      s: 1000,
      max: 60
    },
    'MICROSEC': {
      s: 10,
      max: 100
    }
   },
  r_count: 5,
  r_spacing: 10, // px
  r_size: 100, // px
  r_thickness: 2, // px
  update_interval: 11, // ms
    
    
  init: function(){
   
  
    $r = ringer;
    $r.cvs = document.createElement('canvas'); 

    
    $r.size = { 
      w: ($r.r_size + $r.r_thickness) * $r.r_count + ($r.r_spacing*($r.r_count-1)), 
      h: ($r.r_size + $r.r_thickness) 
    };
    


    $r.cvs.setAttribute('width',$r.size.w);           
    $r.cvs.setAttribute('height',$r.size.h);
    $r.ctx = $r.cvs.getContext('2d');
    $(document.body).append($r.cvs);
    $(document.body).append($r.cvs);
    $r.cvs = $($r.cvs);    
    $r.ctx.textAlign = 'center';
    $r.actual_size = $r.r_size + $r.r_thickness;
    $r.countdown_to_time = new Date($r.countdown_to).getTime();
    $r.cvs.css({ width: $r.size.w+"px", height: $r.size.h+"px" });
    $r.go();
  },
  ctx: null,
  go: function(){
    var idx=0;
    
    $r.time = (new Date().getTime()) - $r.countdown_to_time;
    
    
    for(var r_key in $r.rings) $r.unit(idx++,r_key,$r.rings[r_key]);      
    
    setTimeout($r.go,$r.update_interval);
  },
  unit: function(idx,label,ring) {
    var x,y, value, ring_secs = ring.s;
    value = parseFloat($r.time/ring_secs);
    $r.time-=Math.round(parseInt(value)) * ring_secs;
    value = Math.abs(value);
    
    x = ($r.r_size*.5 + $r.r_thickness*.5);
    x +=+(idx*($r.r_size+$r.r_spacing+$r.r_thickness));
    y = $r.r_size*.5;
    y += $r.r_thickness*.5;

    
    // calculate arc end angle
    var degrees = 360-(value / ring.max) * 360.0;
    var endAngle = degrees * (Math.PI / 180);
    
    $r.ctx.save();

    $r.ctx.translate(x,y);
    $r.ctx.clearRect($r.actual_size*-0.5,$r.actual_size*-0.5,$r.actual_size,$r.actual_size);

    // first circle
    $r.ctx.strokeStyle = "rgba(128,128,128,0.2)";
    $r.ctx.beginPath();
    $r.ctx.arc(0,0,$r.r_size/2,0,2 * Math.PI, 2);
    $r.ctx.lineWidth =$r.r_thickness;
    $r.ctx.stroke();
   
    // second circle
    $r.ctx.strokeStyle = "rgba(250, 250, 250, 0.9)";
    $r.ctx.beginPath();
    $r.ctx.arc(0,0,$r.r_size/2,0,endAngle, 1);
    $r.ctx.lineWidth =$r.r_thickness;
    $r.ctx.stroke();
    
    // label
    $r.ctx.fillStyle = "#ffffff";
   
    $r.ctx.font = '1em Helvetica';
    $r.ctx.fillText(label, 0, 23);
    $r.ctx.fillText(label, 0, 23);   
    
    $r.ctx.font = 'bold 2.5em Helvetica';
    $r.ctx.fillText(Math.floor(value), 0, 10);
    
    $r.ctx.restore();
  }
}

ringer.init();
</script>
	</body>
</html>
