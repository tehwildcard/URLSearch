/**
 * Created by Clay on 4/13/2017.
 */
function onrequest() {
    $.post(
        'database.php'
    ).success(function(resp){
        json = $.parseJSON(resp);
        alert(json);
    });
}