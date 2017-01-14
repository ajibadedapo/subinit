$('.close_editor').on('click', function(){
   $('.desc_editor_div').hide();
    $('.writedescription').show();
});
$('.writedescription').on('click', function(){
    $('.desc_editor_div').show();
    $('.writedescription').hide();
});

$('.edit-benefitbtn').on('click', function () {
    $('.benefit-form').show();
    $('.benefits-list').hide();
    $('.edit-benefitbtn').css('visibility', 'hidden');
});

$('.cancel-benefitbtn').on('click', function () {
    $('.benefit-form').hide();
    $('.benefits-list').show();  
    $('.edit-benefitbtn').css('visibility', 'visible');
});

/*$('.profilename').on('mouseover',function () {
   $('.editname').show();
}).on('mouseleave',function () {
    $('.editname').hide();
});

$('#pricebtn').on('mouseover',function () {
   $('.editprice').show();
}).on('mouseleave',function () {
    $('.editprice').hide();
});*/

/*$('.writedescription').on('mouseover',function () {
    $('.editdesc').show();
}).on('mouseleave',function () {
    $('.editdesc').hide();
});*/

$('.editname').on('click', function(){
    $('.profilename').hide();
    $('.inputprofilename').show();
});
$('.close_inputprofilename').on('click', function(){
    $('.profilename').show();
    $('.inputprofilename').hide();
});

