window.onscroll = function() {myFunction()};
            
            var header = document.getElementById("myHeader");
            var banner = document.getElementById("banner");
            var sticky = header.offsetTop;
            
            function myFunction() {
              if (window.pageYOffset > sticky) {
                
                header.classList.add("sticky");
                banner.classList.add("d-none");
              } else {
                header.classList.remove("sticky");
                banner.classList.remove("d-none")
              }
            }