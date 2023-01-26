tmp = true;
// responsive effect 
function MenuOpen() {
    console.log(window.innerWidth);

    // condition responsive with window's width
    if (window.innerWidth < 400) {
        if (tmp == true) {
            const btn = document.querySelectorAll("#btn");
            // display all header buttons
            btn.forEach(btn => {
                btn.style.display = "block";
            });

            tmp = false;
        } else {
            tmp = true;
            const btn = document.querySelectorAll("#btn");
            // display off all header buttons
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

// loader event 
window.addEventListener("DOMContentLoaded", (event) => {

    setTimeout(function() {
        // animation loader fill up
        document.getElementById("loader").style.top = "-100vh";
        console.log("test");
    }, 500)
});
        var i = 0;
        function Like(x) {
            if (i == 0) {
                x.style.backgroundImage = "url('like.png')";
                i = 1;
            } else {
                x.style.backgroundImage = "url('nolike.png')";
                i = 0;
            }
        }
