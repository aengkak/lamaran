<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
   <head>
      <title>Print</title>
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/2.7.0/build/reset-fonts-grids/reset-fonts-grids.css" media="all" />
      <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/cv.css" media="all" />
      <style type="text/css"> @media print {
        #noprint { display: none; }
        #print { display: block; } }
      </style>
   </head>
   <body>

      <div id="doc2" class="yui-t7"><br><br>
        <div id="noprint">
        <button onclick="myFunction()"><h2><b>Print</b></h2></button>
      </div>
         <div id="inner" style="margin-top: 10px;">
            <div id="hd">
               <div class="yui-gc">
                  <div class="yui-u first">
                     <h1><?php echo $print->nama;?></h1>
                     <h2><?php echo $print->nama_jabatan;?></h2>
                  </div>
                  <div class="yui-u">
                     <div class="contact-info">
                        <img src="<?php echo base_url();?>files/<?php echo $print->foto;?>" class="round pull-right" height="150" width="150">
                     </div>
                     <!--// .contact-info -->
                  </div>
               </div>
               <!--// .yui-gc -->
            </div>
            <!--// hd -->
            <div id="bd">
               <div id="yui-main">
                  <div class="yui-b">
                     <div class="yui-gf nobotbor">
                        <div class="yui-u first">
                           <h2>Data Diri</h2>
                        </div>
                        <div class="yui-u">
                           <div class="talent">
                              <h2>Tanggal Lahir</h2>
                              <p><?php echo $print->tgl_lahir;?></p>
                           </div>
                           <div class="talent">
                              <h2>Jenis Kelamin</h2>
                              <p><?php echo $print->gender;?> </p>
                           </div>
                           <div class="talent">
                              <h2>Agama</h2>
                              <p><?php echo $print->agama;?></p>
                           </div>
                        </div>
                     </div>
                     <!--// .yui-gf -->
                     <div class="yui-gf nobotbor">
                        <div class="yui-u first">
                           <h2></h2>
                        </div>
                        <div class="yui-u">
                           <div class="talent">
                              <h2>Alamat</h2>
                              <p><?php echo $print->alamat;?>	</p>
                           </div>
                           <div class="talent">
                              <h2>Kota</h2>
                              <p><?php echo $print->kota;?> </p>
                           </div>
                           <div class="talent">
                              <h2>Negara</h2>
                              <p>Indonesia</p>
                           </div>
                        </div>
                     </div>
                     <!--// .yui-gf -->
                     <div class="yui-gf">
                        <div class="yui-u first">
                           <h2></h2>
                        </div>
                        <div class="yui-u">
                           <div class="talent">
                              <h2>No. Telepon</h2>
                              <p><?php echo $print->no_telp;?>	</p>
                           </div>
                           <div class="talent">
                              <h2>No. WhatsApp</h2>
                              <p><?php echo $print->no_wa;?> </p>
                           </div>
                           <div class="talent">
                              <h2>Email</h2>
                              <p><?php echo $print->email;?></p>
                           </div>
                        </div>
                     </div>
                     <!--// .yui-gf -->
                     <div class="yui-gf nobotbor">
                        <div class="yui-u first">
                           <h2>Pendidikan</h2>
                        </div>
                        <!--// .yui-u -->
                        <div class="yui-u">
                           <div class="job">
                              <h2><?php echo $print->pendidikan;?> </h2>
                           </div>
                        </div>
                        <!--// .yui-u -->
                     </div>
                     <!--// .yui-gf -->
                     <div class="yui-gf nobotbor">
                        <div class="yui-u first">
                           <h2>Tanggal Diterima</h2>
                        </div>
                        <!--// .yui-u -->
                        <div class="yui-u">
                           <div class="job">
                              <h2><?php echo $print->tgl_diterima;?> </h2>
                           </div>
                        </div>
                        <!--// .yui-u -->
                     </div>
                     <!--// .yui-gf -->
                     <div class="yui-gf nobotbor">
                        <div class="yui-u first">
                           <h2>Tanggal Mulai Bekerja</h2>
                        </div>
                        <!--// .yui-u -->
                        <div class="yui-u">
                           <div class="job">
                              <h2><?php echo $print->mulai;?> </h2>
                           </div>
                        </div>
                        <!--// .yui-u -->
                     </div>
                     <!--// .yui-gf -->
                  </div>
                  <!--// .yui-b -->
               </div>
               <!--// yui-main -->
            </div>
            <!--// bd -->
            <div id="ft">
               <p>Karunia Travel &mdash; <a href="mailto:cs@karuniatravel.com">cs@karuniatravel.com</a> &mdash; (031) - 531-3253</p>
            </div>
            <!--// footer -->
         </div>
         <!-- // inner -->
      </div>
      <!--// doc -->
      <script>
function myFunction() {
    window.print();
}
</script>
   </body>
</html>
