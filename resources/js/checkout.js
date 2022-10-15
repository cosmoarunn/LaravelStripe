import cash from "cash-dom";
import axios from "axios";
import customNotifications from "./custom-notifications";
import customModals from "./custom-modals";
import Common from './common.js';

import VueFeather from 'vue-feather';
import { createApp } from 'vue';          

import store from './store/subs-store.js';

import SubsCheckoutVue from '../views/_vue/SubsCheckout.vue'                                                        

(function (cash) {
    "use strict";
    //initialize vue3
    console.log('Initializing vue3 SubsCheckoutVu..')
    if(cash('.subs-checkout-vue').length) { 
         //The app's event bus 
        const subsApp = createApp(SubsCheckoutVue);
        //dashboardApp.provide('bus', EventBus); 
        subsApp.component(VueFeather.name, VueFeather)
        subsApp.use(store);
        subsApp.config.globalProperties.bus = bus;
        subsApp.mount('.subs-checkout-vue'); 
      }

})(cash);

let geo_api_key = 'AIzaSyC7h3ZoQf09KmbGo-X5V4Yl0cWM8uHanLs1';
console.log(geo_api_key);
(function (cash) {
    "use strict";
    var selectedPaymentMethod = '';

    if(cash('#add-pmnt-method').length) { 
        cash('#add-pmnt-method').on('click', function() { 
            customModals.showStaticContentModal(
                "<div class='mdtest1 text-bold'>test </div>", 'Add', () => { 
                    console.log('posting data here..');
                    cash('.mdtest1').html('testing.. done!');
                }
            )
        })
    }

    if(cash('.checkout-pm').length) { 
        cash('.checkout-pm').each(function() {
            cash(this).on('click', function() { 
                let pm_id = cash(this).data('pmid');
                cash('.checkout-pm').each(function() {   cash(this).removeClass('border')  })
                cash(this).addClass('border') 
                selectedPaymentMethod = cash(this).data('pmid');
                console.log(selectedPaymentMethod);
            })
        })
    }

    if(cash('.billing-info').length) { 
        cash('.billing-info').on('click', function() { 
            cash('#billing-info-slideover').modal('show')
        });
    }

    if(cash('.pc-lookup').length) { 
        cash('.pc-lookup').on('click', function() { 
            let address = Common.postcodeLookup(geo_api_key, cash('#HouseNumber').val(),cash('#PostCode').val().toUpperCase())
            // Display the results
            cash('#address_1').text(address.line1);
            cash('#address_2').text(address.line2);
            cash('#town').text(address.city);
            cash('#county').text(address.region);
            cash('#postcode').text(cash('#PostCode').val().toUpperCase());
            cash('#region').text(address.region);
            cash('#country').text(address.country);
        })
    }
    /*
    customModals.showCriticalQuestionModel(
        "Critical",
        "Would you like to cancel editing ?",
        () => (console.log('critical callback called!'))
    );
        */
       
    customNotifications.showUserMessageNotification(null, 'aeroarunn', "Sample text message!", 5000)

})(cash);

