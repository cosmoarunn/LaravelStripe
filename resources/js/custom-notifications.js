import cash from "cash-dom";
import Toastify from "toastify-js";

export default {

    
    /*
     * showGenericActionNotification
     * Shows a Generic notification with action buttons
     * @returns {random.m|Number|random.a|random.c}
     */
    showGenericActionNotification : function (position="right", gravity="top", content=null) {
      
        Toastify({
            node: cash("#signup-notification-with-actions-content")
                .clone()
                .removeClass("hidden")[0],
            duration: 3000,
            newWindow: true,
            close: true, 
            gravity: "top",
            position: "right",
            stopOnFocus: true,
        }).showToast();
    },

     resultsNotification : function (title, content,duration, gravity = "top", position="right",result="failed") { 
        let notifier = cash('#results-notification-content').clone();

        notifier.find('.notification-icon').data('feather',(result=='success')?'check-circle':'x')
        notifier.find('.notification-title').html(title)
        notifier.find('.notification-content').html('<p>'+content+'</p>')
        
        Toastify({
            node: notifier.removeClass("hidden")[0],
            duration: duration,
            newWindow: true,
            close: true,
            gravity: gravity,
            position: position,
            stopOnFocus: true,
        }).showToast();
    },

     showUserMessageNotification: function(avatar_url, user_fullname, content,duration, gravity = "top", position="right",callback=null) { 
        
        let notifier = cash('#user-message-notification-with-avatar-content').clone();

        notifier.find('.notification-avatar').attr('src', avatar_url)
        notifier.find('.notification-user').html('<p>'+user_fullname+'</p>')
        notifier.find('.notification-content').html('<p>'+content+'</p>')
        
        
        // Init toastify
        let avatarNotification = Toastify({
            node: notifier.removeClass("hidden")[0],
            duration: duration,
            newWindow: true,
            close: true,
            gravity: "top",
            position: "right",
            stopOnFocus: true,
        }).showToast();

        // Close notification event and pass callback
        cash(avatarNotification.toastElement)
        .find('[data-dismiss="notification"]')
        .on("click", function () {
            callback();
            avatarNotification.hideToast();
        });
    }

}

