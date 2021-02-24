<!DOCTYPE html>
<html>
<head>
  <?php
    include 'conn.php';
 session_start();
 $id1=$_SESSION['ID'];
 
          if(isset($_POST['submit'])){
          
      
           $eventname = $_POST['ename'];
          $eeorg = $_POST['eorg'];
          $eedate = $_POST['edate'];
          $eetime = $_POST['etime'];
          $eevenue = $_POST['evenue'];
          $eebenf = $_POST['ebenf'];
          $eistud = $_POST['istud'];
          $eestud = $_POST['estud'];
          $eobj = $_POST['obj'];
          $epp = $_POST['pp'];
          $ekeyp = $_POST['keyp'];
           $eout = $_POST['out'];
          $eecord = $_POST['ecord'];

           $eimg1c = $_POST['img1c'];
        
          
           $cont11=$_POST['level11'];
           $cont12=$_POST['level12'];
           $cont13=$_POST['level13'];
           $cont14=$_POST['level14'];
           $cont15=$_POST['level15'];
           $cont16=$_POST['level16'];
           $cont17=$_POST['level17'];
           $cont18=$_POST['level18'];
           $cont19=$_POST['level19'];
           $cont110=$_POST['level110'];
           $cont111=$_POST['level111'];
           $cont112=$_POST['level112'];
           $cont113=$_POST['level113'];
           $cont114=$_POST['level114'];

           
           

          

           $name1 = $_FILES['img1']['name'];
           
 $target_dir = "";
           


          $target_dir = "";
           $target_file1 = $target_dir . basename($_FILES["img1"]["name"]);
           
              
            

  
     $query = "insert into details(id,name,ecord,date,time,venue,speaker,part,objective,outcome,image) values('$id1','$eventname','$eeorg','$eedate','$eetime','$eevenue','$eebenf','$eistud','$eobj','$eout','$name1')";
     mysqli_query($conn,$query);
  
   
     move_uploaded_file($_FILES['img1']['tmp_name'],$target_dir.$name1);
     
     

          require("aks/fpdf.php");
      
class PDF extends FPDF
{

    function Header(){
      $this->Rect(5, 5, 200, 287, 'D');
    }

   
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);

        // Arial italic 8
        $this->SetFont('Times','IB',10);

        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
}
ob_start();
$pdf= new PDF();
$pdf->AliasNbPages();
$pdf-> AddPage();


$pdf->Image('logo1.jpg', 8,12,17);
$pdf->Image('logo2.png', 180,13,20);
$pdf->SetFont('TIMES','B',12);
$pdf->SetXY(80, 10);
$pdf->Cell(45,7,'K. J. Somaiya Institute of Engineering and Information Technology, Sion, Mumbai',0,1,'C');
$pdf->SetFont('TIMES','',11);
$pdf->Cell(190,5,"Accredited with 'A' Grade by NAAC (3.21 CGPA)",0,1,'C');
$pdf->Cell(190,5,"Three Programs Accredited by NBA",0,1,'C');
$pdf->Cell(190,5,"Best College Award by University of Mumbai (Urban Region), ISTE (MH), CSI (Mumbai)",0,1,'C');

$pdf->Ln(3);
$pdf->SetFont('TIMES','BU',12);
$pdf->Cell(193,7,"Report of ".$eventname,0,1,'C');
if($_FILES['ebanner']['name']){
  $name6 = $_FILES['ebanner']['name'];
         $target_file6 = $target_dir . basename($_FILES["ebanner"]["name"]);
         move_uploaded_file($_FILES['ebanner']['tmp_name'],$target_dir.$name6);
$pdf->Image($name6, 55, $pdf->GetY(), 100,28);
$pdf->Ln(33);
}

$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,15,"Organized By: ",0,0,'L');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(100,15,$eeorg,0,1,'L');

$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,15,"Date: ",0,0,'L');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(100,15,$eedate,0,1,'L');

$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,15,"Time: ",0,0,'L');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(100,15,$eetime,0,1,'L');

