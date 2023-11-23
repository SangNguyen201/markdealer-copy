/*! DO NOT EDIT THIS FILE. This file is a auto generated on 2023-03-25 */
jQuery(document).ready(function(a){a("#vendor_sold_by_template").change(function(){$vendor_sold_by_template=a(this).val(),a(".vendor_sold_by_type").addClass("wcfm_ele_hide"),a(".vendor_sold_by_type_"+$vendor_sold_by_template).removeClass("wcfm_ele_hide")}).change(),a("#vendor_commission_mode").change(function(){$vendor_commission_mode=a(this).val(),a(".commission_mode_field").addClass("wcfm_ele_hide"),a(".commission_mode_"+$vendor_commission_mode).removeClass("wcfm_ele_hide"),resetCollapsHeight(a("#vendor_commission_mode").parent())}).change(),a(".var_commission_mode").each(function(){a(this).change(function(){$vendor_commission_mode=a(this).val(),a(this).parent().find(".var_commission_mode_field").addClass("wcfm_custom_hide"),a(this).parent().find(".var_commission_mode_"+$vendor_commission_mode).removeClass("wcfm_custom_hide"),resetCollapsHeight(a("#variations"))}).change()}),a("#withdrawal_mode").change(function(){"by_order_status"==($withdrawal_mode=a(this).val())?(a(".auto_withdrawal_order_status").removeClass("wcfm_custom_hide"),a(".manual_withdrawal_ele").addClass("wcfm_custom_hide"),a(".withdrawal_threshold_ele").addClass("wcfm_custom_hide"),a(".schedule_withdrawal_threshold_ele").addClass("wcfm_custom_hide")):"by_manual"==$withdrawal_mode?(a(".auto_withdrawal_order_status").addClass("wcfm_custom_hide"),a(".schedule_withdrawal_threshold_ele").addClass("wcfm_custom_hide"),a(".manual_withdrawal_ele").removeClass("wcfm_custom_hide"),a(".withdrawal_threshold_ele").removeClass("wcfm_custom_hide")):"by_schedule"==$withdrawal_mode&&(a(".auto_withdrawal_order_status").addClass("wcfm_custom_hide"),a(".manual_withdrawal_ele").removeClass("wcfm_custom_hide"),a(".schedule_withdrawal_threshold_ele").removeClass("wcfm_custom_hide"),a(".withdrawal_threshold_ele").removeClass("wcfm_custom_hide"))}).change(),a("#withdrawal_reverse").change(function(){a(this).is(":checked")?a(".reverse_withdrawal_ele").removeClass("wcfm_custom_hide"):a(".reverse_withdrawal_ele").addClass("wcfm_custom_hide")}).change(),a("#withdrawal_payment_methods").find(".payment_options").each(function(){a(this).change(function(){$payment_option=a(this).val(),["stripe","stripe_split"].includes($payment_option)?0<a('.payment_options[value^="stripe"]:checked').length?a(".withdrawal_mode_"+$payment_option).removeClass("wcfm_ele_hide"):a(".withdrawal_mode_"+$payment_option).addClass("wcfm_ele_hide"):a(this).is(":checked")?a(".withdrawal_mode_"+$payment_option).removeClass("wcfm_ele_hide"):a(".withdrawal_mode_"+$payment_option).addClass("wcfm_ele_hide")}).change()}),a("#withdrawal_test_mode").change(function(){a(this).is(":checked")?(a(".withdrawal_mode_live").addClass("wcfm_custom_hide"),a(".withdrawal_mode_test").removeClass("wcfm_custom_hide")):(a(".withdrawal_mode_live").removeClass("wcfm_custom_hide"),a(".withdrawal_mode_test").addClass("wcfm_custom_hide"))}).change(),a("#withdrawal_stripe_is_3d_secure").click(function(){a(this).is(":checked")?a(".withdrawal_charge_type_ele").addClass("wcfm_wpml_hide"):a(".withdrawal_charge_type_ele").removeClass("wcfm_wpml_hide")}),a("#withdrawal_stripe_is_3d_secure").is(":checked")?a(".withdrawal_charge_type_ele").addClass("wcfm_wpml_hide"):a(".withdrawal_charge_type_ele").removeClass("wcfm_wpml_hide"),a("#withdrawal_charge_type").change(function(){"no"==($withdrawal_charge_type=a(this).val())?a(".withdraw_charge_block").addClass("wcfm_custom_hide"):(a(".withdraw_charge_block").removeClass("wcfm_custom_hide"),a(".withdraw_charge_field").addClass("wcfm_ele_hide"),a(".withdraw_charge_"+$withdrawal_charge_type).removeClass("wcfm_ele_hide")),resetCollapsHeight(a("#withdrawal_charge_type").parent().parent())}).change(),a("#transaction_charge_type").change(function(){"no"==($transaction_charge_type=a(this).val())?a(".transaction_charge_block").addClass("wcfm_custom_hide"):(a(".transaction_charge_block").removeClass("wcfm_custom_hide"),a(".transaction_charge_field").addClass("wcfm_ele_hide"),a(".transaction_charge_"+$transaction_charge_type).removeClass("wcfm_ele_hide")),resetCollapsHeight(a("#transaction_charge_type").parent().parent())}).change(),a("#wcfm_map_lib").change(function(){$wcfm_map_lib=a(this).val(),a(".wcfm_map_lib_field").addClass("wcfm_ele_hide"),a(".wcfm_map_lib_field_"+$wcfm_map_lib).removeClass("wcfm_ele_hide"),resetCollapsHeight(a("#wcfm_map_lib").parent())}).change(),a("#withdrawal_payment_methods").find(".payment_options").each(function(){a(this).change(function(){$payment_option=a(this).val(),["stripe","stripe_split"].includes($payment_option)?0<a('.payment_options[value^="stripe"]:checked').length?a(".withdraw_charge_"+$payment_option).removeClass("wcfm_ele_hide"):a(".withdraw_charge_"+$payment_option).addClass("wcfm_ele_hide"):a(this).is(":checked")?a(".withdraw_charge_"+$payment_option).removeClass("wcfm_ele_hide"):a(".withdraw_charge_"+$payment_option).addClass("wcfm_ele_hide")}).change()}),a("#payment_mode").change(function(){$vendor_payment_mode=a(this).val(),a(".withdraw_charge_block").addClass("wcfm_block_hide"),a(".withdraw_charge_"+$vendor_payment_mode).removeClass("wcfm_block_hide"),resetCollapsHeight(a("#vendor_withdrawal_mode").parent())}).change(),a("#vendor_transaction_mode").change(function(){$vendor_transaction_mode=a(this).val(),a(".transaction_mode_field").addClass("wcfm_ele_hide"),a(".transaction_mode_"+$vendor_transaction_mode).removeClass("wcfm_ele_hide"),"global"!=$vendor_transaction_mode&&a("#withdrawal_charge_type").change(),resetCollapsHeight(a("#vendor_transaction_mode").parent())}).change(),a("#vendor_withdrawal_mode").change(function(){$vendor_withdrawal_mode=a(this).val(),a(".withdrawal_mode_field").addClass("wcfm_ele_hide"),a(".withdrawal_mode_"+$vendor_withdrawal_mode).removeClass("wcfm_ele_hide"),"global"!=$vendor_withdrawal_mode&&a("#withdrawal_charge_type").change(),resetCollapsHeight(a("#vendor_withdrawal_mode").parent())}).change(),a("#enable_store_shipping").click(function(){a(this).is(":checked")?(a(".wcfm_store_shipping_fields").removeClass("wcfm_ele_hide"),resetCollapsHeight(a("#wcfm_settings_form_shipping_bu_country_expander"))):a(".wcfm_store_shipping_fields").addClass("wcfm_ele_hide")}),a("#enable_store_shipping").is(":checked")||a(".wcfm_store_shipping_fields").addClass("wcfm_ele_hide"),0<a("#wcfm_store_color_setting_reset_button").length&&a("#wcfm_store_color_setting_reset_button").click(function(e){e.preventDefault(),a.each(wcfm_store_color_setting_options,function(e,t){a("#"+t.name).iris("color",t.default)}),a("#wcfm_settings_save_button").click()}),0<a("#banner_type").length&&a("#banner_type").change(function(){$banner_type=a(this).val(),a(".banner_type_field").hide(),a(".banner_type_"+$banner_type).show(),a('input[type="text"].banner_type_upload').hide()}).change(),0<a("#wcfmvm_sms_verification").length&&a("#wcfmvm_sms_verification").click(function(){a(this).is(":checked")&&a("#phone").attr("checked",!0)}),a("#enable_data_cleanup").click(function(){a(this).is(":checked")?(a(".wcfm_data_cleanup_fields").removeClass("wcfm_ele_hide"),resetCollapsHeight(a("#wcfm_settings_form_data_cleanup_expander"))):a(".wcfm_data_cleanup_fields").addClass("wcfm_ele_hide")}),a("#enable_data_cleanup").is(":checked")||a(".wcfm_data_cleanup_fields").addClass("wcfm_ele_hide")}),function(n){function e(e){var a,_,t=wc_country_select_params.countries.replace(/&quot;/g,'"'),t=n.parseJSON(t),i=e.val();!t[i]||n.isEmptyObject(t[i])?e.parent().find(".wcfmmp_state_to_select").each(function(){$statebox=n(this),$statebox_id=$statebox.attr("id"),$statebox_name=$statebox.attr("name"),null===($statebox_val=$statebox.val())&&($statebox_val=""),$statebox_dataname=$statebox.data("name"),$statebox.is("select")&&$statebox.replaceWith('<input type="text" name="'+$statebox_name+'" id="'+$statebox_id+'" data-name="'+$statebox_dataname+'" value="'+$statebox_val+'" class="wcfm-text wcfmmp_state_to_select multi_input_block_element" />')}):(a=input_selected_state="",_=t[i],e.parent().find(".wcfmmp_state_to_select").each(function(){for(var e in $statebox=n(this),$statebox_id=$statebox.attr("id"),$statebox_name=$statebox.attr("name"),null===($statebox_val=$statebox.val())&&($statebox_val=""),$statebox_dataname=$statebox.data("name"),_){var t;_.hasOwnProperty(e)&&($statebox_val&&(t=$statebox_val==e?'selected="selected"':""),a=a+'<option value="'+e+'"'+t+">"+_[e]+"</option>")}$statebox.is("select")&&$statebox.html('<option value="">'+wc_country_select_params.i18n_select_state_text+'</option><optgroup label="-------------------------------------"><option value="everywhere">'+wcfm_dashboard_messages.everywhere+'</option></optgroup><optgroup label="-------------------------------------">'+a+"</optgroup>"),$statebox.is("input")&&($statebox.replaceWith('<select name="'+$statebox_name+'" id="'+$statebox_id+'" data-name="'+$statebox_dataname+'" class="wcfm-select wcfmmp_state_to_select multi_input_block_element"></select>'),($statebox=n("#"+$statebox_id)).html('<option value="">'+wc_country_select_params.i18n_select_state_text+'</option><optgroup label="-------------------------------------"><option value="everywhere">'+wcfm_dashboard_messages.everywhere+'</option></optgroup><optgroup label="-------------------------------------">'+a+"</optgroup>")),$statebox.val($statebox_val)})),"everywhere"==i?(e.parent().find(".wcfmmp_shipping_state_rates_label").addClass("wcfm_custom_hide"),e.parent().find(".multi_input_holder").addClass("wcfm_custom_hide")):(e.parent().find(".wcfmmp_shipping_state_rates_label").removeClass("wcfm_custom_hide"),e.parent().find(".multi_input_holder").removeClass("wcfm_custom_hide"))}function c(e,t,a){document.getElementById("store_location").value=e,document.getElementById("store_lat").value=t,document.getElementById("store_lng").value=a}function l(e,t,a){google.maps.event.addListener(t,"click",function(){e.setContent(a),e.open(map,t)})}n("#enable_marketplace_shipping").click(function(){n(this).is(":checked")?(n(".wcfm_store_shipping_country_fields").removeClass("wcfm_ele_hide"),resetCollapsHeight(n("#wcfm_settings_form_shipping_by_country_expander"))):n(".wcfm_store_shipping_country_fields").addClass("wcfm_ele_hide")}),n("#enable_marketplace_shipping").is(":checked")||n(".wcfm_store_shipping_country_fields").addClass("wcfm_ele_hide"),n("#enable_marketplace_shipping_by_weight").click(function(){n(this).is(":checked")?(n(".wcfm_store_shipping_weight_fields").removeClass("wcfm_ele_hide"),resetCollapsHeight(n("#wcfm_settings_form_shipping_by_weight_expander"))):n(".wcfm_store_shipping_weight_fields").addClass("wcfm_ele_hide")}),n("#enable_marketplace_shipping_by_weight").is(":checked")||n(".wcfm_store_shipping_weight_fields").addClass("wcfm_ele_hide"),n("#enable_marketplace_shipping_by_distance").click(function(){n(this).is(":checked")?(n(".wcfm_store_shipping_distance_fields").removeClass("wcfm_ele_hide"),resetCollapsHeight(n("#wcfm_settings_form_shipping_by_distance_expander"))):n(".wcfm_store_shipping_distance_fields").addClass("wcfm_ele_hide")}),n("#enable_marketplace_shipping_by_distance").is(":checked")||n(".wcfm_store_shipping_distance_fields").addClass("wcfm_ele_hide"),n(".wcfmmp_country_to_select").each(function(){n(this).change(function(){e(n(this))}).change()}),setTimeout(function(){n("#wcfmmp_shipping_rates").children(".multi_input_block").children(".add_multi_input_block").click(function(){n("#wcfmmp_shipping_rates").children(".multi_input_block:last").find(".wcfmmp_country_to_select").select2(),n("#wcfmmp_shipping_rates").children(".multi_input_block:last").find(".wcfmmp_country_to_select").change(function(){e(n(this))}).change()}),n("#wcfmmp_shipping_rates").find(".multi_input_block").children(".add_multi_input_block").click(function(){resetCollapsHeight(n("#wcfm_settings_form_shipping_bu_country_expander"))}),n("#wcfmmp_shipping_rates_by_weight").children(".multi_input_block").children(".add_multi_input_block").click(function(){n("#wcfmmp_shipping_rates_by_weight").children(".multi_input_block:last").find(".wcfmmp_weightwise_country_to_select").select2(),n("#wcfmmp_shipping_rates_by_weight").children(".multi_input_block:last").find(".wcfmmp_weightwise_country_mode_select").change(function(){"by_rule"!=($weightwise_country_mode=n(this).val())?(n(this).parent().find(".wcfmmp_weightwise_country_mode_by_rule").addClass("wcfm_custom_hide"),n(this).parent().find(".wcfmmp_weightwise_country_mode_by_unit").removeClass("wcfm_custom_hide")):(n(this).parent().find(".wcfmmp_weightwise_country_mode_by_rule").removeClass("wcfm_custom_hide"),n(this).parent().find(".wcfmmp_weightwise_country_mode_by_unit").addClass("wcfm_custom_hide"))}).change()}),n("#wcfmmp_shipping_rates_by_weight").find(".multi_input_block").children(".add_multi_input_block").click(function(){resetCollapsHeight(n("#wcfm_settings_form_shipping_bu_country_expander"))}),n("#wcfmmp_shipping_rates_by_weight").find(".multi_input_block").find(".wcfmmp_weightwise_country_mode_select").change(function(){"by_rule"!=($weightwise_country_mode=n(this).val())?(n(this).parent().find(".wcfmmp_weightwise_country_mode_by_rule").addClass("wcfm_custom_hide"),n(this).parent().find(".wcfmmp_weightwise_country_mode_by_unit").removeClass("wcfm_custom_hide")):(n(this).parent().find(".wcfmmp_weightwise_country_mode_by_rule").removeClass("wcfm_custom_hide"),n(this).parent().find(".wcfmmp_weightwise_country_mode_by_unit").addClass("wcfm_custom_hide"))}).change()},2e3),0<n("#wcfm-marketplace-map").length&&($store_lat=jQuery("#store_lat").val(),$store_lng=jQuery("#store_lng").val(),$is_initialize=!1,n("#wcfm_settings_form_geolocate_head").click(function(){!$is_initialize&&0<jQuery("#store_lat").length&&setTimeout(function(){var a,e,t,_,i,s,o;"google"==wcfm_maps.lib?(e=new google.maps.LatLng($store_lat,$store_lng),s=new google.maps.Map(document.getElementById("wcfm-marketplace-map"),{center:e,mapTypeId:google.maps.MapTypeId.ROADMAP,zoom:parseInt(wcfmmp_setting_map_options.default_zoom)}),o={url:wcfmmp_setting_map_options.store_icon,scaledSize:new google.maps.Size(wcfmmp_setting_map_options.icon_width,wcfmmp_setting_map_options.icon_height)},a=new google.maps.Marker({map:s,position:e,animation:google.maps.Animation.DROP,icon:o,draggable:!0}),e=document.getElementById("find_address"),t=new google.maps.Geocoder,(_=new google.maps.places.Autocomplete(e)).bindTo("bounds",s),i=new google.maps.InfoWindow,_.addListener("place_changed",function(){i.close(),a.setVisible(!1);var e=_.getPlace();e.geometry?(e.geometry.viewport?s.fitBounds(e.geometry.viewport):(s.setCenter(e.geometry.location),s.setZoom(parseInt(wcfmmp_setting_map_options.default_zoom))),a.setPosition(e.geometry.location),a.setVisible(!0),c(e.formatted_address,e.geometry.location.lat(),e.geometry.location.lng()),i.setContent(e.formatted_address),i.open(s,a),l(i,a,e.formatted_address)):window.alert("Autocomplete returned place contains no geometry")}),google.maps.event.addListener(a,"dragend",function(){t.geocode({latLng:a.getPosition()},function(e,t){t==google.maps.GeocoderStatus.OK&&e[0]&&(c(e[0].formatted_address,a.getPosition().lat(),a.getPosition().lng()),i.setContent(e[0].formatted_address),i.open(s,a),l(i,a,e[0].formatted_address),document.getElementById("searchStoreAddress"))})})):(n("#find_address").replaceWith('<div id="leaflet_find_address"></div>'),$store_lat&&$store_lng?((s=new L.Map("wcfm-marketplace-map",{zoom:parseInt(wcfmmp_setting_map_options.default_zoom),center:new L.latLng([$store_lat,$store_lng])})).addLayer(new L.TileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png")),L.marker([$store_lat,$store_lng]).addTo(s).on("click",function(){window.open("https://www.openstreetmap.org/?mlat="+$store_lat+"&mlon="+$store_lng+"#map=14/"+$store_lat+"/"+$store_lng,"_blank")})):(s=new L.Map("wcfm-marketplace-map",{zoom:parseInt(wcfmmp_setting_map_options.default_zoom),center:new L.latLng([41.57573,13.002411])})).addLayer(new L.TileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png")),o=new L.Control.Search({container:"leaflet_find_address",url:"https://nominatim.openstreetmap.org/search?format=json&q={s}",jsonpParam:"json_callback",propertyName:"display_name",propertyLoc:["lat","lon"],marker:L.marker([0,0]),moveToLocation:function(e,t,a){c(t,e.lat,e.lng),a.setView(e,parseInt(wcfmmp_setting_map_options.default_zoom))},initial:!1,collapsed:!1,autoType:!1,minLength:2}),s.addControl(o),n("#leaflet_find_address").find(".search-input").val(n("#store_location").val()),setTimeout(function(){s.invalidateSize()},3e3)),$is_initialize=!0},1e3)}))}(jQuery);