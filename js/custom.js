 jQuery(document).ready(($) => {

   $(".reset_variations").on("click",function (){   
        $("#single-product-placeholder").show(0);
    });

    $("#depo").on("change",function(){
               var firstselectindex = $("#depo").prop("selectedIndex");
                var secondselectindex = $("#distance").prop("selectedIndex");
                if (firstselectindex !=0 && secondselectindex !=0) {
                    $("#single-product-placeholder").hide(0);
                }
    });

    $("#distance").on("change",function(){
        var firstselectindex = $("#depo").prop("selectedIndex");
         var secondselectindex = $("#distance").prop("selectedIndex");
         if (firstselectindex !=0 && secondselectindex !=0) {
             $("#single-product-placeholder").hide(0);
         }
});
    $("#Suburb-quick-search").keydown(function(){
        var content = $('#Suburb-quick-search').val();
        if (content.length<4){
            $("#quick-select-bins").removeClass('active');
        }
    });

$(".quick-select-bin").on("click",function(){
        var id =$(this).data("productid");
        var variation_id=$(this).attr("variationid");
      //  var testingvid=$(".depo-price.active").data("variation_id"); note:not working (getting first quick-select-bin variation_id)
        console.log(id+" "+variation_id);
        if (vid !=""){
   $.ajax({
        url: "http://site02.local/?add-to-cart="+id+"&variation_id="+vid,
        type: "get", //send it through get method
        data: { 
          name: "", 
        },
        success: function(response) {
         // alert("product added to cart successfully")
        },
        error: function(xhr) {
        //  alert("error")
        }
      });
     }
     else {
       location.href="http://site02.local/product/15-m3-skip-bin/";
     }
    });
 
        var options_products = {
          url: "/wp-content/themes/MyTheme/js/depo-locations.json",

            getValue: function(element) {
	            return element.Suburb+" - "+element.Postcode.toString();
               },
         
          list: {

           onClickEvent: function() {
             
               var depo =$("#single-product-autocomplete").getSelectedItemData().Depo;
                var distance =$("#single-product-autocomplete").getSelectedItemData().Distance;
                console.log(depo+distance);

               $('select[name="attribute_depo"]').val(depo);
           
              
               if (distance >0 && distance <= 25){
                  $('select[name="attribute_distance"]').val("0-25km");
   
              
                }else if (distance >25 && distance <=50){
                   $('select[name="attribute_distance"]').val("25-50km");
             
            
                }else if (distance >50 && distance <=75){
                    $('select[name="attribute_distance"]').val("50-75km");
               
           
                }else if (distance >75 && distance <=100){
                   $('select[name="attribute_distance"]').val("75-100km");
              
        
                }else {
                   $('select[name="attribute_distance"]').val("100km+");
             
              
                }
                $('#depo').change();
                $('#distance').change();
                $("#single-product-placeholder").hide();
            },
                match: {
                    enabled: true
                },
                maxNumberOfElements: 5,
            },
           

            theme: "",
      
        };

        var options_quick_selection = {

            url: "/wp-content/themes/MyTheme/js/depo-locations.json",
  
              getValue: function(element) {
                  return element.Suburb+" - "+element.Postcode.toString();
                 },
           
            list: {
  
             onClickEvent: function() {

                var depo =$("#Suburb-quick-search").getSelectedItemData().Depo;
                var distance =$("#Suburb-quick-search").getSelectedItemData().Distance;

                if (distance >0 && distance <= 25){
                      range_distance='0-25km';
                  }else if (distance >25 && distance <=50){
                    range_distance='25-50km';
                  }else if (distance >50 && distance <=75){
                    range_distance='50-75km';
                  }else if (distance >75 && distance <=100){
                    range_distance='75-100km';
                }else {
                    range_distance='100km+';
                  }
                $(".depo-price").each(function(e){
                  if (($(this).data('depo') === depo) && ($(this).data('distance') === range_distance)){
                      $(this).addClass('active');
                 //   $(this).parent().parent().attr('href','cart/?add-to-cart='+productid+'&attribute_depo='+depo+'&attribute_distance='+range_distance);
                 varid=$(this).data('variation_id');
                 $(this).parent().parent().attr('variationid',varid);
                    $('.quick-select-bin').attr('data-distance',range_distance)
                     $('.quick-select-bin').attr('data-depo',depo)
                      
                  }else {
                      $(this).removeClass('active');
                  }
                });
                 $("#quick-select-bins").addClass('active');

              },
                  match: {
                      enabled: true
                  },
                  maxNumberOfElements: 5,
              },
             
  
              theme: "round",
        
          };

       $("#single-product-autocomplete").easyAutocomplete(options_products)
       $("#Suburb-quick-search").easyAutocomplete(options_quick_selection)

    });