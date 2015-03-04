<?php

 $strSQL = "SELECT * FROM products WHERE identifier='marquee'";
   $rs = mysql_query($strSQL);
   while($row = mysql_fetch_array($rs)) {
    $marqueetitle       = $row['item'];
    $marqueedescription = $row['description'];
    $marqueecostprice   = $row['costprice'];
    $marqueehireprice   = $row['hireprice'];
    $marqueeidentifier  = $row['identifier'];
    $marqueecat         = $row['cat'];
    }

   $strSQL = "SELECT * FROM products WHERE identifier='woodchair'";
   $rs = mysql_query($strSQL);
   while($row = mysql_fetch_array($rs)) {
    $woodentitle       = $row['item'];
    $woodendescription = $row['description'];
    $woodencostprice   = $row['costprice'];
    $woodenhireprice   = $row['hireprice'];
    $woodenidentifier  = $row['identifier'];
    $woodencat         = $row['cat'];
    }

   $strSQL = "SELECT * FROM products WHERE identifier='trestletable'";
   $rs = mysql_query($strSQL);
   while($row = mysql_fetch_array($rs)) {
    $trestletitle       = $row['item'];
    $trestledescription = $row['description'];
    $trestlecostprice   = $row['costprice'];
    $trestlehireprice   = $row['hireprice'];
    $trestleidentifier  = $row['identifier'];
    $trestlecat         = $row['cat'];
    }

       $strSQL = "SELECT * FROM products WHERE identifier='roundtable'";
   $rs = mysql_query($strSQL);
   while($row = mysql_fetch_array($rs)) {
    $roundtitle       = $row['item'];
    $rounddescription = $row['description'];
    $roundcostprice   = $row['costprice'];
    $roundhireprice   = $row['hireprice'];
    $roundidentifier  = $row['identifier'];
    $roundcat         = $row['cat'];
    }

       $strSQL = "SELECT * FROM products WHERE identifier='festoonlight'";
   $rs = mysql_query($strSQL);
   while($row = mysql_fetch_array($rs)) {
    $festoontitle       = $row['item'];
    $festoondescription = $row['description'];
    $festooncostprice   = $row['costprice'];
    $festoonhireprice   = $row['hireprice'];
    $festoonidentifier  = $row['identifier'];
    $festooncat         = $row['cat'];
    }

       $strSQL = "SELECT * FROM products WHERE identifier='parcan'";
   $rs = mysql_query($strSQL);
   while($row = mysql_fetch_array($rs)) {
    $partitle       = $row['item'];
    $pardescription = $row['description'];
    $parcostprice   = $row['costprice'];
    $parhireprice   = $row['hireprice'];
    $paridentifier  = $row['identifier'];
    $parcat         = $row['cat'];
    }

           $strSQL = "SELECT * FROM products WHERE identifier='fairylight'";
   $rs = mysql_query($strSQL);
   while($row = mysql_fetch_array($rs)) {
    $fairytitle       = $row['item'];
    $fairydescription = $row['description'];
    $fairycostprice   = $row['costprice'];
    $fairyhireprice   = $row['hireprice'];
    $fairyidentifier  = $row['identifier'];
    $fairycat         = $row['cat'];
    }


       $strSQL = "SELECT * FROM products WHERE identifier='dancefloor'";
   $rs = mysql_query($strSQL);
   while($row = mysql_fetch_array($rs)) {
    $dancetitle       = $row['item'];
    $dancedescription = $row['description'];
    $dancecostprice   = $row['costprice'];
    $dancehireprice   = $row['hireprice'];
    $danceidentifier  = $row['identifier'];
    $dancecat         = $row['cat'];
    }


    ?>