$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,15,"Venue/Mode: ",0,0,'L');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(100,15,$eevenue,0,1,'L');

$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,15,"Beneficiaries: ",0,0,'L');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(100,15,$eebenf,0,1,'L');

if($eestud){
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(38,15,"No. of Internal Participants: ",0,0,'L');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(42,15,$eistud,0,1,'C');

$pdf->SetFont('TIMES','B',12);
$pdf->Cell(38,15,"No. of External Participants: ",0,0,'L');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(42,15,$eestud,0,1,'C');}

else{
  $pdf->SetFont('TIMES','B',12);
$pdf->Cell(38,15,"No. of Participants: ",0,0,'L');
$pdf->SetFont('TIMES','',12);
$pdf->Cell(200,15,$eistud,0,1,'L');
}


$pdf->SetFont('TIMES','B',12);
$pdf->MultiCell(30,15,"Objective(s):",0,'L');
$pdf->SetFont('TIMES','',12);
$pdf->MultiCell(0,7,$eobj,0,'J');
$pdf->Ln(3);

if($epp){
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,15,"Profile of the Resource Person:",0,1,'L');
$pdf->SetFont('TIMES','',12);
$pdf->MultiCell(0,8,$epp,0,'J');}

$pdf->SetFont('TIMES','B',12);
$pdf->MultiCell(30,15,"Key Points:",0,'L');
$pdf->SetFont('TIMES','',12);
$pdf->MultiCell(0,8,$ekeyp,0,'J');

$pdf->SetFont('TIMES','B',12);
$pdf->MultiCell(30,15,"Outcome(s):",0,'L');
$pdf->SetFont('TIMES','',12);
$pdf->MultiCell(0,8,$eout,0,'J');
$pdf->Ln(2);
$pdf->SetFont('TIMES','B',12);

if($cont11 || $cont12 || $cont13 || $cont14 || $cont15 || $cont16|| $cont17 || $cont18||  $cont19 ||  $cont110 ||  $cont111 || $cont12 || $cont13 || $cont14  ){
$pdf->Ln(1);
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(190,25,"MAPPING OF EVENT OUTCOME WITH POs/PSOs:",0,1,'L');
$pdf->SetFont('TIMES','B',12);
$pdf->Ln(1);
$pdf->Cell(12,7,"#",1,0);
$pdf->Cell(12,7,"PO1",1,0);
$pdf->Cell(12,7,"PO2",1,0);
$pdf->Cell(12,7,"PO3",1,0);
$pdf->Cell(12,7,"PO4",1,0);
$pdf->Cell(12,7,"PO5",1,0);
$pdf->Cell(12,7,"PO6",1,0);
$pdf->Cell(12,7,"PO7",1,0);
$pdf->Cell(12,7,"PO8",1,0);
$pdf->Cell(12,7,"PO9",1,0);
$pdf->Cell(12,7,"PO10",1,0);
$pdf->Cell(12,7,"PO11",1,0);
$pdf->Cell(12,7,"PO12",1,0);
$pdf->Cell(12,7,"PSO1",1,0);
$pdf->Cell(12,7,"PSO2",1,1);

$pdf->SetFont('TIMES','',12);
$pdf->Cell(12,7,"LO1",1,0);
$pdf->Cell(12,7,$cont11,1,0);
$pdf->Cell(12,7,$cont12,1,0);
$pdf->Cell(12,7,$cont13,1,0);
$pdf->Cell(12,7,$cont14,1,0);
$pdf->Cell(12,7,$cont15,1,0);
$pdf->Cell(12,7,$cont16,1,0);
$pdf->Cell(12,7,$cont17,1,0);
$pdf->Cell(12,7,$cont18,1,0);
$pdf->Cell(12,7,$cont19,1,0);
$pdf->Cell(12,7,$cont110,1,0);
$pdf->Cell(12,7,$cont111,1,0);
$pdf->Cell(12,7,$cont112,1,0);
$pdf->Cell(12,7,$cont113,1,0);
$pdf->Cell(12,7,$cont114,1,1);



$pdf->Ln(5);
}

