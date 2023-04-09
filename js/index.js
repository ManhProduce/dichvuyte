// <!-- script scroll down header -->
    // <script>
        window.onscroll = function() {myFunction()};

        var header = document.getElementById("bottom-header");
        var sticky = header.offsetTop;
        
        {/* // var visibiliti = document.getElementById("mona-content"); */}

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("bottom-header-sticky");
            } else {
                header.classList.remove("bottom-header-sticky");
            }
            if (window.pageYOffset > sticky) {
                header.classList.add("header-scrolldown");
            } else {
                header.classList.remove("header-scrolldown");
            }header.classList.remove("movright");
        }
    // </script>
    // END
    // <!-- swiper banner -->
    // <script>
        const swiper = new Swiper('.swiper-container', {
            // Optional parameters
            speed: 700,
            // direction: '',
            loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        });
    // </script>
    // <!-- END -->
    // <!-- animation when on screen -->
    // <script>
        // Remove the transition class
        const animation_up = document.querySelector('.animation-up');
        const animation_left = document.querySelector('.animation-left');
        const animation_right = document.querySelector('.animation-right');

        animation_up.classList.remove('movup');
        animation_left.classList.remove('movleft');
        animation_right.classList.remove('movright');

        // Create the observer, same as before:
            const observer2 = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animation_right.classList.add('movright');
                return;
                }
            });
            });
            const observer1 = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animation_left.classList.add('movleft');
                return;
                }
            });
            });
        const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animation_up.classList.add('movup');
            return;
            }
        });
        });

        observer.observe(document.getElementById('go-up'));
        observer1.observe(document.getElementById('go-left'));
        observer2.observe(document.getElementById('go-right'));
    // </script>
    // <!-- END -->
    // <!-- random color for nav item -->
    // <script>
        function getRandomColor() {
        var letters = "0123456789ABCDEF";
        var color = "#";
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
        }

        var elements = document.getElementsByClassName("my-home-pd-nav-item");
        for (var i = 0; i < elements.length; i++) {
        elements[i].style.borderLeftColor = getRandomColor();
        }
    // </script>