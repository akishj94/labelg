jQuery(document).ready(function($){
    'use strict';    
    // function homeSection(){
    //     let header = $('.site-header').outerHeight();
    //     let footer = $('.site-footer').outerHeight();
    //     let windowHeight = $(window).outerHeight();
    //     $('.home-ent').css('min-height', windowHeight - (header + footer));

    // }
    // homeSection();
    // $(window).on('resize', function(){
    //     homeSection();
    // });
    $('select').selectric({
        maxHeight: 240
    });
    $('.bapf_head').on('click', function(e){
        e.preventDefault();
    });
    var initScroll = 0;
    $(window).on('scroll', function(){
        var pos = $(this).scrollTop();
        if(pos > 85){
            if(!$('#gd-header').hasClass('scrolled')){
                $("#gd-header").addClass('scrolled');
            }
        }
        if(pos == 0){
            $('#gd-header').removeClass('scrolled');
        }        
        initScroll = pos;
    });    
    $('.product-sorting > ul li:not(:first-of-type)').on('click', function(){
        var sortBy = $(this).text().toLowerCase();
        var sortActive = $(this);
        $('.woocommerce-ordering .selectric-scroll ul li').each(function(){
            var sortValue = $(this).text().toLowerCase();
            if(sortValue.indexOf(sortBy) != -1){
                $(this).trigger('click');
                sortActive.addClass('active');
                $('.product-sorting > ul li').not(sortActive).removeClass('active');
            }
        })
    });
    $('.close-search, a[data-action="search"]').on('click', function(e){
        e.preventDefault();
        $('#search-form').toggleClass('active');
    });    

    window.onload = function(){
        const scroll = new LocomotiveScroll({
            el: document.querySelector('[data-scroll-container]'),
            smooth: true
        });
        const siteHeader = document.querySelector('#gd-header');
        if(siteHeader != undefined && siteHeader.length != 0){
            scroll.on('scroll', function(position){
                if(position.scroll.y > 120){
                    (siteHeader.classList.contains('scrolled') ? null : siteHeader.classList.add('scrolled'));                    
                }
                else{
                    (siteHeader.classList.contains('scrolled') ? siteHeader.classList.remove('scrolled') : null);
                }
            });
        }        
    }
});