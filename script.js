(function() {    
    var dialog = document.getElementById('add_passenger_dialog');    
    document.getElementById('add_passenger_form').onclick = function() {    
        dialog.show();    
    };    
    document.getElementById('close_add_passenger').onclick = function() {    
        dialog.close();    
    };    
})();
document.getElementById("pnr_check").onclick = function() {
    var x = document.getElementById("ticket_details");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }  
}