if($eecord){
$pdf->SetFont('TIMES','B',12);
$pdf->Cell(30,15,"Event Coordinator(s):",0,1,'L');
$pdf->SetFont('TIMES','',12);
$pdf->MultiCell(0,8,$eecord,0,'J');}
$pdf->Ln(226);

$pdf->SetFont('TIMES','B',12);
$pdf->Cell(190,25,"Glimpse of the Event:",0,1,'L');
$pdf->Ln(4);
$pdf->SetFont('TIMES','I',12);
$pdf->Image($name1,27,35,150,100);
$pdf->Ln(93);
$pdf->Cell(190,15,$eimg1c,0,1,'C');

if($_FILES['img2']['name']){
  $name2 = $_FILES['img2']['name'];
         $target_file2 = $target_dir . basename($_FILES["img2"]["name"]);
         move_uploaded_file($_FILES['img2']['tmp_name'],$target_dir.$name2);
         $eimg2c = $_POST['img2c'];
$pdf->Image($name2,27,$pdf->GetY()+15,150,100);
$pdf->Ln(110);
$pdf->Cell(190,15,$eimg2c,0,1,'C');}


if($_FILES['img3']['name']){
  $name3 = $_FILES['img3']['name'];
         $target_file3 = $target_dir . basename($_FILES["img3"]["name"]);
         move_uploaded_file($_FILES['img3']['tmp_name'],$target_dir.$name3);
         $eimg3c = $_POST['img3c'];
$pdf-> AddPage();
$pdf->Image($name3,27,20,150,100);
$pdf->Ln(107);
$pdf->Cell(190,15,$eimg3c,0,1,'C');}

if($_FILES['img4']['name']){
  $name4 = $_FILES['img4']['name'];
         $target_file4 = $target_dir . basename($_FILES["img4"]["name"]);
         move_uploaded_file($_FILES['img4']['tmp_name'],$target_dir.$name4);
         $eimg4c = $_POST['img4c'];
$pdf->Image($name4,27,$pdf->GetY()+15,150,100);
$pdf->Ln(111);
$pdf->Cell(190,15,$eimg4c,0,1,'C');}




$doc = $pdf-> Output ('D', 'Event_Report.pdf');
$pdf->output();
ob_end_flush();
}
          
