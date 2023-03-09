$(document).ready(function(){

    if($("#upgrade").val() == 1){
        $("#event_dates_upgrade_section").removeClass('hidden');
        $("#upgrade").prop('checked', true);

    }
    $("#accessibility").on('change',function(){
        let vall = $(this).val();
        if(vall == 'public'){
            $("#private_event_section").slideUp();
            $("#public_event_section").slideDown();
        }else{
            $("#public_event_section").slideUp();
            $("#private_event_section").slideDown();
        }
    })

    $("#upgrade").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#event_dates_upgrade_section").removeClass('hidden');
            
            // $("#event_dates_upgrade_section").slideDown();
        } else{
            $(this).val(0);
            $("#event_dates_upgrade_section").addClass('hidden');
            // $("#event_dates_upgrade_section").slideUp();
        }
    })



})