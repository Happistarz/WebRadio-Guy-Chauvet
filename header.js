 tmp = true;
        function MenuOpen() {
            console.log(window.innerWidth);
            
            if (window.innerWidth < 400) {
                if (tmp == true) {
                    const btn = document.querySelectorAll("#btn");
                    btn.forEach(btn => {
                        btn.style.display = "block";
                    });
                    
                    tmp = false;
                } else {
                    tmp = true;
                    const btn = document.querySelectorAll("#btn");
                    btn.forEach(btn => {
                        btn.style.display = "none";
                    });
                }
            } else {
                const btn = document.querySelectorAll("#btn");
                    btn.forEach(btn => {
                        btn.style.display = "block";
                    });
                        
            }
        }
        window.addEventListener("DOMContentLoaded",(event) => {
            setTimeout(function() {
                document.getElementById("loader").style.top = "-100vh";
            }, 1000)
        });
