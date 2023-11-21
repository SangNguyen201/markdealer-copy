(function($) {
   $(document).ready(function() {
      // Click nut DAT MUA
      $(".nut-dat-mua").click(function() {
         $("#dat-mua").addClass("show");
         $(".ttsp-an input[name='link-san-pham']").val();
         var idp = $(this).attr("value");
         const data = {
            'action' : 'dat_mua_sp',
            idp : idp,
         }
         $.ajax({
            type: 'GET',
            url: ajax_url,
            data: data,
            success: function(data) {
               $("#dat-mua .wpcf7-form").prepend(data);
               
            }
         });
         return data;
      });

   });
})(jQuery);