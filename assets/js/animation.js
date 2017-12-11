anime({
    /*Animeret med Anime.js http://animejs.com/. Påvirker alle elementer med klassen delay. Opacity skruer op og ned på gennemsigtigheden.
    Ved at Putte det i et sker animationen én efter hindanden*/
    targets: '.delay',
    opacity: [
        {
            value: 0,
            duration: 1000
        },
        {
            value: 1,
            duration: 4000
        },
        {
            value: 0
        }
    ],
    /* TranslateX ændrer på elementets position på X aksen */
    translateX: [
        {
            value: -2500,
            duration: 1500
        },
        {
            value: 1,
            duration: 500
        }
    ],
    /* Easing påvirker måden elementet flytter sig og opfører sig
    på. easeInOutQuad påvirker animationen både på vej ind og ud. 
    I kombination med opacity giver det en fade effekt. http//:http://animejs.com/documentation/#penner */
    easing: 'easeInOutQuad',
    /* Denne funktion giver en forsinkelse på hver element i .delay klassen på 300millisekunder mellem hver animation */
    delay: function (el, i, l) {
        return i * 300
    }


});

anime({
    targets: '#prikker',
    translateX: [
        {
            value: 2500,
            duration: 1500,
            delay: 6000
        },
        {
            value: 1,
            duration: 500
        }
    ],
    /* Elasticity giver en elastik agtig effekt på animationen */
    elasticity: 700,
    /* Fade in og fade ud effekt */
    opacity: [
        {
            value: 0,
            duration: 1000,
            delay: 6000
        },
        {
            value: .1
        },
        {
            value: .2
        },
        {
            value: .3
        },
        {
            value: .4
        },
        {
            value: .5
        },
        {
            value: .6
        },
        {
            value: .7
        },
        {
            value: .8
        },
        {
            value: .9
        },
        {
            value: 1,
            duration: 2000
        },
        {
            value: .9
        },
        {
            value: .8
        },
        {
            value: .7
        },
        {
            value: .6
        },
        {
            value: .5
        },
        {
            value: .4
        },
        {
            value: .3
        },
        {
            value: .2
        },
        {
            value: .1
        },
        {
            value: 0
        }

    ],
});

anime({
    targets: '#sammenbragteborn',
    opacity: [
        {
            value: 0,
            duration: 8500
        },
        {
            value: .1
        },
        {
            value: .2
        },
        {
            value: .3
        },
        {
            value: .4
        },
        {
            value: .5
        },
        {
            value: .6
        },
        {
            value: .7
        },
        {
            value: .8
        },
        {
            value: .9
        },
        {
            value: 1
        },


    ],
    translateY: [
        {
            value: -40,
            delay: 10000
        }
    ],

});

anime({
    targets: '#logo',
    opacity: [
        {
            value: 0,
            duration: 3500
        },
        {
            value: .1
        },
        {
            value: .2
        },
        {
            value: .3
        },
        {
            value: .4
        },
        {
            value: .5
        },
        {
            value: .6
        },
        {
            value: .7
        },
        {
            value: .8
        },
        {
            value: .9
        },
        {
            value: 1,
            duration: 500
        }
    ],


});

anime({
    targets: '#logo_tekst',
    opacity: [
        {
            value: 0,
            duration: 3500
        },
        {
            value: .1
        },
        {
            value: .2
        },
        {
            value: .3
        },
        {
            value: .4
        },
        {
            value: .5
        },
        {
            value: .6
        },
        {
            value: .7
        },
        {
            value: .8
        },
        {
            value: .9
        },
        {
            value: 1,
            duration: 500
        }
    ],


});
