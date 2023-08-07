$(document).ready(function () {

    $(".menu-desktop .nav-sub .nav-sub-child").each(function () {
        let length = $(this).find(".nav-sub-item-child").length;
        if (length) {
            $(this).prev("a").append("<i class='fa fa-angle-right pt_icon_right'></i>");
        }
    });
    // $(".menu-desktop .nav-item .nav-sub").each(function() {
    //     if ($(this).find(".nav-sub-item").length) {
    //         $(this).prev("a").append("<i class='fa fa-angle-down' aria-hidden='true'></i>");
    //     }
    // })
    $(".menu_fix_mobile .nav-sub").each(function () {
        if ($(this).find(".nav-sub-item").length) {
            $(this).parent(".nav-item").prepend("<i class='fa fa-chevron-down mm1'></i>");
        }
    })
    $(".menu_fix_mobile .nav-sub-child").each(function () {
        if ($(this).find(".nav-sub-item-child").length) {
            $(this).parent(".nav-sub-item").prepend("<i class='fa fa-chevron-down mm2'></i>");
        }
    })
    // $(".menu_fix_mobile .megamenu-container .list-megamenu").each(function() {
    //     if ($(this).find(".megamenu-item").length) {
    //         $(this).parents(".nav-megamenu").prepend("<i class='fa fa-chevron-down mega-mn1'></i>");
    //     }
    // });
    $('.menu_fix_mobile .mn-icon').click(function () {
        event.preventDefault();
        $(this).parent('a').next('ul').slideToggle();
        $(this).parent().toggleClass('active');
    });

    $(".megamenu-item-sub .submenu-right3").each(function () {
        let length = $(this).find("li").length;
        if (length) {
            $(this).prev("a").append("<div class='openc'></div>");

        }
    })
    $(".megamenu-item-sub .openc").click(function () {
        event.preventDefault();
        $(this).parents(".megamenu-item-sub").find(".submenu-right3").slideToggle();
        $(this).parents(".megamenu-item-sub").toggleClass('active');
    })

    $(".language_selected").click(function () {
        $(this).parent().find(".language_change").toggle();
    });

    $(".language_selected_mb").click(function () {
        $(this).parent().find(".language_change_mb").toggle();
    });

    $(".mega-mn1").click(function () {
        event.preventDefault();
        $(this).parents(".nav-megamenu").find(".megamenu-container").slideToggle();
    });

    $('.list-bar').click(function () {
        $('.menu_fix_mobile').toggleClass('main-menu-show');
        $(this).toggleClass('change');
    });

    $('.close-menu #close-menu-button').click(function () {
        $(this).parent().parent().removeClass('main-menu-show');
        $('.list-bar').removeClass('change');
    });

    $('.menu_fix_mobile .mm1').click(function () {
        $(this).parent().find('.nav-sub').slideToggle();
        $(this).parent().toggleClass('active');
    });
    $('.menu_fix_mobile .mm2').click(function () {
        $(this).parent().find('.nav-sub-child').slideToggle();
        $(this).parent().toggleClass('active');
    });

    $('.show_search a').click(function () {
        $('#search').slideToggle();
    });
    $('.close-search').click(function () {
        $('#search').slideToggle();
    })
    $('.search_mobile').click(function () {
        $('#search').slideToggle();
    });
    $('.load-more-cate-btn').click(function () {

        $('.cate-right-top').addClass('show-list');
    });

    $('.load-more-cate-btn2').click(function () {

        $('.info_detail .content').addClass('show-list');
        $(this).parent().hide();
    });
    $('.box_link_foot .show_mb').click(function () {
        $(this).parents('.box_link_foot').find('ul').slideToggle();
    });

    $('.list_image_video .image img').click(function () {
        var src = $(this).attr('data-video');

        var link_video = $('#videos').attr('src', src);
    })

    $(window).scroll(function (event) {
        var pos_body = $('html,body').scrollTop();
        if (pos_body > 105) {
            $('.header2').addClass('fixed');
        } else {
            $('.header2').removeClass('fixed');
        }
    });
    $('.autoplay1-ykkh').slick({
        dots: false,
        infinite: true,
        speed: 300,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: false,
    });

    $('.faded').slick({
        dots: false,
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        cssEase: 'linear'
    });
    $('.faded-detail').slick({
        dots: true,
        infinite: true,
        speed: 1000,
        autoplay: true,
        autoplaySpeed: 3000,
        fade: true,
        cssEase: 'linear'
    });
    $('.tin-tuc-home').slick({
        dots: false,
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,

            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 550,
            settings: {
                slidesToShow: 1,

            }
        }
        ]
    });

    $('.box-right-tr').slick({
        dots: false,
        arrows: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        prevArrow: '<button type="button" data-role="none" class="slick-prev" aria-label="Previous" tabindex="0" role="button"><i class="ti-angle-left"></i></button>',
        nextArrow: '<button type="button" data-role="none" class="slick-next" aria-label="Next" tabindex="0" role="button"><i class="ti-angle-right"></i></button>',
        autoplaySpeed: 1500,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }
        ]
    });

    $('.slide_service5').slick({
        dots: false,
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 3,

            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2,
            }
        }
        ]
    });



    $('.slide_cate').slick({
        dots: true,
        arrows: false,
        slidesToShow: 6,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            }
        }
        ]
    });

    $('.autoplay5-pro').slick({
        dots: false,
        arrows: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,

            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 550,
            settings: {
                slidesToShow: 1,

            }
        }
        ]
    });
    $('.autoplay5-pro-2').slick({
        dots: false,
        arrows: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,

            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 550,
            settings: {
                slidesToShow: 1,

            }
        }
        ]
    });
    $('.autoplay4-pro').slick({
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 550,
            settings: {
                slidesToShow: 2,
            }
        }
        ]
    });

    $('.autoplay_height').slick({
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        vertical: true,
        autoplaySpeed: 2500,
        responsive: [{
            breakpoint: 768,
            settings: {
                slidesToShow: 1,
            }
        }]
    });

    $('.autoplay3-news').slick({
        dots: true,
        arrows: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 2500,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,
            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 550,
            settings: {
                slidesToShow: 1,
            }
        }
        ]
    });


    $('.slide_video').slick({
        dots: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
    });

    $('.autoplay5-doitac').slick({
        dots: false,
        slidesToShow: 7,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 3,

            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            }
        }
        ]
    });
    $('.autoplay6-tintuc').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: false,
        autoplaySpeed: 1500,
        pauseOnHover: true,
        responsive: [{
            breakpoint: 1199,
            settings: {
                slidesToShow: 4,

            }
        },
        {
            breakpoint: 991,
            settings: {
                slidesToShow: 3,

            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 350,
            settings: {
                slidesToShow: 1,
            }
        }
        ]
    });

    $('.autoplay4-ban-chay').slick({
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        pauseOnHover: true,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 4,

            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 1,
            }
        }
        ]
    });

    $(document).ready(function () {
        $('.autoplay6-video').slick({
            dots: false,
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            responsive: [{
                breakpoint: 991,
                settings: {
                    slidesToShow: 3,

                }
            },
            {
                breakpoint: 767,
                settings: {
                    slidesToShow: 2,

                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                }
            }
            ]
        });
    });

    $('.autoplay6-spkhac').slick({
        dots: false,
        slidesToShow: 5,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
            breakpoint: 991,
            settings: {
                slidesToShow: 4,

            }
        },
        {
            breakpoint: 767,
            settings: {
                slidesToShow: 2,

            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
            }
        }
        ]
    });
});






