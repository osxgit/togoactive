$(document).ready(function(){
    
    $('.modalbtn').click(function(){
        alert('11');
        $('#exampleModal').modal('show');

    })
    if($("#upgrade").val() == 1){
        $("#event_dates_upgrade_section").removeClass('hidden');
        $("#upgrade").prop('checked', true);

    }
    if($("#enable_teams").val() == 1){
        $("#team_mem_div").removeClass('hidden');
        $("#enable_teams").prop('checked', true);
    }
    $("#enable_teams").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#team_mem_div").removeClass('hidden');
            $("#enable_teams").prop('checked', true);
        }else{
            $(this).val(0);
            $("#team_mem_div").addClass('hidden');
            $("#enable_teams").prop('checked', false);
        }
    })

    if($("#enable_delivery_address").val() == 1){
        $("#address_reason_div").removeClass('hidden');
        $("#enable_delivery_address").prop('checked', true);
    } else{

        $('#custom_reason_div').addClass('hidden');
        $('#custom_reason').val('');
    }



    $("#enable_delivery_address").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#address_reason_div").removeClass('hidden');
            $("#enable_delivery_address").prop('checked', true);
        }else{
            $(this).val(0);
            $("#address_reason_div").addClass('hidden');
            $("#enable_delivery_address").prop('checked', false);
            $('#custom_reason_div').addClass('hidden');
            $('#custom_reason').val('');
        }
    })


    if($("#enable_grouping").val() == 1){
        $("#grouping_div").removeClass('hidden');
        $("#enable_grouping").prop('checked', true);
    } else{
        $("#grouping_div").addClass('hidden');
        $("#enable_grouping").prop('checked', false);

    }
    $("#enable_grouping").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#grouping_div").removeClass('hidden');
            $("#enable_grouping").prop('checked', true);
        }else{
            $(this).val(0);
            $("#grouping_div").addClass('hidden');
            $("#enable_grouping").prop('checked', false);
        }
    })
    if($("#enable_random_allocation").val() == 1){
        $("#enable_random_allocation").prop('checked', true);
    }
    $("#enable_random_allocation").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#enable_random_allocation").prop('checked', true);
        }else{
            $(this).val(0);
            $("#enable_random_allocation").prop('checked', false);
        }
    })


    if($("#enable_map_view").val() == 1){
        $("#enable_map_view").prop('checked', true);
    }
    $("#enable_map_view").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#enable_map_view").prop('checked', true);
        }else{
            $(this).val(0);
            $("#enable_map_view").prop('checked', false);
        }
    })


    if($("#enable_referral").val() == 1){
        $("#enable_referral").prop('checked', true);
    }
    $("#enable_referral").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#enable_referral").prop('checked', true);
        }else{
            $(this).val(0);
            $("#enable_referral").prop('checked', false);
        }
    })


    if($("#enable_coupon").val() == 1){
        $("#enable_coupon").prop('checked', true);
    }
    $("#enable_coupon").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#enable_coupon").prop('checked', true);
        }else{
            $(this).val(0);
            $("#enable_coupon").prop('checked', false);
        }
    })


    if($("#is_core_item").val() == 1){
        $("#is_core_item").prop('checked', true); 

    }
    $("#is_core_item").on('change',function(){
        let vall = $(this).val();
        if(vall == 0) {
            $(this).val(1);
        } else{
            $(this).val(0);
        }

    });
    if($('#enable_sizing').val() == 1){
        $("#event_reward_sizing_section").removeClass('hidden');
        $("#enable_sizing").prop('checked', true);

    }

    if($('#restrict_to_country').val() == 1){
        $("#countrylist").removeClass('hidden');
        $("#restrict_to_country").prop('checked', true);

    }

    $("#restrict_to_country").on('change',function(){
        let vall = $(this).val();
        $('input[type=text]').each(function() {
            if($(this).attr('id')  != 'global'){
                $(this).val('');
            }
        });
        if(vall == 0){
            $(this).val(1);
            $('.clear-button').click();
            $("#countrylist").removeClass('hidden');
            $('.globalprice').addClass('hidden');
            $('div.price').addClass('hidden');
        }else{
            $(this).val(0);
            $('#additional_price').html("");
            $("#countrylist").addClass('hidden');
            $('.globalprice').removeClass('hidden');
            $('div.price').removeClass('hidden');
        }
 
    })


    $("#enable_sizing").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#event_reward_sizing_section").removeClass('hidden');
        }else{
            $(this).val(0);
            $("#event_reward_sizing_section").addClass('hidden');
        }
    })


    if($("#accessibility").val() == 'public'){
        $("#private_event_section").slideUp();
        $("#public_event_section").slideDown();

    } else{
        $("#public_event_section").slideUp();
        $("#private_event_section").slideDown();
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
$('#reason_for_collecting_address').on('change',function(){
    let vall = $(this).val();
    if(vall == 'Custom reason'){
        $("#custom_reason_div").removeClass('hidden');
    }else{
        $("#custom_reason_div").addClass('hidden');
    }
})
    $("#upgrade").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#event_dates_upgrade_section").removeClass('hidden');
            // $("#event_dates_upgrade_section").slideDown();
        } else{
            console.log('ttt');
            $(this).val(0);
            $('#upgrade_start_date').val("");
            $('#upgrade_end_date').val("");
            $("#event_dates_upgrade_section").addClass('hidden');
            // $("#event_dates_upgrade_section").slideUp();
        }
    })


//landing page

    if($("#show_countdown").val() == 1){
        $("#show_countdown").prop('checked', true);
    }
    $("#show_countdown").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#show_countdown").prop('checked', true);
        }else{
            $(this).val(0);
            $("#show_countdown").prop('checked', false);
        }
    })

    if($("#show_sponsor").val() == 1){
        $("#show_sponsor").prop('checked', true);
    }
    $("#show_sponsor").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#show_sponsor").prop('checked', true);
            $("#sponsorDetailDiv").removeClass('hidden');
        }else{
            $(this).val(0);
            $("#show_sponsor").prop('checked', false);
            $("#sponsorDetailDiv").addClass('hidden');
        }
    })
    if($("#show_rewards").val() == 1){
        $("#show_rewards").prop('checked', true);
    }
    $("#show_rewards").on('change',function(){
        let vall = $(this).val();
        if(vall == 0){
            $(this).val(1);
            $("#show_rewards").prop('checked', true);
        }else{
            $(this).val(0);
            $("#show_rewards").prop('checked', false);
        }
    })


})
