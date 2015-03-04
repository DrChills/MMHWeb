$(function(){

var marqueecap = 0;
var trestlecap = 0;
var capcap = 0;
var fescap = 0;
var parcap = 0;
var fairycap = 0;



//marquee cap
$(function(){
$('#cap').bind('keyup keydown change', function () {
//marquees
        capcap = (this.value);
        marqueecap = (this.value / 100 + 0.4); 
        if(marqueecap < 1) // if less than round down
            {marqueecap = 1;}
        else // round up if more than
            {marqueecap = Math.round(marqueecap);}
        if( $('#fmarquee').prop('disabled') ) {
              $('#fmarquee').val(0);}                    
         else {
              $('#fmarquee').val(marqueecap);}


//chairs
if( $('#fwoodchair').prop('disabled') ) {
              $('#fwoodchair').val(0);}                    
         else {
              $('#fwoodchair').val(this.value);}

    

//trestles
         trestlecap = (this.value / 6); 
         trestlecap = Math.ceil(trestlecap);   
         if( $('#ftrestletable').prop('disabled') ) {
              $('#ftrestletable').val(0);}                    
         else {
              $('#ftrestletable').val(trestlecap);}


//rounds
         roundcap = (this.value / 6); 
         roundcap = Math.ceil(roundcap);   
         if( $('#froundtable').prop('disabled') ) {
              $('#froundtable').val(0);}                    
         else {
              $('#froundtable').val(roundcap);}              

//festoons
        fescap = marqueecap * 50;
if( $('#ffestoonlight').prop('disabled') ) {
              $('#ffestoonlight').val(0);}                    
         else {
              $('#ffestoonlight').val(fescap);}


        fairycap = marqueecap * 50;
if( $('#ffairylight').prop('disabled') ) {
              $('#ffairylight').val(0);}                    
         else {
              $('#ffairylight').val(fairycap);}



//parcans
        parcap = marqueecap * 4;
if( $('#fparcan').prop('disabled') ) {
              $('#fparcan').val(0);}                    
         else {
              $('#fparcan').val(parcap);}



//dancefloor
        dancecap = marqueecap * 25;
if( $('#fdancefloor').prop('disabled') ) {
              $('#fdancefloor').val(0);}                    
         else {
              $('#fdancefloor').val(dancecap);}






});
});







$(function(){
    $("#trestletablecheck").bind('keyup keydown change', function(){
        if($("#trestletablecheck").is(":checked"))
        { $("#ftrestletable").prop("disabled",false).val(trestlecap); }
        else 
        {  $("#ftrestletable").prop("disabled",true).val(0); $("#trestletablecheck").prop("checked",false);  }
    });
  if($('#trestletablecheck').is(':checked')) {
      $('#ftrestletable').removeAttr("disabled");
   } else {
      $('#ftrestletable').attr("disabled",true);
   }
 


    $("#roundtablecheck").bind('keyup keydown change', function(){
        if($("#roundtablecheck").is(":checked"))
        { $("#froundtable").prop("disabled",false).val(roundcap); }
        else 
        {  $("#froundtable").prop("disabled",true).val(0); $("#roundtablecheck").prop("checked",false);  }
    });
 if($('#roundtablecheck').is(':checked')) {
      $('#froundtable').removeAttr("disabled");
   } else {
      $('#froundtable').attr("disabled",true);
   }




    $("#marqueecheck").bind('keyup keydown change', function(){
        if($("#marqueecheck").is(":checked"))
        { $("#fmarquee").prop("disabled",false).val(marqueecap); }
        else 
        {  $("#fmarquee").prop("disabled",true).val(0); $("#marqueecheck").prop("checked",false);  }
    });
 if($('#marqueecheck').is(':checked')) {
      $('#fmarquee').removeAttr("disabled");
   } else {
      $('#fmarquee').attr("disabled",true);
   }




$("#woodchaircheck").bind('keyup keydown change', function(){
        if($("#woodchaircheck").is(":checked"))
        { $("#fwoodchair").prop("disabled",false).val(capcap); }
        else 
        {  $("#fwoodchair").prop("disabled",true).val(0); $("#woodchaircheck").prop("checked",false);  }
    });
 if($('#woodchaircheck').is(':checked')) {
      $('#fwoodchair').removeAttr("disabled");
   } else {
      $('#fwoodchair').attr("disabled",true);
   }


$("#fairylightcheck").bind('keyup keydown change', function(){
        if($("#fairylightcheck").is(":checked"))
        { $("#ffairylight").prop("disabled",false).val(fairycap); }
        else 
        {  $("#ffairylight").prop("disabled",true).val(0); $("#fairylightcheck").prop("checked",false);  }
});
 if($('#fairylightcheck').is(':checked')) {
      $('#ffairylight').removeAttr("disabled");
   } else {
      $('#ffairylight').attr("disabled",true);
   }



$("#festoonlightcheck").bind('keyup keydown change', function(){
        if($("#festoonlightcheck").is(":checked"))
        { $("#ffestoonlight").prop("disabled",false).val(capcap); }
        else 
        {  $("#ffestoonlight").prop("disabled",true).val(0); $("#festoonlightcheck").prop("checked",false);  }
    });
 if($('#festoonlightcheck').is(':checked')) {
      $('#ffestoonlight').removeAttr("disabled");
   } else {
      $('#ffestoonlight').attr("disabled",true);
   }


$("#parcancheck").bind('keyup keydown change', function(){
        if($("#parcancheck").is(":checked"))
        { $("#fparcan").prop("disabled",false).val(parcap); }
        else 
        {  $("#fparcan").prop("disabled",true).val(0); $("#parcancheck").prop("checked",false);  }
    });
 if($('#parcancheck').is(':checked')) {
      $('#fparcan').removeAttr("disabled");
   } else {
      $('#fparcan').attr("disabled",true);
   }




$("#dancefloorcheck").bind('keyup keydown change', function(){
        if($("#dancefloorcheck").is(":checked"))
        { $("#fdancefloor").prop("disabled",false).val(dancecap); }
        else 
        {  $("#fdancefloor").prop("disabled",true).val(0); $("#dancefloorcheck").prop("checked",false);  }
    });
 if($('#dancefloorcheck').is(':checked')) {
      $('#fdancefloor').removeAttr("disabled");
   } else {
      $('#fdancefloor').attr("disabled",true);
   }




});











$(function(){
var form = $('#marquee-jquery-order-form');
form.find('span.staticPrice').remove();
form.find('option').each(function(i){
    var opt = $(this);
    opt.text(opt.val());
});
    form.bPrice({"floatSub":true,"showPricesOption":true,"itemize":true,"showZeroAs":"false","subAlign":"right","decimalSep":".","pricesFadeTime":"","emptySummaryText":"<p>Please configure your order...<\/p>","showPrices":true,"signBefore":"\u00a3","signAfter":"","items":{"fmarquee":"10m x 15m Tension Marquee","ftwo":"Carpet Flooring","ftrestletable":"6ft Trestle Table","froundtable":"8ft Round Tables","fwoodchair":"Wooden Chairs","ffairylight":"Fairy Lighting","ffestoonlight":"Festoon Lighting","fparcan":"Par cans","fdancefloor":"Dance Floor","ften":"Name","feleven":"Email","ftweleve":"comment"}});

//form.validationEngine();
});

$(function(){
    $(".sidebar").prependTo(".total-here");

});













});