function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}

function myFunction2(x) {
    x.classList.toggle("change2");
}

// let show_hoidap = document.querySelector('.show_hoidap')
// show_hoidap.addEventListener('click',()=>{
//     document.querySelector('.sumit_commethoidap').classList.remove('hidden')
// })
let i = 0;


var myVar = setInterval(() => {
    {
        var x = screen.width;

        let marquee__AdvertisingPhoto = document.querySelector('.marquee__AdvertisingPhoto')
        let W_marquee__AdvertisingPhoto = marquee__AdvertisingPhoto.offsetWidth;
        i = i + 5;

        if (i <= (W_marquee__AdvertisingPhoto - x)) {
            marquee__AdvertisingPhoto.style.transform = "translate3d(-" + i + "px, 0,0)";
        }
        else {
            return;
        }
        // console.log(marquee__AdvertisingPhoto)
        // marquee__AdvertisingPhoto.style.Transform = "translateX(-"+ i +"px);"
        // console.log(x)
    }
}, 100);

let item__addresses = document.querySelectorAll('.js--item__addresses')
let maps = document.querySelectorAll('.map__1')
item__addresses.forEach((item__address, index) => {
    item__address.addEventListener('click', () => {
        document.querySelector('.map__1.active').classList.remove('active')
        maps[index].classList.add('active')
    })
})







var timeNow = new Date(); 
var nowYear = timeNow.getFullYear();
var nowMonth = timeNow.getMonth()+1;
var nowDay = timeNow.getDate()+1; 

function r(seconds){
    if(seconds < 10){
        return "0" + seconds ;
    }
    else{
        return  seconds;
    }
}

let toksco = parseInt(r(nowMonth))+"/"+r(nowDay)+"/"+r(nowYear)+" 00:00:00";
let endDate = new Date(toksco).getTime();

console.log(endDate)
let oneday = 3599393 * 24;
let onday_g = oneday;
let check = setInterval(function () {

    let now = new Date().getTime();
    let distance = endDate - now;
    // distance = distance - 999,831645; 
    // console.log(distance)
    let Phan_tram =  Math.floor((distance/onday_g)*100)
    let day = Math.floor(distance / (24 * 60 * 60 * 1000));
    let hour = Math.floor((distance % (24 * 60 * 60 * 1000)) / (60 * 60 * 1000));
    let minute = Math.floor((distance % (60 * 60 * 1000)) / (60 * 1000));
    let seconds = Math.floor((distance % (60 * 1000)) / 1000);
    document.querySelectorAll(".PhanTramCon").forEach( ex=>{
        ex.style.width = Phan_tram+"%"
    })
    function d(seconds){
        if(seconds < 10){
            return "0" + seconds ;
        }
        else{
            return  seconds;
        }
    }
    if (day < 10) {
        document.getElementById('day').innerText = "0" + day;
    } else {
        document.getElementById('day').innerText = day;
    }
    if (hour < 10) {
        document.getElementById('hour').innerText = "0" + hour;
    } else {
        document.getElementById('hour').innerText = hour;
    }
    if (minute < 10) {
        document.getElementById('minute').innerText = "0" + minute;
    } else {
        document.getElementById('minute').innerText = minute;
    }
    if (seconds < 10) {
        document.getElementById('seconds').innerText = "0" + seconds;
    } else {
        document.getElementById('seconds').innerText = seconds;
    }
    let text__PhanTrams = document.querySelectorAll('.text__PhanTram')
    text__PhanTrams.forEach(text__PhanTram => {
        text__PhanTram.innerHTML = "còn 0 ngày " +  d(hour)  + ":" +  d(minute)  + ":" +  d(seconds)  + " ("+ Phan_tram +"%) "

    })
    if (distance <= 0) {
        document.getElementById('day').innerText = "00";
        document.getElementById('hour').innerText = "00";
        document.getElementById('minute').innerText = "00";
        document.getElementById('seconds').innerText = "00";
        clearInterval(check);
    }
}, 1000);

