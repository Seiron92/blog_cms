

function design2(){
    var isFirefox = navigator.userAgent.toLowerCase().indexOf('firefox') > -1;
    if(navigator.userAgent.toLowerCase().indexOf('firefox') > -1){
        canvas.style.visibility = 'hidden';
        //latestPosts.style.display = 'block';
        //menu.innerHTML = '<ul><li id="jumpToLatest">Latest posts</li><li id="create">Create account</li><li id="sign">Sign in</li></ul><a href="index.php"><img src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/logo.svg"></a>';
        menu.innerHTML = '<ul><li id="jumpToLatest">Latest posts</li><li id="create">Create account</li><li id="sign">Sign in</li></ul><a href="index.php"><img src="../images/logo.svg"></a>';
        menu.style.color = '#fff';
        latestPosts.style.zIndex = '2';
        $("#latestPosts").fadeIn()
            .css({ top: 1000, position: 'fixed' })
            .animate({ top: 120 }, 0, function () {
            });
        for (var i = 0; i < list.length; i++) {
            list[i].style.color = "#fff";
            list[i].style.transition = "0.3s ease-in-out";
        }
        container.style.display = 'none';
        window.onscroll = function () {
    /*
            if (signIn.style.display == 'block') {
                signIn.style.display = 'none';
                latestPosts.style.display = 'block';
                document.getElementById('createform').style.display = 'none';
            }
    
            for (var i = 0; i < list.length; i++) {
                if (list[i].style.display == 'none') {
                    list[i].style.display = 'inline';
                }
            }
            */
            var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    
            if (scrollTop > 0) {
                canvas.style.visibility = 'hidden';
                //latestPosts.style.display = 'block';
                //menu.innerHTML = '<ul><li id="jumpToLatest">Latest posts</li><li id="create">Create account</li><li id="sign">Sign in</li></ul><a href="index.php"><img src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/logo.svg"></a>';
                menu.innerHTML = '<ul><li id="jumpToLatest">Latest posts</li><li id="create">Create account</li><li id="sign">Sign in</li></ul><a href="index.php"><img src="../images/logo.svg"></a>';
                menu.style.color = '#fff';
                latestPosts.style.zIndex = '2';
                $("#latestPosts").fadeIn()
                    .css({ top: 1000, position: 'fixed' })
                    .animate({ top: 120 }, 0, function () {
                    });
                for (var i = 0; i < list.length; i++) {
                    list[i].style.color = "#fff";
                    list[i].style.transition = "0.3s ease-in-out";
                }
                container.style.display = 'none';
            }
            if (scrollTop > 400) {
                canvas.style.visibility = 'hidden';
                //latestPosts.style.display = 'block';
                //menu.innerHTML = '<ul><li id="jumpToLatest">Latest posts</li><li id="create">Create account</li><li id="sign">Sign in</li></ul><a href="index.php"><img src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/logo.svg"></a>';
                menu.innerHTML = '<ul><li id="jumpToLatest">Latest posts</li><li id="create">Create account</li><li id="sign">Sign in</li></ul><a href="index.php"><img src="../images/logo.svg"></a>';
                menu.style.color = '#fff';
                latestPosts.style.zIndex = '2';
                $("#latestPosts").fadeIn()
                    .css({ top: 1000, position: 'fixed' })
                    .animate({ top: 120 }, 0, function () {
                    });
                for (var i = 0; i < list.length; i++) {
                    list[i].style.color = "#fff";
                    list[i].style.transition = "0.3s ease-in-out";
                }
                container.style.display = 'none';
            }
            /*
            if (scrollTop > 700) {
                currentImage++
                currentImage = 2;
                for (var i = 0; i < list.length; i++) {
                    list[i].style.color = "#f2709c";
                    list[i].style.transition = "0.3s ease-in-out";
                }
                for (var i = 0; i < list.length; i++) {
                    list[i].style.color = "#f2709c";
                    list[i].style.transition = "0.7s ease-in-out";
                }
                menu.innerHTML = '<ul><li id="jumpToLatest">Latest posts</li><li id="create">Create account</li><li id="sign">Sign in</li></ul>';
                latestPosts.style.display = 'none';
                container.style.display = 'block';
            }
            if (scrollTop > 1000) {
                currentImage++
                currentImage = 3;
                menu.style.backgroundImage = 'none';
                menu.style.color = '#fff';
                for (var i = 0; i < list.length; i++) {
                    list[i].style.color = "#fd855f";
                    list[i].style.transition = "0.3s ease-in-out";
                }
                menu.innerHTML = '<ul><li id="jumpToLatest">Latest posts</li><li id="create">Create account</li><li id="sign">Sign in</li></ul>';
                latestPosts.style.display = 'none!important';
                latestPosts.style.zIndex = '-1';
                container.style.display = 'block';
            }
            if (scrollTop > 1500) {
                canvas.style.visibility = 'hidden';
                //latestPosts.style.display = 'block';
                //menu.innerHTML = '<ul><li id="jumpToLatest">Latest posts</li><li id="create">Create account</li><li id="sign">Sign in</li></ul><a href="index.php"><img src="http://studenter.miun.se/~rese1800/dt093g/projekt/images/logo.svg"></a>';
                menu.innerHTML = '<ul><li id="jumpToLatest">Latest posts</li><li id="create">Create account</li><li id="sign">Sign in</li></ul><a href="index.php"><img src="../images/logo.svg"></a>';
                menu.style.color = '#fff';
                latestPosts.style.zIndex = '2';
                $("#latestPosts").fadeIn()
                    .css({ top: 1000, position: 'fixed' })
                    .animate({ top: 120 }, 0, function () {
                    });
                for (var i = 0; i < list.length; i++) {
                    list[i].style.color = "#fff";
                    list[i].style.transition = "0.3s ease-in-out";
                }
                container.style.display = 'none';
    */
            }
    }
    }