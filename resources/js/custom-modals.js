import cash from "cash-dom";

export default {
    /*
     * showBlankModal
     * Shows a Generic model with static backdrop
     * @returns nothing
     */
    showLoadertModal : async function (action, callback) {
        let thisModal = cash('#static-backdrop-modal')
        await callback();
        setTimeout(() => { 
            thisModal.modal("hide");
            thisModal.find('.sb-modal-ok-action').show();
        }, 1000);
        //cash('#refresh-fleet').html('<div> <i data-loading-icon="refresh-ccw" data-color="white" class="w-12 h-12 mx-auto"></i></div>').svgLoader();

        thisModal.find('.sb-modal-content').html(` <i data-loading-icon="refresh-ccw" data-color="green" class="w-8 h-8"></i>`).svgLoader();
        thisModal.find('.sb-modal-ok-action').hide();
        thisModal.modal("show");
    },
    /*
     * showBlankModal
     * Shows a Generic model with static backdrop
     * @returns nothing
     */
    showStaticContentModal : function (content=null, action="OK" ,callback) {
        let thisModal = cash('#static-backdrop-modal')
            
        thisModal.find('.sb-modal-content').html(content)
        thisModal.find('.sb-modal-ok-action').html(action)
                .on("click", function () {
                    callback();
                    thisModal.modal("hide");
                });
        thisModal.modal("show");
    },

    /*
     * showBlankModal
     * Shows a Generic model with static backdrop
     * @returns nothing
     */
    showSuccessModal : function (title, content, action="OK", callback) {
        let thisModal = cash('#sb-success-modal')

        thisModal.find('.sb-modal-title').html(content)    
        thisModal.find('.sb-modal-content').html(content)
        thisModal.find('.sb-modal-ok-action').html(action)
                .on("click", function () {
                    callback();
                    thisModal.modal("hide");
                });
        thisModal.modal("show");
    },


    /*
     * showBlankModal
     * Shows a Generic model with static backdrop
     * @returns nothing
     */
    showWarningModal : function (title, content, action="OK", callback) {
        let thisModal = cash('#sb-warning-modal')
          
        thisModal.find('.sb-modal-title').html(title)
        thisModal.find('.sb-modal-content').html(content)
        thisModal.find('.sb-modal-ok-action').html(action)
                .on("click", function () {
                    callback();
                    thisModal.modal("hide");
                });
        thisModal.modal("show");
    },

    /*
     * showUserAuthModal
     * Shows a  model with options for signing up
     * @returns nothing
     */    
    showCriticalQuestionModel: (title, content, callback) => { 
        let thisModal = cash('#critical-question-model')
        
        thisModal.find('.cqm-title').html(title)
        thisModal.find('.cqm-content').html(content)
        thisModal //ok action is signup button
            .find('.cqm-ok-action')
                .on("click", () => { 
                    callback()
                    thisModal.modal("hide");
                })
            //here cancel action is signin button
            
        thisModal.modal('show');
    },
    /*
     * showUserAuthModal
     * Shows a  model with options for signing up
     * @returns nothing
     */    
    showLureUserAuthModal: () => { 
        let thisModal = cash('#lure-user-box-model')
        thisModal //ok action is signup button
            .find('.sb-modal-ok-action')
                .on("click", function () {
                    location.href = "/register"
                    thisModal.modal("hide");
                })
            //here cancel action is signin button
            thisModal
                .find('.sb-modal-cancel-action')
                .on("click", function () {
                    location.href = "/login"
                    thisModal.modal("hide");
                })
        thisModal.modal('show');
    },
     

}

