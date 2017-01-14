
$('.submitbenefitbtn').on('click', function () {
    $('.benefit-form').hide();
    $('.benefits-list').show();
    $('.edit-benefitbtn').css('visibility', 'visible');
    var benefit1= $('#benefitvalue1').val();
    var benefit2= $('#benefitvalue2').val();
    var benefit3= $('#benefitvalue3').val();
    var benefit4= $('#benefitvalue4').val();
    var benefit5= $('#benefitvalue5').val();

    if (benefit1 != null)
    {
        $('#benefit1').html('<i class="fa-li fa fa-check"></i><span >'+benefit1+'</span>')
    }

    if (benefit2 != null)
    {
        $('#benefit2').html('<i class="fa-li fa fa-check"></i><span >'+benefit2+'</span>')
    }

    if (benefit3 != null)
    {
        $('#benefit3').html('<i class="fa-li fa fa-check"></i><span >'+benefit3+'</span>')
    }

    if (benefit4 != null)
    {
        $('#benefit4').html('<i class="fa-li fa fa-check"></i><span >'+benefit4+'</span>')
    }

    if (benefit5 != null)
    {
        $('#benefit5').html('<i class="fa-li fa fa-check"></i><span >'+benefit5+'</span>')
    }

    $.ajax({
        method : 'POST',
        url: '/editbenefits',
        data : $('.benefit-form').serialize(),
        dataType: 'json',
        success: function(msg){
        },
        error: function(data){

        }
    })

});

$('#updatename').on('click', function(){
    var profilename=$('#profilename').val();
    $.ajax({
        method: 'POST',
        url: '/editprofilename',
        data:{name: profilename,  _token: token}
    })
        .done(function(msg){
            $('.newprofilename').text(profilename);
        })
});


$('#updatepricebtn').on('click', function(){
    var costvalue=$('#costvalue').val();
    $.ajax({
        method: 'POST',
        url: '/price',
        data:{price: costvalue,  _token: token}
    })
        .done(function(msg){
            $('.newprice').text(costvalue);
            $('#costvalue').val(costvalue);
        })
});

$('.updatejobbtn').on('click', function(){
    $('#joblist').text('Loading....');
    var jobvalue= [];
    var i=0;
    $('.jobvalue option:selected').each(function () {
        jobvalue[i]=($(this).val());
        i++;
    });
    $.ajax({
            method: 'POST',
            url: '/updatejob',
            data:{job: jobvalue,  _token: token},
            success: function(){
                var jobshtmlfunc= function(jobarray)
            {
                var jobshtml='';
                for(var i=0; i< jobarray.length; i++)
                {
                    jobshtml +=' '+jobarray[i]+' '+'<span style="color: #999">|</span>';
                }
                return jobshtml;
            }
                $('#joblist').html(jobshtmlfunc(jobvalue));
            },
            error: function(data){
                $('#joblist').text('An error occured , reload the page and try gain');
            }
        })

});
