jQuery(document).ready(function($) {
    
    // initiate the wow class
    new WOW().init();
    
    $('.btnNext').click(function(){
      $('.tabs-header > .active').next('.tab-inner').find('a').trigger('click');
    });
    $('.btnPrevious').click(function(){
      $('.tabs-header > .active').prev('.tab-inner').find('a').trigger('click');
    });
    
});