?>
	<title>Details</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	
	<style >
    body {
    background: url(https://images.unsplash.com/photo-1515549832467-8783363e19b6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=564&q=80);
    background-size: cover;
    background-position: center; 
}

.fa {
  padding: 10px;
  font-size: 15px;
  width: 50px;
  height: 35px;
  text-align: center;
  text-decoration: none;
  margin: 4px 1px;
  border-radius: 30%;
}

.fa:hover {
    opacity: 0.8;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}



.fa-twitter {
  background: #55ACEE;
  color: white;

}

.fa-youtube {
  background: #bb0000;
  color: white;
}

.fa-instagram {
  background: #125688;
  color: white;
}


	</style>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" class="navbar navbar-light" style="background-color: #a83731;" >
    <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
              <a  href="" ><img src="download1.png" width="50" height="42" style="margin-top: 6px;margin-left: 6px" > </a>
      </ul>
      <ul class="nav navbar-nav navbar-right">

					 <li style="font-weight: bolder;font-size: 18px"><a href="sdestroy.php">LOGOUT</a></li>
           <li style="font-weight: bolder;font-size: 18px"><a href="aboutus1.html">ABOUT US</a></li>
			</ul>
      
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<script src="https://code.jquery.com/jquery-2.1.4.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<div class="container">
  <div class="container">
  <img src="logo1.jpg" alt="Workplace" usemap="#workmap" width="100" height="170" align="left" style="padding-top: 75px;margin-left: -30px">
   <img src="logo2.png" alt="Workplace" usemap="#workmap" width="100" height="170" align="right" style="padding-top: 75px;margin-right: -30px">
  <!--div class="jumbotron"-->
    <p style="text-align: center; font-family: Hoefler Text; font-size: 35px; font-weight: bolder; color: #8B0000; margin-top: 70px;">K. J. SOMAIYA INSTITUTE OF ENGINEERING AND INFORMATION TECHNOLOGY, SION, MUMBAI</p>
    <p style="text-align: center; font-family: Hoefler Text; font-size: 20px; padding-top: 0px; font-weight: bold;color:  #8B0000;margin: 1px">Accredited with ‘A’ Grade by NAAC (3.21 CGPA)</p>
                       <p style="text-align: center; font-family: Hoefler Text; font-size: 20px; font-weight: bold;margin: 1px ;color:  #8B0000;"> Three Programs Accredited by National Board of Accrediation</p>
                     <p style="text-align: center; font-family: Hoefler Text; font-size: 20px; font-weight: bolder; color:  #8B0000; "> Best College Award by University of Mumbai (Urban Region), ISTE (MH), CSI (Mumbai)</p>
  
	<h1 style="text-align: center; font-family: Hoefler Text; font-size: 25px; font-weight: bolder; color: #8B0000; margin-top: 75px;margin-bottom: 10px;font-weight: bolder;">FILL THE FOLLOWING DETAILS ABOUT EVENT TO GENRATE THE REPORT</h1>
 <form action="" method="POST" enctype='multipart/form-data' ><br>
  <h2 style="font-weight: bolder; color:red;font-size: 20px;font-family: Hoefler Text">(All fields marked with * are mandatory)</h2><br>
    <div class="form-group">
      <label for="inputeventname" style="font-size:17px; font-weight: bolder; color: #8B0000">Event Title*</label>
      <input type="text" class="form-control" id="inputeventname" placeholder="E.g. Seminar on Research Opportunities in AI" name="ename" required>
    </div>
    <div class="form-group">
      <label for="inputimg" style="font-size:17px; font-weight: bolder; color: #8B0000">Event Banner</label><br>
       <input type='file' name='ebanner' placeholder="OPTIONAL"></div>
    <div class="form-group">
      <label for="inputorgname" style="font-size:17px; font-weight: bolder; color:#8B0000">Organized By*</label>
      <input type="text" class="form-control" id="inputorgname" placeholder="E.g. Department of Information Technology in association with Institution’s Innovation Council" name="eorg" required>
    </div>
    <div class="form-group">
      <label for="inputdate" style="font-size:17px; font-weight: bolder; color: #8B0000">Date*</label>
      <input type="Date" class="form-control" id="inputdate" name="edate" required>
    </div>
  
  <div class="form-group">
      <label for="inputtime" style="font-size:17px; font-weight: bolder; color: #8B0000">Time*</label>
      <input type="Time" class="form-control" id="inputtime" name="etime" required>
    </div>

    <div class="form-group">
      <label for="inputvenue" style="font-size:17px; font-weight: bolder; color: #8B0000">Venue/Mode*</label>
      <input type="text" class="form-control" id="inputvenue" placeholder="E.g. Seminar Hall, Riturang, KJSIEIT OR Online Mode" name="evenue" required>
    </div>

    <div class="form-group">
      <label for="inputspeaker" style="font-size:17px; font-weight: bolder; color: #8B0000">Beneficiaries</label>
      <input type="text" class="form-control" id="inputspeaker" placeholder="E.g. Faculties across the Nation" name="ebenf" >
    </div>
  <div class="form-group">
    <label for="inputicand" style="font-size:17px; font-weight: bolder; color: #8B0000">No. of Internal Participants*</label>
    <input type="text" class="form-control" id="inputicand" placeholder="E.g. 423" name="istud" required>
  </div>
  <div class="form-group">
    <label for="inputeand" style="font-size:17px; font-weight: bolder; color: #8B0000">No. of External Participants*</label>
    <input type="text" class="form-control" id="inputecand" placeholder="Put 0 if you don not know otherwise, E.g. 423" name="estud" required>
  </div>
  <div class="form-group">
    <label for="inputobj" style="font-size:17px; font-weight: bolder; color: #8B0000">Objective(s)*</label><br>
   <textarea rows = "8" cols = "100"  id="inputobj" name="obj" placeholder="E.g. To kindle awareness and motivation about various opportunities in the field of Artificial Intelligence for pursuing high-quality research and development" required></textarea>
<div class="form-group">
    <label for="inputpp" style="font-size:17px; font-weight: bolder; color: #8B0000">Profile of Resource Person</label><br>
   <textarea rows = "10" cols = "100"  id="inputpp" name="pp" placeholder="OPTIONAL for competitions, etc." ></textarea>
  </div>
  <div class="form-group ">
      <label for="inputkeyp" style="font-size:17px; font-weight: bolder; color: #8B0000">Key Points*</label><br>
    <textarea rows = "10" cols = "100" id="inputkeyp" name="keyp" placeholder="Brief of Event" required ></textarea>
    </div>

    <div class="form-group ">
      <label for="inputoutcome" style="font-size:17px; font-weight: bolder; color: #8B0000">Outcome(s)*</label><br>
		<textarea rows = "8" cols = "100" id="inputoutcome" name="out" placeholder="E.g. The interest of participants to pursue research on Artificial Intelligence for development ofsolutions to real-world problems amplified significantly. Ideas on Artificial Intelligence for Healthcare, Agriculture, Surveillance, Education, Security, etc. were discussed for prospective Research and Development." required></textarea>
    </div>

   <p style="font-size:17px; font-weight: bolder; color: #8B0000" >Mapping of event outcome with POs/PSOs</p>
   <table class="table table-hover table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">PO1</th>
      <th scope="col">PO2</th>
      <th scope="col">PO3</th>
      <th scope="col">PO4</th>
      <th scope="col">PO5</th>
      <th scope="col">PO6</th>
      <th scope="col">PO7</th>
      <th scope="col">PO8</th>
      <th scope="col">PO9</th>
      <th scope="col">PO10</th>
      <th scope="col">PO11</th>
      <th scope="col">PO12</th>
      <th scope="col">PSO1</th>
      <th scope="col">PSO2</th>
      

    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">LO1</th>
   <td><select name="level11">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level12">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level13">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level14">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level15">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level16">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level17">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level18">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level19">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level110">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level111">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level112">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level113">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td>
  <td><select name="level114">
    <option value=""></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
  </select></td></tr>
  </tbody>
</table> <br>
<div class="form-group ">
      <label for="ec" style="font-size:15px; font-weight: bolder; color: #8B0000">Event Coordinator(s)</label><br>
    <textarea rows = "6" cols = "100" id="ec" name="ecord" placeholder="E.g.
1. Prof. Abc Xyz, Assistant Professor, Department of Pqr
2. Prof. Jkl Mno, Assistant Professor, Department of Def" ></textarea>
    </div>

 <div class="form-group">
  <label for="inputimg" style="font-size:17px; font-weight: bolder; color: #8B0000">Glimpse of the Event</label><br></div>
  <div class="form-group">
    <label for="inputp" style="font-size:13px; font-weight: bold; color: #8B0000">Upload 1st photograph*</label>
       <input type='file' name='img1' accept=".JPG,.JPEG,.PNG" required="">
       <label for="inputp" style="font-size:15px; font-weight: bold; color: #8B0000">Caption for 1st photograph*</label>
       <input type='text' class="form-control" name='img1c' required="" id="inputp" placeholder="Post-Event Group Picture with Resource Person ">
     </div>
     <div class="form-group">
      <label for="inputp" style="font-size:15px; font-weight: bold; color: #8B0000">Upload 2nd photograph</label>
       <input type='file' accept=".JPG,.JPEG,.PNG" name='img2' >
       <label for="inputp1" style="font-size:13px; font-weight: bold; color: #8B0000">Caption for 2nd photograph</label>
       <input type='text' class="form-control" name='img2c'  id="inputp1">
     </div>
     <div class="form-group">
      <label for="inputp" style="font-size:15px; font-weight: bold; color: #8B0000">Upload 3rd photograph</label>
       <input type='file' accept=".JPG,.JPEG,.PNG" name='img3' >
       <label for="inputp2" style="font-size:13px; font-weight: bold; color: #8B0000">Caption for 3rd photograph</label>
       <input type='text' name='img3c' class="form-control" id="inputp2">
     </div>

     <div class="form-group">
      <label for="inputp" style="font-size:15px; font-weight: bold; color:#8B0000">Upload 4th photograph</label>
       <input type='file' accept=".JPG,.JPEG,.PNG" name='img4' >
       <label for="inputp2" style="font-size:13px; font-weight: bold; color: #8B0000">Caption for 4th photograph</label>
       <input type='text' name='img4c' class="form-control" id="inputp2">
     </div>
   

      <span style="color: red; font-size: 15px;font-weight: bold;"><b>**UPLOAD PHOTOS IN JPEG,JPG,PNG FORMAT ONLY**</b></span><br>
    </div><br>

    
    
  <button type="submit" class="btn btn-primary" style="margin-bottom:30px;background: #8B0000;font-size: 17px" name="submit">Genrate Report</button>
</form>

</div>

</div><br><br><br><br><br>

<div class="container" >

    
    
    <!-- Footer -->
<footer  style="background:  #a83731;margin-left: -290px;width:1700px;position: static;" >
 
  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

  
<div class="row">

      <div class="col-md-7 mb-md-0 mb-7" style="margin-left: 130px">
      <p style="font-weight: bolder;color:white;font-size: 16px;text-align: left;margin-top: 3px ">Owned By: </p>
          <p style="font-weight: bolder;color:white;font-size: 16px;text-align:left;margin-top: -20px ">K. J. Somaiya Institute of Engineering and Information Technology, Sion, Mumbai <a href="https://kjsieit.somaiya.edu/en" target="_blank" style="  
          color: white; border-radius: 50%;margin-left: 5px ;margin-top: 2px"> <i class="fa fa-globe" style="font-size:30px;color:white;margin-left: -15px"></i></a></p>
      
      <p style="font-weight: bolder;color:white;font-size: 16px;text-align:left;margin-top: 3px ">Follow Us on:</p>
     <table>
      <tbody>
        <td> <a href="https://www.instagram.com/kjsieit_22/"  target="_blank"><img src="ig.jpg" height="35px" width="40px" style="border-radius: 30%"></a></td>
          <td>  <a href="https://www.facebook.com/kjsieitofficial" class="fa fa-facebook" target="_blank"></a></td>
           <td><a href="https://www.youtube.com/kjsieitofficial" class="fa fa-youtube" target="_blank"></a></td>
          <td><a style="margin-left: : 100px" href="https://twitter.com/kjsieit1" class="fa fa-twitter" target="_blank"></a></td>
          

    
  </tbody></table>

      </div>
      <!-- Grid column -->

      <div class="col-md-13 mb-md-0 mb-10"  >

<p style="font-weight: bolder;color:white;font-size: 16px;text-align: left;margin-top: 3px ">Developed By: </p>
          <p style="font-weight: bolder;color:white;font-size: 15px;text-align:left;margin-top: -20px ">Department of Information Technology During A.Y. 2019-20 <a href="https://kjsieit.somaiya.edu/en/programme/information-technology-engineering" target="_blank" style=" 
          color: white; border-radius: 50%;margin-left: 5px ;margin-top: 3px"><i class="fa fa-globe" style="font-size:30px;color:white;margin-left: -15px"></i></a></p>
      
      <p style="font-weight: bolder;color:white;font-size: 16px;text-align:left;margin-top: 3px ">Follow Us on:</p>
     <table>
          <td> <a href="https://www.instagram.com/it_kjsieit/"  target="_blank"><img src="ig.jpg" height="35px" width="50px" style="border-radius: 30%"></a></td>
           <td><a href="https://www.facebook.com/KJSIEITITDEPT" class="fa fa-facebook" target="_blank"></a></td>

      </table>
      
      </div>
      
      
    </div>
   
  </div>
  


</footer></div>
</body>
</html>